<x-main-layout>
    <x-slot name="style">
        <style>
            .filter-dropdown {
                max-height: 300px;
                overflow-y: auto;
            }
        </style>
    </x-slot>

    <!-- Main Content -->
    <main class="lg:ml-64 min-h-screen">
        <!-- Top Bar -->
        <div class="bg-white border-b border-gray-200 px-6 py-4 mt-16 lg:mt-0">
            <div class="flex items-center justify-between flex-wrap gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Business Management</h1>
                    <p class="text-sm text-gray-500 mt-1">Manage all registered businesses</p>
                </div>
                <a href="{{ route('businesses.create') }}"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    <span>Add New Business</span>
                </a>
            </div>
        </div>

        <!-- Filters Section -->
        <div class="bg-white border-b border-gray-200 px-6 py-4">
            <div class="flex flex-wrap items-center gap-3">
                <!-- Search Bar -->
                <div class="flex-1 min-w-[300px]">
                    <div class="relative">
                        <input type="text" id="search-input"
                            placeholder="Search by business name, admin name, or email..." oninput="filterTable()"
                            class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                </div>

                <!-- Filter by Admin -->
                <div class="relative">
                    <button id="admin-filter-button" onclick="toggleDropdown('admin-filter')"
                        class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors flex items-center gap-2 bg-white">
                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <span class="text-sm font-medium text-gray-700">Filter by Admin</span>
                        <span id="admin-filter-badge"
                            class="hidden px-2 py-0.5 text-xs font-semibold bg-blue-100 text-blue-800 rounded-full"></span>
                        <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>

                    <div id="admin-filter"
                        class="hidden absolute z-10 mt-2 w-64 bg-white border border-gray-300 rounded-lg shadow-lg filter-dropdown">
                        <div class="p-3">
                            <h6 class="text-sm font-semibold text-gray-900 mb-2">Select Admin</h6>
                            <div class="space-y-2">
                                <label class="flex items-center cursor-pointer hover:bg-gray-50 p-2 rounded">
                                    <input type="checkbox" value="all" checked onchange="filterByAdmin('all', this)"
                                        class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                    <span class="ml-2 text-sm text-gray-700">All Admins</span>
                                </label>
                                <label class="flex items-center cursor-pointer hover:bg-gray-50 p-2 rounded">
                                    <input type="checkbox" value="John Doe" onchange="filterByAdmin('John Doe', this)"
                                        class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                    <span class="ml-2 text-sm text-gray-700">John Doe</span>
                                </label>
                                <label class="flex items-center cursor-pointer hover:bg-gray-50 p-2 rounded">
                                    <input type="checkbox" value="Jane Smith"
                                        onchange="filterByAdmin('Jane Smith', this)"
                                        class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                    <span class="ml-2 text-sm text-gray-700">Jane Smith</span>
                                </label>
                                <label class="flex items-center cursor-pointer hover:bg-gray-50 p-2 rounded">
                                    <input type="checkbox" value="Robert Brown"
                                        onchange="filterByAdmin('Robert Brown', this)"
                                        class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                    <span class="ml-2 text-sm text-gray-700">Robert Brown</span>
                                </label>
                                <label class="flex items-center cursor-pointer hover:bg-gray-50 p-2 rounded">
                                    <input type="checkbox" value="Emily Wilson"
                                        onchange="filterByAdmin('Emily Wilson', this)"
                                        class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                    <span class="ml-2 text-sm text-gray-700">Emily Wilson</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filter by Status -->
                <div class="relative">
                    <button id="status-filter-button" onclick="toggleDropdown('status-filter')"
                        class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors flex items-center gap-2 bg-white">
                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12"></path>
                        </svg>
                        <span class="text-sm font-medium text-gray-700">Filter by Status</span>
                        <span id="status-filter-badge"
                            class="hidden px-2 py-0.5 text-xs font-semibold bg-blue-100 text-blue-800 rounded-full"></span>
                        <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>

                    <div id="status-filter"
                        class="hidden absolute z-10 mt-2 w-56 bg-white border border-gray-300 rounded-lg shadow-lg">
                        <div class="p-3">
                            <h6 class="text-sm font-semibold text-gray-900 mb-2">Select Status</h6>
                            <div class="space-y-2">
                                <label class="flex items-center cursor-pointer hover:bg-gray-50 p-2 rounded">
                                    <input type="checkbox" value="all" checked
                                        onchange="filterByStatus('all', this)"
                                        class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                    <span class="ml-2 text-sm text-gray-700">All Status</span>
                                </label>
                                <label class="flex items-center cursor-pointer hover:bg-gray-50 p-2 rounded">
                                    <input type="checkbox" value="Active" onchange="filterByStatus('Active', this)"
                                        class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                    <span class="ml-2 text-sm text-gray-700">Active</span>
                                </label>
                                <label class="flex items-center cursor-pointer hover:bg-gray-50 p-2 rounded">
                                    <input type="checkbox" value="Pending" onchange="filterByStatus('Pending', this)"
                                        class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                    <span class="ml-2 text-sm text-gray-700">Pending</span>
                                </label>
                                <label class="flex items-center cursor-pointer hover:bg-gray-50 p-2 rounded">
                                    <input type="checkbox" value="Inactive"
                                        onchange="filterByStatus('Inactive', this)"
                                        class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                    <span class="ml-2 text-sm text-gray-700">Inactive</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sort Alphabetically -->
                <button id="sort-button" onclick="sortTable()"
                    class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors flex items-center gap-2 bg-white">
                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 4h13M3 8h9m-9 4h9m5-4v12m0 0l-4-4m4 4l4-4"></path>
                    </svg>
                    <span class="text-sm font-medium text-gray-700">Sort A-Z</span>
                </button>

                <!-- Clear Filters -->
                <button onclick="clearAllFilters()"
                    class="px-4 py-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                    <span class="text-sm font-medium">Clear Filters</span>
                </button>
            </div>
        </div>

        <!-- Content Area -->
        <div class="p-6">
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full" id="businesses-table">
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Business</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Admin</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Contact</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Email</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Phone</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Credit</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <!-- Business Row 1 -->
                            <tr class="hover:bg-gray-50 transition-colors business-row"
                                data-business-name="Acme Corporation" data-admin-name="John Doe"
                                data-admin-email="john.doe@example.com" data-contact-email="acme@example.com"
                                data-status="Active">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                                </path>
                                            </svg>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">Acme Corporation</div>
                                            <div class="text-sm text-gray-500">TAX: 123-456-789</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div
                                            class="w-8 h-8 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-semibold text-xs">
                                            JD
                                        </div>
                                        <div class="ml-3">
                                            <div class="text-sm font-medium text-gray-900">John Doe</div>
                                            <div class="text-xs text-gray-500">Super Admin</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">John Doe</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">acme@example.com</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">+1 234 567 8900</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-semibold text-green-600">$25,000</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Active
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex items-center gap-2">
                                        <a href="{{ route('businesses.edit', 1) }}"
                                            class="text-blue-600 hover:text-blue-900 p-1 hover:bg-blue-50 rounded transition-colors"
                                            title="Edit">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                </path>
                                            </svg>
                                        </a>
                                        <form action="{{ route('businesses.destroy', 1) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('Are you sure you want to delete this business?')"
                                                class="text-red-600 hover:text-red-900 p-1 hover:bg-red-50 rounded transition-colors"
                                                title="Delete">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                    </path>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>

                            <!-- Business Row 2 -->
                            <tr class="hover:bg-gray-50 transition-colors business-row"
                                data-business-name="Tech Innovations Ltd" data-admin-name="Jane Smith"
                                data-admin-email="jane.smith@example.com" data-contact-email="tech@innovations.com"
                                data-status="Active">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div
                                            class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                                            <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                                </path>
                                            </svg>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">Tech Innovations Ltd</div>
                                            <div class="text-sm text-gray-500">TAX: 987-654-321</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div
                                            class="w-8 h-8 bg-gradient-to-br from-green-500 to-teal-600 rounded-full flex items-center justify-center text-white font-semibold text-xs">
                                            JS
                                        </div>
                                        <div class="ml-3">
                                            <div class="text-sm font-medium text-gray-900">Jane Smith</div>
                                            <div class="text-xs text-gray-500">Admin</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">Jane Smith</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">tech@innovations.com</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">+1 234 567 8901</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-semibold text-green-600">$50,000</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Active
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex items-center gap-2">
                                        <a href="{{ route('businesses.edit', 2) }}"
                                            class="text-blue-600 hover:text-blue-900 p-1 hover:bg-blue-50 rounded transition-colors"
                                            title="Edit">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                </path>
                                            </svg>
                                        </a>
                                        <form action="{{ route('businesses.destroy', 2) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('Are you sure you want to delete this business?')"
                                                class="text-red-600 hover:text-red-900 p-1 hover:bg-red-50 rounded transition-colors"
                                                title="Delete">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                    </path>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>

                            <!-- Business Row 3 -->
                            <tr class="hover:bg-gray-50 transition-colors business-row"
                                data-business-name="Global Services Inc" data-admin-name="Robert Brown"
                                data-admin-email="robert.brown@example.com"
                                data-contact-email="contact@globalservices.com" data-status="Pending">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div
                                            class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                                </path>
                                            </svg>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">Global Services Inc</div>
                                            <div class="text-sm text-gray-500">TAX: 456-789-123</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div
                                            class="w-8 h-8 bg-gradient-to-br from-orange-500 to-red-600 rounded-full flex items-center justify-center text-white font-semibold text-xs">
                                            RB
                                        </div>
                                        <div class="ml-3">
                                            <div class="text-sm font-medium text-gray-900">Robert Brown</div>
                                            <div class="text-xs text-gray-500">Manager</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">Robert Brown</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">contact@globalservices.com</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">+1 234 567 8902</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-semibold text-orange-600">$10,000</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                        Pending
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex items-center gap-2">
                                        <a href="{{ route('businesses.edit', 3) }}"
                                            class="text-blue-600 hover:text-blue-900 p-1 hover:bg-blue-50 rounded transition-colors"
                                            title="Edit">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                </path>
                                            </svg>
                                        </a>
                                        <form action="{{ route('businesses.destroy', 3) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('Are you sure you want to delete this business?')"
                                                class="text-red-600 hover:text-red-900 p-1 hover:bg-red-50 rounded transition-colors"
                                                title="Delete">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                    </path>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- No Results Message -->
                <div id="no-results" class="hidden p-8 text-center">
                    <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                        </path>
                    </svg>
                    <p class="text-gray-500 text-lg font-medium">No businesses found</p>
                    <p class="text-gray-400 text-sm mt-1">Try adjusting your filters or search criteria</p>
                </div>

                <!-- Pagination -->
                <div class="bg-white px-6 py-4 border-t border-gray-200 flex items-center justify-between">
                    <div class="text-sm text-gray-700">
                        Showing <span class="font-medium" id="showing-from">1</span> to <span class="font-medium"
                            id="showing-to">3</span> of <span class="font-medium" id="total-count">3</span>
                        businesses
                    </div>
                    <div class="flex gap-2">
                        <button
                            class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 disabled:opacity-50"
                            disabled>Previous</button>
                        <button class="px-3 py-2 bg-blue-600 text-white rounded-lg text-sm font-medium">1</button>
                        <button
                            class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 disabled:opacity-50"
                            disabled>Next</button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <x-slot name="script">
        <script>
            let selectedAdmins = ['all'];
            let selectedStatuses = ['all'];
            let sortAscending = true;

            // Toggle dropdown visibility
            function toggleDropdown(id) {
                const dropdown = document.getElementById(id);
                dropdown.classList.toggle('hidden');

                // Close other dropdowns
                const dropdowns = ['admin-filter', 'status-filter'];
                dropdowns.forEach(dropdownId => {
                    if (dropdownId !== id) {
                        document.getElementById(dropdownId).classList.add('hidden');
                    }
                });
            }

            // Close dropdowns when clicking outside
            document.addEventListener('click', function(event) {
                const adminButton = document.getElementById('admin-filter-button');
                const statusButton = document.getElementById('status-filter-button');
                const adminDropdown = document.getElementById('admin-filter');
                const statusDropdown = document.getElementById('status-filter');

                if (!adminButton.contains(event.target) && !adminDropdown.contains(event.target)) {
                    adminDropdown.classList.add('hidden');
                }

                if (!statusButton.contains(event.target) && !statusDropdown.contains(event.target)) {
                    statusDropdown.classList.add('hidden');
                }
            });

            // Filter by admin
            function filterByAdmin(admin, checkbox) {
                if (admin === 'all') {
                    if (checkbox.checked) {
                        selectedAdmins = ['all'];
                        // Uncheck all other checkboxes
                        document.querySelectorAll('#admin-filter input[type="checkbox"]').forEach(cb => {
                            if (cb.value !== 'all') cb.checked = false;
                        });
                    }
                } else {
                    // Uncheck "All" if a specific admin is selected
                    document.querySelector('#admin-filter input[value="all"]').checked = false;

                    if (checkbox.checked) {
                        selectedAdmins = selectedAdmins.filter(a => a !== 'all');
                        selectedAdmins.push(admin);
                    } else {
                        selectedAdmins = selectedAdmins.filter(a => a !== admin);
                        if (selectedAdmins.length === 0) {
                            selectedAdmins = ['all'];
                            document.querySelector('#admin-filter input[value="all"]').checked = true;
                        }
                    }
                }

                updateAdminBadge();
                filterTable();
            }

            // Filter by status
            function filterByStatus(status, checkbox) {
                if (status === 'all') {
                    if (checkbox.checked) {
                        selectedStatuses = ['all'];
                        document.querySelectorAll('#status-filter input[type="checkbox"]').forEach(cb => {
                            if (cb.value !== 'all') cb.checked = false;
                        });
                    }
                } else {
                    document.querySelector('#status-filter input[value="all"]').checked = false;

                    if (checkbox.checked) {
                        selectedStatuses = selectedStatuses.filter(s => s !== 'all');
                        selectedStatuses.push(status);
                    } else {
                        selectedStatuses = selectedStatuses.filter(s => s !== status);
                        if (selectedStatuses.length === 0) {
                            selectedStatuses = ['all'];
                            document.querySelector('#status-filter input[value="all"]').checked = true;
                        }
                    }
                }

                updateStatusBadge();
                filterTable();
            }

            // Update filter badges
            function updateAdminBadge() {
                const badge = document.getElementById('admin-filter-badge');
                if (selectedAdmins.includes('all') || selectedAdmins.length === 0) {
                    badge.classList.add('hidden');
                } else {
                    badge.textContent = selectedAdmins.length;
                    badge.classList.remove('hidden');
                }
            }

            function updateStatusBadge() {
                const badge = document.getElementById('status-filter-badge');
                if (selectedStatuses.includes('all') || selectedStatuses.length === 0) {
                    badge.classList.add('hidden');
                } else {
                    badge.textContent = selectedStatuses.length;
                    badge.classList.remove('hidden');
                }
            }

            // Filter table based on all criteria
            function filterTable() {
                const searchInput = document.getElementById('search-input').value.toLowerCase();
                const rows = document.querySelectorAll('.business-row');
                let visibleCount = 0;

                rows.forEach(row => {
                    const businessName = row.getAttribute('data-business-name').toLowerCase();
                    const adminName = row.getAttribute('data-admin-name').toLowerCase();
                    const adminEmail = row.getAttribute('data-admin-email').toLowerCase();
                    const contactEmail = row.getAttribute('data-contact-email').toLowerCase();
                    const status = row.getAttribute('data-status');

                    // Search filter
                    const matchesSearch = searchInput === '' ||
                        businessName.includes(searchInput) ||
                        adminName.includes(searchInput) ||
                        adminEmail.includes(searchInput) ||
                        contactEmail.includes(searchInput);

                    // Admin filter
                    const matchesAdmin = selectedAdmins.includes('all') ||
                        selectedAdmins.some(admin => row.getAttribute('data-admin-name') === admin);

                    // Status filter
                    const matchesStatus = selectedStatuses.includes('all') ||
                        selectedStatuses.includes(status);

                    // Show/hide row
                    if (matchesSearch && matchesAdmin && matchesStatus) {
                        row.style.display = '';
                        visibleCount++;
                    } else {
                        row.style.display = 'none';
                    }
                });

                // Update count
                document.getElementById('showing-to').textContent = visibleCount;
                document.getElementById('total-count').textContent = visibleCount;

                // Show/hide no results message
                const noResults = document.getElementById('no-results');
                if (visibleCount === 0) {
                    noResults.classList.remove('hidden');
                } else {
                    noResults.classList.add('hidden');
                }
            }

            // Sort table alphabetically
            function sortTable() {
                const tbody = document.querySelector('#businesses-table tbody');
                const rows = Array.from(tbody.querySelectorAll('.business-row'));

                rows.sort((a, b) => {
                    const nameA = a.getAttribute('data-business-name').toLowerCase();
                    const nameB = b.getAttribute('data-business-name').toLowerCase();

                    if (sortAscending) {
                        return nameA.localeCompare(nameB);
                    } else {
                        return nameB.localeCompare(nameA);
                    }
                });

                // Re-append sorted rows
                rows.forEach(row => tbody.appendChild(row));

                // Toggle sort direction
                sortAscending = !sortAscending;

                // Update button text
                const sortButton = document.getElementById('sort-button');
                sortButton.querySelector('span').textContent = sortAscending ? 'Sort A-Z' : 'Sort Z-A';

                // Re-apply filters after sorting
                filterTable();
            }

            // Clear all filters
            function clearAllFilters() {
                // Reset search
                document.getElementById('search-input').value = '';

                // Reset admin filter
                selectedAdmins = ['all'];
                document.querySelectorAll('#admin-filter input[type="checkbox"]').forEach(cb => {
                    cb.checked = cb.value === 'all';
                });
                updateAdminBadge();

                // Reset status filter
                selectedStatuses = ['all'];
                document.querySelectorAll('#status-filter input[type="checkbox"]').forEach(cb => {
                    cb.checked = cb.value === 'all';
                });
                updateStatusBadge();

                // Reset sort
                sortAscending = true;
                document.getElementById('sort-button').querySelector('span').textContent = 'Sort A-Z';

                // Re-filter table
                filterTable();
            }
        </script>
    </x-slot>
</x-main-layout>
