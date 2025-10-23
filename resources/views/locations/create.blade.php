<x-main-layout>
    <x-slot name="style">
        <style>
            .dropdown-results {
                max-height: 250px;
                overflow-y: auto;
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

            .config-option.selected {
                border-color: #3B82F6;
                background-color: #EFF6FF;
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
            <form action="{{ route('locations.store') }}" method="POST" enctype="multipart/form-data"
                class="space-y-6">
                @csrf

                <!-- Basic Details Card -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                    <div class="bg-gradient-to-r from-blue-500 to-blue-600 px-6 py-4">
                        <h3 class="text-lg font-semibold text-white flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Basic Details
                        </h3>
                    </div>

                    <div class="p-6 space-y-4">
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
                            <p class="text-xs text-gray-500 mt-1">Example: 40.7128, -74.0060 or "Times Square, New York"
                            </p>
                        </div>

                        <!-- Timezone & Gateway -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="timezone" class="block text-sm font-medium text-gray-700 mb-2">
                                    Timezone <span class="text-red-500">*</span>
                                </label>
                                <select id="timezone" name="timezone" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                    <option value="">Select timezone</option>
                                    <option value="UTC">UTC</option>
                                    <option value="America/New_York">America/New York</option>
                                    <option value="Europe/London">Europe/London</option>
                                    <option value="Asia/Tokyo">Asia/Tokyo</option>
                                </select>
                            </div>

                            <div>
                                <label for="gateway" class="block text-sm font-medium text-gray-700 mb-2">
                                    Gateway <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="gateway" name="gateway" required
                                    placeholder="e.g., 192.168.1.1"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                            </div>
                        </div>

                        <!-- Username, Password, Type -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label for="username" class="block text-sm font-medium text-gray-700 mb-2">
                                    Username
                                </label>
                                <input type="text" id="username" name="username" placeholder="Gateway username"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                            </div>

                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                                    Password
                                </label>
                                <input type="password" id="password" name="password" placeholder="Gateway password"
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

                        <!-- Post URL -->
                        <div>
                            <label for="post-url" class="block text-sm font-medium text-gray-700 mb-2">
                                Post URL
                            </label>
                            <input type="url" id="post-url" name="post_url"
                                placeholder="https://example.com/api/auth"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                        </div>

                        <!-- Note -->
                        <div>
                            <label for="note" class="block text-sm font-medium text-gray-700 mb-2">
                                Note
                            </label>
                            <textarea id="note" name="note" rows="3" placeholder="Add notes about this location..."
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"></textarea>
                        </div>
                    </div>
                </div>

                <!-- Brand Configuration Card -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                    <div class="bg-gradient-to-r from-purple-500 to-purple-600 px-6 py-4">
                        <h3 class="text-lg font-semibold text-white flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01">
                                </path>
                            </svg>
                            Brand Configuration
                        </h3>
                    </div>

                    <div class="p-6 space-y-6">
                        <!-- Logo -->
                        <div>
                            <label for="logo" class="block text-sm font-medium text-gray-700 mb-2">
                                Logo
                            </label>
                            <input type="file" id="logo" name="logo" accept="image/*"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                        </div>

                        <!-- Headline & Subheading -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="headline" class="block text-sm font-medium text-gray-700 mb-2">
                                    Headline
                                </label>
                                <input type="text" id="headline" name="headline"
                                    placeholder="Welcome to our WiFi"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                            </div>

                            <div>
                                <label for="subheading" class="block text-sm font-medium text-gray-700 mb-2">
                                    Subheading
                                </label>
                                <input type="text" id="subheading" name="subheading"
                                    placeholder="Connect and enjoy"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                            </div>
                        </div>

                        <!-- Color Pickers -->
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                            <div>
                                <label for="primary-color" class="block text-sm font-medium text-gray-700 mb-2">
                                    Primary Brand Color
                                </label>
                                <input type="color" id="primary-color" name="primary_color" value="#3B82F6"
                                    class="w-full h-10 border border-gray-300 rounded cursor-pointer">
                            </div>

                            <div>
                                <label for="secondary-color" class="block text-sm font-medium text-gray-700 mb-2">
                                    Secondary Brand Color
                                </label>
                                <input type="color" id="secondary-color" name="secondary_color" value="#8B5CF6"
                                    class="w-full h-10 border border-gray-300 rounded cursor-pointer">
                            </div>

                            <div>
                                <label for="background-color" class="block text-sm font-medium text-gray-700 mb-2">
                                    Background Color
                                </label>
                                <input type="color" id="background-color" name="background_color" value="#FFFFFF"
                                    class="w-full h-10 border border-gray-300 rounded cursor-pointer">
                            </div>
                        </div>

                        <!-- Background Image & Favicon -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="background-image" class="block text-sm font-medium text-gray-700 mb-2">
                                    Background Image
                                </label>
                                <input type="file" id="background-image" name="background_image" accept="image/*"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                            </div>

                            <div>
                                <label for="favicon" class="block text-sm font-medium text-gray-700 mb-2">
                                    Favicon
                                </label>
                                <input type="file" id="favicon" name="favicon" accept="image/x-icon,image/png"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                            </div>
                        </div>

                        <!-- Redirection URL & Font Family -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="redirection-url" class="block text-sm font-medium text-gray-700 mb-2">
                                    Redirection URL
                                </label>
                                <input type="url" id="redirection-url" name="redirection_url"
                                    placeholder="https://example.com"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                            </div>

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
                </div>

                <!-- Text & Translation Card (Location Level) -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                    <div class="bg-gradient-to-r from-orange-500 to-orange-600 px-6 py-4">
                        <h3 class="text-lg font-semibold text-white flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129">
                                </path>
                            </svg>
                            Text & Translation
                        </h3>
                    </div>

                    <div class="p-6 space-y-4">
                        <p class="text-sm text-gray-500 mb-4">Configure default text labels and translations for all
                            forms at this location</p>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Headline -->
                            <div>
                                <label for="text-headline" class="block text-sm font-medium text-gray-700 mb-2">
                                    Headline
                                </label>
                                <input type="text" id="text-headline" name="text_headline"
                                    placeholder="e.g., Welcome!"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                            </div>

                            <!-- Subheading -->
                            <div>
                                <label for="text-subheading" class="block text-sm font-medium text-gray-700 mb-2">
                                    Subheading
                                </label>
                                <input type="text" id="text-subheading" name="text_subheading"
                                    placeholder="e.g., Connect to WiFi"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                            </div>

                            <!-- First Name -->
                            <div>
                                <label for="text-first-name" class="block text-sm font-medium text-gray-700 mb-2">
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
                                    name="text_first_name_placeholder" placeholder="e.g., Enter first name"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                            </div>

                            <!-- Last Name -->
                            <div>
                                <label for="text-last-name" class="block text-sm font-medium text-gray-700 mb-2">
                                    Last Name
                                </label>
                                <input type="text" id="text-last-name" name="text_last_name"
                                    placeholder="e.g., Last Name"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                            </div>

                            <!-- Last Name Placeholder -->
                            <div>
                                <label for="text-last-name-placeholder"
                                    class="block text-sm font-medium text-gray-700 mb-2">
                                    Last Name Placeholder
                                </label>
                                <input type="text" id="text-last-name-placeholder"
                                    name="text_last_name_placeholder" placeholder="e.g., Enter last name"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                            </div>

                            <!-- Gender -->
                            <div>
                                <label for="text-gender" class="block text-sm font-medium text-gray-700 mb-2">
                                    Gender
                                </label>
                                <input type="text" id="text-gender" name="text_gender" placeholder="e.g., Gender"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="text-email" class="block text-sm font-medium text-gray-700 mb-2">
                                    Email
                                </label>
                                <input type="text" id="text-email" name="text_email" placeholder="e.g., Email"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                            </div>

                            <!-- Email Placeholder -->
                            <div>
                                <label for="text-email-placeholder"
                                    class="block text-sm font-medium text-gray-700 mb-2">
                                    Email Placeholder
                                </label>
                                <input type="text" id="text-email-placeholder" name="text_email_placeholder"
                                    placeholder="e.g., Enter email"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                            </div>

                            <!-- Mobile -->
                            <div>
                                <label for="text-mobile" class="block text-sm font-medium text-gray-700 mb-2">
                                    Mobile
                                </label>
                                <input type="text" id="text-mobile" name="text_mobile" placeholder="e.g., Mobile"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                            </div>

                            <!-- Mobile Placeholder -->
                            <div>
                                <label for="text-mobile-placeholder"
                                    class="block text-sm font-medium text-gray-700 mb-2">
                                    Mobile Placeholder
                                </label>
                                <input type="text" id="text-mobile-placeholder" name="text_mobile_placeholder"
                                    placeholder="e.g., Enter mobile number"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                            </div>

                            <!-- Connect Button -->
                            <div>
                                <label for="text-connect-button" class="block text-sm font-medium text-gray-700 mb-2">
                                    Connect Button
                                </label>
                                <input type="text" id="text-connect-button" name="text_connect_button"
                                    placeholder="e.g., Connect"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
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
                </div>

                <!-- Authentication Profiles Card -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                    <div class="bg-gradient-to-r from-green-500 to-green-600 px-6 py-4">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-semibold text-white flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                Authentication Profiles
                            </h3>
                            <button type="button" onclick="addProfile()"
                                class="px-4 py-2 bg-white text-green-600 rounded-lg hover:bg-green-50 transition-colors flex items-center gap-2 text-sm font-semibold">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Add Profile
                            </button>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="mb-4 p-4 bg-blue-50 border border-blue-200 rounded-lg">
                            <p class="text-sm text-blue-800 flex items-start gap-2">
                                <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span><strong>At least one profile is required.</strong> Each profile can use either
                                    Open Access or Voucher-based authentication.</span>
                            </p>
                        </div>

                        <!-- Profiles List -->
                        <div id="profiles-list" class="space-y-4"></div>
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
            let profileCount = 0;

            // Auto-add first profile on load
            document.addEventListener('DOMContentLoaded', function() {
                addProfile();
            });

            // Toggle checkbox content visibility
            function toggleCheckboxContent(profileId, checkboxNumber) {
                const checkbox = document.getElementById(`profile-${profileId}-checkbox-${checkboxNumber}-enabled`);
                const content = document.getElementById(`profile-${profileId}-checkbox-${checkboxNumber}-content`);

                if (checkbox.checked) {
                    content.classList.remove('hidden');
                } else {
                    content.classList.add('hidden');
                }
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

                        <!-- Access Policy Selection -->
                        <div>
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
                                    onclick="selectAccessType(${profileCount}, 'voucher')">
                                    <input type="radio" name="profiles[${profileCount}][access_policy]" 
                                        value="voucher" id="profile-${profileCount}-voucher" required class="hidden">
                                    <label for="profile-${profileCount}-voucher" class="cursor-pointer flex flex-col items-center text-center">
                                        <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mb-3">
                                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                    d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path>
                                            </svg>
                                        </div>
                                        <h5 class="font-semibold text-gray-900 mb-1">Voucher Based</h5>
                                        <p class="text-xs text-gray-600">Requires valid voucher code</p>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Access Policy Settings (Only for Open Access) -->
                        <div id="access-policy-${profileCount}" class="hidden">
                            <div class="p-4 bg-green-50 border border-green-200 rounded-lg space-y-4">
                                <h5 class="text-sm font-semibold text-green-800 mb-3">Open Access Settings</h5>
                                
                                <!-- Daily Limit -->
                                <div class="config-option bg-white p-4 rounded-lg border border-gray-200">
                                    <div class="flex items-center justify-between mb-3">
                                        <label class="text-sm font-medium text-gray-700">Daily Limit</label>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" name="profiles[${profileCount}][daily_limit_enabled]" 
                                                value="1" onchange="toggleDailyLimit(${profileCount})" class="sr-only peer">
                                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                            <span class="ml-3 text-sm font-medium text-gray-700">
                                                <span class="peer-checked:hidden">No</span>
                                                <span class="hidden peer-checked:inline">Yes</span>
                                            </span>
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
                                            <input type="checkbox" name="profiles[${profileCount}][speed_limit_enabled]" 
                                                value="1" onchange="toggleSpeedLimit(${profileCount})" class="sr-only peer">
                                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                            <span class="ml-3 text-sm font-medium text-gray-700">
                                                <span class="peer-checked:hidden">No</span>
                                                <span class="hidden peer-checked:inline">Yes</span>
                                            </span>
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

                        <!-- Login Fields Configuration -->
                        <div class="border-t border-gray-300 pt-4">
                            <h5 class="text-sm font-semibold text-gray-700 mb-4">Login Fields</h5>
                            
                            <!-- First Name & Last Name -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                <div>
                                    <label class="flex items-center justify-between mb-2">
                                        <span class="text-sm font-medium text-gray-700">First Name</span>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" name="profiles[${profileCount}][first_name_required]" 
                                                value="1" class="sr-only peer">
                                            <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-blue-600"></div>
                                            <span class="ml-2 text-xs text-gray-600">Required</span>
                                        </label>
                                    </label>
                                </div>

                                <div>
                                    <label class="flex items-center justify-between mb-2">
                                        <span class="text-sm font-medium text-gray-700">Last Name</span>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" name="profiles[${profileCount}][last_name_required]" 
                                                value="1" class="sr-only peer">
                                            <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-blue-600"></div>
                                            <span class="ml-2 text-xs text-gray-600">Required</span>
                                        </label>
                                    </label>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="mb-4">
                                <label class="flex items-center justify-between mb-2">
                                    <span class="text-sm font-medium text-gray-700">Email</span>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" name="profiles[${profileCount}][email_verification]" 
                                            value="1" class="sr-only peer">
                                        <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-blue-600"></div>
                                        <span class="ml-2 text-xs text-gray-600">Verification</span>
                                    </label>
                                </label>
                            </div>

                            <!-- WhatsApp -->
                            <div class="mb-4">
                                <label class="flex items-center justify-between mb-2">
                                    <span class="text-sm font-medium text-gray-700">WhatsApp</span>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" name="profiles[${profileCount}][whatsapp_verification]" 
                                            value="1" class="sr-only peer">
                                        <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-blue-600"></div>
                                        <span class="ml-2 text-xs text-gray-600">Verification</span>
                                    </label>
                                </label>
                            </div>

                            <!-- Gender -->
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Gender (Enable)</label>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" name="profiles[${profileCount}][gender_enabled]" 
                                        value="1" class="sr-only peer">
                                    <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-blue-600"></div>
                                    <span class="ml-2 text-xs text-gray-600">Show Gender Field</span>
                                </label>
                            </div>
                        </div>

                        <!-- Checkboxes Configuration (Profile Level) -->
                        ${generateCheckboxFields(profileCount)}
                    </div>
                `;

                profilesList.appendChild(profileCard);
            }

            function generateCheckboxFields(profileId) {
                let html =
                    '<div class="border-t border-gray-300 pt-4"><h5 class="text-sm font-semibold text-gray-700 mb-4">Checkboxes Configuration</h5>';

                const checkboxLabels = ['Terms & Conditions', 'Data Privacy'];

                for (let i = 1; i <= checkboxLabels.length; i++) {
                    html += `
                        <div class="mb-4 p-4 bg-gray-50 border border-gray-200 rounded-lg">
                            <div class="flex items-center justify-between mb-3">
                                <label class="text-sm font-medium text-gray-700">Checkbox ${i} - ${checkboxLabels[i-1]}</label>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" id="profile-${profileId}-checkbox-${i}-enabled" 
                                        name="profiles[${profileId}][checkbox_${i}_enabled]" 
                                        value="1" onchange="toggleCheckboxContent(${profileId}, ${i})" class="sr-only peer">
                                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                    <span class="ml-3 text-sm font-medium text-gray-700">Enable</span>
                                </label>
                            </div>
                            
                            <div id="profile-${profileId}-checkbox-${i}-content" class="hidden space-y-3">
                                <div>
                                    <label class="block text-xs font-medium text-gray-600 mb-1">Checkbox Label</label>
                                    <input type="text" name="profiles[${profileId}][checkbox_${i}_label]" 
                                        placeholder="e.g., I agree to ${checkboxLabels[i-1].toLowerCase()}"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                </div>
                                <div>
                                    <label class="block text-xs font-medium text-gray-600 mb-1">${checkboxLabels[i-1]} Content</label>
                                    <textarea name="profiles[${profileId}][checkbox_${i}_content]" rows="4" 
                                        placeholder="Enter ${checkboxLabels[i-1].toLowerCase()} content here..."
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"></textarea>
                                </div>
                                
                            </div>
                        </div>
                    `;
                }
                html += '</div>';
                return html;
            }

            function selectAccessType(profileId, type) {
                // Update UI
                const parent = event.currentTarget.closest('.access-type-selector');
                parent.querySelectorAll('.access-type-option').forEach(opt => {
                    opt.classList.remove('selected');
                });
                event.currentTarget.classList.add('selected');

                // Check radio
                document.getElementById(`profile-${profileId}-${type}`).checked = true;

                // Show/hide policy sections
                const accessPolicyContainer = document.getElementById(`access-policy-${profileId}`);

                if (type === 'open') {
                    accessPolicyContainer.classList.remove('hidden');
                } else {
                    // Voucher - hide policy section completely
                    accessPolicyContainer.classList.add('hidden');
                }
            }

            function toggleDailyLimit(profileId) {
                const dailyLimitInput = document.getElementById(`daily-limit-input-${profileId}`);
                const checkbox = event.target;

                if (checkbox.checked) {
                    dailyLimitInput.classList.remove('hidden');
                } else {
                    dailyLimitInput.classList.add('hidden');
                }
            }

            function toggleSpeedLimit(profileId) {
                const speedLimitInput = document.getElementById(`speed-limit-input-${profileId}`);
                const checkbox = event.target;

                if (checkbox.checked) {
                    speedLimitInput.classList.remove('hidden');
                } else {
                    speedLimitInput.classList.add('hidden');
                }
            }

            function removeProfile(profileId) {
                const profile = document.getElementById(`profile-${profileId}`);
                if (profile && !profile.classList.contains('cannot-remove')) {
                    if (confirm('Are you sure you want to remove this profile?')) {
                        profile.remove();
                    }
                }
            }
        </script>
    </x-slot>
</x-main-layout>
