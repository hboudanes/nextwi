<!-- Sidebar -->
<aside id="sidebar"
    class="fixed top-0 left-0 z-50 h-screen w-64 bg-white border-r border-gray-200 sidebar-transition -translate-x-full lg:translate-x-0">
    <!-- Logo/Brand -->
    <div class="h-16 flex items-center justify-between px-6 border-b border-gray-200">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z">
                    </path>
                </svg>
            </div>
            <span class="text-xl font-bold text-gray-900">Dashboard</span>
        </div>
        <div class="flex items-center gap-2">
            <!-- Sun/Moon toggle switch -->
            <label id="sidebar-theme-toggle" class="relative inline-flex items-center cursor-pointer" title="Toggle theme">
                <input type="checkbox" class="sr-only peer">
                <!-- Track -->
                <div class="w-10 h-5 bg-gray-200 rounded-full peer-checked:bg-gray-700 transition-colors"></div>
                <!-- Knob with icons -->
                <span class="absolute left-0.5 top-0.5 w-4 h-4 bg-white rounded-full shadow transform peer-checked:translate-x-5 transition-transform flex items-center justify-center">
                    <svg id="sidebar-theme-toggle-dark-icon" class="hidden w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                    </svg>
                    <svg id="sidebar-theme-toggle-light-icon" class="hidden w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                            fill-rule="evenodd" clip-rule="evenodd"></path>
                    </svg>
                </span>
            </label>
            <button onclick="toggleMobileSidebar()" class="lg:hidden p-1 rounded-md text-gray-600 hover:bg-gray-100">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 overflow-y-auto p-4 space-y-1">
        <!-- Dashboard -->
        <a href="{{ url('#') }}"
            class="flex items-center gap-3 px-3 py-2.5 {{ isActiveRoute('dashboard') }} rounded-lg hover:bg-gray-100 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                </path>
            </svg>
            <span class="font-medium">Dashboard</span>
        </a>
        
        <!-- Management Section -->
        <div class="pt-4">
            <h3 class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Management</h3>



            <a href="{{ route('businesses.index') }}"
                class="flex items-center gap-3 px-3 py-2.5 {{ isActiveRoute(['businesses.index', 'businesses.*']) }} rounded-lg hover:bg-gray-100 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                    </path>
                </svg>
                <span class="font-medium">Businesses</span>
            </a>

            <a href="{{ route('locations.index') }}"
                class="flex items-center gap-3 px-3 py-2.5 {{ isActiveRoute(['locations.index', 'locations.*']) }} rounded-lg hover:bg-gray-100 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                    </path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                <span class="font-medium">Locations</span>
            </a>

            <a href="{{ route('vouchers.index') }}"
                class="flex items-center gap-3 px-3 py-2.5 {{ isActiveRoute(['vouchers.index', 'vouchers.*']) }} rounded-lg hover:bg-gray-100 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z">
                    </path>
                </svg>
                <span class="font-medium">Vouchers</span>
            </a>

            <!-- Integrations (Disabled) -->
            <div class="flex items-center gap-3 px-3 py-2.5 rounded-lg opacity-50 cursor-not-allowed"
                title="Integrations are disabled right now">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 7h8m0 0v8m0-8l-8 8M11 17H3m0 0V9m0 8l8-8"></path>
                </svg>
                <span class="font-medium">Integrations </span>
            </div>
        </div>

        <!-- Settings Section -->
        <div class="pt-4">
            <h3 class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Settings</h3>

            <a href="{{ route('users.index') }}"
                class="flex items-center gap-3 px-3 py-2.5 {{ isActiveRoute(['users', 'users.*']) }} rounded-lg hover:bg-gray-100 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                    </path>
                </svg>
                <span class="font-medium">Users</span>
            </a>

            <a href="{{ route('roles-permissions.index') }}"
                class="flex items-center gap-3 px-3 py-2.5 {{ isActiveRoute('roles_permissions') }} rounded-lg hover:bg-gray-100 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                    </path>
                </svg>
                <span class="font-medium">Roles & Permissions</span>
            </a>

            <!-- Configuration dropdown -->
            <button type="button" onclick="toggleConfigDropdown()"
                class="w-full flex items-center justify-between gap-3 px-3 py-2.5 rounded-lg hover:bg-gray-100 transition-colors text-gray-700">
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11.049 2.927c.3-1.14 1.603-1.14 1.902 0a1.5 1.5 0 002.265.929c.989-.603 2.123.53 1.52 1.52a1.5 1.5 0 00.93 2.265c1.14.3 1.14 1.603 0 1.902a1.5 1.5 0 00-.929 2.265c.603.989-.531 2.123-1.52 1.52a1.5 1.5 0 00-2.265.93c-.3 1.14-1.603 1.14-1.902 0a1.5 1.5 0 00-2.265-.929c-.989.603-2.123-.531-1.52-1.52a1.5 1.5 0 00-.93-2.265c-1.14-.3-1.14-1.603 0-1.902a1.5 1.5 0 00.929-2.265c-.603-.989.531-2.123 1.52-1.52.662.404 1.523.046 1.735-.93z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v8m-4-4h8"></path>
                    </svg>
                    <span class="font-medium">Configuration</span>
                </div>
                <svg id="config-dropdown-chevron" class="w-4 h-4 text-gray-500 transition-transform" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div id="config-dropdown" class="ml-8 mt-1 space-y-1 hidden">
                <a href="#" class="flex items-center gap-2 px-3 py-2.5 rounded-lg hover:bg-gray-100 transition-colors text-gray-700">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 12a4 4 0 10-8 0 4 4 0 008 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 2v2m6.364 1.636l-1.414 1.414M20 12h-2M17.364 18.364l-1.414-1.414M12 20v-2M6.364 18.364l1.414-1.414M4 12h2M6.364 5.636l1.414 1.414" />
                    </svg>
                    <span>Email (AWS SES)</span>
                </a>
                <a href="#" class="flex items-center gap-2 px-3 py-2.5 rounded-lg hover:bg-gray-100 transition-colors text-gray-700">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 7l9-4 9 4-9 4-9-4z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 10l-9 4-9-4" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 14l9 4 9-4" />
                    </svg>
                    <span>Storage (Amazon S3)</span>
                </a>
            </div>
        </div>

        <!-- Support Section -->
        <div class="pt-4">
            <h3 class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Support</h3>

            <a href="#"
                class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-gray-100 transition-colors text-gray-700">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M18.364 5.636A9 9 0 105.636 18.364 9 9 0 0018.364 5.636z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9.879 9.879h.01M12 14a3 3 0 100-6 3 3 0 000 6z"></path>
                </svg>
                <span class="font-medium">Submit a ticket</span>
            </a>

            <a href="#"
                class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-gray-100 transition-colors text-gray-700">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 20l9-5-9-5-9 5 9 5z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 12l9-5-9-5-9 5 9 5z"></path>
                </svg>
                <span class="font-medium">Knowledge base</span>
            </a>
        </div>
    </nav>

    <!-- User Profile Footer -->
    @auth
        <div class="border-t border-gray-200 p-4">
            <div class="flex items-center gap-3 mb-3">
                @php
                    $user = Auth::user();
                    $name = trim($user->name ?? '');
                    $parts = preg_split('/\s+/', $name);
                    $first = isset($parts[0]) ? mb_substr($parts[0], 0, 1) : '';
                    $second = isset($parts[1]) ? mb_substr($parts[1], 0, 1) : '';
                    $initials = strtoupper($first . $second);
                    if ($initials === '') {
                        $initials = 'U';
                    }
                @endphp
                <div
                    class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center text-white font-semibold">
                    {{ $initials }}
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-900 truncate">{{ $user->name }}</p>
                    <p class="text-xs text-gray-500 truncate">{{ $user->email }}</p>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="p-2 rounded-md text-gray-400 hover:bg-gray-100 hover:text-gray-600"
                        title="Logout">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                            </path>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    @endauth
</aside>
