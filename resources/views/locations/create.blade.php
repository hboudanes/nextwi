<x-main-layout>
    <x-slot name="style">
        <style>
            .tab-item {
                transition: all 0.3s ease;
                cursor: pointer;
            }

            .tab-item.active {
                color: #3B82F6;
                border-bottom: 3px solid #3B82F6;
                background-color: #EFF6FF;
            }

            .tab-item:hover:not(.active) {
                background-color: #F3F4F6;
            }

            .tab-content {
                display: none;
            }

            .tab-content.active {
                display: block;
                animation: fadeIn 0.3s ease-in;
            }

            @keyframes fadeIn {
                from {
                    opacity: 0;
                    transform: translateY(10px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .step-indicator {
                display: flex;
                align-items: center;
                justify-content: space-between;
                margin-bottom: 2rem;
            }

            .step {
                flex: 1;
                text-align: center;
                position: relative;
            }

            .step::after {
                content: '';
                position: absolute;
                top: 20px;
                left: 50%;
                width: 100%;
                height: 2px;
                background-color: #E5E7EB;
                z-index: -1;
            }

            .step:last-child::after {
                display: none;
            }

            .step-number {
                width: 40px;
                height: 40px;
                border-radius: 50%;
                background-color: #E5E7EB;
                color: #6B7280;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                font-weight: 600;
                margin-bottom: 0.5rem;
                transition: all 0.3s ease;
            }

            .step.active .step-number {
                background-color: #3B82F6;
                color: white;
                box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.2);
            }

            .step.completed .step-number {
                background-color: #10B981;
                color: white;
            }

            .step.completed .step-number::before {
                content: '✓';
            }

            .profile-card {
                transition: all 0.3s ease;
                position: relative;
            }

            .profile-card.cannot-remove {
                background: linear-gradient(135deg, #f0f9ff 0%, #ffffff 100%);
            }

            .access-type-selector {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 1rem;
            }

            .access-type-option {
                transition: all 0.3s ease;
                cursor: pointer;
            }

            .access-type-option.selected {
                border-color: #3B82F6;
                background-color: #EFF6FF;
                box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
            }

            .config-option {
                transition: all 0.3s ease;
            }

            .language-content {
                display: none;
            }

            .language-content.active {
                display: block;
            }

            /* Live Preview Styles */
            .sticky {
                position: sticky;
            }

            #phone-screen::-webkit-scrollbar {
                width: 4px;
            }

            #phone-screen::-webkit-scrollbar-track {
                background: #f1f1f1;
                border-radius: 10px;
            }

            #phone-screen::-webkit-scrollbar-thumb {
                background: #888;
                border-radius: 10px;
            }

            #phone-screen::-webkit-scrollbar-thumb:hover {
                background: #555;
            }

            #preview-fields > div,
            #preview-checkboxes > div {
                animation: slideIn 0.3s ease-in-out;
            }

            @keyframes slideIn {
                from {
                    opacity: 0;
                    transform: translateX(-10px);
                }
                to {
                    opacity: 1;
                    transform: translateX(0);
                }
            }

            /* Right panel transition */
            .right-panel-content {
                display: none;
                animation: fadeIn 0.3s ease-in;
            }

            .right-panel-content.active {
                display: block;
            }
        </style>
    </x-slot>

    <!-- Main Content -->
    <main class="lg:ml-64 min-h-screen">
        <!-- Top Bar -->
        <x-top-bar title="Create New Location" subtitle="Add a new location to your business" routeName="locations.index"
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
            <!-- Step Indicator -->
            <div class="step-indicator mb-6">
                <div class="step active" data-step="1">
                    <div class="step-number">1</div>
                    <div class="text-xs font-medium text-gray-700">Basic Info</div>
                </div>
                <div class="step" data-step="2">
                    <div class="step-number">2</div>
                    <div class="text-xs font-medium text-gray-700">Brand</div>
                </div>
                <div class="step" data-step="3">
                    <div class="step-number">3</div>
                    <div class="text-xs font-medium text-gray-700">Auth Profiles</div>
                </div>
                <div class="step" data-step="4">
                    <div class="step-number">4</div>
                    <div class="text-xs font-medium text-gray-700">Translation</div>
                </div>
                <div class="step" data-step="5">
                    <div class="step-number">5</div>
                    <div class="text-xs font-medium text-gray-700">Gateway</div>
                </div>
            </div>

            <!-- Two Column Layout: Form + Preview/Review -->
            <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
                
                <!-- Left Column: Form (2/3 width) -->
                <div class="xl:col-span-2">
                    <form action="{{ route('locations.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        
                        <!-- Tab Navigation -->
                        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                            <div class="flex border-b border-gray-200 overflow-x-auto">
                                <div class="tab-item active flex-1 px-6 py-4 text-center font-semibold whitespace-nowrap" data-tab="basic-info">
                                    <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Basic Info
                                </div>
                                <div class="tab-item flex-1 px-6 py-4 text-center font-semibold whitespace-nowrap" data-tab="brand">
                                    <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01">
                                        </path>
                                    </svg>
                                    Brand
                                </div>
                                <div class="tab-item flex-1 px-6 py-4 text-center font-semibold whitespace-nowrap" data-tab="auth-profiles">
                                    <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                        </path>
                                    </svg>
                                    Auth Profiles
                                </div>
                                <div class="tab-item flex-1 px-6 py-4 text-center font-semibold whitespace-nowrap" data-tab="translation">
                                    <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129">
                                        </path>
                                    </svg>
                                    Translation
                                </div>
                                <div class="tab-item flex-1 px-6 py-4 text-center font-semibold whitespace-nowrap" data-tab="gateway">
                                    <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01">
                                        </path>
                                    </svg>
                                    Gateway
                                </div>
                            </div>

                            <!-- Tab Content Sections -->
                            <div class="p-6">

                                <!-- TAB 1: Basic Info -->
                                <div class="tab-content active" id="basic-info">
                                    <h3 class="text-lg font-bold text-gray-900 mb-4">Basic Information</h3>
                                    <div class="space-y-4">
                                        <!-- Name -->
                                        <div>
                                            <label for="location-name" class="block text-sm font-medium text-gray-700 mb-2">
                                                Location Name <span class="text-red-500">*</span>
                                            </label>
                                            <input type="text" id="location-name" name="name" required
                                                placeholder="Enter location name"
                                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                        </div>

                                        <!-- Position (Google Maps) -->
                                        <div>
                                            <label for="position" class="block text-sm font-medium text-gray-700 mb-2">
                                                Position (Google Maps) <span class="text-red-500">*</span>
                                            </label>
                                            <input type="text" id="position" name="position" required
                                                placeholder="Search or paste coordinates/address"
                                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                            <p class="text-xs text-gray-500 mt-1">Example: 40.7128, -74.0060 or "Times Square,
                                                New York"</p>
                                        </div>

                                        <!-- Timezone -->
                                        <div>
                                            <label for="timezone" class="block text-sm font-medium text-gray-700 mb-2">
                                                Timezone <span class="text-red-500">*</span>
                                            </label>
                                            <select id="timezone" name="timezone" required
                                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                                <option value="">Select timezone</option>
                                                <option value="UTC">UTC</option>
                                                <optgroup label="North America">
                                                    <option value="America/New_York">Eastern Time (New York)</option>
                                                    <option value="America/Chicago">Central Time (Chicago)</option>
                                                    <option value="America/Denver">Mountain Time (Denver)</option>
                                                    <option value="America/Los_Angeles">Pacific Time (Los Angeles)</option>
                                                </optgroup>
                                                <optgroup label="Europe">
                                                    <option value="Europe/London">GMT/BST (London)</option>
                                                    <option value="Europe/Paris">CET/CEST (Paris)</option>
                                                    <option value="Europe/Berlin">CET/CEST (Berlin)</option>
                                                </optgroup>
                                                <optgroup label="Asia">
                                                    <option value="Asia/Dubai">GST (Dubai)</option>
                                                    <option value="Asia/Tokyo">JST (Tokyo)</option>
                                                    <option value="Asia/Singapore">SGT (Singapore)</option>
                                                </optgroup>
                                            </select>
                                        </div>

                                        <!-- Note -->
                                        <div>
                                            <label for="note" class="block text-sm font-medium text-gray-700 mb-2">
                                                Note
                                            </label>
                                            <textarea id="note" name="note" rows="3" placeholder="Add notes..."
                                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- TAB 2: Brand Configuration (Each input in line) -->
                                <div class="tab-content" id="brand">
                                    <h3 class="text-lg font-bold text-gray-900 mb-4">Brand Configuration</h3>
                                    <div class="space-y-4">
                                        <!-- Logo -->
                                        <div>
                                            <label for="logo" class="block text-sm font-medium text-gray-700 mb-2">
                                                Logo
                                            </label>
                                            <input type="file" id="logo" name="logo" accept="image/*"
                                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                        </div>

                                        <!-- Headline -->
                                        <div>
                                            <label for="headline" class="block text-sm font-medium text-gray-700 mb-2">
                                                Headline
                                            </label>
                                            <input type="text" id="headline" name="headline"
                                                placeholder="Welcome to our WiFi"
                                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                        </div>

                                        <!-- Subheading -->
                                        <div>
                                            <label for="subheading" class="block text-sm font-medium text-gray-700 mb-2">
                                                Subheading
                                            </label>
                                            <input type="text" id="subheading" name="subheading"
                                                placeholder="Connect and enjoy"
                                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                        </div>

                                        <!-- Primary Color -->
                                        <div>
                                            <label for="primary-color" class="block text-sm font-medium text-gray-700 mb-2">
                                                Primary Color
                                            </label>
                                            <input type="color" id="primary-color" name="primary_color"
                                                value="#3B82F6"
                                                class="w-full h-12 border border-gray-300 rounded-lg cursor-pointer">
                                        </div>

                                        <!-- Secondary Color -->
                                        <div>
                                            <label for="secondary-color" class="block text-sm font-medium text-gray-700 mb-2">
                                                Secondary Color
                                            </label>
                                            <input type="color" id="secondary-color" name="secondary_color"
                                                value="#8B5CF6"
                                                class="w-full h-12 border border-gray-300 rounded-lg cursor-pointer">
                                        </div>

                                        <!-- Background Color -->
                                        <div>
                                            <label for="background-color" class="block text-sm font-medium text-gray-700 mb-2">
                                                Background Color
                                            </label>
                                            <input type="color" id="background-color" name="background_color"
                                                value="#FFFFFF"
                                                class="w-full h-12 border border-gray-300 rounded-lg cursor-pointer">
                                        </div>

                                        <!-- Text Color -->
                                        <div>
                                            <label for="text-color" class="block text-sm font-medium text-gray-700 mb-2">
                                                Text Color
                                            </label>
                                            <input type="color" id="text-color" name="text_color" value="#111827"
                                                class="w-full h-12 border border-gray-300 rounded-lg cursor-pointer">
                                        </div>

                                        <!-- Background Image -->
                                        <div>
                                            <label for="background-image" class="block text-sm font-medium text-gray-700 mb-2">
                                                Background Image
                                            </label>
                                            <input type="file" id="background-image" name="background_image"
                                                accept="image/*"
                                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                        </div>

                                        <!-- Favicon -->
                                        <div>
                                            <label for="favicon" class="block text-sm font-medium text-gray-700 mb-2">
                                                Favicon
                                            </label>
                                            <input type="file" id="favicon" name="favicon"
                                                accept="image/x-icon,image/png"
                                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                        </div>

                                        <!-- Background Blur -->
                                        <div>
                                            <label for="background-blur" class="block text-sm font-medium text-gray-700 mb-2">
                                                Background Blur (0–100%)
                                            </label>
                                            <div class="flex items-center gap-3">
                                                <input type="range" id="background-blur" name="background_blur"
                                                    min="0" max="100" value="0" class="flex-1">
                                                <input type="number" id="background-blur-value" min="0"
                                                    max="100" value="0"
                                                    class="w-20 px-3 py-2 border border-gray-300 rounded-lg text-sm">
                                            </div>
                                        </div>

                                        <!-- Background Opacity -->
                                        <div>
                                            <label for="background-opacity" class="block text-sm font-medium text-gray-700 mb-2">
                                                Background Opacity (0–100%)
                                            </label>
                                            <div class="flex items-center gap-3">
                                                <input type="range" id="background-opacity" name="background_opacity"
                                                    min="0" max="100" value="100" class="flex-1">
                                                <input type="number" id="background-opacity-value" min="0"
                                                    max="100" value="100"
                                                    class="w-20 px-3 py-2 border border-gray-300 rounded-lg text-sm">
                                            </div>
                                        </div>

                                        <!-- Background Contrast -->
                                        <div>
                                            <label for="background-contrast" class="block text-sm font-medium text-gray-700 mb-2">
                                                Background Contrast (0–100%)
                                            </label>
                                            <div class="flex items-center gap-3">
                                                <input type="range" id="background-contrast" name="background_contrast"
                                                    min="0" max="100" value="100" class="flex-1">
                                                <input type="number" id="background-contrast-value" min="0"
                                                    max="100" value="100"
                                                    class="w-20 px-3 py-2 border border-gray-300 rounded-lg text-sm">
                                            </div>
                                        </div>

                                        <!-- Redirection URL -->
                                        <div>
                                            <label for="redirection-url" class="block text-sm font-medium text-gray-700 mb-2">
                                                Redirection URL
                                            </label>
                                            <input type="url" id="redirection-url" name="redirection_url"
                                                placeholder="https://example.com"
                                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                        </div>

                                        <!-- Font Family -->
                                        <div>
                                            <label for="font-family" class="block text-sm font-medium text-gray-700 mb-2">
                                                Font Family
                                            </label>
                                            <select id="font-family" name="font_family"
                                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                                <option value="Inter">Inter</option>
                                                <option value="Roboto">Roboto</option>
                                                <option value="Open Sans">Open Sans</option>
                                                <option value="Lato">Lato</option>
                                                <option value="Poppins">Poppins</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- TAB 3: Authentication Profiles -->
                                <div class="tab-content" id="auth-profiles">
                                    <h3 class="text-lg font-bold text-gray-900 mb-4">Authentication Profiles</h3>

                                    <div class="mb-4 p-4 bg-blue-50 border border-blue-200 rounded-lg">
                                        <p class="text-sm text-blue-800 flex items-start gap-2">
                                            <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span><strong>At least one profile is required.</strong> Each profile can use either
                                                Open Access or Account-based authentication.</span>
                                        </p>
                                    </div>

                                    <!-- Add Profile Button -->
                                    <div class="mb-4 flex justify-end">
                                        <button type="button" onclick="addProfile()"
                                            class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors flex items-center gap-2 text-sm font-semibold">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                            </svg>
                                            Add Profile
                                        </button>
                                    </div>

                                    <!-- Profiles List -->
                                    <div id="profiles-list" class="space-y-4"></div>
                                </div>

                                <!-- TAB 4: Translation -->
                                <div class="tab-content" id="translation">
                                    <h3 class="text-lg font-bold text-gray-900 mb-4">Text & Translation</h3>
                                    <p class="text-sm text-gray-500 mb-4">Configure default text labels and translations for
                                        all forms at this location</p>

                                    <!-- Language Selection -->
                                    <div class="mb-6">
                                        <div class="flex items-center justify-between mb-4">
                                            <h5 class="text-sm font-semibold text-gray-700">Languages</h5>
                                            <div class="flex items-center gap-2">
                                                <select id="language-selector"
                                                    class="px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                                    <option value="en" selected>English (Default)</option>
                                                    <option value="fr">French</option>
                                                    <option value="es">Spanish</option>
                                                    <option value="de">German</option>
                                                    <option value="it">Italian</option>
                                                    <option value="pt">Portuguese</option>
                                                    <option value="ar">Arabic</option>
                                                    <option value="zh">Chinese</option>
                                                    <option value="ja">Japanese</option>
                                                    <option value="ru">Russian</option>
                                                </select>
                                                <button type="button" onclick="addLanguage()"
                                                    class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors flex items-center gap-2 text-sm font-semibold">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                                    </svg>
                                                    Add Language
                                                </button>
                                            </div>
                                        </div>

                                        <!-- Language tabs -->
                                        <div class="mb-4 border-b border-gray-200">
                                            <ul id="language-tabs"
                                                class="flex flex-wrap -mb-px text-sm font-medium text-center">
                                                <li class="mr-2">
                                                    <a href="#"
                                                        class="language-tab active inline-block p-4 border-b-2 border-blue-600 rounded-t-lg text-blue-600"
                                                        data-lang="en">English</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <!-- Language content panels -->
                                    <div id="language-contents">
                                        <!-- English (default) content -->
                                        <div id="lang-content-en" class="language-content active">
                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                <!-- Headline -->
                                                <div>
                                                    <label for="text-headline"
                                                        class="block text-sm font-medium text-gray-700 mb-2">
                                                        Headline
                                                    </label>
                                                    <input type="text" id="text-headline" name="text_headline"
                                                        placeholder="e.g., Welcome!"
                                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                                </div>

                                                <!-- Subheading -->
                                                <div>
                                                    <label for="text-subheading"
                                                        class="block text-sm font-medium text-gray-700 mb-2">
                                                        Subheading
                                                    </label>
                                                    <input type="text" id="text-subheading" name="text_subheading"
                                                        placeholder="e.g., Connect to WiFi"
                                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                                </div>

                                                <!-- First Name -->
                                                <div>
                                                    <label for="text-first-name"
                                                        class="block text-sm font-medium text-gray-700 mb-2">
                                                        First Name
                                                    </label>
                                                    <input type="text" id="text-first-name" name="text_first_name"
                                                        placeholder="e.g., First Name"
                                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                                </div>

                                                <!-- First Name Placeholder -->
                                                <div>
                                                    <label for="text-first-name-placeholder"
                                                        class="block text-sm font-medium text-gray-700 mb-2">
                                                        First Name Placeholder
                                                    </label>
                                                    <input type="text" id="text-first-name-placeholder"
                                                        name="text_first_name_placeholder"
                                                        placeholder="e.g., Enter first name"
                                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                                </div>

                                                <!-- Email -->
                                                <div>
                                                    <label for="text-email"
                                                        class="block text-sm font-medium text-gray-700 mb-2">
                                                        Email
                                                    </label>
                                                    <input type="text" id="text-email" name="text_email"
                                                        placeholder="e.g., Email"
                                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                                </div>

                                                <!-- Email Placeholder -->
                                                <div>
                                                    <label for="text-email-placeholder"
                                                        class="block text-sm font-medium text-gray-700 mb-2">
                                                        Email Placeholder
                                                    </label>
                                                    <input type="text" id="text-email-placeholder"
                                                        name="text_email_placeholder" placeholder="e.g., Enter email"
                                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                                </div>

                                                <!-- Mobile -->
                                                <div>
                                                    <label for="text-mobile"
                                                        class="block text-sm font-medium text-gray-700 mb-2">
                                                        Mobile
                                                    </label>
                                                    <input type="text" id="text-mobile" name="text_mobile"
                                                        placeholder="e.g., Mobile"
                                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                                </div>

                                                <!-- Connect Button -->
                                                <div>
                                                    <label for="text-connect-button"
                                                        class="block text-sm font-medium text-gray-700 mb-2">
                                                        Connect Button
                                                    </label>
                                                    <input type="text" id="text-connect-button" name="text_connect_button"
                                                        placeholder="e.g., Connect"
                                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Validation Messages -->
                                    <div class="border-t border-gray-200 pt-4 mt-4">
                                        <h5 class="text-sm font-semibold text-gray-700 mb-3">Validation Messages</h5>
                                        <textarea name="validation_messages" rows="5"
                                            placeholder="Enter validation error messages (JSON format or plain text)..."
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm font-mono focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"></textarea>
                                    </div>
                                </div>

                                <!-- TAB 5: Gateway -->
                                <div class="tab-content" id="gateway">
                                    <h3 class="text-lg font-bold text-gray-900 mb-4">Gateway Settings</h3>
                                    <div class="space-y-4">
                                        <div>
                                            <label for="post-url" class="block text-sm font-medium text-gray-700 mb-2">
                                                Post URL
                                            </label>
                                            <input type="url" id="post-url" name="post_url"
                                                placeholder="https://example.com/api/auth"
                                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                        </div>

                                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                            <div>
                                                <label for="username" class="block text-sm font-medium text-gray-700 mb-2">
                                                    Username
                                                </label>
                                                <input type="text" id="username" name="username"
                                                    placeholder="Gateway username"
                                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                            </div>

                                            <div>
                                                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                                                    Password
                                                </label>
                                                <input type="password" id="password" name="password"
                                                    placeholder="Gateway password"
                                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                            </div>

                                            <div>
                                                <label for="type" class="block text-sm font-medium text-gray-700 mb-2">
                                                    Type <span class="text-red-500">*</span>
                                                </label>
                                                <select id="type" name="type" required
                                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                                    <option value="">Select type</option>
                                                    <option value="mikrotik">MikroTik</option>
                                                    <option value="unifi">Ubiquiti UniFi</option>
                                                    <option value="cisco">Cisco</option>
                                                    <option value="other">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Navigation Buttons -->
                        <div
                            class="flex items-center justify-between bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                            <button type="button" id="prev-btn" onclick="previousTab()"
                                class="px-5 py-2.5 text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
                                disabled>
                                <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 19l-7-7 7-7"></path>
                                </svg>
                                Previous
                            </button>

                            <div class="flex gap-3">
                                <a href="{{ route('locations.index') }}"
                                    class="px-5 py-2.5 text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                                    Cancel
                                </a>

                                <button type="button" id="next-btn" onclick="nextTab()"
                                    class="px-5 py-2.5 text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors flex items-center gap-2">
                                    Next
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </button>

                                <button type="submit" id="submit-btn" style="display: none;"
                                    class="px-5 py-2.5 text-white bg-green-600 rounded-lg hover:bg-green-700 transition-colors flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7">
                                        </path>
                                    </svg>
                                    <span>Create Location</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                
                <!-- Right Column: Dynamic Panel (Live Preview OR Profile Review) -->
                <div class="xl:col-span-1">
                    <div class="sticky top-6">
                        
                        <!-- Live Preview Panel (Show when on Brand tab) -->
                        <div id="live-preview-panel" class="right-panel-content">
                            <div class="bg-white rounded-lg shadow-lg border border-gray-200 p-4">
                                <h3 class="text-sm font-semibold text-gray-700 mb-4 flex items-center gap-2">
                                    <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                    </svg>
                                    Live Preview
                                </h3>
                                
                                <!-- Mobile Phone Frame -->
                                <div class="mx-auto" style="width: 320px;">
                                    <div class="relative mx-auto border-gray-800 bg-gray-800 border-[14px] rounded-[2.5rem] h-[600px] shadow-xl">
                                        <!-- Phone notch -->
                                        <div class="w-[148px] h-[18px] bg-gray-800 top-0 rounded-b-[1rem] left-1/2 -translate-x-1/2 absolute"></div>
                                        <!-- Phone buttons -->
                                        <div class="h-[32px] w-[3px] bg-gray-800 absolute -left-[17px] top-[72px] rounded-l-lg"></div>
                                        <div class="h-[46px] w-[3px] bg-gray-800 absolute -left-[17px] top-[124px] rounded-l-lg"></div>
                                        <div class="h-[46px] w-[3px] bg-gray-800 absolute -left-[17px] top-[178px] rounded-l-lg"></div>
                                        <div class="h-[64px] w-[3px] bg-gray-800 absolute -right-[17px] top-[142px] rounded-r-lg"></div>
                                        
                                        <!-- Phone screen -->
                                        <div id="phone-screen" class="rounded-[2rem] overflow-y-auto h-full w-full bg-white">
                                            <div id="preview-content" class="p-6 space-y-4">
                                                <!-- Dynamic Preview Content -->
                                                <div class="text-center mb-6">
                                                    <img id="preview-logo" src="" alt="Logo" class="mx-auto mb-4 h-16 w-auto hidden">
                                                    <h1 id="preview-headline" class="text-2xl font-bold text-gray-900 mb-2">Welcome!</h1>
                                                    <p id="preview-subheading" class="text-sm text-gray-600">Connect to WiFi</p>
                                                </div>
                                                
                                                <!-- Preview Form Fields -->
                                                <div id="preview-fields" class="space-y-3">
                                                    <!-- Fields will be dynamically added here -->
                                                </div>
                                                
                                                <!-- Preview Checkboxes -->
                                                <div id="preview-checkboxes" class="space-y-2">
                                                    <!-- Checkboxes will be dynamically added here -->
                                                </div>
                                                
                                                <!-- Connect Button -->
                                                <button type="button" id="preview-button" class="w-full py-3 px-4 bg-blue-600 text-white rounded-lg font-semibold text-sm">
                                                    Connect
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <p class="text-xs text-gray-500 text-center mt-4">Preview updates as you type</p>
                            </div>
                        </div>

                        <!-- Profile Review Panel (Show when on Auth Profiles tab) -->
                        <div id="profile-review-panel" class="right-panel-content">
                            <div class="bg-white rounded-lg shadow-lg border border-gray-200 p-4">
                                <h3 class="text-sm font-semibold text-gray-700 mb-4 flex items-center gap-2">
                                    <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    Review All Profiles
                                </h3>
                                
                                <div id="profile-review-list" class="space-y-3 max-h-[700px] overflow-y-auto">
                                    <!-- Profile review cards will be added here dynamically -->
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                
            </div>
        </div>
    </main>

    <x-slot name="script">
        <script>
            let profileCount = 0;
            let currentTab = 0;
            const tabs = ['basic-info', 'brand', 'auth-profiles', 'translation', 'gateway'];

            // Initialize on page load
            document.addEventListener('DOMContentLoaded', function() {
                addProfile(); // Auto-add first profile
                showTab(currentTab);
                addTabEventListeners();
                initializePreviewUpdates();
                updateRightPanel(); // Initialize right panel

                bindSliderToNumber('background-blur', 'background-blur-value', 0);
                bindSliderToNumber('background-opacity', 'background-opacity-value', 100);
                bindSliderToNumber('background-contrast', 'background-contrast-value', 100);

                // Tab click event
                document.querySelectorAll('.tab-item').forEach((item, index) => {
                    item.addEventListener('click', function() {
                        showTab(index);
                    });
                });

                // Add input event listeners for real-time profile review updates
                document.addEventListener('input', function(e) {
                    if (e.target.closest('#profiles-list')) {
                        updateProfileReview();
                        updatePreviewFields();
                    }
                });

                // Add change event listeners for radio buttons and checkboxes
                document.addEventListener('change', function(e) {
                    if (e.target.closest('#profiles-list')) {
                        updateProfileReview();
                        updatePreviewFields();
                    }
                });
            });

            // Update right panel based on current tab
            function updateRightPanel() {
                const livePreview = document.getElementById('live-preview-panel');
                const profileReview = document.getElementById('profile-review-panel');
                
                // Hide all panels first
                livePreview.classList.remove('active');
                profileReview.classList.remove('active');
                
                // Show appropriate panel based on current tab
                if (currentTab === 1) { // Brand tab
                    livePreview.classList.add('active');
                } else if (currentTab === 2) { // Auth Profiles tab
                    profileReview.classList.add('active');
                    updateProfileReview();
                }
            }

            // Live Preview Update Functions
            function initializePreviewUpdates() {
                // Brand Configuration Updates
                document.getElementById('headline')?.addEventListener('input', function() {
                    document.getElementById('preview-headline').textContent = this.value || 'Welcome!';
                });
                
                document.getElementById('subheading')?.addEventListener('input', function() {
                    document.getElementById('preview-subheading').textContent = this.value || 'Connect to WiFi';
                });
                
                document.getElementById('logo')?.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const logo = document.getElementById('preview-logo');
                            logo.src = e.target.result;
                            logo.classList.remove('hidden');
                        };
                        reader.readAsDataURL(file);
                    }
                });
                
                // Color Updates
                document.getElementById('primary-color')?.addEventListener('input', function() {
                    document.getElementById('preview-button').style.backgroundColor = this.value;
                });
                
                document.getElementById('background-color')?.addEventListener('input', function() {
                    document.getElementById('phone-screen').style.backgroundColor = this.value;
                });
                
                document.getElementById('text-color')?.addEventListener('input', function() {
                    document.getElementById('preview-content').style.color = this.value;
                });
                
                // Background Image
                document.getElementById('background-image')?.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            document.getElementById('phone-screen').style.backgroundImage = `url(${e.target.result})`;
                            document.getElementById('phone-screen').style.backgroundSize = 'cover';
                            document.getElementById('phone-screen').style.backgroundPosition = 'center';
                        };
                        reader.readAsDataURL(file);
                    }
                });
                
                // Translation Updates
                document.getElementById('text-connect-button')?.addEventListener('input', function() {
                    document.getElementById('preview-button').textContent = this.value || 'Connect';
                });
            }

            function updatePreviewFields() {
                const previewFields = document.getElementById('preview-fields');
                const previewCheckboxes = document.getElementById('preview-checkboxes');
                
                if (!previewFields || !previewCheckboxes) return;
                
                // Clear existing preview fields
                previewFields.innerHTML = '';
                previewCheckboxes.innerHTML = '';
                
                // Get the first active profile
                for (let i = 1; i <= profileCount; i++) {
                    const profile = document.getElementById(`profile-${i}`);
                    if (!profile) continue;
                    
                    // Get enabled fields
                    const fields = ['firstname', 'lastname', 'gender', 'birthday', 'email', 'mobile'];
                    const fieldLabels = {
                        'firstname': 'First Name',
                        'lastname': 'Last Name',
                        'gender': 'Gender',
                        'birthday': 'Birthday',
                        'email': 'Email',
                        'mobile': 'Mobile'
                    };
                    
                    fields.forEach(field => {
                        const checkbox = profile.querySelector(`input[name="profiles[${i}][${field}][enabled]"]`);
                        if (checkbox && checkbox.checked) {
                            const fieldDiv = document.createElement('div');
                            fieldDiv.innerHTML = `
                                <label class="block text-xs font-medium text-gray-700 mb-1">${fieldLabels[field]}</label>
                                <input type="text" placeholder="Enter ${fieldLabels[field].toLowerCase()}" 
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            `;
                            previewFields.appendChild(fieldDiv);
                        }
                    });
                    
                    // Get enabled checkboxes
                    for (let j = 1; j <= 3; j++) {
                        const checkboxEnabled = profile.querySelector(`input[name="profiles[${i}][checkbox${j}][enabled]"]`);
                        if (checkboxEnabled && checkboxEnabled.checked) {
                            const checkboxLabel = profile.querySelector(`input[name="profiles[${i}][checkbox${j}][label]"]`)?.value;
                            const checkboxNames = ['Terms & Conditions', 'Data Privacy', 'Marketing Consent'];
                            
                            const checkboxDiv = document.createElement('div');
                            checkboxDiv.className = 'flex items-start gap-2';
                            checkboxDiv.innerHTML = `
                                <input type="checkbox" class="mt-1 w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                <label class="text-xs text-gray-700">${checkboxLabel || checkboxNames[j-1]}</label>
                            `;
                            previewCheckboxes.appendChild(checkboxDiv);
                        }
                    }
                    
                    break; // Only show first profile in preview
                }
            }

            // Tab navigation functions
            function showTab(n) {
                currentTab = n;

                // Hide all tab contents
                document.querySelectorAll('.tab-content').forEach(content => {
                    content.classList.remove('active');
                });

                // Show current tab content
                document.getElementById(tabs[n]).classList.add('active');

                // Update tab items
                document.querySelectorAll('.tab-item').forEach((item, index) => {
                    if (index === n) {
                        item.classList.add('active');
                    } else {
                        item.classList.remove('active');
                    }
                });

                // Update step indicator
                document.querySelectorAll('.step').forEach((step, index) => {
                    if (index < n) {
                        step.classList.add('completed');
                        step.classList.remove('active');
                    } else if (index === n) {
                        step.classList.add('active');
                        step.classList.remove('completed');
                    } else {
                        step.classList.remove('active', 'completed');
                    }
                });

                // Update buttons
                document.getElementById('prev-btn').disabled = (n === 0);

                if (n === tabs.length - 1) {
                    document.getElementById('next-btn').style.display = 'none';
                    document.getElementById('submit-btn').style.display = 'flex';
                } else {
                    document.getElementById('next-btn').style.display = 'flex';
                    document.getElementById('submit-btn').style.display = 'none';
                }

                // Update right panel based on current tab
                updateRightPanel();
            }

            function nextTab() {
                if (currentTab < tabs.length - 1) {
                    showTab(currentTab + 1);
                }
            }

            function previousTab() {
                if (currentTab > 0) {
                    showTab(currentTab - 1);
                }
            }

            // Enhanced profile review with more details
            function updateProfileReview() {
                const reviewList = document.getElementById('profile-review-list');

                if (!reviewList) return;

                // Count active profiles
                let activeProfileCount = 0;
                for (let i = 1; i <= profileCount; i++) {
                    const profile = document.getElementById(`profile-${i}`);
                    if (profile) {
                        activeProfileCount++;
                    }
                }

                if (activeProfileCount === 0) {
                    reviewList.innerHTML = '<p class="text-sm text-gray-500 text-center py-8">No profiles added yet. Add a profile to see the review.</p>';
                    return;
                }

                reviewList.innerHTML = '';

                for (let i = 1; i <= profileCount; i++) {
                    const profile = document.getElementById(`profile-${i}`);
                    if (!profile) continue;

                    // Get profile details
                    const profileName = profile.querySelector(`input[name="profiles[${i}][name]"]`)?.value || `Profile #${i}`;
                    const profileTitle = profile.querySelector(`input[name="profiles[${i}][title]"]`)?.value || 'No title';
                    const accessPolicyRadio = profile.querySelector(`input[name="profiles[${i}][access_policy]"]:checked`);
                    const accessPolicy = accessPolicyRadio ? accessPolicyRadio.value : 'Not selected';

                    // Get enabled login fields
                    const enabledFields = [];
                    ['firstname', 'lastname', 'gender', 'birthday', 'email', 'mobile'].forEach(field => {
                        const checkbox = profile.querySelector(`input[name="profiles[${i}][${field}][enabled]"]`);
                        if (checkbox && checkbox.checked) {
                            enabledFields.push(field.charAt(0).toUpperCase() + field.slice(1));
                        }
                    });

                    // Get verification settings
                    const verifications = [];
                    if (profile.querySelector(`input[name="profiles[${i}][email_verification]"]`)?.checked) {
                        verifications.push('Email OTP');
                    }
                    if (profile.querySelector(`input[name="profiles[${i}][whatsapp_verification]"]`)?.checked) {
                        verifications.push('WhatsApp OTP');
                    }

                    // Get checkbox configurations
                    const enabledCheckboxes = [];
                    for (let j = 1; j <= 3; j++) {
                        const checkboxEnabled = profile.querySelector(`input[name="profiles[${i}][checkbox${j}][enabled]"]`);
                        if (checkboxEnabled && checkboxEnabled.checked) {
                            const checkboxLabel = profile.querySelector(`input[name="profiles[${i}][checkbox${j}][label]"]`)
                                ?.value;
                            const isRequired = profile.querySelector(`input[name="profiles[${i}][checkbox${j}][required]"]`)
                                ?.checked;
                            const checkboxName = ['Terms & Conditions', 'Data Privacy', 'Marketing Consent'][j - 1];
                            enabledCheckboxes.push({
                                name: checkboxName,
                                label: checkboxLabel || checkboxName,
                                required: isRequired
                            });
                        }
                    }

                    // Get access policy settings
                    let policySettings = '';
                    if (accessPolicy === 'open') {
                        const dailyLimitEnabled = profile.querySelector(`input[name="profiles[${i}][daily_limit_enabled]"]`)
                            ?.checked;
                        const speedLimitEnabled = profile.querySelector(`input[name="profiles[${i}][speed_limit_enabled]"]`)
                            ?.checked;

                        const settings = [];
                        if (dailyLimitEnabled) {
                            const sessionLimit = profile.querySelector(`input[name="profiles[${i}][session_limit]"]`)?.value;
                            settings.push(`Session: ${sessionLimit || 'Not set'} min`);
                        }
                        if (speedLimitEnabled) {
                            const bandwidthLimit = profile.querySelector(`input[name="profiles[${i}][bandwidth_limit]"]`)
                                ?.value;
                            settings.push(`Bandwidth: ${bandwidthLimit || 'Not set'} Mbps`);
                        }
                        policySettings = settings.length > 0 ? settings.join(', ') : 'No limits';
                    } else if (accessPolicy === 'account') {
                        const voucherEnabled = profile.querySelector(`input[name="profiles[${i}][voucher_enabled]"]`)?.checked;
                        const passwordEnabled = profile.querySelector(`input[name="profiles[${i}][password_enabled]"]`)
                            ?.checked;

                        const methods = [];
                        if (voucherEnabled) methods.push('Voucher');
                        if (passwordEnabled) methods.push('Password');
                        policySettings = methods.length > 0 ? methods.join(' + ') : 'No methods';
                    }

                    // Create review card
                    const reviewItem = document.createElement('div');
                    reviewItem.className = 'bg-gray-50 p-4 rounded-lg border border-gray-200 hover:border-blue-300 transition-all';
                    reviewItem.innerHTML = `
                    <div class="space-y-3">
                        <!-- Header -->
                        <div class="flex items-start justify-between">
                            <div class="flex-1">
                                <div class="flex items-center gap-2 mb-1">
                                    <h5 class="text-sm font-bold text-gray-900">${profileName}</h5>
                                    ${i === 1 ? '<span class="px-2 py-0.5 bg-blue-100 text-blue-700 text-xs rounded-full font-semibold">Required</span>' : ''}
                                </div>
                                <p class="text-xs text-gray-600">${profileTitle}</p>
                            </div>
                        </div>

                        <!-- Access Policy -->
                        <div class="bg-white p-2 rounded border border-gray-200">
                            <div class="flex items-center gap-2 mb-1">
                                ${accessPolicy === 'open' 
                                    ? '<svg class="w-3 h-3 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z"></path></svg>'
                                    : accessPolicy === 'account'
                                    ? '<svg class="w-3 h-3 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>'
                                    : '<svg class="w-3 h-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>'
                                }
                                <span class="text-xs font-semibold text-gray-600">Access Policy</span>
                            </div>
                            <p class="text-xs ${accessPolicy === 'open' ? 'text-green-700' : accessPolicy === 'account' ? 'text-purple-700' : 'text-gray-700'}">
                                ${accessPolicy === 'open' ? 'Open Access' : accessPolicy === 'account' ? 'Controlled Access' : 'Not Selected'}
                            </p>
                            ${policySettings ? `<p class="text-xs text-gray-500 mt-1">${policySettings}</p>` : ''}
                        </div>

                        <!-- Login Fields -->
                        ${enabledFields.length > 0 ? `
                        <div class="bg-blue-50 p-2 rounded border border-blue-200">
                            <p class="text-xs font-semibold text-blue-800 mb-1">Login Fields</p>
                            <p class="text-xs text-blue-700">${enabledFields.join(', ')}</p>
                        </div>
                        ` : ''}

                        <!-- Verifications -->
                        ${verifications.length > 0 ? `
                        <div class="bg-amber-50 p-2 rounded border border-amber-200">
                            <p class="text-xs font-semibold text-amber-800 mb-1">Verification</p>
                            <p class="text-xs text-amber-700">${verifications.join(', ')}</p>
                        </div>
                        ` : ''}

                        <!-- Checkboxes -->
                        ${enabledCheckboxes.length > 0 ? `
                        <div class="bg-green-50 p-2 rounded border border-green-200">
                            <p class="text-xs font-semibold text-green-800 mb-1">Checkboxes</p>
                            <ul class="space-y-1">
                                ${enabledCheckboxes.map(cb => `
                                    <li class="text-xs text-green-700 flex items-center gap-1">
                                        <span class="w-1.5 h-1.5 rounded-full ${cb.required ? 'bg-red-500' : 'bg-green-400'}"></span>
                                        ${cb.label} ${cb.required ? '<span class="text-red-600">(Req)</span>' : ''}
                                    </li>
                                `).join('')}
                            </ul>
                        </div>
                        ` : ''}
                    </div>
                `;
                    reviewList.appendChild(reviewItem);
                }
            }

            function editProfile(profileId) {
                const profile = document.getElementById(`profile-${profileId}`);
                if (profile) {
                    profile.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });
                    profile.classList.add('ring-4', 'ring-blue-300');
                    setTimeout(() => {
                        profile.classList.remove('ring-4', 'ring-blue-300');
                    }, 2000);
                }
            }

            // Profile management functions
            function toggleCheckboxContent(profileId, checkboxNumber) {
                const checkbox = document.getElementById(`profile-${profileId}-checkbox-${checkboxNumber}-enabled`);
                const content = document.getElementById(`profile-${profileId}-checkbox-${checkboxNumber}-content`);

                if (checkbox && content) {
                    if (checkbox.checked) {
                        content.classList.remove('hidden');
                    } else {
                        content.classList.add('hidden');
                    }
                }

                // Update review on toggle
                updateProfileReview();
            }

            function addProfile() {
                profileCount++;
                const profilesList = document.getElementById('profiles-list');

                if (!profilesList) return;

                const isFirst = profileCount === 1;

                const profileCard = document.createElement('div');
                profileCard.id = `profile-${profileCount}`;
                profileCard.className =
                    `profile-card bg-gray-50 rounded-lg border-2 border-gray-200 overflow-hidden ${isFirst ? 'cannot-remove' : ''}`;

                profileCard.innerHTML = `
                <div class="p-6 space-y-6">
                    <div class="flex items-center justify-between">
                        <h4 class="text-base font-semibold text-gray-900 flex items-center gap-2">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Profile #${profileCount}
                            ${isFirst ? '<span class="ml-2 px-2 py-1 bg-blue-100 text-blue-700 text-xs rounded-full">Required</span>' : ''}
                        </h4>
                        ${!isFirst ? `
                        <button type="button" onclick="removeProfile(${profileCount})" 
                            class="text-red-600 hover:text-red-800 p-2 hover:bg-red-50 rounded-lg transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>
                        ` : ''}
                    </div>

                    <!-- Profile Name -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Profile Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="profiles[${profileCount}][name]" required 
                            placeholder="e.g., Guest Access, Premium WiFi"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                    </div>

                    <!-- Profile Title -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Title (Display Name) <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="profiles[${profileCount}][title]" required 
                            placeholder="e.g., Connect to Free WiFi"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                    </div>

                    <!-- Login Fields Configuration -->
                    <div class="border-t border-gray-300 pt-4">
                        <h5 class="text-sm font-semibold text-gray-700 mb-4">Login Fields</h5>
                        <div class="space-y-3">
                            <!-- First Name -->
                            <div class="flex items-center justify-between p-3 bg-gray-50 border border-gray-200 rounded-lg">
                                <div>
                                    <label class="text-sm font-medium text-gray-700">First Name</label>
                                    <p class="text-xs text-gray-500 mt-1">Collect user's first name</p>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" 
                                           name="profiles[${profileCount}][firstname][enabled]" 
                                           value="1" 
                                           class="sr-only peer">
                                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                    <span class="ml-3 text-sm font-medium text-gray-700">Enable</span>
                                </label>
                            </div>

                            <!-- Last Name -->
                            <div class="flex items-center justify-between p-3 bg-gray-50 border border-gray-200 rounded-lg">
                                <div>
                                    <label class="text-sm font-medium text-gray-700">Last Name</label>
                                    <p class="text-xs text-gray-500 mt-1">Collect user's last name</p>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" 
                                           name="profiles[${profileCount}][lastname][enabled]" 
                                           value="1" 
                                           class="sr-only peer">
                                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                    <span class="ml-3 text-sm font-medium text-gray-700">Enable</span>
                                </label>
                            </div>

                            <!-- Gender -->
                            <div class="flex items-center justify-between p-3 bg-gray-50 border border-gray-200 rounded-lg">
                                <div>
                                    <label class="text-sm font-medium text-gray-700">Gender</label>
                                    <p class="text-xs text-gray-500 mt-1">Collect user's gender</p>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" 
                                           name="profiles[${profileCount}][gender][enabled]" 
                                           value="1" 
                                           class="sr-only peer">
                                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                    <span class="ml-3 text-sm font-medium text-gray-700">Enable</span>
                                </label>
                            </div>

                            <!-- Birthday -->
                            <div class="flex items-center justify-between p-3 bg-gray-50 border border-gray-200 rounded-lg">
                                <div>
                                    <label class="text-sm font-medium text-gray-700">Birthday</label>
                                    <p class="text-xs text-gray-500 mt-1">Collect user's date of birth</p>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" 
                                           name="profiles[${profileCount}][birthday][enabled]" 
                                           value="1" 
                                           class="sr-only peer">
                                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                    <span class="ml-3 text-sm font-medium text-gray-700">Enable</span>
                                </label>
                            </div>

                            <!-- Email -->
                            <div class="flex items-center justify-between p-3 bg-gray-50 border border-gray-200 rounded-lg">
                                <div>
                                    <label class="text-sm font-medium text-gray-700">Email</label>
                                    <p class="text-xs text-gray-500 mt-1">Collect user's email address</p>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" 
                                           name="profiles[${profileCount}][email][enabled]" 
                                           value="1" 
                                           class="sr-only peer">
                                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                    <span class="ml-3 text-sm font-medium text-gray-700">Enable</span>
                                </label>
                            </div>

                            <!-- Mobile -->
                            <div class="flex items-center justify-between p-3 bg-gray-50 border border-gray-200 rounded-lg">
                                <div>
                                    <label class="text-sm font-medium text-gray-700">Mobile</label>
                                    <p class="text-xs text-gray-500 mt-1">Collect user's mobile number</p>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" 
                                           name="profiles[${profileCount}][mobile][enabled]" 
                                           value="1" 
                                           class="sr-only peer">
                                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                    <span class="ml-3 text-sm font-medium text-gray-700">Enable</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Advanced Verification -->
                    <div class="border-t border-gray-300 pt-4">
                        <h5 class="text-sm font-semibold text-gray-700 mb-4">Advanced Verification</h5>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Email Verification -->
                            <div>
                                <label class="flex items-center justify-between mb-2">
                                    <span class="text-sm font-medium text-gray-700">Email Verification</span>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" name="profiles[${profileCount}][email_verification]" 
                                            value="1" class="sr-only peer">
                                        <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-blue-600"></div>
                                        <span class="ml-2 text-xs text-gray-600">Enable</span>
                                    </label>
                                </label>
                                <p class="text-xs text-gray-500">Require email verification via OTP</p>
                            </div>

                            <!-- WhatsApp Verification -->
                            <div>
                                <label class="flex items-center justify-between mb-2">
                                    <span class="text-sm font-medium text-gray-700">WhatsApp Verification</span>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" name="profiles[${profileCount}][whatsapp_verification]" 
                                            value="1" class="sr-only peer">
                                        <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-blue-600"></div>
                                        <span class="ml-2 text-xs text-gray-600">Enable</span>
                                    </label>
                                </label>
                                <p class="text-xs text-gray-500">Require WhatsApp verification via OTP</p>
                            </div>
                        </div>
                    </div>

                    <!-- Checkboxes Configuration (Profile Level) -->
                    ${generateCheckboxFields(profileCount)}

                    <!-- Access Policy Selection -->
                    <div class="border-t border-gray-300 pt-4">
                        <label class="block text-sm font-medium text-gray-700 mb-3">
                            Access Policy <span class="text-red-500">*</span>
                        </label>
                        <div class="access-type-selector">
                            <div class="access-type-option border-2 border-gray-300 rounded-lg p-4 hover:border-blue-400" 
                                onclick="selectAccessType(${profileCount}, 'open')">
                                <input type="radio" name="profiles[${profileCount}][access_policy]" 
                                    value="open" id="profile-${profileCount}-open" required class="hidden">
                                <label for="profile-${profileCount}-open" class="cursor-pointer flex flex-col items-center text-center">
                                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mb-3">
                                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                        </svg>
                                    </div>
                                    <h5 class="font-semibold text-gray-900 mb-1">Open Access</h5>
                                    <p class="text-xs text-gray-600">Free access with form submission</p>
                                </label>
                            </div>

                            <div class="access-type-option border-2 border-gray-300 rounded-lg p-4 hover:border-blue-400" 
                                onclick="selectAccessType(${profileCount}, 'account')">
                                <input type="radio" name="profiles[${profileCount}][access_policy]" 
                                    value="account" id="profile-${profileCount}-account" required class="hidden">
                                <label for="profile-${profileCount}-account" class="cursor-pointer flex flex-col items-center text-center">
                                    <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mb-3">
                                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                    </div>
                                    <h5 class="font-semibold text-gray-900 mb-1">Controlled Access</h5>
                                    <p class="text-xs text-gray-600">Requires voucher or password</p>
                                </label>
                            </div>
                        </div>

                        <!-- Open Access Settings -->
                        <div id="access-policy-open-${profileCount}" class="hidden mt-4">
                            <div class="p-4 bg-green-50 border border-green-200 rounded-lg space-y-4">
                                <h5 class="text-sm font-semibold text-green-800 mb-3">Open Access Settings</h5>
                                
                                <!-- Daily Limit -->
                                <div class="config-option bg-white p-4 rounded-lg border border-gray-200">
                                    <div class="flex items-center justify-between mb-3">
                                        <label class="text-sm font-medium text-gray-700">Daily Limit</label>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" 
                                                id="profile-${profileCount}-daily-limit-toggle"
                                                name="profiles[${profileCount}][daily_limit_enabled]" 
                                                value="1" 
                                                onchange="toggleDailyLimit(${profileCount})" 
                                                class="sr-only peer">
                                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                            <span class="ml-3 text-sm font-medium text-gray-700">Enable</span>
                                        </label>
                                    </div>
                                    
                                    <div id="daily-limit-input-${profileCount}" class="hidden">
                                        <label class="block text-xs font-medium text-gray-600 mb-2">Session Limit (minutes)</label>
                                        <input type="number" name="profiles[${profileCount}][session_limit]" min="0" 
                                            placeholder="e.g., 60"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                    </div>
                                </div>

                                <!-- Speed Limit -->
                                <div class="config-option bg-white p-4 rounded-lg border border-gray-200">
                                    <div class="flex items-center justify-between mb-3">
                                        <label class="text-sm font-medium text-gray-700">Speed Limit</label>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" 
                                                id="profile-${profileCount}-speed-limit-toggle"
                                                name="profiles[${profileCount}][speed_limit_enabled]" 
                                                value="1" 
                                                onchange="toggleSpeedLimit(${profileCount})" 
                                                class="sr-only peer">
                                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                            <span class="ml-3 text-sm font-medium text-gray-700">Enable</span>
                                        </label>
                                    </div>
                                    
                                    <div id="speed-limit-input-${profileCount}" class="hidden">
                                        <label class="block text-xs font-medium text-gray-600 mb-2">Bandwidth Limit (Mbps)</label>
                                        <input type="number" name="profiles[${profileCount}][bandwidth_limit]" min="0" step="0.1"
                                            placeholder="e.g., 10"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Account Access Settings -->
                        <div id="access-policy-account-${profileCount}" class="hidden mt-4">
                            <div class="p-4 bg-purple-50 border border-purple-200 rounded-lg space-y-4">
                                <h5 class="text-sm font-semibold text-purple-800 mb-3">Account Access Settings</h5>
                                
                                <!-- Enable Voucher -->
                                <div class="config-option bg-white p-4 rounded-lg border border-gray-200">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <label class="text-sm font-medium text-gray-700">Enable Voucher</label>
                                            <p class="text-xs text-gray-500 mt-1">Allow users to login with voucher codes</p>
                                        </div>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" name="profiles[${profileCount}][voucher_enabled]" 
                                                value="1" class="sr-only peer">
                                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                            <span class="ml-3 text-sm font-medium text-gray-700">Enable</span>
                                        </label>
                                    </div>
                                </div>

                                <!-- Enable Password -->
                                <div class="config-option bg-white p-4 rounded-lg border border-gray-200">
                                    <div class="flex items-center justify-between mb-3">
                                        <div>
                                            <label class="text-sm font-medium text-gray-700">Enable Password</label>
                                            <p class="text-xs text-gray-500 mt-1">Allow users to login with a password</p>
                                        </div>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" id="profile-${profileCount}-password-enabled" 
                                                name="profiles[${profileCount}][password_enabled]" 
                                                value="1" onchange="togglePasswordInput(${profileCount})" class="sr-only peer">
                                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                            <span class="ml-3 text-sm font-medium text-gray-700">Enable</span>
                                        </label>
                                    </div>
                                    
                                    <div id="password-input-${profileCount}" class="hidden mt-3">
                                        <label class="block text-xs font-medium text-gray-600 mb-2">Password</label>
                                        <input type="password" name="profiles[${profileCount}][access_password]" 
                                            placeholder="Enter access password"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                        <p class="text-xs text-gray-500 mt-1">Users will need to enter this password to access the network</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;

                profilesList.appendChild(profileCard);

                // Update review immediately after adding profile
                updateProfileReview();
                updatePreviewFields();
            }

            function generateCheckboxFields(profileId) {
                let html = `
    <div class="border-t border-gray-300 pt-4">
        <h5 class="text-sm font-semibold text-gray-700 mb-4">Checkboxes Configuration</h5>
        <p class="text-xs text-gray-500 mb-4">Configure optional checkboxes with individual requirement settings</p>
`;

                const checkboxLabels = ['Terms & Conditions', 'Data Privacy', 'Marketing Consent'];

                for (let i = 1; i <= checkboxLabels.length; i++) {
                    html += `
        <div class="mb-4 p-4 bg-gray-50 border border-gray-200 rounded-lg">
            <div class="flex items-center justify-between mb-3">
                <label class="text-sm font-medium text-gray-700">Checkbox ${i} - ${checkboxLabels[i-1]}</label>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" 
                           id="profile-${profileId}-checkbox-${i}-enabled" 
                           name="profiles[${profileId}][checkbox${i}][enabled]" 
                           value="1"
                           onchange="toggleCheckboxContent(${profileId}, ${i})" 
                           class="sr-only peer">
                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                    <span class="ml-3 text-sm font-medium text-gray-700">Enable</span>
                </label>
            </div>
            
            <div id="profile-${profileId}-checkbox-${i}-content" class="hidden space-y-3">
                <!-- Checkbox Label -->
                <div>
                    <label class="block text-xs font-medium text-gray-600 mb-1">Checkbox Label</label>
                    <input type="text" 
                           name="profiles[${profileId}][checkbox${i}][label]" 
                           placeholder="e.g., I agree to ${checkboxLabels[i-1].toLowerCase()}" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                </div>
                
                <!-- Checkbox Content -->
                <div>
                    <label class="block text-xs font-medium text-gray-600 mb-1">${checkboxLabels[i-1]} Content</label>
                    <textarea name="profiles[${profileId}][checkbox${i}][content]" 
                              rows="4" 
                              placeholder="Enter ${checkboxLabels[i-1].toLowerCase()} content here..." 
                              class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"></textarea>
                </div>
                
                <!-- Require Toggle -->
                <div class="flex items-center justify-between p-3 bg-blue-50 border border-blue-200 rounded-lg">
                    <div>
                        <label class="text-sm font-medium text-gray-700">Required Field</label>
                        <p class="text-xs text-gray-500 mt-1">Make this checkbox mandatory for users</p>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" 
                               id="profile-${profileId}-checkbox-${i}-required" 
                               name="profiles[${profileId}][checkbox${i}][required]" 
                               value="1"
                               class="sr-only peer">
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                        <span class="ml-3 text-sm font-medium text-gray-700">Require</span>
                    </label>
                </div>
            </div>
        </div>
    `;
                }

                html += `</div>`;
                return html;
            }

            function selectAccessType(profileId, type) {
                const radio = document.getElementById(`profile-${profileId}-${type}`);
                if (radio) {
                    radio.checked = true;
                }

                // Update visual selection
                const container = radio.closest('.access-type-selector');
                if (container) {
                    container.querySelectorAll('.access-type-option').forEach(opt => {
                        opt.classList.remove('selected');
                    });
                    radio.closest('.access-type-option').classList.add('selected');
                }

                // Show/hide policy sections based on type
                const openPolicyContainer = document.getElementById(`access-policy-open-${profileId}`);
                const accountPolicyContainer = document.getElementById(`access-policy-account-${profileId}`);

                if (openPolicyContainer && accountPolicyContainer) {
                    if (type === 'open') {
                        openPolicyContainer.classList.remove('hidden');
                        accountPolicyContainer.classList.add('hidden');
                    } else if (type === 'account') {
                        openPolicyContainer.classList.add('hidden');
                        accountPolicyContainer.classList.remove('hidden');
                    }
                }

                // Update review on access type change
                updateProfileReview();
            }

            function togglePasswordInput(profileId) {
                const passwordInput = document.getElementById(`password-input-${profileId}`);
                const checkbox = document.getElementById(`profile-${profileId}-password-enabled`);

                if (checkbox && passwordInput) {
                    if (checkbox.checked) {
                        passwordInput.classList.remove('hidden');
                    } else {
                        passwordInput.classList.add('hidden');
                    }
                }

                updateProfileReview();
            }

            function toggleDailyLimit(profileId) {
                const dailyLimitInput = document.getElementById(`daily-limit-input-${profileId}`);
                const checkbox = document.getElementById(`profile-${profileId}-daily-limit-toggle`);

                if (checkbox && dailyLimitInput) {
                    if (checkbox.checked) {
                        dailyLimitInput.classList.remove('hidden');
                    } else {
                        dailyLimitInput.classList.add('hidden');
                    }
                }

                updateProfileReview();
            }

            function toggleSpeedLimit(profileId) {
                const speedLimitInput = document.getElementById(`speed-limit-input-${profileId}`);
                const checkbox = document.getElementById(`profile-${profileId}-speed-limit-toggle`);

                if (checkbox && speedLimitInput) {
                    if (checkbox.checked) {
                        speedLimitInput.classList.remove('hidden');
                    } else {
                        speedLimitInput.classList.add('hidden');
                    }
                }

                updateProfileReview();
            }

            function removeProfile(profileId) {
                const profile = document.getElementById(`profile-${profileId}`);
                if (profile && !profile.classList.contains('cannot-remove')) {
                    if (confirm('Are you sure you want to remove this profile?')) {
                        profile.remove();
                        updateProfileReview();
                        updatePreviewFields();
                    }
                }
            }

            // Language management
            let languages = {
                'en': 'English (Default)'
            };
            let currentLanguage = 'en';

            function addLanguage() {
                const languageSelector = document.getElementById('language-selector');
                const selectedLang = languageSelector.value;
                const selectedLangText = languageSelector.options[languageSelector.selectedIndex].text;

                if (document.querySelector(`[data-lang="${selectedLang}"]`)) {
                    alert(`${selectedLangText} is already added.`);
                    return;
                }

                languages[selectedLang] = selectedLangText;

                const langTabs = document.getElementById('language-tabs');
                const newTab = document.createElement('li');
                newTab.className = 'mr-2';
                newTab.innerHTML = `
                <a href="#" class="language-tab inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300" data-lang="${selectedLang}">${selectedLangText}</a>
            `;
                langTabs.appendChild(newTab);

                const englishContent = document.getElementById('lang-content-en');
                const newContent = englishContent.cloneNode(true);
                newContent.id = `lang-content-${selectedLang}`;
                newContent.classList.remove('active');

                const inputs = newContent.querySelectorAll('input, textarea');
                inputs.forEach(input => {
                    const originalName = input.getAttribute('name');
                    const originalId = input.getAttribute('id');

                    if (originalName) {
                        input.setAttribute('name', `${originalName}_${selectedLang}`);
                    }

                    if (originalId) {
                        input.setAttribute('id', `${originalId}_${selectedLang}`);
                    }

                    input.value = '';
                });

                const labels = newContent.querySelectorAll('label');
                labels.forEach(label => {
                    const forAttr = label.getAttribute('for');
                    if (forAttr) {
                        label.setAttribute('for', `${forAttr}_${selectedLang}`);
                    }
                });

                document.getElementById('language-contents').appendChild(newContent);
                addTabEventListeners();
            }

            function switchLanguage(langCode) {
                document.querySelectorAll('.language-content').forEach(panel => {
                    panel.classList.remove('active');
                });

                document.getElementById(`lang-content-${langCode}`).classList.add('active');

                document.querySelectorAll('.language-tab').forEach(tab => {
                    tab.classList.remove('active', 'text-blue-600', 'border-blue-600');
                    tab.classList.add('border-transparent');
                });

                document.querySelector(`.language-tab[data-lang="${langCode}"]`).classList.add('active', 'text-blue-600',
                    'border-blue-600');
                document.querySelector(`.language-tab[data-lang="${langCode}"]`).classList.remove('border-transparent');

                currentLanguage = langCode;
            }

            function addTabEventListeners() {
                document.querySelectorAll('.language-tab').forEach(tab => {
                    tab.addEventListener('click', function(e) {
                        e.preventDefault();
                        const langCode = this.getAttribute('data-lang');
                        switchLanguage(langCode);
                    });
                });
            }

            function bindSliderToNumber(sliderId, numberId, defaultValue) {
                const slider = document.getElementById(sliderId);
                const number = document.getElementById(numberId);
                if (!slider || !number) return;
                if (defaultValue !== undefined && !number.value) number.value = defaultValue;
                slider.addEventListener('input', () => number.value = slider.value);
                number.addEventListener('input', () => {
                    let v = Math.max(0, Math.min(100, parseInt(number.value || 0)));
                    number.value = v;
                    slider.value = v;
                });
            }
        </script>
    </x-slot>

</x-main-layout>
