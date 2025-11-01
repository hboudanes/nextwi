<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     */
    public function index()
    {
        return view('users.index');
    }

    /**
     * Get data for DataTables AJAX request.
     */
    public function getData(Request $request)
    {
        $users = $this->userService->getUsersForDataTable();

        // Apply role filter
        if ($request->has('selectedRoles') && is_array($request->selectedRoles) && !in_array('all', $request->selectedRoles)) {
            $users->whereHas('roles', function ($query) use ($request) {
                $query->whereIn('name', $request->selectedRoles);
            });
        }

        // Apply status filter
        if ($request->has('selectedStatuses') && is_array($request->selectedStatuses) && !in_array('all', $request->selectedStatuses)) {
            $users->whereIn('status', $request->selectedStatuses);
        }

        return DataTables::of($users)
            // Global search across name and email
            ->filter(function ($query) use ($request) {
                $search = $request->input('search.value');
                if (!empty($search)) {
                    $query->where(function ($q) use ($search) {
                        $q->where('users.first_name', 'like', "%{$search}%")
                            ->orWhere('users.last_name', 'like', "%{$search}%")
                            ->orWhere('users.name', 'like', "%{$search}%")
                            ->orWhere('users.email', 'like', "%{$search}%")
                            ->orWhere('users.phone', 'like', "%{$search}%");
                    });
                }
            })
            ->addIndexColumn()
            ->addColumn('user', function ($row) {
                // Generate initials
                $initials = strtoupper(substr($row->first_name, 0, 1) . substr($row->last_name, 0, 1));

                // Random gradient colors
                $gradients = [
                    'from-blue-500 to-purple-600',
                    'from-green-500 to-teal-600',
                    'from-orange-500 to-red-600',
                    'from-pink-500 to-purple-600',
                    'from-indigo-500 to-blue-600',
                ];
                $gradient = $gradients[$row->id % count($gradients)];

                return '
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-gradient-to-br ' . $gradient . ' rounded-full flex items-center justify-center text-white font-semibold">
                        ' . $initials . '
                    </div>
                    <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">' . $row->first_name . ' ' . $row->last_name . '</div>
                        <div class="text-sm text-gray-500">ID: ' . str_pad($row->id, 3, '0', STR_PAD_LEFT) . '</div>
                    </div>
                </div>';
            })
            ->addColumn('email', function ($row) {
                return '<div class="text-sm text-gray-900">' . $row->email . '</div>';
            })
            ->addColumn('phone', function ($row) {
                return '<div class="text-sm text-gray-900">' . ($row->phone ?? '-') . '</div>';
            })
            ->addColumn('role', function ($row) {
                $role = $row->roles->first()->name ?? 'N/A';
                $colors = [
                    'admin' => 'bg-purple-100 text-purple-800',
                    'manager' => 'bg-blue-100 text-blue-800',
                    'operator' => 'bg-gray-100 text-gray-800',
                    'support_agent' => 'bg-yellow-100 text-yellow-800',
                    'super_admin' => 'bg-red-100 text-red-800',
                ];
                $colorClass = $colors[strtolower($role)] ?? 'bg-gray-100 text-gray-800';

                return '<span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full ' . $colorClass . '">' . $role . '</span>';
            })
            ->addColumn('business', function (User $row) {
                $role = $row->roles->first()->name ?? '';
                if (strtolower($role) === 'admin') {
                    $currentBusinesses = 5;
                    $maxBusinesses = $row->config->max_businesses;
                    return '<div class="text-sm font-semibold text-blue-600">' . $currentBusinesses . '/' . $maxBusinesses . '</div>';
                }
                return '<div class="text-sm text-gray-500">-</div>';
            })
            ->addColumn('status', function ($row) {
                if ($row->status === 'active') {
                    return '<span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Active</span>';
                }
                return '<span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Inactive</span>';
            })
            ->addColumn('action', function ($row) {
                $role = $row->roles->first()->name ?? '';
                $isAdmin = strtolower($role) === 'admin';

                $btn = '<div class="flex items-center gap-2">';

                // View Businesses Button (only for admin)
                if ($isAdmin) {
                    $btn .= '<a href="' . route('businesses.index', ['user_id' => $row->id]) . '" 
                    class="text-purple-600 hover:text-purple-900 p-1 hover:bg-purple-50 rounded transition-colors" 
                    title="View User Businesses">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </a>';
                }

                // Edit Button
                $btn .= '<a href="' . route('users.edit', $row->id) . '" 
                class="text-blue-600 hover:text-blue-900 p-1 hover:bg-blue-50 rounded transition-colors" 
                title="Edit User">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
            </a>';

                // Delete Button
                $btn .= '<button type="button" onclick="deleteUser(' . $row->id . ')" 
                class="text-red-600 hover:text-red-900 p-1 hover:bg-red-50 rounded transition-colors" 
                title="Delete User">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                </svg>
            </button>';

                $btn .= '</div>';
                return $btn;
            })
            ->rawColumns(['user', 'email', 'phone', 'role', 'business', 'status', 'action'])
            ->setRowClass('hover:bg-gray-50 transition-colors')
            ->make(true);
    }


    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        $roles = $this->userService->getAllRoles();
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created user in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
                'phone' => ['nullable', 'string', 'max:20'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'role' => ['required', 'string', 'exists:roles,name'],
                'status' => ['required', 'string', 'in:active,inactive'],
            ]);

            $userData = $request->only(['first_name', 'last_name', 'email', 'phone', 'password', 'status']);
            // Set name as combination of first_name and last_name
            $userData['name'] = $request->first_name . ' ' . $request->last_name;

            $role = $request->input('role');

            // Only create config for Admin users
            $configData = [];
            if ($role === 'Admin' && $request->has('max_businesses')) {
                $configData['max_businesses'] = $request->input('max_businesses', 1);
            }

            $user = $this->userService->createUser($userData, $role, $configData);

            if (!$user) {
                return redirect()->route('users.create')
                    ->withInput()
                    ->with('error', 'Failed to create user. Please try again.');
            }

            return redirect()->route('users.index')->with('success', 'User created successfully');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->route('users.create')->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            return redirect()->route('users.create')
                ->withInput()
                ->with('error', 'Failed to create user: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified user.
     */
    public function show($id)
    {
        return view('users.show', ['id' => $id]);
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit($id)
    {
        $user = User::with(['roles', 'config'])->findOrFail($id);
        $roles = $this->userService->getAllRoles();
        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $user = User::with(['roles', 'config'])->findOrFail($id);

            $validated = $request->validate([
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class . ',email,' . $user->id],
                'phone' => ['nullable', 'string', 'max:20'],
                'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
                'role' => ['required', 'string', 'exists:roles,name'],
                'status' => ['required', 'string', 'in:active,inactive'],
                'max_businesses' => ['nullable', 'integer', 'min:1'],
            ]);

            $data = $request->only(['first_name', 'last_name', 'email', 'phone', 'status']);
            $data['name'] = $request->first_name . ' ' . $request->last_name;

            if ($request->filled('password')) {
                $data['password'] = $request->input('password');
            }

            $role = $request->input('role');
            $configData = [];
            if ($role === 'Admin' && $request->has('max_businesses')) {
                $configData['max_businesses'] = (int) $request->input('max_businesses', 1);
            }

            $updated = $this->userService->updateUser($user, $data, $role, $configData);

            if (!$updated) {
                return redirect()->route('users.edit', $user->id)
                    ->withInput()
                    ->with('error', 'Failed to update user. Please try again.');
            }

            return redirect()->route('users.index')->with('success', 'User updated successfully');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->route('users.edit', $id)->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            return redirect()->route('users.edit', $id)
                ->withInput()
                ->with('error', 'Failed to update user: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy($id)
    {
        // Delete logic would go here
        // For now, just redirect to index
        return redirect()->route('users.index');
    }
}