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
                    <h1 class="text-2xl font-bold text-gray-900">Location Management</h1>
                    <p class="text-sm text-gray-500 mt-1">Manage all business locations</p>
                </div>
                <a href="{{ route('locations.create') }}"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    <span>Add New Location</span>
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
                            placeholder="Search by location name, zone ID, or business..." oninput="filterTable()"
                            class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                </div>

                <!-- Filter by Business -->
                <div class="relative">
                    <button id="business-filter-button" onclick="toggleDropdown('business-filter')"
                        class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors flex items-center gap-2 bg-white">
                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                            </path>
                        </svg>
                        <span class="text-sm font-medium text-gray-700">Filter by Business</span>
                        <span id="business-filter-badge"
                            class="hidden px-2 py-0.5 text-xs font-semibold bg-blue-100 text-blue-800 rounded-full"></span>
                        <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>

                    <div id="business-filter"
                        class="hidden absolute z-10 mt-2 w-64 bg-white border border-gray-300 rounded-lg shadow-lg filter-dropdown">
                        <div class="p-3">
                            <h6 class="text-sm font-semibold text-gray-900 mb-2">Select Business</h6>
                            <div class="space-y-2">
                                <label class="flex items-center cursor-pointer hover:bg-gray-50 p-2 rounded">
                                    <input type="checkbox" value="all" checked
                                        onchange="filterByBusiness('all', this)"
                                        class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                    <span class="ml-2 text-sm text-gray-700">All Businesses</span>
                                </label>
                                <label class="flex items-center cursor-pointer hover:bg-gray-50 p-2 rounded">
                                    <input type="checkbox" value="Acme Corporation"
                                        onchange="filterByBusiness('Acme Corporation', this)"
                                        class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                    <span class="ml-2 text-sm text-gray-700">Acme Corporation</span>
                                </label>
                                <label class="flex items-center cursor-pointer hover:bg-gray-50 p-2 rounded">
                                    <input type="checkbox" value="Tech Innovations"
                                        onchange="filterByBusiness('Tech Innovations', this)"
                                        class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                    <span class="ml-2 text-sm text-gray-700">Tech Innovations</span>
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
                        <span class="text-sm font-medium text-gray-700">Status</span>
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
                    <span class="text-sm font-medium">Clear</span>
                </button>
            </div>
        </div>

        <!-- Content Area -->
        <div class="p-6">
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full" id="locations-table">
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Location</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Business</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Operator</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Type</th>
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
                            <!-- Location Row 1 -->
                            <tr class="hover:bg-gray-50 transition-colors location-row"
                                data-location-name="Downtown Office" data-zone-id="ZONE-001"
                                data-business="Acme Corporation" data-status="Active">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                                </path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">Downtown Office</div>
                                            <div class="text-sm text-gray-500">Zone: ZONE-001</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">Acme Corporation</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div
                                            class="w-8 h-8 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-semibold text-xs">
                                            JD
                                        </div>
                                        <div class="ml-3">
                                            <div class="text-sm font-medium text-gray-900">John Doe</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-indigo-100 text-indigo-800">
                                        WiFi Hotspot
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-semibold text-green-600">$5,000</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Active
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex items-center gap-2">
                                        <a href="{{ route('locations.edit', 1) }}"
                                            class="text-blue-600 hover:text-blue-900 p-1 hover:bg-blue-50 rounded transition-colors"
                                            title="Edit">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                </path>
                                            </svg>
                                        </a>
                                        <form action="{{ route('locations.destroy', 1) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('Are you sure you want to delete this location?')"
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

                            <!-- Location Row 2 -->
                            <tr class="hover:bg-gray-50 transition-colors location-row"
                                data-location-name="Westside Branch" data-zone-id="ZONE-002"
                                data-business="Tech Innovations" data-status="Active">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div
                                            class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                                            <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                                </path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">Westside Branch</div>
                                            <div class="text-sm text-gray-500">Zone: ZONE-002</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">Tech Innovations</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div
                                            class="w-8 h-8 bg-gradient-to-br from-green-500 to-teal-600 rounded-full flex items-center justify-center text-white font-semibold text-xs">
                                            JS
                                        </div>
                                        <div class="ml-3">
                                            <div class="text-sm font-medium text-gray-900">Jane Smith</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-pink-100 text-pink-800">
                                        Guest Portal
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-semibold text-green-600">$8,500</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Active
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex items-center gap-2">
                                        <a href="{{ route('locations.edit', 2) }}"
                                            class="text-blue-600 hover:text-blue-900 p-1 hover:bg-blue-50 rounded transition-colors"
                                            title="Edit">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                </path>
                                            </svg>
                                        </a>
                                        <form action="{{ route('locations.destroy', 2) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('Are you sure you want to delete this location?')"
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
                    <p class="text-gray-500 text-lg font-medium">No locations found</p>
                    <p class="text-gray-400 text-sm mt-1">Try adjusting your filters or search criteria</p>
                </div>

                <!-- Pagination -->
                <div class="bg-white px-6 py-4 border-t border-gray-200 flex items-center justify-between">
                    <div class="text-sm text-gray-700">
                        Showing <span class="font-medium" id="showing-from">1</span> to <span class="font-medium"
                            id="showing-to">2</span> of <span class="font-medium" id="total-count">2</span> locations
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
            let selectedBusinesses = ['all'];
            let selectedStatuses = ['all'];
            let sortAscending = true;

            function toggleDropdown(id) {
                const dropdown = document.getElementById(id);
                dropdown.classList.toggle('hidden');

                const dropdowns = ['business-filter', 'status-filter'];
                dropdowns.forEach(dropdownId => {
                    if (dropdownId !== id) {
                        document.getElementById(dropdownId).classList.add('hidden');
                    }
                });
            }

            document.addEventListener('click', function(event) {
                const businessButton = document.getElementById('business-filter-button');
                const statusButton = document.getElementById('status-filter-button');
                const businessDropdown = document.getElementById('business-filter');
                const statusDropdown = document.getElementById('status-filter');

                if (!businessButton.contains(event.target) && !businessDropdown.contains(event.target)) {
                    businessDropdown.classList.add('hidden');
                }

                if (!statusButton.contains(event.target) && !statusDropdown.contains(event.target)) {
                    statusDropdown.classList.add('hidden');
                }
            });

            function filterByBusiness(business, checkbox) {
                if (business === 'all') {
                    if (checkbox.checked) {
                        selectedBusinesses = ['all'];
                        document.querySelectorAll('#business-filter input[type="checkbox"]').forEach(cb => {
                            if (cb.value !== 'all') cb.checked = false;
                        });
                    }
                } else {
                    document.querySelector('#business-filter input[value="all"]').checked = false;

                    if (checkbox.checked) {
                        selectedBusinesses = selectedBusinesses.filter(b => b !== 'all');
                        selectedBusinesses.push(business);
                    } else {
                        selectedBusinesses = selectedBusinesses.filter(b => b !== business);
                        if (selectedBusinesses.length === 0) {
                            selectedBusinesses = ['all'];
                            document.querySelector('#business-filter input[value="all"]').checked = true;
                        }
                    }
                }

                updateBusinessBadge();
                filterTable();
            }

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

            function updateBusinessBadge() {
                const badge = document.getElementById('business-filter-badge');
                if (selectedBusinesses.includes('all') || selectedBusinesses.length === 0) {
                    badge.classList.add('hidden');
                } else {
                    badge.textContent = selectedBusinesses.length;
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

            function filterTable() {
                const searchInput = document.getElementById('search-input').value.toLowerCase();
                const rows = document.querySelectorAll('.location-row');
                let visibleCount = 0;

                rows.forEach(row => {
                    const locationName = row.getAttribute('data-location-name').toLowerCase();
                    const zoneId = row.getAttribute('data-zone-id').toLowerCase();
                    const business = row.getAttribute('data-business');
                    const status = row.getAttribute('data-status');

                    const matchesSearch = searchInput === '' ||
                        locationName.includes(searchInput) ||
                        zoneId.includes(searchInput) ||
                        business.toLowerCase().includes(searchInput);

                    const matchesBusiness = selectedBusinesses.includes('all') ||
                        selectedBusinesses.includes(business);

                    const matchesStatus = selectedStatuses.includes('all') ||
                        selectedStatuses.includes(status);

                    if (matchesSearch && matchesBusiness && matchesStatus) {
                        row.style.display = '';
                        visibleCount++;
                    } else {
                        row.style.display = 'none';
                    }
                });

                document.getElementById('showing-to').textContent = visibleCount;
                document.getElementById('total-count').textContent = visibleCount;

                const noResults = document.getElementById('no-results');
                if (visibleCount === 0) {
                    noResults.classList.remove('hidden');
                } else {
                    noResults.classList.add('hidden');
                }
            }

            function sortTable() {
                const tbody = document.querySelector('#locations-table tbody');
                const rows = Array.from(tbody.querySelectorAll('.location-row'));

                rows.sort((a, b) => {
                    const nameA = a.getAttribute('data-location-name').toLowerCase();
                    const nameB = b.getAttribute('data-location-name').toLowerCase();

                    if (sortAscending) {
                        return nameA.localeCompare(nameB);
                    } else {
                        return nameB.localeCompare(nameA);
                    }
                });

                rows.forEach(row => tbody.appendChild(row));

                sortAscending = !sortAscending;
                document.getElementById('sort-button').querySelector('span').textContent = sortAscending ? 'Sort A-Z' :
                    'Sort Z-A';

                filterTable();
            }

            function clearAllFilters() {
                document.getElementById('search-input').value = '';

                selectedBusinesses = ['all'];
                document.querySelectorAll('#business-filter input[type="checkbox"]').forEach(cb => {
                    cb.checked = cb.value === 'all';
                });
                updateBusinessBadge();

                selectedStatuses = ['all'];
                document.querySelectorAll('#status-filter input[type="checkbox"]').forEach(cb => {
                    cb.checked = cb.value === 'all';
                });
                updateStatusBadge();

                sortAscending = true;
                document.getElementById('sort-button').querySelector('span').textContent = 'Sort A-Z';

                filterTable();
            }
        </script>
    </x-slot>
</x-main-layout>
