<x-main-layout>
    <x-slot name="style">
        <style>
            .dropdown-results {
                max-height: 250px;
                overflow-y: auto;
            }

            .profile-card {
                transition: all 0.3s ease;
            }

            .config-option {
                transition: all 0.3s ease;
            }

            .config-option.selected {
                border-color: #3B82F6;
                background-color: #EFF6FF;
            }
        </style>
    </x-slot>

    <!-- Main Content -->
    <main class="lg:ml-64 min-h-screen">
        <!-- Top Bar -->
        <div class="bg-white border-b border-gray-200 px-6 py-4 mt-16 lg:mt-0">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Create New Location</h1>
                    <p class="text-sm text-gray-500 mt-1">Add a new location to your business</p>
                </div>
                <a href="{{ route('locations.index') }}"
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
            <form action="{{ route('locations.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Basic Information Card -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                    <div class="p-6 space-y-6">
                        <h4 class="text-sm font-semibold text-gray-900 mb-4 flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Basic Information
                        </h4>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Location Name -->
                            <div>
                                <label for="location-name" class="block text-sm font-medium text-gray-700 mb-2">
                                    Location Name <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="location-name" name="location_name" required
                                    placeholder="Enter location name"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                            </div>

                            <!-- Zone ID with Generate Button -->
                            <div>
                                <label for="zone-id" class="block text-sm font-medium text-gray-700 mb-2">
                                    Zone ID <span class="text-red-500">*</span>
                                </label>
                                <div class="flex gap-2">
                                    <input type="text" id="zone-id" name="zone_id" required readonly
                                        placeholder="Click generate button"
                                        class="flex-1 px-4 py-2 border border-gray-300 rounded-lg bg-gray-50 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                    <button type="button" onclick="generateZoneId()"
                                        class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                                            </path>
                                        </svg>
                                        Generate
                                    </button>
                                </div>
                            </div>

                            <!-- Credit -->
                            <div>
                                <label for="credit" class="block text-sm font-medium text-gray-700 mb-2">
                                    Credit
                                </label>
                                <input type="number" id="credit" name="credit" min="0" step="1"
                                    value="0" placeholder="0"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Relationships & Assignments Card -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                    <div class="p-6 space-y-6">
                        <h4 class="text-sm font-semibold text-gray-900 mb-4 flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1">
                                </path>
                            </svg>
                            Relationships & Assignments
                        </h4>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Business Search (Required) -->
                            <div class="relative">
                                <label for="business-search" class="block text-sm font-medium text-gray-700 mb-2">
                                    Business <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <input type="text" id="business-search" autocomplete="off" required
                                        placeholder="Search business..." oninput="searchBusiness(this.value)"
                                        onfocus="searchBusiness(this.value)"
                                        class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                    <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </div>
                                <input type="hidden" id="business_id" name="business_id" required>

                                <div id="business-dropdown"
                                    class="hidden absolute z-10 w-full mt-1 bg-white border border-gray-300 rounded-lg shadow-lg dropdown-results">
                                    <div id="business-results"></div>
                                </div>

                                <div id="selected-business"
                                    class="hidden mt-2 p-3 bg-blue-50 border border-blue-200 rounded-lg">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                                <svg class="w-5 h-5 text-blue-600" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                                    </path>
                                                </svg>
                                            </div>
                                            <div>
                                                <div class="text-sm font-medium text-gray-900" id="business-name">
                                                </div>
                                                <div class="text-xs text-gray-500" id="business-tax"></div>
                                            </div>
                                        </div>
                                        <button type="button" onclick="clearSelection('business')"
                                            class="text-red-600 hover:text-red-800">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Operator Search (0 or 1) -->
                            <div class="relative">
                                <label for="operator-search" class="block text-sm font-medium text-gray-700 mb-2">
                                    Operator (User)
                                </label>
                                <div class="relative">
                                    <input type="text" id="operator-search" autocomplete="off"
                                        placeholder="Search operator (optional)..."
                                        oninput="searchOperator(this.value)" onfocus="searchOperator(this.value)"
                                        class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                    <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </div>
                                <input type="hidden" id="operator_id" name="operator_id">

                                <div id="operator-dropdown"
                                    class="hidden absolute z-10 w-full mt-1 bg-white border border-gray-300 rounded-lg shadow-lg dropdown-results">
                                    <div id="operator-results"></div>
                                </div>

                                <div id="selected-operator"
                                    class="hidden mt-2 p-3 bg-green-50 border border-green-200 rounded-lg">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-8 h-8 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-semibold text-xs">
                                                <span id="operator-initials"></span>
                                            </div>
                                            <div>
                                                <div class="text-sm font-medium text-gray-900" id="operator-name">
                                                </div>
                                                <div class="text-xs text-gray-500" id="operator-email"></div>
                                            </div>
                                        </div>
                                        <button type="button" onclick="clearSelection('operator')"
                                            class="text-red-600 hover:text-red-800">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Manager Search (0 or 1) -->
                            <div class="relative">
                                <label for="manager-search" class="block text-sm font-medium text-gray-700 mb-2">
                                    Manager (User)
                                </label>
                                <div class="relative">
                                    <input type="text" id="manager-search" autocomplete="off"
                                        placeholder="Search manager (optional)..." oninput="searchManager(this.value)"
                                        onfocus="searchManager(this.value)"
                                        class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                    <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </div>
                                <input type="hidden" id="manager_id" name="manager_id">

                                <div id="manager-dropdown"
                                    class="hidden absolute z-10 w-full mt-1 bg-white border border-gray-300 rounded-lg shadow-lg dropdown-results">
                                    <div id="manager-results"></div>
                                </div>

                                <div id="selected-manager"
                                    class="hidden mt-2 p-3 bg-orange-50 border border-orange-200 rounded-lg">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-8 h-8 bg-gradient-to-br from-orange-500 to-red-600 rounded-full flex items-center justify-center text-white font-semibold text-xs">
                                                <span id="manager-initials"></span>
                                            </div>
                                            <div>
                                                <div class="text-sm font-medium text-gray-900" id="manager-name">
                                                </div>
                                                <div class="text-xs text-gray-500" id="manager-email"></div>
                                            </div>
                                        </div>
                                        <button type="button" onclick="clearSelection('manager')"
                                            class="text-red-600 hover:text-red-800">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Promotion Search (Optional) -->
                            <div class="relative">
                                <label for="promotion-search" class="block text-sm font-medium text-gray-700 mb-2">
                                    Promotion (Optional)
                                </label>
                                <div class="relative">
                                    <input type="text" id="promotion-search" autocomplete="off"
                                        placeholder="Search promotion (optional)..."
                                        oninput="searchPromotion(this.value)" onfocus="searchPromotion(this.value)"
                                        class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                    <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </div>
                                <input type="hidden" id="promotion_id" name="promotion_id">

                                <div id="promotion-dropdown"
                                    class="hidden absolute z-10 w-full mt-1 bg-white border border-gray-300 rounded-lg shadow-lg dropdown-results">
                                    <div id="promotion-results"></div>
                                </div>

                                <div id="selected-promotion"
                                    class="hidden mt-2 p-3 bg-purple-50 border border-purple-200 rounded-lg">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-3">
                                            <img id="promotion-image" src="" alt=""
                                                class="w-12 h-12 rounded-lg object-cover border-2 border-purple-300">
                                            <div>
                                                <div class="text-sm font-medium text-gray-900" id="promotion-title">
                                                </div>
                                                <div class="text-xs text-gray-500" id="promotion-subtitle"></div>
                                            </div>
                                        </div>
                                        <button type="button" onclick="clearSelection('promotion')"
                                            class="text-red-600 hover:text-red-800">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Brand Configuration Card -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                    <div class="p-6 space-y-6">
                        <h4 class="text-sm font-semibold text-gray-900 mb-4 flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01">
                                </path>
                            </svg>
                            Brand Configuration
                        </h4>

                        <!-- Brand Info -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="brand-title" class="block text-sm font-medium text-gray-700 mb-2">
                                    Brand Title
                                </label>
                                <input type="text" id="brand-title" name="brand_title"
                                    placeholder="Enter brand title"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                            </div>

                            <div>
                                <label for="brand-subtitle" class="block text-sm font-medium text-gray-700 mb-2">
                                    Brand Subtitle
                                </label>
                                <input type="text" id="brand-subtitle" name="brand_subtitle"
                                    placeholder="Enter brand subtitle"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                            </div>
                        </div>

                        <!-- Images/Assets -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label for="logo-url" class="block text-sm font-medium text-gray-700 mb-2">
                                    Logo URL
                                </label>
                                <input type="url" id="logo-url" name="logo_url"
                                    placeholder="https://example.com/logo.png"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                            </div>

                            <div>
                                <label for="background-image-url"
                                    class="block text-sm font-medium text-gray-700 mb-2">
                                    Background Image URL
                                </label>
                                <input type="url" id="background-image-url" name="background_image_url"
                                    placeholder="https://example.com/bg.jpg"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                            </div>

                            <div>
                                <label for="favicon-url" class="block text-sm font-medium text-gray-700 mb-2">
                                    Favicon URL
                                </label>
                                <input type="url" id="favicon-url" name="favicon_url"
                                    placeholder="https://example.com/favicon.ico"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                            </div>
                        </div>

                        <!-- Color Scheme -->
                        <div class="border-t border-gray-200 pt-4">
                            <h5 class="text-sm font-semibold text-gray-700 mb-4">Color Scheme</h5>
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                <div>
                                    <label for="primary-color" class="block text-sm font-medium text-gray-700 mb-2">
                                        Primary Color
                                    </label>
                                    <div class="flex gap-2">
                                        <input type="color" id="primary-color" name="primary_color"
                                            value="#3B82F6"
                                            class="w-12 h-10 border border-gray-300 rounded cursor-pointer">
                                        <input type="text" value="#3B82F6" id="primary-color-text" maxlength="7"
                                            class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                            oninput="syncColor(this, 'primary-color')">
                                    </div>
                                </div>

                                <div>
                                    <label for="secondary-color" class="block text-sm font-medium text-gray-700 mb-2">
                                        Secondary Color
                                    </label>
                                    <div class="flex gap-2">
                                        <input type="color" id="secondary-color" name="secondary_color"
                                            value="#8B5CF6"
                                            class="w-12 h-10 border border-gray-300 rounded cursor-pointer">
                                        <input type="text" value="#8B5CF6" id="secondary-color-text"
                                            maxlength="7"
                                            class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                            oninput="syncColor(this, 'secondary-color')">
                                    </div>
                                </div>

                                <div>
                                    <label for="header-bg-color" class="block text-sm font-medium text-gray-700 mb-2">
                                        Header Background
                                    </label>
                                    <div class="flex gap-2">
                                        <input type="color" id="header-bg-color" name="header_background_color"
                                            value="#1F2937"
                                            class="w-12 h-10 border border-gray-300 rounded cursor-pointer">
                                        <input type="text" value="#1F2937" id="header-bg-color-text"
                                            maxlength="7"
                                            class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                            oninput="syncColor(this, 'header-bg-color')">
                                    </div>
                                </div>

                                <div>
                                    <label for="header-text-color"
                                        class="block text-sm font-medium text-gray-700 mb-2">
                                        Header Text
                                    </label>
                                    <div class="flex gap-2">
                                        <input type="color" id="header-text-color" name="header_text_color"
                                            value="#FFFFFF"
                                            class="w-12 h-10 border border-gray-300 rounded cursor-pointer">
                                        <input type="text" value="#FFFFFF" id="header-text-color-text"
                                            maxlength="7"
                                            class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                            oninput="syncColor(this, 'header-text-color')">
                                    </div>
                                </div>

                                <div>
                                    <label for="footer-bg-color" class="block text-sm font-medium text-gray-700 mb-2">
                                        Footer Background
                                    </label>
                                    <div class="flex gap-2">
                                        <input type="color" id="footer-bg-color" name="footer_background_color"
                                            value="#111827"
                                            class="w-12 h-10 border border-gray-300 rounded cursor-pointer">
                                        <input type="text" value="#111827" id="footer-bg-color-text"
                                            maxlength="7"
                                            class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                            oninput="syncColor(this, 'footer-bg-color')">
                                    </div>
                                </div>

                                <div>
                                    <label for="footer-text-color"
                                        class="block text-sm font-medium text-gray-700 mb-2">
                                        Footer Text
                                    </label>
                                    <div class="flex gap-2">
                                        <input type="color" id="footer-text-color" name="footer_text_color"
                                            value="#9CA3AF"
                                            class="w-12 h-10 border border-gray-300 rounded cursor-pointer">
                                        <input type="text" value="#9CA3AF" id="footer-text-color-text"
                                            maxlength="7"
                                            class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                            oninput="syncColor(this, 'footer-text-color')">
                                    </div>
                                </div>

                                <div>
                                    <label for="button-color" class="block text-sm font-medium text-gray-700 mb-2">
                                        Button Color
                                    </label>
                                    <div class="flex gap-2">
                                        <input type="color" id="button-color" name="button_color" value="#10B981"
                                            class="w-12 h-10 border border-gray-300 rounded cursor-pointer">
                                        <input type="text" value="#10B981" id="button-color-text" maxlength="7"
                                            class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                            oninput="syncColor(this, 'button-color')">
                                    </div>
                                </div>

                                <div>
                                    <label for="button-text-color"
                                        class="block text-sm font-medium text-gray-700 mb-2">
                                        Button Text
                                    </label>
                                    <div class="flex gap-2">
                                        <input type="color" id="button-text-color" name="button_text_color"
                                            value="#FFFFFF"
                                            class="w-12 h-10 border border-gray-300 rounded cursor-pointer">
                                        <input type="text" value="#FFFFFF" id="button-text-color-text"
                                            maxlength="7"
                                            class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                            oninput="syncColor(this, 'button-text-color')">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Typography -->
                        <div class="border-t border-gray-200 pt-4">
                            <h5 class="text-sm font-semibold text-gray-700 mb-4">Typography</h5>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="primary-font" class="block text-sm font-medium text-gray-700 mb-2">
                                        Primary Font
                                    </label>
                                    <select id="primary-font" name="primary_font"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                        <option value="Inter">Inter</option>
                                        <option value="Roboto">Roboto</option>
                                        <option value="Open Sans">Open Sans</option>
                                        <option value="Lato">Lato</option>
                                        <option value="Montserrat">Montserrat</option>
                                        <option value="Poppins">Poppins</option>
                                    </select>
                                </div>

                                <div>
                                    <label for="secondary-font" class="block text-sm font-medium text-gray-700 mb-2">
                                        Secondary Font
                                    </label>
                                    <select id="secondary-font" name="secondary_font"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                        <option value="Georgia">Georgia</option>
                                        <option value="Merriweather">Merriweather</option>
                                        <option value="Playfair Display">Playfair Display</option>
                                        <option value="Lora">Lora</option>
                                        <option value="Source Serif Pro">Source Serif Pro</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Welcome Message -->
                        <div>
                            <label for="welcome-message" class="block text-sm font-medium text-gray-700 mb-2">
                                Welcome Message
                            </label>
                            <textarea id="welcome-message" name="welcome_message" rows="3" placeholder="Enter welcome message for users"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"></textarea>
                        </div>

                        <!-- Custom CSS -->
                        <div>
                            <label for="custom-css" class="block text-sm font-medium text-gray-700 mb-2">
                                Custom CSS
                            </label>
                            <textarea id="custom-css" name="custom_css" rows="5" placeholder="/* Add your custom CSS here */"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors font-mono text-sm"></textarea>
                        </div>
                    </div>
                </div>

                <!-- Plans Card -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                    <div class="p-6 space-y-6">
                        <div class="flex items-center justify-between">
                            <h4 class="text-sm font-semibold text-gray-900 flex items-center gap-2">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                    </path>
                                </svg>
                                Internet Plans
                            </h4>
                            <button type="button" onclick="addPlan()"
                                class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                <span>Add Plan</span>
                            </button>
                        </div>

                        <p class="text-sm text-gray-500">Add one or more internet plans for this location</p>

                        <!-- Plans List -->
                        <div id="plans-list" class="space-y-4"></div>
                    </div>
                </div>

                <!-- Location Configuration Card -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                    <div class="p-6 space-y-6">
                        <h4 class="text-sm font-semibold text-gray-900 mb-4 flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            Location Configuration
                        </h4>

                        <p class="text-sm text-gray-500">Select one configuration type (mutually exclusive)</p>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <!-- Open Internet -->
                            <div class="config-option border-2 border-gray-200 rounded-lg p-4 cursor-pointer hover:border-blue-300 transition-all"
                                onclick="selectConfig('open_internet')">
                                <input type="radio" id="config-open" name="location_config" value="open_internet"
                                    class="hidden">
                                <div class="flex flex-col items-center text-center">
                                    <div
                                        class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mb-3">
                                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9">
                                            </path>
                                        </svg>
                                    </div>
                                    <h5 class="font-semibold text-gray-900 mb-1">Open Internet</h5>
                                    <p class="text-xs text-gray-500">Free access for all users</p>
                                </div>
                            </div>

                            <!-- Voucher Based -->
                            <div class="config-option border-2 border-gray-200 rounded-lg p-4 cursor-pointer hover:border-blue-300 transition-all"
                                onclick="selectConfig('voucher_based')">
                                <input type="radio" id="config-voucher" name="location_config"
                                    value="voucher_based" class="hidden">
                                <div class="flex flex-col items-center text-center">
                                    <div
                                        class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mb-3">
                                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z">
                                            </path>
                                        </svg>
                                    </div>
                                    <h5 class="font-semibold text-gray-900 mb-1">Voucher Based</h5>
                                    <p class="text-xs text-gray-500">Requires voucher code</p>
                                </div>
                            </div>

                            <!-- Dynamic Profile -->
                            <div class="config-option border-2 border-gray-200 rounded-lg p-4 cursor-pointer hover:border-blue-300 transition-all"
                                onclick="selectConfig('dynamic_profile')">
                                <input type="radio" id="config-dynamic" name="location_config"
                                    value="dynamic_profile" class="hidden">
                                <div class="flex flex-col items-center text-center">
                                    <div
                                        class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mb-3">
                                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                            </path>
                                        </svg>
                                    </div>
                                    <h5 class="font-semibold text-gray-900 mb-1">Dynamic Profile</h5>
                                    <p class="text-xs text-gray-500">Multiple access profiles</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Open Internet Configuration -->
                <div id="open-internet-config" class="hidden space-y-6">
                    <!-- Controller Settings -->
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                        <div class="p-6 space-y-6">
                            <h4 class="text-sm font-semibold text-gray-900 mb-4 flex items-center gap-2">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01">
                                    </path>
                                </svg>
                                Controller Settings
                            </h4>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="flex items-center">
                                    <input type="checkbox" id="open-gw-username" name="open_gw_username"
                                        value="1"
                                        class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                    <label for="open-gw-username" class="ml-2 text-sm text-gray-700">
                                        Require Gateway Username
                                    </label>
                                </div>

                                <div class="flex items-center">
                                    <input type="checkbox" id="open-gw-password" name="open_gw_password"
                                        value="1"
                                        class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                    <label for="open-gw-password" class="ml-2 text-sm text-gray-700">
                                        Require Gateway Password
                                    </label>
                                </div>

                                <div class="flex items-center">
                                    <input type="checkbox" id="open-gw-type" name="open_gw_type" value="1"
                                        class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                    <label for="open-gw-type" class="ml-2 text-sm text-gray-700">
                                        Gateway Type Required
                                    </label>
                                </div>

                                <div class="md:col-span-2">
                                    <label for="open-gw-post-url"
                                        class="block text-sm font-medium text-gray-700 mb-2">
                                        Gateway Post URL
                                    </label>
                                    <input type="url" id="open-gw-post-url" name="open_gw_post_url"
                                        placeholder="https://gateway.example.com/post"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Form Fields for Open Internet -->
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                        <div class="p-6 space-y-6">
                            <h4 class="text-sm font-semibold text-gray-900 mb-4 flex items-center gap-2">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                                Form Fields
                            </h4>

                            <div id="open-form-fields"></div>
                        </div>
                    </div>
                </div>

                <!-- Voucher Based Configuration -->
                <div id="voucher-based-config" class="hidden space-y-6">
                    <!-- Form Fields for Voucher -->
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                        <div class="p-6 space-y-6">
                            <h4 class="text-sm font-semibold text-gray-900 mb-4 flex items-center gap-2">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                                Form Fields & Settings
                            </h4>

                            <div id="voucher-form-fields"></div>
                        </div>
                    </div>
                </div>

                <!-- Dynamic Profile Configuration -->
                <div id="dynamic-profile-config" class="hidden space-y-6">
                    <!-- Add Profile Button -->
                    <div class="flex justify-end">
                        <button type="button" onclick="addProfile()"
                            class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            <span>Add Profile</span>
                        </button>
                    </div>

                    <!-- Profiles List -->
                    <div id="profiles-list"></div>
                </div>

                <!-- Status Card -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                    <div class="p-6">
                        <h4 class="text-sm font-semibold text-gray-900 mb-4 flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Status
                        </h4>

                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                                Location Status
                            </label>
                            <select id="status" name="status"
                                class="w-full md:w-1/2 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                <option value="1" selected>Active</option>
                                <option value="0">Inactive</option>
                                <option value="2">Maintenance</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div
                    class="flex items-center justify-end gap-3 bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                    <a href="{{ route('locations.index') }}"
                        class="px-5 py-2.5 text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                        Cancel
                    </a>
                    <button type="submit"
                        class="px-5 py-2.5 text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        <span>Create Location</span>
                    </button>
                </div>
            </form>
        </div>
    </main>

    <x-slot name="script">
        <script>
            // Sample data
            const businesses = [{
                    id: 1,
                    name: 'Acme Corporation',
                    tax_id: '123-456-789'
                },
                {
                    id: 2,
                    name: 'Tech Innovations Ltd',
                    tax_id: '987-654-321'
                },
                {
                    id: 3,
                    name: 'Global Services Inc',
                    tax_id: '456-789-123'
                }
            ];

            const operators = [{
                    id: 1,
                    name: 'John Doe',
                    email: 'john.doe@example.com',
                    role: 'Operator'
                },
                {
                    id: 2,
                    name: 'Jane Smith',
                    email: 'jane.smith@example.com',
                    role: 'Operator'
                },
                {
                    id: 3,
                    name: 'Robert Brown',
                    email: 'robert.brown@example.com',
                    role: 'Operator'
                }
            ];

            const managers = [{
                    id: 4,
                    name: 'Emily Wilson',
                    email: 'emily.wilson@example.com',
                    role: 'Manager'
                },
                {
                    id: 5,
                    name: 'Michael Johnson',
                    email: 'michael.j@example.com',
                    role: 'Manager'
                }
            ];

            const promotions = [{
                    id: 1,
                    title: 'Summer Sale 2025',
                    subtitle: '50% off all services',
                    image: 'https://via.placeholder.com/100/4F46E5/FFFFFF?text=Summer'
                },
                {
                    id: 2,
                    title: 'Holiday Special',
                    subtitle: 'Buy 1 Get 1 Free',
                    image: 'https://via.placeholder.com/100/EC4899/FFFFFF?text=Holiday'
                },
                {
                    id: 3,
                    title: 'New Year Promo',
                    subtitle: 'Exclusive discounts',
                    image: 'https://via.placeholder.com/100/10B981/FFFFFF?text=NewYear'
                }
            ];

            let profileCount = 0;
            let planCount = 0;
            let currentConfig = null;

            // Generate Zone ID
            function generateZoneId() {
                const prefix = 'ZONE';
                const timestamp = Date.now().toString().slice(-6);
                const random = Math.floor(Math.random() * 1000).toString().padStart(3, '0');
                document.getElementById('zone-id').value = `${prefix}-${timestamp}-${random}`;
            }

            // Color Sync Function
            function syncColor(input, colorId) {
                const colorPicker = document.getElementById(colorId);
                if (colorPicker && input.value.match(/^#[0-9A-F]{6}$/i)) {
                    colorPicker.value = input.value;
                }
            }

            // Update color text when color picker changes
            document.addEventListener('DOMContentLoaded', function() {
                const colorInputs = ['primary-color', 'secondary-color', 'header-bg-color', 'header-text-color',
                    'footer-bg-color', 'footer-text-color', 'button-color', 'button-text-color'
                ];

                colorInputs.forEach(id => {
                    const colorPicker = document.getElementById(id);
                    if (colorPicker) {
                        colorPicker.addEventListener('input', function() {
                            const textInput = document.getElementById(id + '-text');
                            if (textInput) {
                                textInput.value = this.value;
                            }
                        });
                    }
                });
            });

            // Search Business
            function searchBusiness(query) {
                const dropdown = document.getElementById('business-dropdown');
                const resultsContainer = document.getElementById('business-results');

                if (query.length < 2) {
                    dropdown.classList.add('hidden');
                    return;
                }

                const filtered = businesses.filter(b =>
                    b.name.toLowerCase().includes(query.toLowerCase()) ||
                    b.tax_id.includes(query)
                );

                if (filtered.length === 0) {
                    resultsContainer.innerHTML = '<div class="px-4 py-3 text-sm text-gray-500">No businesses found</div>';
                } else {
                    resultsContainer.innerHTML = filtered.map(b => `
                        <div class="px-4 py-3 hover:bg-gray-100 cursor-pointer transition-colors border-b border-gray-100 last:border-0" 
                             onclick="selectBusiness(${b.id}, '${b.name}', '${b.tax_id}')">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-sm font-medium text-gray-900">${b.name}</div>
                                    <div class="text-xs text-gray-500">TAX: ${b.tax_id}</div>
                                </div>
                            </div>
                        </div>
                    `).join('');
                }

                dropdown.classList.remove('hidden');
            }

            function selectBusiness(id, name, tax) {
                document.getElementById('business_id').value = id;
                document.getElementById('business-name').textContent = name;
                document.getElementById('business-tax').textContent = 'TAX: ' + tax;
                document.getElementById('selected-business').classList.remove('hidden');
                document.getElementById('business-search').value = '';
                document.getElementById('business-dropdown').classList.add('hidden');
            }

            // Search Operator
            function searchOperator(query) {
                const dropdown = document.getElementById('operator-dropdown');
                const resultsContainer = document.getElementById('operator-results');

                if (query.length < 2) {
                    dropdown.classList.add('hidden');
                    return;
                }

                const filtered = operators.filter(o =>
                    o.name.toLowerCase().includes(query.toLowerCase()) ||
                    o.email.toLowerCase().includes(query.toLowerCase())
                );

                if (filtered.length === 0) {
                    resultsContainer.innerHTML = '<div class="px-4 py-3 text-sm text-gray-500">No operators found</div>';
                } else {
                    resultsContainer.innerHTML = filtered.map(o => `
                        <div class="px-4 py-3 hover:bg-gray-100 cursor-pointer transition-colors border-b border-gray-100 last:border-0" 
                             onclick="selectOperator(${o.id}, '${o.name}', '${o.email}', '${o.role}')">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-semibold text-xs">
                                    ${getInitials(o.name)}
                                </div>
                                <div>
                                    <div class="text-sm font-medium text-gray-900">${o.name}</div>
                                    <div class="text-xs text-gray-500">${o.email} • ${o.role}</div>
                                </div>
                            </div>
                        </div>
                    `).join('');
                }

                dropdown.classList.remove('hidden');
            }

            function selectOperator(id, name, email, role) {
                document.getElementById('operator_id').value = id;
                document.getElementById('operator-initials').textContent = getInitials(name);
                document.getElementById('operator-name').textContent = name;
                document.getElementById('operator-email').textContent = `${email} • ${role}`;
                document.getElementById('selected-operator').classList.remove('hidden');
                document.getElementById('operator-search').value = '';
                document.getElementById('operator-dropdown').classList.add('hidden');
            }

            // Search Manager
            function searchManager(query) {
                const dropdown = document.getElementById('manager-dropdown');
                const resultsContainer = document.getElementById('manager-results');

                if (query.length < 2) {
                    dropdown.classList.add('hidden');
                    return;
                }

                const filtered = managers.filter(m =>
                    m.name.toLowerCase().includes(query.toLowerCase()) ||
                    m.email.toLowerCase().includes(query.toLowerCase())
                );

                if (filtered.length === 0) {
                    resultsContainer.innerHTML = '<div class="px-4 py-3 text-sm text-gray-500">No managers found</div>';
                } else {
                    resultsContainer.innerHTML = filtered.map(m => `
                        <div class="px-4 py-3 hover:bg-gray-100 cursor-pointer transition-colors border-b border-gray-100 last:border-0" 
                             onclick="selectManager(${m.id}, '${m.name}', '${m.email}', '${m.role}')">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 bg-gradient-to-br from-orange-500 to-red-600 rounded-full flex items-center justify-center text-white font-semibold text-xs">
                                    ${getInitials(m.name)}
                                </div>
                                <div>
                                    <div class="text-sm font-medium text-gray-900">${m.name}</div>
                                    <div class="text-xs text-gray-500">${m.email} • ${m.role}</div>
                                </div>
                            </div>
                        </div>
                    `).join('');
                }

                dropdown.classList.remove('hidden');
            }

            function selectManager(id, name, email, role) {
                document.getElementById('manager_id').value = id;
                document.getElementById('manager-initials').textContent = getInitials(name);
                document.getElementById('manager-name').textContent = name;
                document.getElementById('manager-email').textContent = `${email} • ${role}`;
                document.getElementById('selected-manager').classList.remove('hidden');
                document.getElementById('manager-search').value = '';
                document.getElementById('manager-dropdown').classList.add('hidden');
            }

            // Search Promotion
            function searchPromotion(query) {
                const dropdown = document.getElementById('promotion-dropdown');
                const resultsContainer = document.getElementById('promotion-results');

                if (query.length < 2) {
                    dropdown.classList.add('hidden');
                    return;
                }

                const filtered = promotions.filter(p =>
                    p.title.toLowerCase().includes(query.toLowerCase()) ||
                    p.subtitle.toLowerCase().includes(query.toLowerCase())
                );

                if (filtered.length === 0) {
                    resultsContainer.innerHTML = '<div class="px-4 py-3 text-sm text-gray-500">No promotions found</div>';
                } else {
                    resultsContainer.innerHTML = filtered.map(p => `
                        <div class="px-4 py-3 hover:bg-gray-100 cursor-pointer transition-colors border-b border-gray-100 last:border-0" 
                             onclick="selectPromotion(${p.id}, '${p.title}', '${p.subtitle}', '${p.image}')">
                            <div class="flex items-center gap-3">
                                <img src="${p.image}" alt="${p.title}" class="w-12 h-12 rounded-lg object-cover border-2 border-gray-200">
                                <div>
                                    <div class="text-sm font-medium text-gray-900">${p.title}</div>
                                    <div class="text-xs text-gray-500">${p.subtitle}</div>
                                </div>
                            </div>
                        </div>
                    `).join('');
                }

                dropdown.classList.remove('hidden');
            }

            function selectPromotion(id, title, subtitle, image) {
                document.getElementById('promotion_id').value = id;
                document.getElementById('promotion-image').src = image;
                document.getElementById('promotion-title').textContent = title;
                document.getElementById('promotion-subtitle').textContent = subtitle;
                document.getElementById('selected-promotion').classList.remove('hidden');
                document.getElementById('promotion-search').value = '';
                document.getElementById('promotion-dropdown').classList.add('hidden');
            }

            function clearSelection(type) {
                document.getElementById(`${type}_id`).value = '';
                document.getElementById(`selected-${type}`).classList.add('hidden');
                const searchInput = document.getElementById(`${type}-search`);
                if (searchInput) {
                    searchInput.focus();
                }
            }

            function getInitials(name) {
                return name.split(' ').map(n => n[0]).join('').toUpperCase();
            }

            // Plan Management
            function addPlan() {
                planCount++;
                const plansList = document.getElementById('plans-list');

                if (!plansList) return;

                const planCard = document.createElement('div');
                planCard.id = `plan-${planCount}`;
                planCard.className = 'border border-gray-200 rounded-lg p-4 bg-gray-50';
                planCard.innerHTML = `
                    <div class="flex items-center justify-between mb-4">
                        <h5 class="text-sm font-semibold text-gray-900">Plan #${planCount}</h5>
                        <button type="button" onclick="removePlan(${planCount})" class="text-red-600 hover:text-red-800 p-1 hover:bg-red-50 rounded transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Plan Name <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="text" 
                                name="plans[${planCount}][name]"
                                required
                                maxlength="20"
                                placeholder="e.g., Basic, Premium"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                            >
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Internet Group <span class="text-red-500">*</span>
                            </label>
                            <select 
                                name="plans[${planCount}][group]"
                                required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                            >
                                <option value="">Select group</option>
                                <option value="HIGH INTERNET">HIGH INTERNET</option>
                                <option value="LOW INTERNET">LOW INTERNET</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Bandwidth Limit (Mbps)
                            </label>
                            <select 
                                name="plans[${planCount}][bw_limit]"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                            >
                                <option value="">No Limit</option>
                                <option value="10">10 Mbps</option>
                                <option value="20">20 Mbps</option>
                                <option value="30">30 Mbps</option>
                                <option value="100">100 Mbps</option>
                            </select>
                        </div>
                    </div>
                `;

                plansList.appendChild(planCard);
            }

            function removePlan(id) {
                const plan = document.getElementById(`plan-${id}`);
                if (plan) {
                    plan.remove();
                }
            }

            // Configuration Selection
            function selectConfig(config) {
                const clickedElement = event.currentTarget;

                document.querySelectorAll('.config-option').forEach(opt => {
                    opt.classList.remove('selected');
                });

                clickedElement.classList.add('selected');

                const radioButton = clickedElement.querySelector('input[type="radio"]');
                if (radioButton) {
                    radioButton.checked = true;
                }

                const openConfig = document.getElementById('open-internet-config');
                const voucherConfig = document.getElementById('voucher-based-config');
                const dynamicConfig = document.getElementById('dynamic-profile-config');

                if (openConfig) openConfig.classList.add('hidden');
                if (voucherConfig) voucherConfig.classList.add('hidden');
                if (dynamicConfig) dynamicConfig.classList.add('hidden');

                currentConfig = config;

                if (config === 'open_internet') {
                    if (openConfig) {
                        openConfig.classList.remove('hidden');
                        renderFormFields('open');
                    }
                } else if (config === 'voucher_based') {
                    if (voucherConfig) {
                        voucherConfig.classList.remove('hidden');
                        renderFormFields('voucher');
                    }
                } else if (config === 'dynamic_profile') {
                    if (dynamicConfig) {
                        dynamicConfig.classList.remove('hidden');
                    }
                }
            }

            // Render Form Fields
            function renderFormFields(type) {
                const containerId = type === 'open' ? 'open-form-fields' : 'voucher-form-fields';
                const container = document.getElementById(containerId);

                if (!container) return;

                container.innerHTML = `
                    <div class="space-y-6">
                        <!-- Title Field -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Form Title <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="text" 
                                name="${type}_form_title"
                                required
                                placeholder="e.g., Connect to WiFi, Connexion WiFi"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                            >
                        </div>

                        <!-- First & Last Name -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">First Name Label</label>
                                <input 
                                    type="text" 
                                    name="${type}_first_name_label"
                                    placeholder="e.g., First Name, Prénom"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                >
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Last Name Label</label>
                                <input 
                                    type="text" 
                                    name="${type}_last_name_label"
                                    placeholder="e.g., Last Name, Nom"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                >
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Email Field Label</label>
                                <input 
                                    type="text" 
                                    name="${type}_email_label"
                                    placeholder="e.g., Email, Courriel"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                >
                            </div>
                            <div class="flex items-center h-10 mt-6">
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" name="${type}_email_verification" value="1" class="sr-only peer">
                                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                    <span class="ml-3 text-sm font-medium text-gray-700">Email Verification</span>
                                </label>
                            </div>
                        </div>

                        <!-- WhatsApp -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">WhatsApp Field Label</label>
                                <input 
                                    type="text" 
                                    name="${type}_whatsapp_label"
                                    placeholder="e.g., WhatsApp Number"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                >
                            </div>
                            <div class="flex items-center h-10 mt-6">
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" name="${type}_whatsapp_verification" value="1" class="sr-only peer">
                                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                    <span class="ml-3 text-sm font-medium text-gray-700">WhatsApp Verification</span>
                                </label>
                            </div>
                        </div>

                        <!-- Checkbox -->
                        <div class="border-t border-gray-200 pt-4">
                            <h5 class="text-sm font-semibold text-gray-700 mb-4">Checkbox Configuration</h5>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Checkbox Label</label>
                                    <input 
                                        type="text" 
                                        name="${type}_checkbox_label"
                                        placeholder="e.g., I agree to terms"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                    >
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Is Required?</label>
                                    <select 
                                        name="${type}_checkbox_required"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                    >
                                        <option value="0">Optional</option>
                                        <option value="1">Required</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Limited Options</label>
                                    <select 
                                        name="${type}_checkbox_limit"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                    >
                                        <option value="1">Only 1 option</option>
                                        <option value="2">Up to 2 options</option>
                                        <option value="many">Many options</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Button Text -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Submit Button Text</label>
                            <input 
                                type="text" 
                                name="${type}_button_text"
                                placeholder="e.g., Connect, Se connecter"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                            >
                        </div>
                    </div>
                `;
            }

            // Add Profile for Dynamic Configuration
            function addProfile() {
                profileCount++;
                const profilesList = document.getElementById('profiles-list');

                if (!profilesList) return;

                const profileCard = document.createElement('div');
                profileCard.id = `profile-${profileCount}`;
                profileCard.className = 'profile-card bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden';
                profileCard.innerHTML = `
                    <div class="p-6 space-y-6">
                        <div class="flex items-center justify-between">
                            <h4 class="text-sm font-semibold text-gray-900 flex items-center gap-2">
                                <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Profile #${profileCount}
                            </h4>
                            <button type="button" onclick="removeProfile(${profileCount})" class="text-red-600 hover:text-red-800 p-1 hover:bg-red-50 rounded transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                            </button>
                        </div>

                        <!-- Profile Title -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Profile Title <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="text" 
                                name="profiles[${profileCount}][profile_title]" 
                                required
                                placeholder="e.g., Premium Access, Basic Access"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                            >
                        </div>

                        <!-- Access Policy -->
                        <div class="space-y-3 p-4 bg-gray-50 rounded-lg">
                            <h5 class="text-sm font-semibold text-gray-700">Access Policy</h5>
                            <div class="flex items-center gap-4">
                                <label class="flex items-center">
                                    <input 
                                        type="radio" 
                                        name="profiles[${profileCount}][access_policy]"
                                        value="open_internet"
                                        onchange="toggleControllerSettings(${profileCount}, 'open_internet')"
                                        class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500"
                                    >
                                    <span class="ml-2 text-sm text-gray-700">Open Internet</span>
                                </label>
                                <label class="flex items-center">
                                    <input 
                                        type="radio" 
                                        name="profiles[${profileCount}][access_policy]"
                                        value="voucher_based"
                                        onchange="toggleControllerSettings(${profileCount}, 'voucher_based')"
                                        class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500"
                                    >
                                    <span class="ml-2 text-sm text-gray-700">Voucher Based</span>
                                </label>
                            </div>
                        </div>

                        <!-- Controller Settings (Hidden if Open Internet) -->
                        <div id="controller-settings-${profileCount}" class="space-y-4 p-4 bg-gray-50 rounded-lg">
                            <h5 class="text-sm font-semibold text-gray-700 flex items-center gap-2">
                                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"></path>
                                </svg>
                                Controller Settings
                            </h5>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                <div class="flex items-center">
                                    <input 
                                        type="checkbox" 
                                        name="profiles[${profileCount}][gw_username]"
                                        value="1"
                                        class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                                    >
                                    <label class="ml-2 text-sm text-gray-700">Gateway Username</label>
                                </div>
                                <div class="flex items-center">
                                    <input 
                                        type="checkbox" 
                                        name="profiles[${profileCount}][gw_password]"
                                        value="1"
                                        class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                                    >
                                    <label class="ml-2 text-sm text-gray-700">Gateway Password</label>
                                </div>
                                <div class="flex items-center">
                                    <input 
                                        type="checkbox" 
                                        name="profiles[${profileCount}][gw_type]"
                                        value="1"
                                        class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                                    >
                                    <label class="ml-2 text-sm text-gray-700">Gateway Type</label>
                                </div>
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Gateway Post URL</label>
                                    <input 
                                        type="url" 
                                        name="profiles[${profileCount}][gw_post_url]"
                                        placeholder="https://gateway.example.com"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                    >
                                </div>
                            </div>
                        </div>

                        <!-- Limits (Hidden for Open Internet) -->
                        <div id="limits-section-${profileCount}" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Daily Limit (hours)</label>
                                <input 
                                    type="number" 
                                    name="profiles[${profileCount}][daily_limit]"
                                    min="0"
                                    placeholder="0 (unlimited)"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                >
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Bandwidth Limit (Mbps)</label>
                                <input 
                                    type="number" 
                                    name="profiles[${profileCount}][bandwidth_limit]"
                                    min="0"
                                    placeholder="0 (unlimited)"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                >
                            </div>
                        </div>

                        <!-- Form Fields for Profile -->
                        <div class="border-t border-gray-200 pt-4">
                            <h5 class="text-sm font-semibold text-gray-700 mb-4">Form Fields</h5>
                            ${generateProfileFormFields(profileCount)}
                        </div>
                    </div>
                `;

                profilesList.appendChild(profileCard);
            }

            function generateProfileFormFields(profileId) {
                return `
                    <div class="space-y-4">
                        <!-- Title Field -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Form Title <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="text" 
                                name="profiles[${profileId}][form_title]"
                                required
                                placeholder="e.g., Connect to WiFi, Connexion WiFi"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                            >
                        </div>

                        <!-- First & Last Name -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">First Name Label</label>
                                <input 
                                    type="text" 
                                    name="profiles[${profileId}][first_name_label]"
                                    placeholder="e.g., First Name, Prénom"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                >
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Last Name Label</label>
                                <input 
                                    type="text" 
                                    name="profiles[${profileId}][last_name_label]"
                                    placeholder="e.g., Last Name, Nom"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                >
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Email Field Label</label>
                                <input 
                                    type="text" 
                                    name="profiles[${profileId}][email_label]"
                                    placeholder="e.g., Email"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                >
                            </div>
                            <div class="flex items-center h-10 mt-6">
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" name="profiles[${profileId}][email_verification]" value="1" class="sr-only peer">
                                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                    <span class="ml-3 text-sm font-medium text-gray-700">Email Verification</span>
                                </label>
                            </div>
                        </div>

                        <!-- WhatsApp -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">WhatsApp Field Label</label>
                                <input 
                                    type="text" 
                                    name="profiles[${profileId}][whatsapp_label]"
                                    placeholder="e.g., WhatsApp Number"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                >
                            </div>
                            <div class="flex items-center h-10 mt-6">
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" name="profiles[${profileId}][whatsapp_verification]" value="1" class="sr-only peer">
                                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                    <span class="ml-3 text-sm font-medium text-gray-700">WhatsApp Verification</span>
                                </label>
                            </div>
                        </div>

                        <!-- Checkbox -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Checkbox Label</label>
                                <input 
                                    type="text" 
                                    name="profiles[${profileId}][checkbox_label]"
                                    placeholder="e.g., I agree to terms"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                >
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Is Required?</label>
                                <select 
                                    name="profiles[${profileId}][checkbox_required]"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                >
                                    <option value="0">Optional</option>
                                    <option value="1">Required</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Limited Options</label>
                                <select 
                                    name="profiles[${profileId}][checkbox_limit]"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                >
                                    <option value="1">Only 1 option</option>
                                    <option value="2">Up to 2 options</option>
                                    <option value="many">Many options</option>
                                </select>
                            </div>
                        </div>

                        <!-- Button Text -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Submit Button Text</label>
                            <input 
                                type="text" 
                                name="profiles[${profileId}][button_text]"
                                placeholder="e.g., Connect, Se connecter"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                            >
                        </div>
                    </div>
                `;
            }

            function toggleControllerSettings(profileId, policy) {
                const controllerSettings = document.getElementById(`controller-settings-${profileId}`);
                const limitsSection = document.getElementById(`limits-section-${profileId}`);

                if (controllerSettings) {
                    if (policy === 'open_internet') {
                        controllerSettings.classList.add('hidden');
                        if (limitsSection) limitsSection.classList.add('hidden');
                    } else {
                        controllerSettings.classList.remove('hidden');
                        if (limitsSection) limitsSection.classList.remove('hidden');
                    }
                }
            }

            function removeProfile(id) {
                const profile = document.getElementById(`profile-${id}`);
                if (profile) {
                    profile.remove();
                }
            }

            // Close dropdowns when clicking outside
            document.addEventListener('click', function(event) {
                const dropdowns = ['business', 'operator', 'manager', 'promotion'];
                dropdowns.forEach(type => {
                    const searchInput = document.getElementById(`${type}-search`);
                    const dropdown = document.getElementById(`${type}-dropdown`);

                    if (searchInput && dropdown && !searchInput.contains(event.target) && !dropdown.contains(
                            event.target)) {
                        dropdown.classList.add('hidden');
                    }
                });
            });
        </script>
    </x-slot>
</x-main-layout>
