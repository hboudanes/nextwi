<x-main-layout>
    <main class="lg:ml-64 min-h-screen bg-gray-50">
        <div class="px-6 py-4">
            <div class="mb-4 flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-semibold">Profile Vouchers</h1>
                    <p class="text-sm text-gray-600">Location #{{ $locationId }} · Profile #{{ $profileId }}</p>
                </div>
                <a href="{{ url('/locations/' . $locationId) }}" class="text-sm text-blue-600 hover:underline">Back to Location</a>
            </div>

            <!-- Vouchers Table (UI-only, static demo with pagination) -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden mb-6">
                <div class="px-6 py-4 flex items-center justify-between border-b border-gray-200 bg-white">
                    <h2 class="text-lg font-semibold text-gray-900">Existing Vouchers</h2>
                    <span class="text-sm text-gray-500">Showing 1–10 of 24</span>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full" id="vouchers-table">
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Access Code</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Plan</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Group</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">BW Limit</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Max Uses</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Start Date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">End Date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created At</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Updated At</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach (range(1, 10) as $row)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $row }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-mono text-gray-900">AC{{ 1000 + $row }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Standard</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">HIGH INTERNET</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">100</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">5</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">2025-10-01 09:00</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">2025-10-31 18:00</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">2025-10-01 08:00</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">2025-10-15 12:00</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex items-center gap-2">
                                        <button class="text-indigo-600 hover:text-indigo-900 p-1 hover:bg-indigo-50 rounded transition-colors" title="View" aria-label="View">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                        </button>
                                        <button class="text-red-600 hover:text-red-900 p-1 hover:bg-red-50 rounded transition-colors" title="Delete" aria-label="Delete">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="bg-white px-6 py-4 border-t border-gray-200 flex items-center justify-between">
                    <div class="text-sm text-gray-700">
                        Showing <span class="font-medium">1</span> to <span class="font-medium">10</span> of <span class="font-medium">24</span> vouchers
                    </div>
                    <div class="flex gap-2">
                        <button class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 disabled:opacity-50" disabled>Previous</button>
                        <button class="px-3 py-2 bg-blue-600 text-white rounded-lg text-sm font-medium">1</button>
                        <button class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50">2</button>
                        <button class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50">3</button>
                        <button class="px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50">Next</button>
                    </div>
                </div>
            </div>

            <!-- Create Voucher Section (UI-only) -->
            <div class="bg-white rounded-lg shadow p-4">
                <h2 class="text-lg font-medium mb-3">Create Voucher</h2>
                <form action="#" method="post" onsubmit="return false;" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium">Access Code</label>
                            <div class="flex mt-1">
                                <input id="accessCode" type="text" maxlength="20" class="flex-1 rounded border px-3 py-2" placeholder="Enter or generate code" />
                                <button type="button" class="ml-2 px-3 py-2 rounded bg-gray-100 border" onclick="generateCode()">Generate</button>
                            </div>
                            <p class="text-xs text-gray-500 mt-1">Unique, up to 20 characters.</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Max Uses</label>
                            <input type="number" min="1" class="mt-1 w-full rounded border px-3 py-2" placeholder="e.g. 5" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Active</label>
                            <label class="inline-flex items-center mt-2">
                                <input type="checkbox" class="rounded border" checked />
                                <span class="ml-2 text-sm">Enabled</span>
                            </label>
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Daily Limit (Int)</label>
                            <input type="number" min="0" class="mt-1 w-full rounded border px-3 py-2" placeholder="e.g. 2" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Start Date</label>
                            <input type="datetime-local" class="mt-1 w-full rounded border px-3 py-2" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium">End Date</label>
                            <input type="datetime-local" class="mt-1 w-full rounded border px-3 py-2" />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="border rounded p-3">
                            <h3 class="text-sm font-semibold mb-2">Plan</h3>
                            <label class="block text-sm">Name</label>
                            <input type="text" class="mt-1 w-full rounded border px-3 py-2" placeholder="Standard" />
                            <div class="mt-3 grid grid-cols-2 gap-3">
                                <div>
                                    <label class="block text-sm">GROUP</label>
                                    <select class="mt-1 w-full rounded border px-3 py-2">
                                        <option>HIGH INTERNET</option>
                                        <option>LOW INTERNET</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm">BW_LIMIT</label>
                                    <select class="mt-1 w-full rounded border px-3 py-2">
                                        <option value="">No Limit</option>
                                        <option>10</option>
                                        <option>20</option>
                                        <option>30</option>
                                        <option>100</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="border rounded p-3">
                            <h3 class="text-sm font-semibold mb-2">Bandwidth Limit Toggle</h3>
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="rounded border" />
                                <span class="ml-2 text-sm">Apply BW Limit</span>
                            </label>
                            <p class="text-xs text-gray-500 mt-1">If unchecked, voucher has no bandwidth limit.</p>
                        </div>
                    </div>

                    <div class="flex items-center justify-end space-x-2">
                        <button class="px-4 py-2 rounded border">Cancel</button>
                        <button class="px-4 py-2 rounded bg-blue-600 text-white">Create Voucher</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <x-slot name="script">
        <script>
            function generateCode() {
                const chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789abcdefghijkmnopqrstuvwxyz';
                let code = '';
                for (let i = 0; i < 10; i++) {
                    code += chars.charAt(Math.floor(Math.random() * chars.length));
                }
                document.getElementById('accessCode').value = code;
            }
        </script>
    </x-slot>
</x-main-layout>