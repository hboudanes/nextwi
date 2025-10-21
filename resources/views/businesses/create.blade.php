<x-main-layout>
    <x-slot name="style">
        <style>
            .admin-dropdown {
                max-height: 200px;
                overflow-y: auto;
            }
        </style>
    </x-slot>

    <!-- Main Content -->
    <main class="lg:ml-64 min-h-screen">
        <!-- Top Bar -->
        <div class="bg-white border-b border-gray-200 px-6 py-4 mt-16 lg:mt-0">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Create New Business</h1>
                    <p class="text-sm text-gray-500 mt-1">Add a new business to the system</p>
                </div>
                <a href="{{ route('businesses.index') }}"
                    class="px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    <span>Back to List</span>
                </a>
            </div>
        </div>

        <!-- Form Content -->
        <div class="p-6">
            <form action="{{ route('businesses.store') }}" method="POST"
                class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                @csrf
                <div class="p-6 space-y-6">
                    <!-- Business Information -->
                    <div>
                        <h4 class="text-sm font-semibold text-gray-900 mb-4 flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                </path>
                            </svg>
                            Business Information
                        </h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                    Business Name <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" required
                                    placeholder="Enter business name"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors @error('name') border-red-500 @enderror">
                                @error('name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="tax_id" class="block text-sm font-medium text-gray-700 mb-2">
                                    Tax ID
                                </label>
                                <input type="text" id="tax_id" name="tax_id" value="{{ old('tax_id') }}"
                                    placeholder="Enter tax identification number"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors @error('tax_id') border-red-500 @enderror">
                                @error('tax_id')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Admin Assignment -->
                    <div>
                        <h4 class="text-sm font-semibold text-gray-900 mb-4 flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                            Admin Assignment
                        </h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="relative">
                                <label for="admin-search" class="block text-sm font-medium text-gray-700 mb-2">
                                    Assign Admin <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <input type="text" id="admin-search" name="admin_search" autocomplete="off"
                                        required placeholder="Search admin by name or email..."
                                        oninput="searchAdmin(this.value)" onfocus="searchAdmin(this.value)"
                                        class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                    <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </div>

                                <!-- Hidden input to store selected admin ID -->
                                <input type="hidden" id="admin_id" name="admin_id" value="{{ old('admin_id') }}">

                                <!-- Dropdown Results -->
                                <div id="admin-dropdown"
                                    class="hidden absolute z-10 w-full mt-1 bg-white border border-gray-300 rounded-lg shadow-lg admin-dropdown">
                                    <div id="admin-results" class="py-1">
                                        <!-- Results will be populated here -->
                                    </div>
                                </div>

                                <!-- Selected Admin Display -->
                                <div id="selected-admin"
                                    class="hidden mt-2 p-3 bg-blue-50 border border-blue-200 rounded-lg">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center text-white font-semibold text-sm">
                                                <span id="admin-initials"></span>
                                            </div>
                                            <div>
                                                <div class="text-sm font-medium text-gray-900" id="admin-name"></div>
                                                <div class="text-xs text-gray-500" id="admin-email"></div>
                                            </div>
                                        </div>
                                        <button type="button" onclick="clearAdminSelection()"
                                            class="text-red-600 hover:text-red-800">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                @error('admin_id')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Contact Information -->
                    <div>
                        <h4 class="text-sm font-semibold text-gray-900 mb-4 flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Contact Information
                        </h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="contact_name" class="block text-sm font-medium text-gray-700 mb-2">
                                    Contact Name <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="contact_name" name="contact_name"
                                    value="{{ old('contact_name') }}" required placeholder="Enter contact person name"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors @error('contact_name') border-red-500 @enderror">
                                @error('contact_name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                    Email Address <span class="text-red-500">*</span>
                                </label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}"
                                    required placeholder="email@example.com"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors @error('email') border-red-500 @enderror">
                                @error('email')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                                    Phone Number <span class="text-red-500">*</span>
                                </label>
                                <input type="tel" id="phone" name="phone" value="{{ old('phone') }}"
                                    required placeholder="+1 234 567 8900"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors @error('phone') border-red-500 @enderror">
                                @error('phone')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="credit" class="block text-sm font-medium text-gray-700 mb-2">
                                    Credit Limit
                                </label>
                                <input type="number" id="credit" name="credit" value="{{ old('credit', 0) }}"
                                    min="0" step="1" placeholder="0"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors @error('credit') border-red-500 @enderror">
                                @error('credit')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Credit Policy Configuration -->
                    <div>
                        <h4 class="text-sm font-semibold text-gray-900 mb-4 flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                            Credit Policy Configuration
                        </h4>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label for="whatsapp_verification_point"
                                    class="block text-sm font-medium text-gray-700 mb-2">
                                    WhatsApp Verification Points
                                </label>
                                <input type="number" id="whatsapp_verification_point"
                                    name="whatsapp_verification_point"
                                    value="{{ old('whatsapp_verification_point', 0) }}" min="0"
                                    step="1" placeholder="0"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors @error('whatsapp_verification_point') border-red-500 @enderror">
                                <p class="mt-1 text-xs text-gray-500">Points awarded for WhatsApp verification</p>
                                @error('whatsapp_verification_point')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="email_verification_point"
                                    class="block text-sm font-medium text-gray-700 mb-2">
                                    Email Verification Points
                                </label>
                                <input type="number" id="email_verification_point" name="email_verification_point"
                                    value="{{ old('email_verification_point', 0) }}" min="0" step="1"
                                    placeholder="0"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors @error('email_verification_point') border-red-500 @enderror">
                                <p class="mt-1 text-xs text-gray-500">Points awarded for email verification</p>
                                @error('email_verification_point')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="advance_value" class="block text-sm font-medium text-gray-700 mb-2">
                                    Advance Credit Value
                                </label>
                                <input type="number" id="advance_value" name="advance_value"
                                    value="{{ old('advance_value', 0) }}" min="0" step="1"
                                    placeholder="0"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors @error('advance_value') border-red-500 @enderror">
                                <p class="mt-1 text-xs text-gray-500">Initial advance credit amount</p>
                                @error('advance_value')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Billing Information -->
                    <div>
                        <h4 class="text-sm font-semibold text-gray-900 mb-4 flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            Billing Information
                        </h4>
                        <div class="grid grid-cols-1 gap-4">
                            <div>
                                <label for="billing_address" class="block text-sm font-medium text-gray-700 mb-2">
                                    Billing Address
                                </label>
                                <textarea id="billing_address" name="billing_address" rows="3" placeholder="Enter full billing address"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors @error('billing_address') border-red-500 @enderror">{{ old('billing_address') }}</textarea>
                                @error('billing_address')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div>
                                    <label for="billing_city" class="block text-sm font-medium text-gray-700 mb-2">
                                        City
                                    </label>
                                    <input type="text" id="billing_city" name="billing_city"
                                        value="{{ old('billing_city') }}" placeholder="Enter city"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors @error('billing_city') border-red-500 @enderror">
                                    @error('billing_city')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="billing_country" class="block text-sm font-medium text-gray-700 mb-2">
                                        Country
                                    </label>
                                    <input type="text" id="billing_country" name="billing_country"
                                        value="{{ old('billing_country') }}" placeholder="Enter country"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors @error('billing_country') border-red-500 @enderror">
                                    @error('billing_country')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="billing_postal_code"
                                        class="block text-sm font-medium text-gray-700 mb-2">
                                        Postal Code
                                    </label>
                                    <input type="text" id="billing_postal_code" name="billing_postal_code"
                                        value="{{ old('billing_postal_code') }}" placeholder="Enter postal code"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors @error('billing_postal_code') border-red-500 @enderror">
                                    @error('billing_postal_code')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div>
                                <label for="billing_details" class="block text-sm font-medium text-gray-700 mb-2">
                                    Billing Details
                                </label>
                                <textarea id="billing_details" name="billing_details" rows="3" placeholder="Additional billing information"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors @error('billing_details') border-red-500 @enderror">{{ old('billing_details') }}</textarea>
                                @error('billing_details')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Status Section -->
                    <div>
                        <h4 class="text-sm font-semibold text-gray-900 mb-4 flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Status
                        </h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                                    Business Status
                                </label>
                                <select id="status" name="status"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors @error('status') border-red-500 @enderror">
                                    <option value="1" {{ old('status', 1) == 1 ? 'selected' : '' }}>Active
                                    </option>
                                    <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive
                                    </option>
                                    <option value="2" {{ old('status') == 2 ? 'selected' : '' }}>Pending</option>
                                </select>
                                @error('status')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="flex items-center justify-end gap-3 p-6 border-t border-gray-200 bg-gray-50">
                    <a href="{{ route('businesses.index') }}"
                        class="px-5 py-2.5 text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                        Cancel
                    </a>
                    <button type="submit"
                        class="px-5 py-2.5 text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        <span>Create Business</span>
                    </button>
                </div>
            </form>
        </div>
    </main>

    <x-slot name="script">
        <script>
            // Sample admin data (replace with actual API call)
            const admins = [{
                    id: 1,
                    name: 'John Doe',
                    email: 'john.doe@example.com',
                    role: 'Super Admin'
                },
                {
                    id: 2,
                    name: 'Jane Smith',
                    email: 'jane.smith@example.com',
                    role: 'Admin'
                },
                {
                    id: 3,
                    name: 'Robert Brown',
                    email: 'robert.brown@example.com',
                    role: 'Manager'
                },
                {
                    id: 4,
                    name: 'Emily Wilson',
                    email: 'emily.wilson@example.com',
                    role: 'Admin'
                },
                {
                    id: 5,
                    name: 'Michael Johnson',
                    email: 'michael.j@example.com',
                    role: 'Super Admin'
                }
            ];

            function searchAdmin(query) {
                const dropdown = document.getElementById('admin-dropdown');
                const resultsContainer = document.getElementById('admin-results');

                if (query.length < 2) {
                    dropdown.classList.add('hidden');
                    return;
                }

                // Filter admins based on query
                const filteredAdmins = admins.filter(admin =>
                    admin.name.toLowerCase().includes(query.toLowerCase()) ||
                    admin.email.toLowerCase().includes(query.toLowerCase())
                );

                if (filteredAdmins.length === 0) {
                    resultsContainer.innerHTML = `
                        <div class="px-4 py-3 text-sm text-gray-500">
                            No admins found
                        </div>
                    `;
                } else {
                    resultsContainer.innerHTML = filteredAdmins.map(admin => `
                        <div class="px-4 py-2 hover:bg-gray-100 cursor-pointer transition-colors" onclick="selectAdmin(${admin.id}, '${admin.name}', '${admin.email}', '${admin.role}')">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center text-white font-semibold text-xs">
                                    ${getInitials(admin.name)}
                                </div>
                                <div class="flex-1">
                                    <div class="text-sm font-medium text-gray-900">${admin.name}</div>
                                    <div class="text-xs text-gray-500">${admin.email} • ${admin.role}</div>
                                </div>
                            </div>
                        </div>
                    `).join('');
                }

                dropdown.classList.remove('hidden');
            }

            function selectAdmin(id, name, email, role) {
                // Set hidden input value
                document.getElementById('admin_id').value = id;

                // Update display
                document.getElementById('admin-initials').textContent = getInitials(name);
                document.getElementById('admin-name').textContent = name;
                document.getElementById('admin-email').textContent = `${email} • ${role}`;

                // Show selected admin, hide search and dropdown
                document.getElementById('selected-admin').classList.remove('hidden');
                document.getElementById('admin-search').value = '';
                document.getElementById('admin-dropdown').classList.add('hidden');
            }

            function clearAdminSelection() {
                document.getElementById('admin_id').value = '';
                document.getElementById('selected-admin').classList.add('hidden');
                document.getElementById('admin-search').focus();
            }

            function getInitials(name) {
                return name.split(' ').map(n => n[0]).join('').toUpperCase();
            }

            // Close dropdown when clicking outside
            document.addEventListener('click', function(event) {
                const searchInput = document.getElementById('admin-search');
                const dropdown = document.getElementById('admin-dropdown');

                if (!searchInput.contains(event.target) && !dropdown.contains(event.target)) {
                    dropdown.classList.add('hidden');
                }
            });
        </script>
    </x-slot>
</x-main-layout>
