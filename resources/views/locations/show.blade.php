<x-main-layout>
    <main class="lg:ml-64 min-h-screen bg-gray-50">
        <!-- Header -->
        <header class="bg-white border-b border-gray-200 px-8 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <a href="{{ route('businesses.show', 1) }}"
                        class="flex items-center gap-2 text-gray-500 hover:text-gray-700">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 448 512">
                            <path
                                d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z">
                            </path>
                        </svg>
                        <span class="text-sm">Acme Corporation</span>
                    </a>
                    <div class="h-4 w-px bg-gray-300"></div>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 320 512">
                                <path
                                    d="M16 144a144 144 0 1 1 288 0A144 144 0 1 1 16 144zM160 80c8.8 0 16-7.2 16-16s-7.2-16-16-16c-53 0-96 43-96 96c0 8.8 7.2 16 16 16s16-7.2 16-16c0-35.3 28.7-64 64-64zM128 480V317.1c10.4 1.9 21.1 2.9 32 2.9s21.6-1 32-2.9V480c0 17.7-14.3 32-32 32s-32-14.3-32-32z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-gray-900">Downtown Office</h1>
                            <p class="text-sm text-gray-500">123 Main St, New York, NY 10001</p>
                        </div>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <!-- Pause Button (Orange) -->
                    <button
                        class="border border-orange-300 bg-orange-50 px-4 py-2 rounded-lg text-orange-700 hover:bg-orange-100 transition-colors flex items-center gap-2">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 320 512">
                            <path
                                d="M48 64C21.5 64 0 85.5 0 112V400c0 26.5 21.5 48 48 48H80c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48H48zm192 0c-26.5 0-48 21.5-48 48V400c0 26.5 21.5 48 48 48h32c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48H240z">
                            </path>
                        </svg>
                        Pause
                    </button>

                    <!-- Edit Button -->
                    <a href="{{ route('locations.edit', 1) }}"
                        class="border border-gray-300 bg-white px-4 py-2 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors flex items-center gap-2">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 512 512">
                            <path
                                d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z">
                            </path>
                        </svg>
                        Edit Location
                    </a>
                </div>
            </div>
            <div class="flex items-center gap-6 mt-3 text-sm">
                <span class="text-gray-600">Phone: <span class="font-medium text-gray-900">+1 (555)
                        123-4567</span></span>
                <div class="h-4 w-px bg-gray-300"></div>
                <span class="text-gray-600">Business: <span class="font-medium text-gray-900">Acme
                        Corporation</span></span>
                <div class="h-4 w-px bg-gray-300"></div>
                <span class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs font-medium">
                    Active
                </span>
                <div class="h-4 w-px bg-gray-300"></div>
                <span class="text-gray-600">Created: <span class="font-medium text-gray-900">Jan 15, 2025</span></span>
            </div>
        </header>


        <!-- Date Filter -->
        <section class="px-8 py-4 bg-white border-b border-gray-200">
            <div class="flex items-center gap-4">
                <div class="flex items-center gap-2">
                    <label class="text-sm font-medium text-gray-700">Date Range:</label>
                    <input type="date" id="date-from" value="2025-10-01"
                        class="border border-gray-300 rounded-lg px-3 py-2 text-sm">
                    <span class="text-gray-500">to</span>
                    <input type="date" id="date-to" value="2025-10-23"
                        class="border border-gray-300 rounded-lg px-3 py-2 text-sm">
                </div>
                <button onclick="alert('Filter applied!')"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors text-sm">
                    Apply Filter
                </button>
                <button onclick="clearDateFilter()" class="text-gray-600 hover:text-gray-800 text-sm">
                    Clear
                </button>
            </div>
        </section>


        <!-- Analytics Cards -->
        <section class="px-8 py-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">


                <!-- Total Guests -->
                <x-stats-card :icon="'<svg class=\'w-6 h-6\' fill=\'currentColor\' viewBox=\'0 0 640 512\'><path d=\'M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z\'/></svg>'" icon-bg="bg-blue-100" icon-color="text-blue-600" value="1,847"
                    label="Total Guests" badge="+243 this period" badge-color="text-green-600" />


                <!-- Active Guests -->
                <x-stats-card :icon="'<svg class=\'w-6 h-6\' fill=\'currentColor\' viewBox=\'0 0 448 512\'><path d=\'M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z\'/></svg>'" icon-bg="bg-green-100" icon-color="text-green-600" value="327"
                    label="Active Now" badge="Online guests" badge-color="text-gray-500" />


                <!-- Active Vouchers -->
                <x-stats-card :icon="'<svg class=\'w-6 h-6\' fill=\'currentColor\' viewBox=\'0 0 576 512\'><path d=\'M64 64C28.7 64 0 92.7 0 128v64c0 8.8 7.4 15.7 15.7 18.6C34.5 217.1 48 235 48 256s-13.5 38.9-32.3 45.4C7.4 304.3 0 311.2 0 320v64c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V320c0-8.8-7.4-15.7-15.7-18.6C541.5 294.9 528 277 528 256s13.5-38.9 32.3-45.4c8.3-2.9 15.7-9.8 15.7-18.6V128c0-35.3-28.7-64-64-64H64zm64 112l0 160c0 8.8 7.2 16 16 16H432c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H144c-8.8 0-16 7.2-16 16zM96 160c0-17.7 14.3-32 32-32H448c17.7 0 32 14.3 32 32V352c0 17.7-14.3 32-32 32H128c-17.7 0-32-14.3-32-32V160z\'/></svg>'" icon-bg="bg-purple-100" icon-color="text-purple-600" value="15"
                    label="Active Vouchers" badge="42 redeemed" badge-color="text-gray-500" />


                <!-- Connection Time -->
                <x-stats-card :icon="'<svg class=\'w-6 h-6\' fill=\'currentColor\' viewBox=\'0 0 512 512\'><path d=\'M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z\'/></svg>'" icon-bg="bg-orange-100" icon-color="text-orange-600" value="2.4h"
                    label="Avg Connection Time" badge="Per guest" badge-color="text-gray-500" />
            </div>
        </section>


        <!-- Guest Activity Chart -->
        <section class="px-8 py-6">
            <x-guest-activity-chart :data="[
                ['label' => 'Mon', 'count' => 145],
                ['label' => 'Tue', 'count' => 198],
                ['label' => 'Wed', 'count' => 176],
                ['label' => 'Thu', 'count' => 223],
                ['label' => 'Fri', 'count' => 267],
                ['label' => 'Sat', 'count' => 312],
                ['label' => 'Sun', 'count' => 289],
            ]" />
        </section>


        <!-- Team Section -->
        <section class="px-8 py-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Management Card -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-900 flex items-center gap-2">
                            <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 448 512">
                                <path
                                    d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-96 55.2C54 332.9 0 401.3 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7c0-81-54-149.4-128-171.1V362c27.6 7.1 48 32.2 48 62v40c0 8.8-7.2 16-16 16H336c-8.8 0-16-7.2-16-16s7.2-16 16-16V424c0-17.7-14.3-32-32-32s-32 14.3-32 32v24c8.8 0 16 7.2 16 16s-7.2 16-16 16H256c-8.8 0-16-7.2-16-16V424c0-29.8 20.4-54.9 48-62V304.9c-6-.6-12.1-.9-18.3-.9H178.3c-6.2 0-12.3 .3-18.3 .9v65.4c23.1 6.9 40 28.3 40 53.7c0 30.9-25.1 56-56 56s-56-25.1-56-56c0-25.4 16.9-46.8 40-53.7V311.2zM144 448a24 24 0 1 0 0-48 24 24 0 1 0 0 48z">
                                </path>
                            </svg>
                            Management Team
                        </h3>
                        <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded-full text-xs font-medium">3</span>
                    </div>
                    <div class="space-y-3">
                        <div class="flex items-center gap-3 p-3 hover:bg-gray-50 rounded-lg transition-colors">
                            <div
                                class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center text-white font-semibold">
                                MW
                            </div>
                            <div class="flex-1">
                                <div class="font-medium text-gray-900">Mike Williams</div>
                                <div class="text-sm text-gray-500">Location Manager</div>
                            </div>
                            <span class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs">Active</span>
                        </div>
                        <div class="flex items-center gap-3 p-3 hover:bg-gray-50 rounded-lg transition-colors">
                            <div
                                class="w-10 h-10 bg-gradient-to-br from-purple-500 to-purple-600 rounded-full flex items-center justify-center text-white font-semibold">
                                EB
                            </div>
                            <div class="flex-1">
                                <div class="font-medium text-gray-900">Emily Brown</div>
                                <div class="text-sm text-gray-500">Operations Lead</div>
                            </div>
                            <span class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs">Active</span>
                        </div>
                        <div class="flex items-center gap-3 p-3 hover:bg-gray-50 rounded-lg transition-colors">
                            <div
                                class="w-10 h-10 bg-gradient-to-br from-orange-500 to-orange-600 rounded-full flex items-center justify-center text-white font-semibold">
                                DL
                            </div>
                            <div class="flex-1">
                                <div class="font-medium text-gray-900">David Lee</div>
                                <div class="text-sm text-gray-500">IT Coordinator</div>
                            </div>
                            <span class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs">Active</span>
                        </div>
                    </div>
                </div>


                <!-- Operators Card -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-900 flex items-center gap-2">
                            <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 640 512">
                                <path
                                    d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z">
                                </path>
                            </svg>
                            Operators
                        </h3>
                        <span class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs font-medium">2</span>
                    </div>
                    <div class="space-y-3">
                        <div class="flex items-center gap-3 p-3 hover:bg-gray-50 rounded-lg transition-colors">
                            <div
                                class="w-10 h-10 bg-gradient-to-br from-green-500 to-green-600 rounded-full flex items-center justify-center text-white font-semibold">
                                JS
                            </div>
                            <div class="flex-1">
                                <div class="font-medium text-gray-900">John Smith</div>
                                <div class="text-sm text-gray-500">Senior Operator</div>
                            </div>
                            <span class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs">Active</span>
                        </div>
                        <div class="flex items-center gap-3 p-3 hover:bg-gray-50 rounded-lg transition-colors">
                            <div
                                class="w-10 h-10 bg-gradient-to-br from-teal-500 to-teal-600 rounded-full flex items-center justify-center text-white font-semibold">
                                SJ
                            </div>
                            <div class="flex-1">
                                <div class="font-medium text-gray-900">Sarah Johnson</div>
                                <div class="text-sm text-gray-500">Network Operator</div>
                            </div>
                            <span class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs">Active</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Tabs Section -->
        <nav class="bg-white border-b border-gray-200 px-8 mt-6">
            <div class="flex gap-6">
                <button
                    class="tab-btn px-4 py-3 font-medium text-sm cursor-pointer transition-colors text-blue-600 border-b-2 border-blue-600"
                    data-tab="guests">
                    Guests (1,847)
                </button>
                <button
                    class="tab-btn px-4 py-3 font-medium text-sm cursor-pointer hover:text-gray-700 transition-colors text-gray-500"
                    data-tab="vouchers">
                    Profiles (3)
                </button>
                <button
                    class="tab-btn px-4 py-3 font-medium text-sm cursor-pointer hover:text-gray-700 transition-colors text-gray-500"
                    data-tab="devices">
                    Connected Devices (327)
                </button>
                <button
                    class="tab-btn px-4 py-3 font-medium text-sm cursor-pointer hover:text-gray-700 transition-colors text-gray-500"
                    data-tab="activity">
                    Activity Log
                </button>
            </div>
        </nav>


        <!-- Guests Tab -->
        <div id="guests-tab" class="tab-content">
            <div class="px-8 py-6">
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <div class="p-4 border-b border-gray-200 flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <input type="text" placeholder="Search guests..."
                                class="border border-gray-300 rounded-lg px-4 py-2 text-sm w-64">
                            <select class="border border-gray-300 rounded-lg px-4 py-2 text-sm">
                                <option>All Status</option>
                                <option>Active</option>
                                <option>Inactive</option>
                            </select>
                        </div>
                        <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 text-sm">
                            Export List
                        </button>
                    </div>
                    <table class="w-full">
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Guest Name
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email/Phone
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">First Visit
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Last Visit
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total
                                    Visits</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center text-blue-600 font-semibold text-sm">
                                            JD
                                        </div>
                                        <span class="font-medium text-gray-900">John Doe</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">john.doe@email.com</td>
                                <td class="px-6 py-4 text-sm text-gray-600">Jan 15, 2025</td>
                                <td class="px-6 py-4 text-sm text-gray-600">Oct 23, 2025 - 09:30 AM</td>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">47</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs font-medium">Active</span>
                                </td>
                                <td class="px-6 py-4">
                                    <button class="text-blue-600 hover:text-blue-700 text-sm">View Details</button>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center text-purple-600 font-semibold text-sm">
                                            JS
                                        </div>
                                        <span class="font-medium text-gray-900">Jane Smith</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">+1 555-0123</td>
                                <td class="px-6 py-4 text-sm text-gray-600">Feb 03, 2025</td>
                                <td class="px-6 py-4 text-sm text-gray-600">Oct 22, 2025 - 02:15 PM</td>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">23</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="bg-gray-100 text-gray-700 px-2 py-1 rounded-full text-xs font-medium">Inactive</span>
                                </td>
                                <td class="px-6 py-4">
                                    <button class="text-blue-600 hover:text-blue-700 text-sm">View Details</button>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center text-green-600 font-semibold text-sm">
                                            MB
                                        </div>
                                        <span class="font-medium text-gray-900">Michael Brown</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">m.brown@email.com</td>
                                <td class="px-6 py-4 text-sm text-gray-600">Mar 10, 2025</td>
                                <td class="px-6 py-4 text-sm text-gray-600">Oct 23, 2025 - 11:45 AM</td>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">15</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs font-medium">Active</span>
                                </td>
                                <td class="px-6 py-4">
                                    <button class="text-blue-600 hover:text-blue-700 text-sm">View Details</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <!-- Profiles Tab (formerly Vouchers) -->
        <div id="vouchers-tab" class="tab-content hidden">
            <div class="px-8 py-6">
                <!-- Header with Add Profile (non-functional for now) -->
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-900">Profiles</h3>
                    <button type="button"
                        class="inline-flex items-center px-3 py-2 bg-blue-600 text-white text-xs font-medium rounded-md opacity-70 cursor-not-allowed"
                        title="Coming soon">
                        Add Profile
                    </button>
                </div>


                <!-- Profiles grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Example Profile Card 1 -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
                            <div>
                                <h4 class="text-sm font-semibold text-gray-900">Guest Access</h4>
                                <p class="text-xs text-gray-600">Open Access profile</p>
                            </div>
                            <div class="flex items-center gap-2">
                                <a href="/locations/1/profile/1/vouchers/create"
                                    class="text-purple-600 hover:text-purple-700 text-sm">Add Vouchers</a>
                                <button class="p-2 rounded-md hover:bg-gray-100" aria-label="Edit" title="Edit">
                                    <svg class="w-4 h-4 text-gray-700" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 4h2m-1 0v2m-6.586 9.414a2 2 0 010-2.828l7.172-7.172a2 2 0 012.828 0l2.828 2.828a2 2 0 010 2.828l-7.172 7.172a2 2 0 01-2.828 0z" />
                                    </svg>
                                </button>
                                <button class="p-2 rounded-md hover:bg-red-50" aria-label="Delete" title="Delete">
                                    <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6l1-2H8l1 2z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>


                    <!-- Example Profile Card 2 -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
                            <div>
                                <h4 class="text-sm font-semibold text-gray-900">Staff</h4>
                                <p class="text-xs text-gray-600">Voucher Based profile</p>
                            </div>
                            <div class="flex items-center gap-2">
                                <a href="/locations/1/profile/2/vouchers/create"
                                    class="text-purple-600 hover:text-purple-700 text-sm">Add Vouchers</a>
                                <button class="p-2 rounded-md hover:bg-gray-100" aria-label="Edit" title="Edit">
                                    <svg class="w-4 h-4 text-gray-700" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 4h2m-1 0v2m-6.586 9.414a2 2 0 010-2.828l7.172-7.172a2 2 0 012.828 0l2.828 2.828a2 2 0 010 2.828l-7.172 7.172a2 2 0 01-2.828 0z" />
                                    </svg>
                                </button>
                                <button class="p-2 rounded-md hover:bg-red-50" aria-label="Delete" title="Delete">
                                    <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6l1-2H8l1 2z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>


                    <!-- Example Profile Card 3 -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
                            <div>
                                <h4 class="text-sm font-semibold text-gray-900">VIP</h4>
                                <p class="text-xs text-gray-600">Voucher Based profile</p>
                            </div>
                            <div class="flex items-center gap-2">
                                <a href="/locations/1/profile/3/vouchers/create"
                                    class="text-purple-600 hover:text-purple-700 text-sm">Add Vouchers</a>
                                <button class="p-2 rounded-md hover:bg-gray-100" aria-label="Edit" title="Edit">
                                    <svg class="w-4 h-4 text-gray-700" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 4h2m-1 0v2m-6.586 9.414a2 2 0 010-2.828l7.172-7.172a2 2 0 012.828 0l2.828 2.828a2 2 0 010 2.828l-7.172 7.172a2 2 0 01-2.828 0z" />
                                    </svg>
                                </button>
                                <button class="p-2 rounded-md hover:bg-red-50" aria-label="Delete" title="Delete">
                                    <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6l1-2H8l1 2z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Other tabs -->
        <div id="devices-tab" class="tab-content hidden">
            <div class="px-8 py-6">
                <div class="text-center text-gray-500 py-20">
                    <svg class="w-16 h-16 mx-auto mb-4 text-gray-400" fill="currentColor" viewBox="0 0 640 512">
                        <path
                            d="M64 96c0-35.3 28.7-64 64-64H512c35.3 0 64 28.7 64 64V352H512V96H128V352H64V96zM0 403.2C0 392.6 8.6 384 19.2 384H620.8c10.6 0 19.2 8.6 19.2 19.2c0 42.4-34.4 76.8-76.8 76.8H76.8C34.4 480 0 445.6 0 403.2zM281 209l-31 31 31 31c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-48-48c-9.4-9.4-9.4-24.6 0-33.9l48-48c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9zM393 175l48 48c9.4 9.4 9.4 24.6 0 33.9l-48 48c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l31-31-31-31c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0z">
                        </path>
                    </svg>
                    <h3 class="text-lg font-semibold mb-2">Connected Devices</h3>
                    <p>Real-time device monitoring coming soon</p>
                </div>
            </div>
        </div>


        <div id="activity-tab" class="tab-content hidden">
            <div class="px-8 py-6">
                <div class="text-center text-gray-500 py-20">
                    <svg class="w-16 h-16 mx-auto mb-4 text-gray-400" fill="currentColor" viewBox="0 0 512 512">
                        <path
                            d="M75 75L41 41C25.9 25.9 0 36.6 0 57.9V168c0 13.3 10.7 24 24 24H134.1c21.4 0 32.1-25.9 17-41l-30.8-30.8C155 85.5 203 64 256 64c106 0 192 86 192 192s-86 192-192 192c-40.8 0-78.6-12.7-109.7-34.4c-14.5-10.1-34.4-6.6-44.6 7.9s-6.6 34.4 7.9 44.6C151.2 495 201.7 512 256 512c141.4 0 256-114.6 256-256S397.4 0 256 0C185.3 0 121.3 28.7 75 75zm181 53c-13.3 0-24 10.7-24 24V256c0 6.4 2.5 12.5 7 17l72 72c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-65-65V152c0-13.3-10.7-24-24-24z">
                        </path>
                    </svg>
                    <h3 class="text-lg font-semibold mb-2">Activity Log</h3>
                    <p>Recent activity and changes will be displayed here</p>
                </div>
            </div>
        </div>
    </main>


    <x-slot name="script">
        <script>
            // Tab switching
            document.addEventListener('DOMContentLoaded', function() {
                const tabButtons = document.querySelectorAll('.tab-btn');
                const tabContents = document.querySelectorAll('.tab-content');


                tabButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        tabButtons.forEach(btn => {
                            btn.classList.remove('text-blue-600', 'border-b-2',
                                'border-blue-600');
                            btn.classList.add('text-gray-500');
                        });


                        this.classList.remove('text-gray-500');
                        this.classList.add('text-blue-600', 'border-b-2', 'border-blue-600');


                        tabContents.forEach(content => content.classList.add('hidden'));


                        const targetTab = this.getAttribute('data-tab');
                        document.getElementById(targetTab + '-tab').classList.remove('hidden');
                    });
                });
            });


            function clearDateFilter() {
                document.getElementById('date-from').value = '';
                document.getElementById('date-to').value = '';
            }
        </script>
    </x-slot>
</x-main-layout>
