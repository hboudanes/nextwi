<!DOCTYPE html>
<html lang="en" class="fontawesome-i2svg-active fontawesome-i2svg-complete" id="html-element">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - User Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        dark: {
                            'bg-primary': '#121212',
                            'bg-secondary': '#1e1e1e',
                            'text-primary': '#f3f4f6',
                            'text-secondary': '#a1a1aa',
                            'border': '#2e2e2e',
                        }
                    }
                }
            }
        }
    </script>
    {{-- Backwards-compatible: accept a $style variable (render raw HTML) --}}
    @isset($style)
        {!! $style !!}
    @endisset
    <style>
        .sidebar-transition {
            transition: transform 0.3s ease-in-out;
        }
        
        /* Dark mode styles */
        .dark body {
            background-color: #121212;
            color: #f3f4f6;
        }
        
        .dark .bg-white {
            background-color: #1e1e1e;
        }
        
        .dark .bg-gray-50,
        .dark .bg-gray-100 {
            background-color: #121212;
        }
        
        /* Fix input fields in dark mode */
        .dark input[type="text"],
        .dark input[type="email"],
        .dark input[type="password"],
        .dark input[type="number"],
        .dark input[type="search"],
        .dark input[type="tel"],
        .dark input[type="url"],
        .dark input[type="date"],
        .dark select,
        .dark textarea {
            background-color: #2d2d2d;
            color: #f3f4f6;
            border-color: #3e3e3e;
        }
        
        .dark input::placeholder {
            color: #a1a1aa;
        }
        .dark .text-gray-700 {
            color: #d1d5db;
        }
        
        .dark .text-gray-600 {
            color: #9ca3af;
        }
        
        .dark .text-gray-900 {
            color: #f3f4f6;
        }
        
        .dark .border-gray-200,
        .dark .border-gray-300 {
            border-color: #2e2e2e;
        }
        
        .dark .shadow-md,
        .dark .shadow-sm {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.3);
        }
        
        .dark .hover\:bg-gray-100:hover {
            background-color: #2e2e2e;
        }
        
        .dark .text-gray-600,
        .dark .text-gray-700,
        .dark .text-gray-800,
        .dark .text-gray-900 {
            color: #f3f4f6;
        }
        
        .dark .border-gray-200,
        .dark .border-gray-300 {
            border-color: #2e2e2e;
        }
        
        .dark .shadow-sm,
        .dark .shadow-md,
        .dark .shadow-lg {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.3), 0 1px 2px 0 rgba(0, 0, 0, 0.2);
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" crossorigin="anonymous"
        referrerpolicy="no-referrer"></script>
</head>

<body class="bg-gray-100 transition-colors duration-200">
    <!-- Mobile Menu Button -->
    <div
        class="lg:hidden fixed top-0 left-0 right-0 bg-white border-b border-gray-200 z-50 px-4 py-3 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-gray-900">Admin Dashboard</h1>
        <div class="flex items-center gap-2">
            <!-- Dark Mode Toggle -->
            <button id="theme-toggle" class="p-2 rounded-md text-gray-600 hover:bg-gray-100">
                <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                </svg>
                <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>
                </svg>
            </button>
            <!-- Mobile Menu Button -->
            <button onclick="toggleMobileSidebar()" class="p-2 rounded-md text-gray-600 hover:bg-gray-100">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Overlay for mobile -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-gray-900 bg-opacity-50 z-40 hidden lg:hidden"
        onclick="toggleMobileSidebar()"></div>


    <x-side-bar />


    {{ $slot }}
    @isset($script)
        {!! $script !!}
    @endisset

    <script>
        // Make toggleMobileSidebar globally available
        window.toggleMobileSidebar = function() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');

            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        };

        function loadContent(page) {
            // Close mobile sidebar after navigation
            if (window.innerWidth < 1024) {
                toggleMobileSidebar();
            }

            // Placeholder for content loading logic
            console.log('Loading page:', page);

            // Update active menu item
            document.querySelectorAll('aside nav a').forEach(link => {
                link.classList.remove('text-blue-600', 'bg-blue-50');
                link.classList.add('text-gray-700');
            });
            event.target.closest('a').classList.add('text-blue-600', 'bg-blue-50');
            event.target.closest('a').classList.remove('text-gray-700');
        }

        // Close sidebar on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                const sidebar = document.getElementById('sidebar');
                const overlay = document.getElementById('sidebar-overlay');
                if (!sidebar.classList.contains('-translate-x-full')) {
                    toggleMobileSidebar();
                }
            }
        });

        // Dark mode functionality
        document.addEventListener('DOMContentLoaded', function() {
            const themeToggleBtn = document.getElementById('theme-toggle');
            const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
            const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');
            
            // Sidebar toggle elements
            const sidebarThemeToggleBtn = document.getElementById('sidebar-theme-toggle');
            const sidebarThemeToggleDarkIcon = document.getElementById('sidebar-theme-toggle-dark-icon');
            const sidebarThemeToggleLightIcon = document.getElementById('sidebar-theme-toggle-light-icon');

            // Function to update all toggle icons based on theme
            function updateThemeIcons(isDark) {
                if (isDark) {
                    // Show light icons (sun)
                    themeToggleLightIcon?.classList.remove('hidden');
                    themeToggleDarkIcon?.classList.add('hidden');
                    sidebarThemeToggleLightIcon?.classList.remove('hidden');
                    sidebarThemeToggleDarkIcon?.classList.add('hidden');
                    document.documentElement.classList.add('dark');
                } else {
                    // Show dark icons (moon)
                    themeToggleDarkIcon?.classList.remove('hidden');
                    themeToggleLightIcon?.classList.add('hidden');
                    sidebarThemeToggleDarkIcon?.classList.remove('hidden');
                    sidebarThemeToggleLightIcon?.classList.add('hidden');
                    document.documentElement.classList.remove('dark');
                }
            }

            // Function to toggle theme
            function toggleTheme() {
                if (localStorage.getItem('color-theme') === 'light') {
                    localStorage.setItem('color-theme', 'dark');
                    updateThemeIcons(true);
                } else {
                    localStorage.setItem('color-theme', 'light');
                    updateThemeIcons(false);
                }
            }

            // Initial theme setup
            if (localStorage.getItem('color-theme') === 'dark' || 
                (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                updateThemeIcons(true);
            } else {
                updateThemeIcons(false);
            }

            // Add event listeners to both toggle buttons
            themeToggleBtn?.addEventListener('click', toggleTheme);
            sidebarThemeToggleBtn?.addEventListener('click', toggleTheme);
        });
    </script>
</body>

</html>
