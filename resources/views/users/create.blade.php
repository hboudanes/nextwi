<x-main-layout>
    <x-slot name="style">
        <style>
            /* Add any custom styles here if needed */
        </style>
    </x-slot>

    <!-- Main Content -->
    <main class="lg:ml-64 min-h-screen">
        <x-top-bar title="Create New User" subtitle="Add a new user to the system" routeName="users"
            class="bg-gray-600 text-white" buttonName="Back to List">
            <x-slot name="buttonSvg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </x-slot>
        </x-top-bar>



        <!-- Form Content -->
        <div class="p-6">
            <form action="" method="POST"
                class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                @csrf
                <div class="p-6 space-y-6">
                    <!-- Personal Information -->
                    <div>
                        <h4 class="text-sm font-semibold text-gray-900 mb-4 flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Personal Information
                        </h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="first-name" class="block text-sm font-medium text-gray-700 mb-2">
                                    First Name <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="first-name" name="first_name" value="{{ old('first_name') }}"
                                    required placeholder="Enter first name"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors @error('first_name') border-red-500 @enderror">
                                @error('first_name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="last-name" class="block text-sm font-medium text-gray-700 mb-2">
                                    Last Name <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="last-name" name="last_name" value="{{ old('last_name') }}"
                                    required placeholder="Enter last name"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors @error('last_name') border-red-500 @enderror">
                                @error('last_name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Account Information -->
                    <div>
                        <h4 class="text-sm font-semibold text-gray-900 mb-4 flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                            Account Information
                        </h4>
                        <div class="grid grid-cols-1 gap-4">
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                    Email Address <span class="text-red-500">*</span>
                                </label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                                    placeholder="user@example.com"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors @error('email') border-red-500 @enderror">
                                @error('email')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                                    Phone Number
                                </label>
                                <input type="tel" id="phone" name="phone" value="{{ old('phone') }}"
                                    placeholder="+1 234 567 8900"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors @error('phone') border-red-500 @enderror">
                                @error('phone')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                                        Password <span class="text-red-500">*</span>
                                    </label>
                                    <input type="password" id="password" name="password" required
                                        placeholder="••••••••"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors @error('password') border-red-500 @enderror">
                                    @error('password')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="password-confirm" class="block text-sm font-medium text-gray-700 mb-2">
                                        Confirm Password <span class="text-red-500">*</span>
                                    </label>
                                    <input type="password" id="password-confirm" name="password_confirmation" required
                                        placeholder="••••••••"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Role & Status -->
                    <div>
                        <h4 class="text-sm font-semibold text-gray-900 mb-4 flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                </path>
                            </svg>
                            Role & Permissions
                        </h4>
                        <div class="grid grid-cols-1 gap-4">
                            <div>
                                <label for="role" class="block text-sm font-medium text-gray-700 mb-2">
                                    User Role <span class="text-red-500">*</span>
                                </label>
                                <select id="role" name="role" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors @error('role') border-red-500 @enderror">
                                    <option value="">Select a role</option>
                                    <option value="super_admin" {{ old('role') == 'super_admin' ? 'selected' : '' }}>
                                        Super Admin</option>
                                    <option value="support_agent"
                                        {{ old('role') == 'support_agent' ? 'selected' : '' }}>Support Agent
                                    </option>
                                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin
                                    </option>
                                    <option value="manager" {{ old('role') == 'manager' ? 'selected' : '' }}>
                                        Manager</option>
                                    <option value="operator" {{ old('role') == 'operator' ? 'selected' : '' }}>
                                        Operator</option>
                                </select>
                                @error('role')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- Account Status moved to bottom -->
                        </div>
                    </div>

                    <!-- Config Section -->
                    <div id="config-section" class="{{ old('role') === 'admin' ? '' : 'hidden' }}">
                        <h4 class="text-sm font-semibold text-gray-900 mb-4 flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            Config
                        </h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="number-of-businesses"
                                    class="block text-sm font-medium text-gray-700 mb-2">
                                    Number of Businesses <span class="text-red-500">*</span>
                                </label>
                                <input type="number" id="number-of-businesses" name="number_of_businesses"
                                    value="{{ old('number_of_businesses', 0) }}" min="0" step="1"
                                    required placeholder="0"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors appearance-none @error('number_of_businesses') border-red-500 @enderror">
                                <p class="mt-1 text-xs text-gray-500">Enter the number of businesses assigned to
                                    this
                                    user</p>
                                @error('number_of_businesses')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Account Status -->
                <div class="p-6 border-t border-gray-200">
                    <h4 class="text-sm font-semibold text-gray-900 mb-2">Account Status</h4>
                    <div class="flex items-center gap-4 mt-2">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="status" value="active"
                                {{ old('status', 'active') == 'active' ? 'checked' : '' }}
                                class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500">
                            <span class="text-sm text-gray-700">Active</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="status" value="inactive"
                                {{ old('status') == 'inactive' ? 'checked' : '' }}
                                class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500">
                            <span class="text-sm text-gray-700">Inactive</span>
                        </label>
                    </div>
                    @error('status')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Form Actions -->
                <div class="flex items-center justify-end gap-3 p-6 border-t border-gray-200 bg-gray-50">
                    <a href="{{ route('users') }}"
                        class="px-5 py-2.5 text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                        Cancel
                    </a>
                    <button type="submit"
                        class="px-5 py-2.5 text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        <span>Create User</span>
                    </button>
                </div>
            </form>
        </div>
    </main>

    <x-slot name="script">
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const roleSelect = document.getElementById('role');
                const configSection = document.getElementById('config-section');
                const toggleConfigVisibility = () => {
                    if (!roleSelect || !configSection) return;
                    const isAdmin = roleSelect.value === 'admin';
                    configSection.classList.toggle('hidden', !isAdmin);
                };
                toggleConfigVisibility();
                roleSelect?.addEventListener('change', toggleConfigVisibility);
            });
        </script>
    </x-slot>
</x-main-layout>
