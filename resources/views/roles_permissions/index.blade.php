<x-main-layout>
    <x-slot name="style">
        <style>
            .chevron {
                transition: transform 0.3s ease;
            }

            .chevron.rotate {
                transform: rotate(90deg);
            }

            .modal-backdrop {
                transition: opacity 0.3s ease;
            }

            .modal-content-wrapper {
                transition: transform 0.3s ease, opacity 0.3s ease;
            }
        </style>
    </x-slot>

    <!-- Modal Backdrop -->
    <div id="modal-backdrop" class="fixed inset-0 bg-gray-900 bg-opacity-50 z-40 hidden modal-backdrop opacity-0"
        onclick="closeModal()"></div>

    <!-- Add Role Modal -->
    <div id="add-role-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4 hidden">
        <div class="modal-content-wrapper bg-white rounded-lg shadow-xl max-w-md w-full transform scale-95 opacity-0">
            <!-- Modal Header -->
            <div class="flex items-center justify-between p-6 border-b border-gray-200">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900">Add New Role</h3>
                </div>
                <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>

            <!-- Modal Body -->
            <form id="add-role-form" onsubmit="handleSubmit(event)">
                <div class="p-6 space-y-4">
                    <div>
                        <label for="role-name" class="block text-sm font-medium text-gray-700 mb-2">
                            Role Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="role-name" name="role_name" required
                            placeholder="Enter role name (e.g., Manager, Operator)"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                    </div>

                    <div>
                        <label for="role-description" class="block text-sm font-medium text-gray-700 mb-2">
                            Description
                        </label>
                        <textarea id="role-description" name="role_description" rows="3"
                            placeholder="Brief description of the role's purpose"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors resize-none"></textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Status
                        </label>
                        <div class="flex items-center gap-4">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="role_status" value="active" checked
                                    class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500">
                                <span class="text-sm text-gray-700">Active</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="role_status" value="inactive"
                                    class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500">
                                <span class="text-sm text-gray-700">Inactive</span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="flex items-center justify-end gap-3 p-6 border-t border-gray-200 bg-gray-50">
                    <button type="button" onclick="closeModal()"
                        class="px-5 py-2.5 text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                        Cancel
                    </button>
                    <button type="submit"
                        class="px-5 py-2.5 text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        <span>Create Role</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Main Content -->
    <main class="lg:ml-64 min-h-screen">
        <!-- Top Bar -->
        <div class="bg-white border-b border-gray-200 px-6 py-4 mt-16 lg:mt-0">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Roles & Permissions</h1>
                    <p class="text-sm text-gray-500 mt-1">Manage user roles and their associated permissions</p>
                </div>
                <button onclick="openModal()"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    <span>Add New Role</span>
                </button>
            </div>
        </div>

        <!-- Content Area -->
        <div id="content-area" class="p-6">
            <!-- Roles & Permissions Table -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                <!-- Header -->
                <div class="grid grid-cols-5 bg-gray-50 border-b border-gray-200">
                    <div class="px-6 py-3 text-left">
                        <span class="text-sm font-medium text-gray-600">Module Permission</span>
                    </div>
                    <div class="px-6 py-3 text-left">
                        <div class="text-sm font-medium text-gray-600">Role</div>
                        <div class="text-sm font-semibold text-gray-900 mt-1">Super Admin</div>
                    </div>
                    <div class="px-6 py-3 text-left">
                        <div class="text-sm font-medium text-gray-600">Role</div>
                        <div class="text-sm font-semibold text-gray-900 mt-1">Admin</div>
                    </div>
                    <div class="px-6 py-3 text-left">
                        <div class="text-sm font-medium text-gray-600">Role</div>
                        <div class="text-sm font-semibold text-gray-900 mt-1">Manager</div>
                    </div>
                    <div class="px-6 py-3 text-left">
                        <div class="text-sm font-medium text-gray-600">Role</div>
                        <div class="text-sm font-semibold text-gray-900 mt-1">Operateur</div>
                    </div>
                </div>

                <!-- Users Module Section -->
                <div class="border-b border-gray-200">
                    <div class="grid grid-cols-5 bg-blue-50 hover:bg-blue-100 transition-colors cursor-pointer"
                        onclick="toggleSection('users')">
                        <div class="px-6 py-3 flex items-center gap-2">
                            <svg id="chevron-users" class="w-4 h-4 text-gray-600 chevron rotate" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                            <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                </path>
                            </svg>
                            <span class="text-sm font-medium text-gray-900">Users</span>
                        </div>
                        <div class="px-6 py-3 flex items-center">
                            <input type="checkbox" checked
                                class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                                onclick="event.stopPropagation()">
                        </div>
                        <div class="px-6 py-3 flex items-center">
                            <input type="checkbox" checked
                                class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                                onclick="event.stopPropagation()">
                        </div>
                        <div class="px-6 py-3 flex items-center">
                            <input type="checkbox"
                                class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                                onclick="event.stopPropagation()">
                        </div>
                        <div class="px-6 py-3 flex items-center">
                            <input type="checkbox"
                                class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                                onclick="event.stopPropagation()">
                        </div>
                    </div>

                    <div id="users-permissions" class="block">
                        <div class="grid grid-cols-5 hover:bg-gray-50 transition-colors border-t border-gray-100">
                            <div class="px-6 py-3 pl-16">
                                <span class="text-sm text-gray-700">View</span>
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox" checked
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox" checked
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox"
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox"
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                        </div>

                        <div class="grid grid-cols-5 hover:bg-gray-50 transition-colors border-t border-gray-100">
                            <div class="px-6 py-3 pl-16">
                                <span class="text-sm text-gray-700">Create</span>
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox" checked
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox" checked
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox"
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox"
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                        </div>

                        <div class="grid grid-cols-5 hover:bg-gray-50 transition-colors border-t border-gray-100">
                            <div class="px-6 py-3 pl-16">
                                <span class="text-sm text-gray-700">Edit</span>
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox" checked
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox" checked
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox"
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox"
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                        </div>

                        <div class="grid grid-cols-5 hover:bg-gray-50 transition-colors border-t border-gray-100">
                            <div class="px-6 py-3 pl-16">
                                <span class="text-sm text-gray-700">Delete</span>
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox" checked
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox"
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox"
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox"
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Businesses Module Section -->
                <div class="border-b border-gray-200">
                    <div class="grid grid-cols-5 bg-blue-50 hover:bg-blue-100 transition-colors cursor-pointer"
                        onclick="toggleSection('businesses')">
                        <div class="px-6 py-3 flex items-center gap-2">
                            <svg id="chevron-businesses" class="w-4 h-4 text-gray-600 chevron" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7"></path>
                            </svg>
                            <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                </path>
                            </svg>
                            <span class="text-sm font-medium text-gray-900">Businesses</span>
                        </div>
                        <div class="px-6 py-3 flex items-center">
                            <input type="checkbox" checked
                                class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                                onclick="event.stopPropagation()">
                        </div>
                        <div class="px-6 py-3 flex items-center">
                            <input type="checkbox" checked
                                class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                                onclick="event.stopPropagation()">
                        </div>
                        <div class="px-6 py-3 flex items-center">
                            <input type="checkbox" checked
                                class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                                onclick="event.stopPropagation()">
                        </div>
                        <div class="px-6 py-3 flex items-center">
                            <input type="checkbox"
                                class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                                onclick="event.stopPropagation()">
                        </div>
                    </div>

                    <div id="businesses-permissions" class="hidden">
                        <div class="grid grid-cols-5 hover:bg-gray-50 transition-colors border-t border-gray-100">
                            <div class="px-6 py-3 pl-16">
                                <span class="text-sm text-gray-700">View</span>
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox" checked
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox" checked
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox" checked
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox"
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                        </div>

                        <div class="grid grid-cols-5 hover:bg-gray-50 transition-colors border-t border-gray-100">
                            <div class="px-6 py-3 pl-16">
                                <span class="text-sm text-gray-700">Create</span>
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox" checked
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox" checked
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox" checked
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox"
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                        </div>

                        <div class="grid grid-cols-5 hover:bg-gray-50 transition-colors border-t border-gray-100">
                            <div class="px-6 py-3 pl-16">
                                <span class="text-sm text-gray-700">Edit</span>
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox" checked
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox" checked
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox"
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox"
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                        </div>

                        <div class="grid grid-cols-5 hover:bg-gray-50 transition-colors border-t border-gray-100">
                            <div class="px-6 py-3 pl-16">
                                <span class="text-sm text-gray-700">Delete</span>
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox" checked
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox"
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox"
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox"
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Locations Module Section -->
                <div class="border-b border-gray-200">
                    <div class="grid grid-cols-5 bg-blue-50 hover:bg-blue-100 transition-colors cursor-pointer"
                        onclick="toggleSection('locations')">
                        <div class="px-6 py-3 flex items-center gap-2">
                            <svg id="chevron-locations" class="w-4 h-4 text-gray-600 chevron" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7"></path>
                            </svg>
                            <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span class="text-sm font-medium text-gray-900">Locations</span>
                        </div>
                        <div class="px-6 py-3 flex items-center">
                            <input type="checkbox" checked
                                class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                                onclick="event.stopPropagation()">
                        </div>
                        <div class="px-6 py-3 flex items-center">
                            <input type="checkbox" checked
                                class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                                onclick="event.stopPropagation()">
                        </div>
                        <div class="px-6 py-3 flex items-center">
                            <input type="checkbox" checked
                                class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                                onclick="event.stopPropagation()">
                        </div>
                        <div class="px-6 py-3 flex items-center">
                            <input type="checkbox" checked
                                class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                                onclick="event.stopPropagation()">
                        </div>
                    </div>

                    <div id="locations-permissions" class="hidden">
                        <div class="grid grid-cols-5 hover:bg-gray-50 transition-colors border-t border-gray-100">
                            <div class="px-6 py-3 pl-16">
                                <span class="text-sm text-gray-700">View</span>
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox" checked
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox" checked
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox" checked
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox" checked
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                        </div>

                        <div class="grid grid-cols-5 hover:bg-gray-50 transition-colors border-t border-gray-100">
                            <div class="px-6 py-3 pl-16">
                                <span class="text-sm text-gray-700">Create</span>
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox" checked
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox" checked
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox" checked
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox"
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                        </div>

                        <div class="grid grid-cols-5 hover:bg-gray-50 transition-colors border-t border-gray-100">
                            <div class="px-6 py-3 pl-16">
                                <span class="text-sm text-gray-700">Edit</span>
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox" checked
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox" checked
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox" checked
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox"
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                        </div>

                        <div class="grid grid-cols-5 hover:bg-gray-50 transition-colors border-t border-gray-100">
                            <div class="px-6 py-3 pl-16">
                                <span class="text-sm text-gray-700">Delete</span>
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox" checked
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox"
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox"
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox"
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Vouchers Module Section -->
                <div>
                    <div class="grid grid-cols-5 bg-blue-50 hover:bg-blue-100 transition-colors cursor-pointer"
                        onclick="toggleSection('vouchers')">
                        <div class="px-6 py-3 flex items-center gap-2">
                            <svg id="chevron-vouchers" class="w-4 h-4 text-gray-600 chevron" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7"></path>
                            </svg>
                            <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z">
                                </path>
                            </svg>
                            <span class="text-sm font-medium text-gray-900">Vouchers</span>
                        </div>
                        <div class="px-6 py-3 flex items-center">
                            <input type="checkbox" checked
                                class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                                onclick="event.stopPropagation()">
                        </div>
                        <div class="px-6 py-3 flex items-center">
                            <input type="checkbox" checked
                                class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                                onclick="event.stopPropagation()">
                        </div>
                        <div class="px-6 py-3 flex items-center">
                            <input type="checkbox" checked
                                class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                                onclick="event.stopPropagation()">
                        </div>
                        <div class="px-6 py-3 flex items-center">
                            <input type="checkbox"
                                class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                                onclick="event.stopPropagation()">
                        </div>
                    </div>

                    <div id="vouchers-permissions" class="hidden">
                        <div class="grid grid-cols-5 hover:bg-gray-50 transition-colors border-t border-gray-100">
                            <div class="px-6 py-3 pl-16">
                                <span class="text-sm text-gray-700">View</span>
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox" checked
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox" checked
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox" checked
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox"
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                        </div>

                        <div class="grid grid-cols-5 hover:bg-gray-50 transition-colors border-t border-gray-100">
                            <div class="px-6 py-3 pl-16">
                                <span class="text-sm text-gray-700">Create</span>
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox" checked
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox" checked
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox" checked
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox"
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                        </div>

                        <div class="grid grid-cols-5 hover:bg-gray-50 transition-colors border-t border-gray-100">
                            <div class="px-6 py-3 pl-16">
                                <span class="text-sm text-gray-700">Edit</span>
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox" checked
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox" checked
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox"
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox"
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                        </div>

                        <div class="grid grid-cols-5 hover:bg-gray-50 transition-colors border-t border-gray-100">
                            <div class="px-6 py-3 pl-16">
                                <span class="text-sm text-gray-700">Delete</span>
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox" checked
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox"
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox"
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                            <div class="px-6 py-3 flex items-center">
                                <input type="checkbox"
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="mt-6 flex items-center justify-end gap-3">
                <button
                    class="px-5 py-2.5 text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                    Cancel
                </button>
                <button class="px-5 py-2.5 text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors">
                    Save Changes
                </button>
            </div>
        </div>
    </main>

    <x-slot name="script">
        <script>
            function toggleSection(section) {
                const permissions = document.getElementById(section + '-permissions');
                const chevron = document.getElementById('chevron-' + section);

                if (permissions.classList.contains('hidden')) {
                    permissions.classList.remove('hidden');
                    permissions.classList.add('block');
                    chevron.classList.add('rotate');
                } else {
                    permissions.classList.remove('block');
                    permissions.classList.add('hidden');
                    chevron.classList.remove('rotate');
                }
            }

            function openModal() {
                const modal = document.getElementById('add-role-modal');
                const backdrop = document.getElementById('modal-backdrop');
                const modalContent = modal.querySelector('.modal-content-wrapper');

                modal.classList.remove('hidden');
                backdrop.classList.remove('hidden');

                setTimeout(() => {
                    backdrop.classList.remove('opacity-0');
                    backdrop.classList.add('opacity-100');
                    modalContent.classList.remove('scale-95', 'opacity-0');
                    modalContent.classList.add('scale-100', 'opacity-100');
                }, 10);

                document.body.style.overflow = 'hidden';

                setTimeout(() => {
                    document.getElementById('role-name').focus();
                }, 300);
            }

            function closeModal() {
                const modal = document.getElementById('add-role-modal');
                const backdrop = document.getElementById('modal-backdrop');
                const modalContent = modal.querySelector('.modal-content-wrapper');

                backdrop.classList.remove('opacity-100');
                backdrop.classList.add('opacity-0');
                modalContent.classList.remove('scale-100', 'opacity-100');
                modalContent.classList.add('scale-95', 'opacity-0');

                setTimeout(() => {
                    modal.classList.add('hidden');
                    backdrop.classList.add('hidden');
                    document.body.style.overflow = 'auto';
                    document.getElementById('add-role-form').reset();
                }, 300);
            }

            function handleSubmit(event) {
                event.preventDefault();

                const formData = new FormData(event.target);
                const roleName = formData.get('role_name');
                const roleDescription = formData.get('role_description');
                const roleStatus = formData.get('role_status');

                console.log('New Role Data:', {
                    name: roleName,
                    description: roleDescription,
                    status: roleStatus
                });

                alert(`Role "${roleName}" created successfully!`);
                closeModal();
            }

            document.addEventListener('keydown', function(event) {
                if (event.key === 'Escape') {
                    const modal = document.getElementById('add-role-modal');
                    if (!modal.classList.contains('hidden')) {
                        closeModal();
                    }
                }
            });
        </script>
    </x-slot>
</x-main-layout>
