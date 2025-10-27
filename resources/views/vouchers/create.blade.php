<x-main-layout>
    <main class="lg:ml-64 min-h-screen bg-gray-50">
        <div class="px-6 py-4">
            <div class="mb-4 flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-semibold">Create Voucher</h1>
                    <p class="text-sm text-gray-600">Create a new access voucher</p>
                </div>
                <a href="{{ url('/vouchers') }}" class="text-sm text-blue-600 hover:underline">Back to Vouchers</a>
            </div>

            <!-- Create Voucher Form -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden mb-6">
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 px-6 py-4">
                    <h2 class="text-lg font-semibold text-white flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z">
                            </path>
                        </svg>
                        Voucher Details
                    </h2>
                </div>

                <div class="p-6">
                    <form action="#" method="post" class="space-y-6">
                        @csrf

                        <!-- Business, Location -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="relative">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Business</label>
                                <input type="hidden" id="business_id" name="business_id">
                                <input type="text" id="business_search"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                    placeholder="Search business...">
                                <ul id="business_results"
                                    class="absolute z-10 mt-1 w-full bg-white border border-gray-200 rounded-md shadow-lg max-h-48 overflow-y-auto hidden">
                                </ul>
                                <p id="business_selected_hint" class="mt-1 text-xs text-gray-500 hidden">Selected: <span
                                        class="font-medium" id="business_selected_name"></span></p>
                            </div>
                            <div class="relative">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Location</label>
                                <input type="hidden" id="location_id" name="location_id">
                                <input type="text" id="location_search"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                    placeholder="Search location...">
                                <ul id="location_results"
                                    class="absolute z-10 mt-1 w-full bg-white border border-gray-200 rounded-md shadow-lg max-h-48 overflow-y-auto hidden">
                                </ul>
                                <p id="location_selected_hint" class="mt-1 text-xs text-gray-500 hidden">Selected: <span
                                        class="font-medium" id="location_selected_name"></span></p>
                            </div>
                        </div>

                        <!-- Access Code -->
                        <div>
                            <label for="access_code" class="block text-sm font-medium text-gray-700 mb-2">Access Code (6
                                digits)</label>
                            <div class="flex gap-2">
                                <input type="text" id="access_code" name="access_code" maxlength="6"
                                    class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                    placeholder="Enter 6-digit code">
                                <button type="button" id="generate_code"
                                    class="px-4 py-2 bg-gray-100 border border-gray-300 rounded-lg hover:bg-gray-200 transition-colors">
                                    Generate
                                </button>
                            </div>
                        </div>

                        <!-- Max Users -->
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <label for="max_users" class="block text-sm font-medium text-gray-700">Max Users</label>
                                <div class="flex items-center">
                                    <span class="text-sm text-gray-500 mr-2">Enable limit</span>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" id="max_users_toggle" class="sr-only peer">
                                        <div
                                            class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600">
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <input type="number" id="max_users" name="max_users"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                placeholder="Maximum number of users" disabled>
                        </div>

                        <!-- Speed -->
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <label for="speed" class="block text-sm font-medium text-gray-700">Speed
                                    (Mbps)</label>
                                <div class="flex items-center">
                                    <span class="text-sm text-gray-500 mr-2">Enable speed limit</span>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" id="speed_toggle" class="sr-only peer">
                                        <div
                                            class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600">
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <select id="speed" name="speed"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                disabled>
                                <option value="1">1 Mbps</option>
                                <option value="2">2 Mbps</option>
                                <option value="5">5 Mbps</option>
                                <option value="10">10 Mbps</option>
                                <option value="20">20 Mbps</option>
                                <option value="100">100 Mbps</option>
                                <option value="custom">Custom</option>
                            </select>
                            <div id="custom_speed_container" class="mt-2 hidden">
                                <input type="number" id="custom_speed" name="custom_speed"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                    placeholder="Enter custom speed in Mbps">
                            </div>
                        </div>
                        <!-- Max Quota -->
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <label for="quota" class="block text-sm font-medium text-gray-700">Max Quota
                                    (GB)</label>
                                <div class="flex items-center">
                                    <span class="text-sm text-gray-500 mr-2">Enable quota limit</span>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" id="quotatoggle" class="sr-only peer" disabled>
                                        <div
                                            class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600 opacity-50 cursor-not-allowed">
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <select id="quota" name="quota"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                disabled>
                                <option value="">No limit</option>
                                <option value="1">1 GB</option>
                                <option value="5">5 GB</option>
                                <option value="10">10 GB</option>
                                <option value="20">20 GB</option>
                                <option value="50">50 GB</option>
                                <option value="100">100 GB</option>
                                <option value="custom">Custom</option>
                            </select>
                            <div id="customquotacontainer" class="mt-2 hidden">
                                <input type="number" id="customquota" name="customquota"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                    placeholder="Enter custom quota in GB" disabled>
                            </div>
                        </div>

                        <!-- Duration -->
                        <div>
                            <label for="duration"
                                class="block text-sm font-medium text-gray-700 mb-2">Duration</label>
                            <select id="duration" name="duration"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                <option value="1">1 day</option>
                                <option value="7">7 days</option>
                                <option value="30">1 month</option>
                                <option value="custom">Custom</option>
                            </select>
                            <div id="custom_duration_container" class="mt-2 hidden">
                                <div class="flex items-center gap-2">
                                    <input type="number" id="custom_duration_value" name="custom_duration_value"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                        placeholder="Enter value">
                                    <select id="custom_duration_unit" name="custom_duration_unit"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                        <option value="hours">Hours</option>
                                        <option value="days">Days</option>
                                        <option value="weeks">Weeks</option>
                                        <option value="months">Months</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Date Range -->
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <label class="block text-sm font-medium text-gray-700">Date Range</label>
                                <div class="flex items-center">
                                    <span class="text-sm text-gray-500 mr-2">Custom date range</span>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" id="date_range_toggle" class="sr-only peer">
                                        <div
                                            class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600">
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div id="date_range_container" class="grid grid-cols-1 md:grid-cols-2 gap-4 hidden">
                                <div>
                                    <label for="start_date" class="block text-sm font-medium text-gray-700 mb-2">Start
                                        Date</label>
                                    <input type="datetime-local" id="start_date" name="start_date"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                </div>
                                <div>
                                    <label for="end_date" class="block text-sm font-medium text-gray-700 mb-2">End
                                        Date</label>
                                    <input type="datetime-local" id="end_date" name="end_date"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                </div>
                            </div>
                            <p class="text-xs text-gray-500 mt-1">By default, access code starts from today</p>
                        </div>

                        <!-- Plan Selection and Creation -->
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <label class="block text-sm font-medium text-gray-700">Plan</label>
                                <button type="button" id="toggle_new_plan"
                                    class="text-sm text-blue-600 hover:underline">New Plan</button>
                            </div>

                            <input type="hidden" id="plan_id" name="plan_id">
                            <div class="relative">
                                <input type="text" id="plan_search"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                    placeholder="Search plan by name...">
                                <ul id="plan_results"
                                    class="absolute z-10 mt-1 w-full bg-white border border-gray-200 rounded-md shadow-lg max-h-48 overflow-y-auto hidden">
                                </ul>
                            </div>
                            <p id="plan_selected_hint" class="mt-1 text-xs text-gray-500 hidden">Selected plan: <span
                                    class="font-medium" id="plan_selected_name"></span></p>

                            <div id="new_plan_container" class="mt-4 hidden">
                                <div class="border border-gray-200 rounded-lg p-4 bg-gray-50">
                                    <h3 class="text-sm font-semibold mb-3">Create New Plan</h3>
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                        <div>
                                            <label for="new_plan_name"
                                                class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                                            <input type="text" id="new_plan_name" maxlength="20"
                                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                                placeholder="Plan name (max 20 chars)">
                                        </div>
                                        <div>
                                            <label for="new_plan_group"
                                                class="block text-sm font-medium text-gray-700 mb-2">Group</label>
                                            <select id="new_plan_group"
                                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                                <option value="HIGH INTERNET">HIGH INTERNET</option>
                                                <option value="LOW INTERNET">LOW INTERNET</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label for="new_plan_bw"
                                                class="block text-sm font-medium text-gray-700 mb-2">BW Limit
                                                (Mbps)</label>
                                            <select id="new_plan_bw"
                                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                                <option value="">No limit</option>
                                                <option value="10">10</option>
                                                <option value="20">20</option>
                                                <option value="30">30</option>
                                                <option value="100">100</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mt-4 flex justify-end gap-2">
                                        <button type="button" id="cancel_new_plan"
                                            class="px-4 py-2 border border-gray-300 rounded-lg bg-white hover:bg-gray-50 transition-colors">
                                            Cancel
                                        </button>
                                        <button type="button" id="save_new_plan"
                                            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                                            Save Plan
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <h3 class="text-sm font-semibold mb-2">Available Plans</h3>
                                <div class="border border-gray-200 rounded-lg overflow-hidden">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th
                                                    class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Name</th>
                                                <th
                                                    class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Group</th>
                                                <th
                                                    class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    BW Limit</th>
                                                <th class="px-4 py-3"></th>
                                            </tr>
                                        </thead>
                                        <tbody id="plans_table" class="bg-white divide-y divide-gray-200">
                                            <!-- Rows rendered by JS -->
                                        </tbody>
                                    </table>
                                </div>
                                <p class="text-xs text-gray-500 mt-2">Click a row to select a plan.</p>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end gap-3">
                            <a href="{{ url('/vouchers') }}"
                                class="px-5 py-2.5 text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                                Cancel
                            </a>
                            <button type="submit"
                                class="px-5 py-2.5 text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Create Voucher</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // =============================
            // Base helpers
            // =============================
            const show = (el) => el.classList.remove('hidden');
            const hide = (el) => el.classList.add('hidden');

            // =============================
            // Generate random 6-digit access code
            // =============================
            const generateBtn = document.getElementById('generate_code');
            if (generateBtn) {
                generateBtn.addEventListener('click', function() {
                    const randomCode = Math.floor(100000 + Math.random() * 900000);
                    document.getElementById('access_code').value = randomCode;
                });
            }

            // =============================
            // Max Users Toggle
            // =============================
            const maxUsersToggle = document.getElementById('max_users_toggle');
            const maxUsersInput = document.getElementById('max_users');
            if (maxUsersToggle && maxUsersInput) {
                maxUsersToggle.addEventListener('change', function() {
                    maxUsersInput.disabled = !this.checked;
                });
            }

            // =============================
            // Speed Toggle and Custom Speed
            // =============================
            const speedToggle = document.getElementById('speed_toggle');
            const speedSelect = document.getElementById('speed');
            const customSpeedContainer = document.getElementById('custom_speed_container');
            const customSpeedInput = document.getElementById('custom_speed');

            if (speedToggle && speedSelect) {
                speedToggle.addEventListener('change', function() {
                    speedSelect.disabled = !this.checked;
                    if (!this.checked) hide(customSpeedContainer);
                });

                speedSelect.addEventListener('change', function() {
                    if (this.value === 'custom') {
                        show(customSpeedContainer);
                    } else {
                        hide(customSpeedContainer);
                    }
                });
            }

            // =============================
            // Custom Duration
            // =============================
            const durationSelect = document.getElementById('duration');
            const customDurationContainer = document.getElementById('custom_duration_container');
            const customDurationValue = document.getElementById('custom_duration_value');
            const customDurationUnit = document.getElementById('custom_duration_unit');
            if (durationSelect) {
                durationSelect.addEventListener('change', function() {
                    if (this.value === 'custom') {
                        show(customDurationContainer);
                    } else {
                        hide(customDurationContainer);
                        if (customDurationValue) customDurationValue.value = '';
                        if (customDurationUnit) customDurationUnit.value = 'hours';
                    }
                });
            }

            // =============================
            // Date Range Toggle
            // =============================
            const dateRangeToggle = document.getElementById('date_range_toggle');
            const dateRangeContainer = document.getElementById('date_range_container');
            if (dateRangeToggle && dateRangeContainer) {
                dateRangeToggle.addEventListener('change', function() {
                    if (this.checked) {
                        show(dateRangeContainer);
                    } else {
                        hide(dateRangeContainer);
                    }
                });
            }

            // =============================
            // Search dropdowns (Business, Location)
            // =============================
            const businesses = [{
                    id: 1,
                    name: 'Business One'
                },
                {
                    id: 2,
                    name: 'Business Two'
                },
                {
                    id: 3,
                    name: 'Business Three'
                }
            ];

            const locations = [{
                    id: 1,
                    name: 'Location One'
                },
                {
                    id: 2,
                    name: 'Location Two'
                },
                {
                    id: 3,
                    name: 'Location Three'
                }
            ];

            function setupSearchDropdown(config) {
                const {
                    inputEl,
                    resultsEl,
                    hiddenIdEl,
                    selectedHintEl,
                    selectedNameEl,
                    items,
                    renderItem
                } = config;
                const render = () => {
                    const q = (inputEl.value || '').toLowerCase();
                    const filtered = items.filter(i => i.name.toLowerCase().includes(q));
                    resultsEl.innerHTML = filtered.length ?
                        filtered.map(renderItem).join('') :
                        `<li class="px-3 py-2 text-sm text-gray-500">No results</li>`;
                    show(resultsEl);
                    // attach click handlers
                    Array.from(resultsEl.querySelectorAll('[data-id]')).forEach(node => {
                        node.addEventListener('click', () => {
                            const id = parseInt(node.getAttribute('data-id'), 10);
                            const item = items.find(i => i.id === id);
                            if (!item) return;
                            hiddenIdEl.value = item.id;
                            inputEl.value = item.name;
                            if (selectedNameEl && selectedHintEl) {
                                selectedNameEl.textContent = item.name;
                                show(selectedHintEl);
                            }
                            hide(resultsEl);
                        });
                    });
                };

                inputEl.addEventListener('input', render);
                inputEl.addEventListener('focus', render);
                inputEl.addEventListener('blur', () => setTimeout(() => hide(resultsEl), 150));
            }

            // Business
            const businessSearch = document.getElementById('business_search');
            const businessResults = document.getElementById('business_results');
            const businessId = document.getElementById('business_id');
            const businessSelectedHint = document.getElementById('business_selected_hint');
            const businessSelectedName = document.getElementById('business_selected_name');
            if (businessSearch && businessResults && businessId) {
                setupSearchDropdown({
                    inputEl: businessSearch,
                    resultsEl: businessResults,
                    hiddenIdEl: businessId,
                    selectedHintEl: businessSelectedHint,
                    selectedNameEl: businessSelectedName,
                    items: businesses,
                    renderItem: (b) =>
                        `<li data-id="${b.id}" class="px-3 py-2 hover:bg-gray-50 cursor-pointer">${b.name}</li>`
                });
            }

            // Location
            const locationSearch = document.getElementById('location_search');
            const locationResults = document.getElementById('location_results');
            const locationId = document.getElementById('location_id');
            const locationSelectedHint = document.getElementById('location_selected_hint');
            const locationSelectedName = document.getElementById('location_selected_name');
            if (locationSearch && locationResults && locationId) {
                setupSearchDropdown({
                    inputEl: locationSearch,
                    resultsEl: locationResults,
                    hiddenIdEl: locationId,
                    selectedHintEl: locationSelectedHint,
                    selectedNameEl: locationSelectedName,
                    items: locations,
                    renderItem: (l) =>
                        `<li data-id="${l.id}" class="px-3 py-2 hover:bg-gray-50 cursor-pointer">${l.name}</li>`
                });
            }

            // =============================
            // Plans: search, table render, selection, creation
            // =============================
            const plans = [{
                    id: 1,
                    name: 'Starter',
                    group: 'LOW INTERNET',
                    bw_limit: 10
                },
                {
                    id: 2,
                    name: 'Standard',
                    group: 'HIGH INTERNET',
                    bw_limit: 20
                },
                {
                    id: 3,
                    name: 'Premium',
                    group: 'HIGH INTERNET',
                    bw_limit: 100
                },
                {
                    id: 4,
                    name: 'Unlimited',
                    group: 'HIGH INTERNET',
                    bw_limit: null
                }
            ];

            const planId = document.getElementById('plan_id');
            const planSearch = document.getElementById('plan_search');
            const planResults = document.getElementById('plan_results');
            const planSelectedHint = document.getElementById('plan_selected_hint');
            const planSelectedName = document.getElementById('plan_selected_name');
            const plansTable = document.getElementById('plans_table');

            function applyPlanSpeedBehavior(plan) {
                if (!speedToggle || !speedSelect) return;
                if (plan && plan.bw_limit != null) {
                    speedToggle.checked = true;
                    speedSelect.disabled = false;
                    const limit = plan.bw_limit;
                    const optionValues = Array.from(speedSelect.options).map(o => o.value);
                    if (optionValues.includes(String(limit))) {
                        speedSelect.value = String(limit);
                        hide(customSpeedContainer);
                    } else {
                        speedSelect.value = 'custom';
                        show(customSpeedContainer);
                        if (customSpeedInput) customSpeedInput.value = limit;
                    }
                } else {
                    speedToggle.checked = false;
                    speedSelect.disabled = true;
                    hide(customSpeedContainer);
                    if (customSpeedInput) customSpeedInput.value = '';
                }
            }

            function renderPlansTable() {
                if (!plansTable) return;
                plansTable.innerHTML = plans.map(p => {
                    const bw = p.bw_limit == null ? 'No limit' : `${p.bw_limit}`;
                    return `
                        <tr data-id="${p.id}" class="hover:bg-gray-50 cursor-pointer">
                            <td class="px-4 py-3">${p.name}</td>
                            <td class="px-4 py-3">${p.group}</td>
                            <td class="px-4 py-3">${bw}</td>
                            <td class="px-4 py-3 text-right"><button type="button" class="text-blue-600 hover:underline">Select</button></td>
                        </tr>
                    `;
                }).join('');

                Array.from(plansTable.querySelectorAll('tr[data-id]')).forEach(row => {
                    row.addEventListener('click', () => {
                        const id = parseInt(row.getAttribute('data-id'), 10);
                        const plan = plans.find(p => p.id === id);
                        if (!plan) return;
                        planId.value = plan.id;
                        planSearch.value = plan.name;
                        if (planSelectedName && planSelectedHint) {
                            planSelectedName.textContent = plan.name;
                            show(planSelectedHint);
                        }
                        applyPlanSpeedBehavior(plan);
                    });
                });
            }

            function renderPlanResults() {
                if (!planResults) return;
                const q = (planSearch.value || '').toLowerCase();
                const filtered = plans.filter(p => p.name.toLowerCase().includes(q));
                planResults.innerHTML = filtered.length ?
                    filtered.map(p => {
                        const bw = p.bw_limit == null ? 'No limit' : `${p.bw_limit}`;
                        return `<li data-id="${p.id}" class="px-3 py-2 hover:bg-gray-50 cursor-pointer">
                            <div class="flex items-center justify-between">
                                <span>${p.name}</span>
                                <span class="text-xs text-gray-500">${p.group} • ${bw}</span>
                            </div>
                        </li>`;
                    }).join('') :
                    `<li class="px-3 py-2 text-sm text-gray-500">No results</li>`;
                show(planResults);
                Array.from(planResults.querySelectorAll('[data-id]')).forEach(node => {
                    node.addEventListener('click', () => {
                        const id = parseInt(node.getAttribute('data-id'), 10);
                        const plan = plans.find(p => p.id === id);
                        if (!plan) return;
                        planId.value = plan.id;
                        planSearch.value = plan.name;
                        if (planSelectedName && planSelectedHint) {
                            planSelectedName.textContent = plan.name;
                            show(planSelectedHint);
                        }
                        hide(planResults);
                        applyPlanSpeedBehavior(plan);
                    });
                });
            }

            if (planSearch && planResults && planId) {
                planSearch.addEventListener('input', renderPlanResults);
                planSearch.addEventListener('focus', renderPlanResults);
                planSearch.addEventListener('blur', () => setTimeout(() => hide(planResults), 150));
            }

            renderPlansTable();

            // =============================
            // New plan creation
            // =============================
            const newPlanContainer = document.getElementById('new_plan_container');
            const toggleNewPlanBtn = document.getElementById('toggle_new_plan');
            const saveNewPlanBtn = document.getElementById('save_new_plan');
            const cancelNewPlanBtn = document.getElementById('cancel_new_plan');
            const newPlanName = document.getElementById('new_plan_name');
            const newPlanGroup = document.getElementById('new_plan_group');
            const newPlanBw = document.getElementById('new_plan_bw');

            if (toggleNewPlanBtn && newPlanContainer) {
                toggleNewPlanBtn.addEventListener('click', () => {
                    if (newPlanContainer.classList.contains('hidden')) {
                        show(newPlanContainer);
                    } else {
                        hide(newPlanContainer);
                    }
                });
            }

            if (cancelNewPlanBtn && newPlanContainer) {
                cancelNewPlanBtn.addEventListener('click', () => {
                    hide(newPlanContainer);
                    if (newPlanName) newPlanName.value = '';
                    if (newPlanGroup) newPlanGroup.value = 'HIGH INTERNET';
                    if (newPlanBw) newPlanBw.value = '';
                });
            }

            function addPlan(plan) {
                plans.push(plan);
                renderPlansTable();
                renderPlanResults();
            }

            if (saveNewPlanBtn) {
                saveNewPlanBtn.addEventListener('click', () => {
                    const name = (newPlanName.value || '').trim();
                    const group = newPlanGroup.value;
                    const bwRaw = newPlanBw.value;
                    const bw_limit = bwRaw === '' ? null : parseInt(bwRaw, 10);

                    if (!name) {
                        alert('Plan name is required');
                        return;
                    }
                    if (name.length > 20) {
                        alert('Plan name must be at most 20 characters');
                        return;
                    }
                    if (!['HIGH INTERNET', 'LOW INTERNET'].includes(group)) {
                        alert('Invalid group');
                        return;
                    }
                    if (bw_limit != null && ![10, 20, 30, 100].includes(bw_limit)) {
                        alert('BW Limit must be 10, 20, 30, 100 or empty for no limit');
                        return;
                    }

                    const newId = Math.max(0, ...plans.map(p => p.id)) + 1;
                    const plan = {
                        id: newId,
                        name,
                        group,
                        bw_limit
                    };
                    addPlan(plan);

                    // Select newly created plan
                    planId.value = plan.id;
                    planSearch.value = plan.name;
                    if (planSelectedName && planSelectedHint) {
                        planSelectedName.textContent = plan.name;
                        show(planSelectedHint);
                    }
                    applyPlanSpeedBehavior(plan);

                    // Reset and hide form
                    if (newPlanName) newPlanName.value = '';
                    if (newPlanGroup) newPlanGroup.value = 'HIGH INTERNET';
                    if (newPlanBw) newPlanBw.value = '';
                    hide(newPlanContainer);
                });
            }
        });
    </script>
</x-main-layout>
