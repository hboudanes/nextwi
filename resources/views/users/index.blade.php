<x-main-layout>
    <x-slot name="style">
        <style>
            /* Hide DataTables default elements */
            .dataTables_wrapper .dataTables_length,
            .dataTables_wrapper .dataTables_filter,
            .dataTables_wrapper .dataTables_info,
            .dataTables_wrapper .dataTables_paginate {
                display: none;
            }

            /* Regular table styling - no scroll containers */
            table.dataTable {
                width: 100% !important;
                border-collapse: collapse !important;
            }

            table.dataTable thead th {
                border-bottom: none !important;
                padding: 0.75rem 1.5rem !important;
            }

            table.dataTable tbody td {
                padding: 1rem 1.5rem !important;
                vertical-align: top !important;
            }

            table.dataTable tbody tr {
                transition: background-color 0.3s ease;
            }

            table.dataTable tbody tr:hover {
                background-color: rgba(249, 250, 251, 1) !important;
            }

            @media (prefers-color-scheme: dark) {
                table.dataTable tbody tr:hover {
                    background-color: rgba(55, 65, 81, 1) !important;
                    color: rgba(255, 255, 255, 1) !important;
                }
            }

            .filter-dropdown {
                max-height: 300px;
                overflow-y: auto;
            }

            /* Responsive container for horizontal scroll on small screens */
            .table-container {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }
        </style>
    </x-slot>

    <!-- Main Content -->
    <main class="lg:ml-64 min-h-screen">
        <x-top-bar title="User Management" subtitle="Manage user accounts and their roles" routeName="users.create"
            buttonName="Add New User" class="bg-blue-600 text-white">
            <x-slot name="buttonSvg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                    </path>
                </svg>
            </x-slot>
        </x-top-bar>

        <!-- Filters Section -->
        <div class="bg-white border-b border-gray-200 px-6 py-4">
            <div class="flex flex-wrap items-center gap-3">
                <!-- Search Bar -->
                <div class="flex-1 min-w-[300px]">
                    <div class="relative">
                        <input type="text" id="search-input" placeholder="Search by name, email, or ID..."
                            class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                </div>

                <!-- Filter by Role -->
                <div class="relative">
                    <button id="role-filter-button" onclick="toggleDropdown('role-filter')"
                        class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors flex items-center gap-2 bg-white">
                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                            </path>
                        </svg>
                        <span class="text-sm font-medium text-gray-700">Filter by Role</span>
                        <span id="role-filter-badge"
                            class="hidden px-2 py-0.5 text-xs font-semibold bg-blue-100 text-blue-800 rounded-full"></span>
                        <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>

                    <div id="role-filter"
                        class="hidden absolute z-10 mt-2 w-64 bg-white border border-gray-300 rounded-lg shadow-lg filter-dropdown">
                        <div class="p-3">
                            <h6 class="text-sm font-semibold text-gray-900 mb-2">Select Role</h6>
                            <div class="space-y-2">
                                <label class="flex items-center cursor-pointer hover:bg-gray-50 p-2 rounded">
                                    <input type="checkbox" value="all" checked onchange="filterByRole('all', this)"
                                        class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                    <span class="ml-2 text-sm text-gray-700">All Roles</span>
                                </label>
                                <label class="flex items-center cursor-pointer hover:bg-gray-50 p-2 rounded">
                                    <input type="checkbox" value="Admin" onchange="filterByRole('Admin', this)"
                                        class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                    <span class="ml-2 text-sm text-gray-700">Admin</span>
                                </label>
                                <label class="flex items-center cursor-pointer hover:bg-gray-50 p-2 rounded">
                                    <input type="checkbox" value="Manager" onchange="filterByRole('Manager', this)"
                                        class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                    <span class="ml-2 text-sm text-gray-700">Manager</span>
                                </label>
                                <label class="flex items-center cursor-pointer hover:bg-gray-50 p-2 rounded">
                                    <input type="checkbox" value="Operateur" onchange="filterByRole('Operateur', this)"
                                        class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                    <span class="ml-2 text-sm text-gray-700">Operateur</span>
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
                                    <input type="checkbox" value="active" onchange="filterByStatus('active', this)"
                                        class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                    <span class="ml-2 text-sm text-gray-700">Active</span>
                                </label>
                                <label class="flex items-center cursor-pointer hover:bg-gray-50 p-2 rounded">
                                    <input type="checkbox" value="inactive"
                                        onchange="filterByStatus('inactive', this)"
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
                <!-- Single responsive container - just like locations table -->
                <div class="overflow-x-auto">
                    <table id="users-table" class="w-full">
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap">
                                    User</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap">
                                    Email</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap">
                                    Phone</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap">
                                    Businesses</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap">
                                    Role</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap">
                                    Status</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <!-- DataTables will populate this -->
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
                    <p class="text-gray-500 text-lg font-medium">No users found</p>
                    <p class="text-gray-400 text-sm mt-1">Try adjusting your filters or search criteria</p>
                </div>

                <!-- Pagination -->
                <div class="bg-white px-6 py-4 border-t border-gray-200 flex items-center justify-between">
                    <div class="text-sm text-gray-700" id="table-info">
                        Showing <span class="font-medium">0</span> to <span class="font-medium">0</span> of <span
                            class="font-medium">0</span> users
                    </div>
                    <div class="flex gap-2" id="table-pagination">
                        <!-- Pagination buttons -->
                    </div>
                </div>
            </div>
        </div>
    </main>

    <x-slot name="script">
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <script>
            let usersTable;
            let selectedRoles = ['all'];
            let selectedStatuses = ['all'];
            let sortAscending = true;

            $(document).ready(function() {
                // Initialize DataTable WITHOUT scrollX - keeps header and body in same table
                usersTable = $('#users-table').DataTable({
                    processing: true,
                    serverSide: true,
                    // REMOVED: scrollX: true - this was splitting the table
                    autoWidth: false,
                    responsive: false,

                    ajax: {
                        url: "{{ route('users.data') }}",
                        data: function(d) {
                            d.selectedRoles = selectedRoles;
                            d.selectedStatuses = selectedStatuses;
                        }
                    },
                    columns: [{
                            data: 'user',
                            name: 'user',
                            orderable: false
                        },
                        {
                            data: 'email',
                            name: 'email'
                        },
                        {
                            data: 'phone',
                            name: 'phone',
                            defaultContent: '-'
                        },
                        {
                            data: 'business',
                            name: 'business',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'role',
                            name: 'role',
                            orderable: false
                        },
                        {
                            data: 'status',
                            name: 'status'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        }
                    ],
                    order: [
                        [1, 'asc']
                    ],
                    pageLength: 10,
                    drawCallback: function(settings) {
                        var api = this.api();
                        var info = api.page.info();

                        $('#table-info').html(
                            'Showing <span class="font-medium">' + (info.start + 1) + '</span> to ' +
                            '<span class="font-medium">' + info.end + '</span> of ' +
                            '<span class="font-medium">' + info.recordsTotal + '</span> users'
                        );

                        var paginationHtml = '';

                        paginationHtml +=
                            '<button onclick="tablePrevious()" class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 ' +
                            (info.page === 0 ? 'disabled:opacity-50 cursor-not-allowed' : '') + '" ' +
                            (info.page === 0 ? 'disabled' : '') + '>Previous</button>';

                        for (var i = 0; i < info.pages; i++) {
                            if (i === info.page) {
                                paginationHtml +=
                                    '<button class="px-3 py-2 bg-blue-600 text-white rounded-lg text-sm font-medium">' +
                                    (i + 1) + '</button>';
                            } else {
                                paginationHtml += '<button onclick="tableGoToPage(' + i +
                                    ')" class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50">' +
                                    (i + 1) + '</button>';
                            }
                        }

                        paginationHtml +=
                            '<button onclick="tableNext()" class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 ' +
                            (info.page === info.pages - 1 ? 'disabled:opacity-50 cursor-not-allowed' : '') +
                            '" ' +
                            (info.page === info.pages - 1 ? 'disabled' : '') + '>Next</button>';

                        $('#table-pagination').html(paginationHtml);

                        if (info.recordsDisplay === 0) {
                            $('#no-results').removeClass('hidden');
                            $('#users-table').addClass('hidden');
                        } else {
                            $('#no-results').addClass('hidden');
                            $('#users-table').removeClass('hidden');
                        }
                    }
                });

                // Search input
                $('#search-input').on('keyup', function() {
                    usersTable.search(this.value).draw();
                });

                // Close dropdowns when clicking outside
                document.addEventListener('click', function(event) {
                    const dropdowns = document.querySelectorAll('.filter-dropdown');
                    const buttons = document.querySelectorAll('[id$="-filter-button"]');

                    let clickedOnDropdown = false;
                    let clickedOnButton = false;

                    dropdowns.forEach(dropdown => {
                        if (dropdown.contains(event.target)) {
                            clickedOnDropdown = true;
                        }
                    });

                    buttons.forEach(button => {
                        if (button.contains(event.target)) {
                            clickedOnButton = true;
                        }
                    });

                    if (!clickedOnDropdown && !clickedOnButton) {
                        dropdowns.forEach(dropdown => {
                            dropdown.classList.add('hidden');
                        });
                    }
                });
            });

            function toggleDropdown(id) {
                const dropdown = document.getElementById(id);
                const allDropdowns = document.querySelectorAll('.filter-dropdown');

                allDropdowns.forEach(d => {
                    if (d.id !== id && !d.classList.contains('hidden')) {
                        d.classList.add('hidden');
                    }
                });

                dropdown.classList.toggle('hidden');
            }

            function filterByRole(role, checkbox) {
                if (role === 'all') {
                    if (checkbox.checked) {
                        selectedRoles = ['all'];
                        document.querySelectorAll('#role-filter input[type="checkbox"]').forEach(cb => {
                            if (cb.value !== 'all') {
                                cb.checked = false;
                            }
                        });
                    } else {
                        const firstOption = document.querySelector('#role-filter input[type="checkbox"]:not([value="all"])');
                        if (firstOption) {
                            firstOption.checked = true;
                            selectedRoles = [firstOption.value];
                        }
                    }
                } else {
                    if (checkbox.checked) {
                        const allCheckbox = document.querySelector('#role-filter input[value="all"]');
                        allCheckbox.checked = false;

                        if (selectedRoles.includes('all')) {
                            selectedRoles = [role];
                        } else {
                            selectedRoles.push(role);
                        }
                    } else {
                        selectedRoles = selectedRoles.filter(r => r !== role);

                        if (selectedRoles.length === 0) {
                            const allCheckbox = document.querySelector('#role-filter input[value="all"]');
                            allCheckbox.checked = true;
                            selectedRoles = ['all'];
                        }
                    }
                }

                updateRoleBadge();
                usersTable.ajax.reload();
            }

            function filterByStatus(status, checkbox) {
                if (status === 'all') {
                    if (checkbox.checked) {
                        selectedStatuses = ['all'];
                        document.querySelectorAll('#status-filter input[type="checkbox"]').forEach(cb => {
                            if (cb.value !== 'all') {
                                cb.checked = false;
                            }
                        });
                    } else {
                        const firstOption = document.querySelector('#status-filter input[type="checkbox"]:not([value="all"])');
                        if (firstOption) {
                            firstOption.checked = true;
                            selectedStatuses = [firstOption.value];
                        }
                    }
                } else {
                    if (checkbox.checked) {
                        const allCheckbox = document.querySelector('#status-filter input[value="all"]');
                        allCheckbox.checked = false;

                        if (selectedStatuses.includes('all')) {
                            selectedStatuses = [status];
                        } else {
                            selectedStatuses.push(status);
                        }
                    } else {
                        selectedStatuses = selectedStatuses.filter(s => s !== status);

                        if (selectedStatuses.length === 0) {
                            const allCheckbox = document.querySelector('#status-filter input[value="all"]');
                            allCheckbox.checked = true;
                            selectedStatuses = ['all'];
                        }
                    }
                }

                updateStatusBadge();
                usersTable.ajax.reload();
            }

            function updateRoleBadge() {
                const badge = document.getElementById('role-filter-badge');
                if (selectedRoles.includes('all') || selectedRoles.length === 0) {
                    badge.classList.add('hidden');
                } else {
                    badge.textContent = selectedRoles.length;
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

            function sortTable() {
                const column = usersTable.column(1);
                column.order(sortAscending ? 'asc' : 'desc').draw();

                sortAscending = !sortAscending;
                document.getElementById('sort-button').querySelector('span').textContent =
                    sortAscending ? 'Sort A-Z' : 'Sort Z-A';
            }

            function clearAllFilters() {
                document.getElementById('search-input').value = '';
                usersTable.search('').draw();

                selectedRoles = ['all'];
                document.querySelectorAll('#role-filter input[type="checkbox"]').forEach(cb => {
                    cb.checked = cb.value === 'all';
                });
                updateRoleBadge();

                selectedStatuses = ['all'];
                document.querySelectorAll('#status-filter input[type="checkbox"]').forEach(cb => {
                    cb.checked = cb.value === 'all';
                });
                updateStatusBadge();

                sortAscending = true;
                document.getElementById('sort-button').querySelector('span').textContent = 'Sort A-Z';

                usersTable.ajax.reload();
            }

            function tablePrevious() {
                usersTable.page('previous').draw('page');
            }

            function tableNext() {
                usersTable.page('next').draw('page');
            }

            function tableGoToPage(page) {
                usersTable.page(page).draw('page');
            }

            function deleteUser(id) {
                if (confirm('Are you sure you want to delete this user?')) {
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = '/admin/users/' + id;
                    form.innerHTML = '@csrf @method('DELETE')';
                    document.body.appendChild(form);
                    form.submit();
                }
            }
        </script>
    </x-slot>
</x-main-layout>
