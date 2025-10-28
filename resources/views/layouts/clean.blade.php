<!DOCTYPE html>
<html lang="en" class="fontawesome-i2svg-active fontawesome-i2svg-complete" id="html-element">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin Dashboard - User Management' }}</title>
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

        /* Fix table styling in dark mode */
        .dark table {
            background-color: #1e1e1e;
            color: #f3f4f6;
        }

        .dark table th {
            background-color: #2d2d2d;
            color: #f3f4f6;
        }

        .dark table td {
            border-color: #3e3e3e;
        }

        .dark table tr:hover {
            background-color: #2d2d2d;
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

        .dark .hover\:bg-gray-50:hover {
            background-color: #2d2d2d;
        }

        .dark .hover\:bg-white:hover {
            background-color: #2d2d2d;
        }

        .dark .hover\:bg-blue-50:hover {
            background-color: #1a365d;
        }

        /* Fix profile card styling in dark mode */
        .dark .profile-card {
            background-color: #1e1e1e;
            border-color: #3e3e3e;
        }

        .dark .profile-card.cannot-remove {
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
        }

        /* Fix specific elements in roles_permissions view */
        .dark .bg-gray-50 {
            background-color: #1e1e1e;
        }

        .dark .bg-blue-50 {
            background-color: #1a365d;
        }

        .dark .bg-blue-50:hover {
            background-color: #1e429f;
        }

        .dark .bg-blue-100 {
            background-color: #1e429f;
        }

        /* Fix access policy cards in dark mode */
        .dark .access-type-option {
            background-color: #1e1e1e;
            border-color: #3e3e3e;
        }

        .dark .access-type-option.selected {
            border-color: #3B82F6;
            background-color: #1a365d;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
        }

        .dark .access-type-option h5 {
            color: #f3f4f6;
        }

        .dark .access-type-option p {
            color: #9ca3af;
        }

        .dark .config-option {
            background-color: #1e1e1e;
            border-color: #3e3e3e;
        }

        .dark .config-option.selected {
            border-color: #3B82F6;
            background-color: #1a365d;
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

<body class=" {{ $bodyClass ?? 'bg-gray-100 transition-colors duration-200' }}">
    {{ $slot }}
    @isset($script)
    {!! $script !!}
    @endisset
</body>

</html>