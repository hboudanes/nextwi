<x-main-layout>
    <main class="lg:ml-64 min-h-screen">
        <!-- Header -->
        <header class="bg-white border-b border-gray-200 px-8 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <a href="#" class="flex items-center gap-2 text-gray-500 hover:text-gray-700">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 448 512">
                            <path
                                d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z">
                            </path>
                        </svg>
                        <span class="text-sm">Business Management</span>
                    </a>
                    <div class="h-4 w-px bg-gray-300"></div>
                    <h1 class="text-2xl font-bold text-gray-900">Acme Corporation</h1>
                </div>
                <div class="flex items-center gap-3">
                    <a href="#"
                        class="border border-gray-300 px-4 py-2 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                        Edit Business
                    </a>
                    <a href="#"
                        class="border border-gray-300 px-4 py-2 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                        View Activity Log
                    </a>
                    <button class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition-colors">
                        Delete Business
                    </button>
                </div>
            </div>
            <div class="flex items-center gap-6 mt-3 text-sm">
                <span class="text-gray-600">TAX ID: <span class="font-medium text-gray-900">123-456-789</span></span>
                <div class="h-4 w-px bg-gray-300"></div>
                <span class="text-gray-600">Admin: <span class="font-medium text-gray-900">John Doe (Super
                        Admin)</span></span>
                <div class="h-4 w-px bg-gray-300"></div>
                <span class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs font-medium">
                    Active
                </span>
                <div class="h-4 w-px bg-gray-300"></div>
                <span class="text-lg font-semibold text-green-600">Credit: $15,250.00</span>
            </div>
        </header>

        <!-- Date Filter -->
        <section class="px-8 py-4 bg-gray-50 border-b border-gray-200">
            <div class="flex items-center gap-4">
                <div class="flex items-center gap-2">
                    <label class="text-sm font-medium text-gray-700">Date Range:</label>
                    <input type="date" id="date-from" value="2025-10-01"
                        class="border border-gray-300 rounded-lg px-3 py-2 text-sm">
                    <span class="text-gray-500">to</span>
                    <input type="date" id="date-to" value="2025-10-22"
                        class="border border-gray-300 rounded-lg px-3 py-2 text-sm">
                </div>
                <button onclick="alert('Filter applied!')"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors text-sm">
                    Apply Filter
                </button>
                <button
                    onclick="document.getElementById('date-from').value=''; document.getElementById('date-to').value='';"
                    class="text-gray-600 hover:text-gray-800 text-sm">
                    Clear
                </button>
            </div>
        </section>

        <!-- Analytics Cards -->
        <section class="px-8 py-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-4">

                <!-- Total Locations -->
                <x-stats-card :icon="'<svg class=\'w-6 h-6\' fill=\'currentColor\' viewBox=\'0 0 320 512\'><path d=\'M16 144a144 144 0 1 1 288 0A144 144 0 1 1 16 144zM160 80c8.8 0 16-7.2 16-16s-7.2-16-16-16c-53 0-96 43-96 96c0 8.8 7.2 16 16 16s16-7.2 16-16c0-35.3 28.7-64 64-64zM128 480V317.1c10.4 1.9 21.1 2.9 32 2.9s21.6-1 32-2.9V480c0 17.7-14.3 32-32 32s-32-14.3-32-32z\'/></svg>'" icon-bg="bg-blue-100" icon-color="text-blue-600" value="12"
                    label="Total Locations" />

                <!-- Total Guests -->
                <x-stats-card :icon="'<svg class=\'w-6 h-6\' fill=\'currentColor\' viewBox=\'0 0 640 512\'><path d=\'M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z\'/></svg>'" icon-bg="bg-green-100" icon-color="text-green-600" value="3,457"
                    label="Total Guests" />

                <!-- Active Vouchers -->
                <x-stats-card :icon="'<svg class=\'w-6 h-6\' fill=\'currentColor\' viewBox=\'0 0 576 512\'><path d=\'M64 64C28.7 64 0 92.7 0 128v64c0 8.8 7.4 15.7 15.7 18.6C34.5 217.1 48 235 48 256s-13.5 38.9-32.3 45.4C7.4 304.3 0 311.2 0 320v64c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V320c0-8.8-7.4-15.7-15.7-18.6C541.5 294.9 528 277 528 256s13.5-38.9 32.3-45.4c8.3-2.9 15.7-9.8 15.7-18.6V128c0-35.3-28.7-64-64-64H64zm64 112l0 160c0 8.8 7.2 16 16 16H432c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H144c-8.8 0-16 7.2-16 16zM96 160c0-17.7 14.3-32 32-32H448c17.7 0 32 14.3 32 32V352c0 17.7-14.3 32-32 32H128c-17.7 0-32-14.3-32-32V160z\'/></svg>'" icon-bg="bg-purple-100" icon-color="text-purple-600" value="48"
                    label="Active Vouchers" badge="127 redeemed" badge-color="text-gray-500" />

                <!-- Credit Balance -->
                <x-stats-card :icon="'<svg class=\'w-6 h-6\' fill=\'currentColor\' viewBox=\'0 0 576 512\'><path d=\'M64 32C28.7 32 0 60.7 0 96v32H576V96c0-35.3-28.7-64-64-64H64zM576 224H0V416c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V224zM112 352h64c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16zm112 16c0-8.8 7.2-16 16-16H368c8.8 0 16 7.2 16 16s-7.2 16-16 16H240c-8.8 0-16-7.2-16-16z\'/></svg>'" icon-bg="bg-orange-100" icon-color="text-orange-600" value="$15,250"
                    label="Credit Balance" />

                <!-- Pending Actions -->
                <x-stats-card :icon="'<svg class=\'w-6 h-6\' fill=\'currentColor\' viewBox=\'0 0 512 512\'><path d=\'M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24V264c0 13.3-10.7 24-24 24s-24-10.7-24-24V152c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z\'/></svg>'" icon-bg="bg-red-100" icon-color="text-red-600" value="7"
                    label="Pending Actions" badge="3 require attention" badge-color="text-red-600" />
            </div>
        </section>

        <!-- Tabs Navigation -->
        <nav class="bg-white border-b border-gray-200 px-8 mt-6">
            <div class="flex gap-6">
                <button
                    class="tab-btn px-4 py-3 font-medium text-sm cursor-pointer transition-colors text-blue-600 border-b-2 border-blue-600"
                    data-tab="locations">
                    Locations (12)
                </button>
                <button
                    class="tab-btn px-4 py-3 font-medium text-sm cursor-pointer hover:text-gray-700 transition-colors text-gray-500"
                    data-tab="users">
                    Users (45)
                </button>
                <button
                    class="tab-btn px-4 py-3 font-medium text-sm cursor-pointer hover:text-gray-700 transition-colors text-gray-500"
                    data-tab="vouchers">
                    Vouchers (48)
                </button>
                <button
                    class="tab-btn px-4 py-3 font-medium text-sm cursor-pointer hover:text-gray-700 transition-colors text-gray-500"
                    data-tab="activity">
                    Activity Log
                </button>
            </div>
        </nav>

        <!-- Locations Tab -->
        <div id="locations-tab" class="tab-content">
            <div class="flex items-center justify-between px-8 py-4">
                <div class="flex items-center gap-3">
                    <h2 class="text-xl font-semibold text-gray-900">Locations</h2>
                    <span class="bg-gray-100 text-gray-600 px-2 py-1 rounded-full text-sm">12</span>
                </div>
                <a href="#"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors flex items-center gap-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 448 512">
                        <path
                            d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z">
                        </path>
                    </svg>
                    Add New Location
                </a>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6 px-8 pb-8">
                <!-- Location Card 1 -->
                <x-location-card name="Downtown Office" address="123 Main St, New York, NY 10001"
                    phone="+1 (555) 123-4567" googleMapsLink="https://maps.google.com" status="active" :operators="['John Smith', 'Sarah Johnson']"
                    :management="['Mike Williams', 'Emily Brown', 'David Lee']" :vouchers="15" :viewRoute="route('locations.show')" editRoute="#" deleteRoute="#" />

                <!-- Location Card 2 -->
                <x-location-card name="Airport Terminal" address="456 Airport Rd, Los Angeles, CA 90045"
                    phone="+1 (555) 234-5678" googleMapsLink="https://maps.google.com" status="active"
                    :operators="['Robert Taylor']" :management="['Jennifer Davis']" :vouchers="22" :viewRoute="route('locations.show')" editRoute="#"
                    deleteRoute="#" />

                <!-- Location Card 3 -->
                <x-location-card name="Mall Plaza" address="789 Shopping Blvd, Chicago, IL 60601"
                    phone="+1 (555) 345-6789" googleMapsLink="https://maps.google.com" status="pending"
                    :operators="[]" :management="['Tom Anderson']" :vouchers="8" viewRoute="#" editRoute="#"
                    deleteRoute="#" />

                <!-- Location Card 4 -->
                <x-location-card name="Hotel Resort" address="321 Beach Ave, Miami, FL 33139"
                    phone="+1 (555) 456-7890" googleMapsLink="https://maps.google.com" status="active"
                    :operators="['Lisa Martinez', 'Chris Wilson', 'Amanda Garcia']" :management="['Mark Thompson']" :vouchers="31" viewRoute="#" editRoute="#"
                    deleteRoute="#" />

                <!-- Location Card 5 -->
                <x-location-card name="University Campus" address="555 College St, Boston, MA 02115"
                    phone="+1 (555) 567-8901" googleMapsLink="https://maps.google.com" status="inactive"
                    :operators="[]" :management="[]" :vouchers="0" viewRoute="#" editRoute="#"
                    deleteRoute="#" />

                <!-- Location Card 6 -->
                <x-location-card name="Tech Park" address="888 Innovation Dr, San Francisco, CA 94105"
                    phone="+1 (555) 678-9012" googleMapsLink="https://maps.google.com" status="active"
                    :operators="['Kevin Rodriguez']" :management="['Jessica Moore', 'Daniel White']" :vouchers="19" viewRoute="#" editRoute="#"
                    deleteRoute="#" />
            </div>
        </div>

        <!-- Vouchers Tab -->
        <div id="vouchers-tab" class="tab-content hidden">
            <div class="px-8 py-4">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center gap-6">
                        <div class="flex items-center gap-3">
                            <h2 class="text-xl font-semibold text-gray-900">Vouchers</h2>
                            <span class="bg-gray-100 text-gray-600 px-2 py-1 rounded-full text-sm">48</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <button onclick="filterVouchers('active')"
                                class="voucher-filter-btn bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-medium">
                                Active
                            </button>
                            <button onclick="filterVouchers('expired')"
                                class="voucher-filter-btn text-gray-500 hover:bg-gray-100 px-3 py-1 rounded-full text-sm">
                                Expired
                            </button>
                            <button onclick="filterVouchers('all')"
                                class="voucher-filter-btn text-gray-500 hover:bg-gray-100 px-3 py-1 rounded-full text-sm">
                                All
                            </button>
                        </div>
                    </div>
                    <a href="#"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors flex items-center gap-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 448 512">
                            <path
                                d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z">
                            </path>
                        </svg>
                        Create New Voucher
                    </a>
                </div>

                <div class="flex items-center gap-2 mb-6">
                    <input type="text" id="voucher-search-code" placeholder="Search by code..."
                        class="border border-gray-300 rounded-lg px-3 py-2 text-sm w-64">
                    <input type="text" id="voucher-search-location" placeholder="Search by location..."
                        class="border border-gray-300 rounded-lg px-3 py-2 text-sm w-64">
                    <button onclick="searchVouchers()"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 text-sm">
                        Search
                    </button>
                    <button onclick="clearSearch()" class="text-gray-600 hover:text-gray-800 text-sm">Clear</button>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 px-8 pb-8"
                id="vouchers-grid">
                <!-- Voucher Card 1 -->
                <x-voucher-card code="WIFI2025" location="Downtown Office" validUntil="Dec 31, 2025"
                    :used="45" :total="100" status="active" editRoute="#" deleteRoute="#" />

                <!-- Voucher Card 2 -->
                <x-voucher-card code="AIRPORT50" location="Airport Terminal" validUntil="Nov 30, 2025"
                    :used="22" :total="50" status="active" editRoute="#" deleteRoute="#" />

                <!-- Voucher Card 3 -->
                <x-voucher-card code="MALL2024" location="Mall Plaza" validUntil="Oct 15, 2025" :used="75"
                    :total="75" status="used" editRoute="#" deleteRoute="#" />

                <!-- Voucher Card 4 -->
                <x-voucher-card code="HOTEL100" location="Hotel Resort" validUntil="Jan 15, 2026" :used="12"
                    :total="100" status="active" editRoute="#" deleteRoute="#" />

                <!-- Voucher Card 5 -->
                <x-voucher-card code="CAMPUS2025" location="University Campus" validUntil="Sep 30, 2025"
                    :used="200" :total="200" status="expired" editRoute="#" deleteRoute="#" />

                <!-- Voucher Card 6 -->
                <x-voucher-card code="TECH50" location="Tech Park" validUntil="Dec 15, 2025" :used="8"
                    :total="50" status="active" editRoute="#" deleteRoute="#" />

                <!-- Voucher Card 7 -->
                <x-voucher-card code="GUEST2025" location="All Locations" validUntil="Mar 31, 2026"
                    :used="156" :total="500" status="active" editRoute="#" deleteRoute="#" />

                <!-- Voucher Card 8 -->
                <x-voucher-card code="VIP100" location="Downtown Office" validUntil="Aug 20, 2025"
                    :used="100" :total="100" status="used" editRoute="#" deleteRoute="#" />
            </div>
        </div>

        <!-- Users Tab -->
        <div id="users-tab" class="tab-content hidden">
            <div class="px-8 py-6">
                <div class="text-center text-gray-500 py-20">
                    <svg class="w-16 h-16 mx-auto mb-4 text-gray-400" fill="currentColor" viewBox="0 0 640 512">
                        <path
                            d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z">
                        </path>
                    </svg>
                    <h3 class="text-lg font-semibold mb-2">Users Section</h3>
                    <p>User management content goes here</p>
                </div>
            </div>
        </div>

        <!-- Activity Tab -->
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

            // Voucher filter
            function filterVouchers(status) {
                const buttons = document.querySelectorAll('.voucher-filter-btn');
                buttons.forEach(btn => {
                    btn.classList.remove('bg-green-100', 'text-green-700');
                    btn.classList.add('text-gray-500');
                });
                event.target.classList.remove('text-gray-500');
                event.target.classList.add('bg-green-100', 'text-green-700');

                alert('Filter by: ' + status);
            }

            // Voucher search
            function searchVouchers() {
                const code = document.getElementById('voucher-search-code').value;
                const location = document.getElementById('voucher-search-location').value;

                alert('Searching for:\nCode: ' + code + '\nLocation: ' + location);
            }

            function clearSearch() {
                document.getElementById('voucher-search-code').value = '';
                document.getElementById('voucher-search-location').value = '';
            }
        </script>
    </x-slot>
</x-main-layout>
