<x-main-layout>
    <x-slot name="style">
        <style>
            .user-dropdown {
                max-height: 300px;
                overflow-y: auto;
            }

            .selected-users-container {
                display: flex;
                flex-wrap: wrap;
                gap: 0.5rem;
                min-height: 2.5rem;
            }

            .user-tag {
                display: inline-flex;
                align-items: center;
                gap: 0.5rem;
                padding: 0.375rem 0.75rem;
                background-color: #EFF6FF;
                border: 1px solid #BFDBFE;
                border-radius: 0.5rem;
                font-size: 0.875rem;
            }
        </style>
    </x-slot>

    <!-- Main Content -->
    <main class="lg:ml-64 min-h-screen">
        <!-- Top Bar -->
        <x-top-bar title="Create New Business" subtitle="Add a new business to the system" routeName="businesses.index"
            class="bg-gray-600 text-white" buttonName="Back to List">
            <x-slot name="buttonSvg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </x-slot>
        </x-top-bar>

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
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                    Business Email <span class="text-red-500">*</span>
                                </label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                                    placeholder="business@example.com"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors @error('email') border-red-500 @enderror">
                                @error('email')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="country" class="block text-sm font-medium text-gray-700 mb-2">
                                    Country <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="country" name="country" value="{{ old('country') }}"
                                    required placeholder="Enter country"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors @error('country') border-red-500 @enderror">
                                @error('country')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="max_locations" class="block text-sm font-medium text-gray-700 mb-2">
                                    Max Locations <span class="text-red-500">*</span>
                                </label>
                                <input type="number" id="max_locations" name="max_locations"
                                    value="{{ old('max_locations', 1) }}" min="1" step="1" required
                                    placeholder="Enter maximum locations"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors @error('max_locations') border-red-500 @enderror">
                                @error('max_locations')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Billing Details -->
                    <div>
                        <h4 class="text-sm font-semibold text-gray-900 mb-4 flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                            Billing Details
                        </h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="start_date" class="block text-sm font-medium text-gray-700 mb-2">
                                    Start Date <span class="text-red-500">*</span>
                                </label>
                                <input type="date" id="start_date" name="start_date" value="{{ old('start_date') }}"
                                    required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors @error('start_date') border-red-500 @enderror">
                                @error('start_date')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="expiration_date" class="block text-sm font-medium text-gray-700 mb-2">
                                    Expiration Date <span class="text-red-500">*</span>
                                </label>
                                <input type="date" id="expiration_date" name="expiration_date"
                                    value="{{ old('expiration_date') }}" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors @error('expiration_date') border-red-500 @enderror">
                                @error('expiration_date')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="amount" class="block text-sm font-medium text-gray-700 mb-2">
                                    Amount ($) <span class="text-red-500">*</span>
                                </label>
                                <input type="number" id="amount" name="amount" value="{{ old('amount', 0) }}"
                                    min="0" step="0.01" required placeholder="0.00"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors @error('amount') border-red-500 @enderror">
                                @error('amount')
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
                            <div>
                                <label for="billing_address_1" class="block text-sm font-medium text-gray-700 mb-2">
                                    Address Line 1 <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="billing_address_1" name="billing_address_1"
                                    value="{{ old('billing_address_1') }}" required
                                    placeholder="Street address, P.O. box"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors @error('billing_address_1') border-red-500 @enderror">
                                @error('billing_address_1')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="billing_address_2" class="block text-sm font-medium text-gray-700 mb-2">
                                    Address Line 2
                                </label>
                                <input type="text" id="billing_address_2" name="billing_address_2"
                                    value="{{ old('billing_address_2') }}"
                                    placeholder="Apartment, suite, unit, building, floor, etc."
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors @error('billing_address_2') border-red-500 @enderror">
                                @error('billing_address_2')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="billing_city" class="block text-sm font-medium text-gray-700 mb-2">
                                    City <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="billing_city" name="billing_city"
                                    value="{{ old('billing_city') }}" required placeholder="Enter city"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors @error('billing_city') border-red-500 @enderror">
                                @error('billing_city')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="billing_country" class="block text-sm font-medium text-gray-700 mb-2">
                                    Billing Country <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="billing_country" name="billing_country"
                                    value="{{ old('billing_country') }}" required placeholder="Enter country"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors @error('billing_country') border-red-500 @enderror">
                                @error('billing_country')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Primary Contact -->
                    <div>
                        <h4 class="text-sm font-semibold text-gray-900 mb-4 flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Primary Contact
                        </h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="contact_first_name" class="block text-sm font-medium text-gray-700 mb-2">
                                    First Name <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="contact_first_name" name="contact_first_name"
                                    value="{{ old('contact_first_name') }}" required placeholder="Enter first name"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors @error('contact_first_name') border-red-500 @enderror">
                                @error('contact_first_name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="contact_last_name" class="block text-sm font-medium text-gray-700 mb-2">
                                    Last Name <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="contact_last_name" name="contact_last_name"
                                    value="{{ old('contact_last_name') }}" required placeholder="Enter last name"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors @error('contact_last_name') border-red-500 @enderror">
                                @error('contact_last_name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="contact_position" class="block text-sm font-medium text-gray-700 mb-2">
                                    Position <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="contact_position" name="contact_position"
                                    value="{{ old('contact_position') }}" required placeholder="e.g., CEO, Manager"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors @error('contact_position') border-red-500 @enderror">
                                @error('contact_position')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="contact_phone" class="block text-sm font-medium text-gray-700 mb-2">
                                    Phone Number <span class="text-red-500">*</span>
                                </label>
                                <input type="tel" id="contact_phone" name="contact_phone"
                                    value="{{ old('contact_phone') }}" required placeholder="+1 234 567 8900"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors @error('contact_phone') border-red-500 @enderror">
                                @error('contact_phone')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="md:col-span-2">
                                <label for="contact_email" class="block text-sm font-medium text-gray-700 mb-2">
                                    Email Address <span class="text-red-500">*</span>
                                </label>
                                <input type="email" id="contact_email" name="contact_email"
                                    value="{{ old('contact_email') }}" required placeholder="contact@example.com"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors @error('contact_email') border-red-500 @enderror">
                                @error('contact_email')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Package Details -->
                    <div>
                        <h4 class="text-sm font-semibold text-gray-900 mb-4 flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                            Package Details
                        </h4>
                        <div>
                            <label for="package_details" class="block text-sm font-medium text-gray-700 mb-2">
                                Features and Options
                            </label>
                            <textarea id="package_details" name="package_details" rows="6"
                                placeholder="List all package features and options (one per line)&#10;&#10;Example:&#10;✓ Unlimited WiFi Access&#10;✓ 24/7 Support&#10;✓ Advanced Analytics Dashboard&#10;✓ Multi-location Management"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors @error('package_details') border-red-500 @enderror">{{ old('package_details') }}</textarea>
                            <p class="mt-1 text-xs text-gray-500">List all features and options included in this
                                business package</p>
                            @error('package_details')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- User Assignment -->
                    <div>
                        <h4 class="text-sm font-semibold text-gray-900 mb-4 flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                </path>
                            </svg>
                            User Assignment
                        </h4>

                        <!-- Admins Assignment (Required) -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Assign Admins <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <input type="text" id="admin-search" autocomplete="off"
                                    placeholder="Search admin by name or email..."
                                    oninput="searchUsers(this.value, 'admin')"
                                    onfocus="searchUsers(this.value, 'admin')"
                                    class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>

                            <!-- Dropdown Results -->
                            <div id="admin-dropdown"
                                class="hidden absolute z-10 w-full mt-1 bg-white border border-gray-300 rounded-lg shadow-lg user-dropdown">
                                <div id="admin-results" class="py-1"></div>
                            </div>

                            <!-- Selected Admins -->
                            <div id="selected-admins"
                                class="selected-users-container mt-2 p-3 border border-gray-200 rounded-lg min-h-[3rem]">
                                <p class="text-sm text-gray-500" id="admin-placeholder">No admins selected</p>
                            </div>
                            @error('admin_ids')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Operators Assignment (0 or many) -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Assign Operators
                                <span class="text-gray-500 font-normal">(Optional - 0 or more)</span>
                            </label>
                            <div class="relative">
                                <input type="text" id="operator-search" autocomplete="off"
                                    placeholder="Search operator by name or email..."
                                    oninput="searchUsers(this.value, 'operator')"
                                    onfocus="searchUsers(this.value, 'operator')"
                                    class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>

                            <div id="operator-dropdown"
                                class="hidden absolute z-10 w-full mt-1 bg-white border border-gray-300 rounded-lg shadow-lg user-dropdown">
                                <div id="operator-results" class="py-1"></div>
                            </div>

                            <div id="selected-operators"
                                class="selected-users-container mt-2 p-3 border border-gray-200 rounded-lg min-h-[3rem]">
                                <p class="text-sm text-gray-500" id="operator-placeholder">No operators selected</p>
                            </div>
                            @error('operator_ids')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Management Assignment (0 or many) -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Assign Management
                                <span class="text-gray-500 font-normal">(Optional - 0 or more)</span>
                            </label>
                            <div class="relative">
                                <input type="text" id="management-search" autocomplete="off"
                                    placeholder="Search management by name or email..."
                                    oninput="searchUsers(this.value, 'management')"
                                    onfocus="searchUsers(this.value, 'management')"
                                    class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>

                            <div id="management-dropdown"
                                class="hidden absolute z-10 w-full mt-1 bg-white border border-gray-300 rounded-lg shadow-lg user-dropdown">
                                <div id="management-results" class="py-1"></div>
                            </div>

                            <div id="selected-management"
                                class="selected-users-container mt-2 p-3 border border-gray-200 rounded-lg min-h-[3rem]">
                                <p class="text-sm text-gray-500" id="management-placeholder">No management selected
                                </p>
                            </div>
                            @error('management_ids')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
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
                                    OpenAI credit
                                </label>
                                <input type="number" id="advance_value" name="advance_value"
                                    value="{{ old('advance_value', 0) }}" min="0" step="1"
                                    placeholder="0"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors @error('advance_value') border-red-500 @enderror">
                                <p class="mt-1 text-xs text-gray-500">Initial OpenAI credit</p>
                                @error('advance_value')
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
            // Sample users data (replace with actual API call or pass from controller)
            const allUsers = {
                admin: [{
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
                        name: 'Michael Johnson',
                        email: 'michael.j@example.com',
                        role: 'Admin'
                    }
                ],
                operator: [{
                        id: 4,
                        name: 'Robert Brown',
                        email: 'robert.brown@example.com',
                        role: 'Operator'
                    },
                    {
                        id: 5,
                        name: 'Emily Wilson',
                        email: 'emily.wilson@example.com',
                        role: 'Operator'
                    },
                    {
                        id: 6,
                        name: 'David Lee',
                        email: 'david.lee@example.com',
                        role: 'Senior Operator'
                    }
                ],
                management: [{
                        id: 7,
                        name: 'Sarah Connor',
                        email: 'sarah.connor@example.com',
                        role: 'Manager'
                    },
                    {
                        id: 8,
                        name: 'Tom Hardy',
                        email: 'tom.hardy@example.com',
                        role: 'Department Head'
                    },
                    {
                        id: 9,
                        name: 'Lisa Anderson',
                        email: 'lisa.anderson@example.com',
                        role: 'Team Lead'
                    }
                ]
            };

            // Store selected users by role
            const selectedUsers = {
                admin: [],
                operator: [],
                management: []
            };

            function searchUsers(query, role) {
                const dropdown = document.getElementById(`${role}-dropdown`);
                const resultsContainer = document.getElementById(`${role}-results`);

                if (query.length < 2) {
                    dropdown.classList.add('hidden');
                    return;
                }

                // Filter users based on query, excluding already selected ones
                const selectedIds = selectedUsers[role].map(u => u.id);
                const filteredUsers = allUsers[role].filter(user =>
                    !selectedIds.includes(user.id) &&
                    (user.name.toLowerCase().includes(query.toLowerCase()) ||
                        user.email.toLowerCase().includes(query.toLowerCase()))
                );

                if (filteredUsers.length === 0) {
                    resultsContainer.innerHTML = `
                        <div class="px-4 py-3 text-sm text-gray-500">
                            No ${role}s found
                        </div>
                    `;
                } else {
                    resultsContainer.innerHTML = filteredUsers.map(user => `
                        <div class="px-4 py-2 hover:bg-gray-100 cursor-pointer transition-colors" 
                            onclick="selectUser(${user.id}, '${user.name}', '${user.email}', '${user.role}', '${role}')">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center text-white font-semibold text-xs">
                                    ${getInitials(user.name)}
                                </div>
                                <div class="flex-1">
                                    <div class="text-sm font-medium text-gray-900">${user.name}</div>
                                    <div class="text-xs text-gray-500">${user.email} • ${user.role}</div>
                                </div>
                            </div>
                        </div>
                    `).join('');
                }

                dropdown.classList.remove('hidden');
            }

            function selectUser(id, name, email, userRole, role) {
                // Add to selected users
                selectedUsers[role].push({
                    id,
                    name,
                    email,
                    role: userRole
                });

                // Update display
                updateSelectedDisplay(role);

                // Clear search and hide dropdown
                document.getElementById(`${role}-search`).value = '';
                document.getElementById(`${role}-dropdown`).classList.add('hidden');
            }

            function removeUser(id, role) {
                // Remove from selected users
                selectedUsers[role] = selectedUsers[role].filter(user => user.id !== id);

                // Update display
                updateSelectedDisplay(role);
            }

            function updateSelectedDisplay(role) {
                const container = document.getElementById(`selected-${role}s`);
                const placeholder = document.getElementById(`${role}-placeholder`);

                // Remove existing hidden inputs
                document.querySelectorAll(`input[name="${role}_ids[]"]`).forEach(input => input.remove());

                if (selectedUsers[role].length === 0) {
                    placeholder.classList.remove('hidden');
                    container.querySelectorAll('.user-tag').forEach(tag => tag.remove());
                } else {
                    placeholder.classList.add('hidden');

                    // Clear existing tags
                    container.querySelectorAll('.user-tag').forEach(tag => tag.remove());

                    // Add new tags and hidden inputs
                    selectedUsers[role].forEach(user => {
                        // Create tag
                        const tag = document.createElement('div');
                        tag.className = 'user-tag';
                        tag.innerHTML = `
                            <div class="flex items-center gap-2">
                                <div class="w-6 h-6 bg-blue-600 rounded-full flex items-center justify-center text-white font-semibold text-xs">
                                    ${getInitials(user.name)}
                                </div>
                                <div>
                                    <div class="text-xs font-medium text-gray-900">${user.name}</div>
                                    <div class="text-xs text-gray-500">${user.role}</div>
                                </div>
                            </div>
                            <button type="button" onclick="removeUser(${user.id}, '${role}')" 
                                class="text-red-600 hover:text-red-800">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        `;
                        container.appendChild(tag);

                        // Create hidden input for form submission
                        const input = document.createElement('input');
                        input.type = 'hidden';
                        input.name = `${role}_ids[]`;
                        input.value = user.id;
                        container.appendChild(input);
                    });
                }
            }

            function getInitials(name) {
                return name.split(' ').map(n => n[0]).join('').toUpperCase();
            }

            // Close dropdowns when clicking outside
            document.addEventListener('click', function(event) {
                ['admin', 'operator', 'management'].forEach(role => {
                    const searchInput = document.getElementById(`${role}-search`);
                    const dropdown = document.getElementById(`${role}-dropdown`);

                    if (searchInput && dropdown &&
                        !searchInput.contains(event.target) &&
                        !dropdown.contains(event.target)) {
                        dropdown.classList.add('hidden');
                    }
                });
            });
        </script>
    </x-slot>
</x-main-layout>
