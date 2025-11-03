<x-main-layout>
    <x-slot name="style">
        <style>
            /* Optional: minor tweaks for inputs if needed */
        </style>
    </x-slot>

    <main class="lg:ml-64 min-h-screen">
        <x-top-bar title="Email (AWS SES)" subtitle="Configure sender and AWS SES credentials" />

        <div class="p-6">
            <!-- Display-only form respecting existing UI; submission not implemented yet -->
            <form class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                <div class="p-6 space-y-6">
                    <!-- Sender Settings -->
                    <div>
                        <h4 class="text-sm font-semibold text-gray-900 mb-4 flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            Sender
                        </h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="mail_from_address" class="block text-sm font-medium text-gray-700 mb-2">
                                    MAIL_FROM_ADDRESS
                                </label>
                                <input type="email" id="mail_from_address" name="MAIL_FROM_ADDRESS" value="{{ $mail_from_address }}"
                                    placeholder="your-email@example.com"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                            </div>
                            <div>
                                <label for="mail_from_name" class="block text-sm font-medium text-gray-700 mb-2">
                                    MAIL_FROM_NAME
                                </label>
                                <input type="text" id="mail_from_name" name="MAIL_FROM_NAME" value="{{ $mail_from_name }}"
                                    placeholder="{{ config('app.name') }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                            </div>
                        </div>
                    </div>

                    <!-- AWS Credentials -->
                    <div>
                        <h4 class="text-sm font-semibold text-gray-900 mb-4 flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v8m-4-4h8" />
                            </svg>
                            AWS Credentials
                        </h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="aws_access_key_id" class="block text-sm font-medium text-gray-700 mb-2">
                                    AWS_ACCESS_KEY_ID
                                </label>
                                <input type="text" id="aws_access_key_id" name="AWS_ACCESS_KEY_ID" value="{{ $aws_access_key_id }}"
                                    placeholder="your-access-key"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                            </div>
                            <div>
                                <label for="aws_secret_access_key" class="block text-sm font-medium text-gray-700 mb-2">
                                    AWS_SECRET_ACCESS_KEY
                                </label>
                                <input type="password" id="aws_secret_access_key" name="AWS_SECRET_ACCESS_KEY" value="{{ $aws_secret_access_key }}"
                                    placeholder="your-secret-key"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                            </div>
                            <div>
                                <label for="aws_default_region" class="block text-sm font-medium text-gray-700 mb-2">
                                    AWS_DEFAULT_REGION
                                </label>
                                <input type="text" id="aws_default_region" name="AWS_DEFAULT_REGION" value="{{ $aws_default_region }}"
                                    placeholder="us-east-1"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Actions (UI only) -->
                <div class="flex items-center justify-end gap-3 p-6 border-t border-gray-200 bg-gray-50">
                    <a href="{{ url()->previous() }}"
                        class="px-5 py-2.5 text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                        Cancel
                    </a>
                    <!-- Submit button present to respect UI; no backend implemented -->
                    <button type="button"
                        class="px-5 py-2.5 text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span>Save</span>
                    </button>
                </div>
            </form>
        </div>
    </main>

    <x-slot name="script">
        <script>
            // No backend submission yet – view only, respecting UI
        </script>
    </x-slot>
</x-main-layout>