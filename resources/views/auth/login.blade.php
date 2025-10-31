<x-clean-layout title="Sign In" bodyClass="min-h-screen bg-gray-50 flex items-center justify-center">
    <!-- Light/Dark Mode Toggle -->
    <button id="theme-toggle" class="fixed top-4 right-4 p-2 rounded-md text-gray-600 hover:bg-gray-100">
        <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
        </svg>
        <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path
                d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                fill-rule="evenodd" clip-rule="evenodd"></path>
        </svg>
    </button>

    <div class="w-full max-w-md px-4">
        <img src="{{ asset('logo.webp') }}" alt="Nextwi Logo" class="h-16 w-auto mx-auto mb-6">
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <div class="px-6 py-5 border-b border-gray-200 bg-white ">
                <h1 class="text-lg font-bold text-gray-900">Sign in</h1>
                <h4 class="  text-gray-900">Start Managing Your Wi‑Fi</h4>
            </div>

            <div class="px-6 py-5">
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-4">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required
                            autofocus autocomplete="username" placeholder="Enter your email"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                        <input id="password" type="password" name="password" required autocomplete="current-password"
                            placeholder="••••••••"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Actions -->
                    <div class="flex items-center justify-between">
                        <label for="remember_me" class="inline-flex items-center gap-2">
                            <input id="remember_me" type="checkbox" name="remember"
                                class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                            <span class="text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="text-sm text-blue-600 hover:text-blue-700" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                    </div>

                    <button type="submit"
                        class="w-full px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors">
                        {{ __('Log in') }}
                    </button>

                    <div class="mt-4 text-center">
                        <p class="text-sm text-gray-600">Don't have an account?
                            <a href="https://nextwi.co/" class="text-blue-600 hover:text-blue-700 font-medium">
                                Register
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <x-slot name="script">
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const themeToggleBtn = document.getElementById('theme-toggle');
                const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
                const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

                function updateThemeIcons(isDark) {
                    if (isDark) {
                        themeToggleLightIcon?.classList.remove('hidden');
                        themeToggleDarkIcon?.classList.add('hidden');
                        document.documentElement.classList.add('dark');
                    } else {
                        themeToggleDarkIcon?.classList.remove('hidden');
                        themeToggleLightIcon?.classList.add('hidden');
                        document.documentElement.classList.remove('dark');
                    }
                }

                function toggleTheme() {
                    const isCurrentlyDark = document.documentElement.classList.contains('dark');
                    if (isCurrentlyDark) {
                        localStorage.setItem('color-theme', 'light');
                        updateThemeIcons(false);
                    } else {
                        localStorage.setItem('color-theme', 'dark');
                        updateThemeIcons(true);
                    }
                }

                const stored = localStorage.getItem('color-theme');
                if (stored === 'dark' || (!stored && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                    updateThemeIcons(true);
                } else {
                    updateThemeIcons(false);
                }

                themeToggleBtn?.addEventListener('click', toggleTheme);
            });
        </script>
    </x-slot>
</x-clean-layout>
