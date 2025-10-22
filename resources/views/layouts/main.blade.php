<!DOCTYPE html>
<html lang="en" class="fontawesome-i2svg-active fontawesome-i2svg-complete">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - User Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- Backwards-compatible: accept a $style variable (render raw HTML) --}}
    @isset($style)
        {!! $style !!}
    @endisset
    <style>
        .sidebar-transition {
            transition: transform 0.3s ease-in-out;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" crossorigin="anonymous"
        referrerpolicy="no-referrer"></script>


</head>

<body class="bg-gray-100">
    <!-- Mobile Menu Button -->
    <div
        class="lg:hidden fixed top-0 left-0 right-0 bg-white border-b border-gray-200 z-50 px-4 py-3 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-gray-900">Admin Dashboard</h1>
        <button onclick="toggleMobileSidebar()" class="p-2 rounded-md text-gray-600 hover:bg-gray-100">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                </path>
            </svg>
        </button>
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
        function toggleMobileSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');

            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }

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
    </script>
</body>

</html>
