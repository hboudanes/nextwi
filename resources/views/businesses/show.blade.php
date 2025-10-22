<x-main-layout>
    <main class="lg:ml-64 min-h-screen">
        <header id="header" class="bg-white border-b border-gray-200 px-8 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <button class="flex items-center gap-2 text-gray-500 hover:text-gray-700">
                        <i data-fa-i2svg><svg class="svg-inline--fa fa-arrow-left" aria-hidden="true" focusable="false"
                                data-prefix="fas" data-icon="arrow-left" role="img"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg>
                                <path fill="currentColor"
                                    d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z">
                                </path>
                            </svg></i>
                        <span class="text-sm">Business Management</span>
                    </button>
                    <div class="h-4 w-px bg-gray-300"></div>
                    <h1 class="text-2xl font-bold text-gray-900">Acme
                        Corporation</h1>
                </div>
                <div class="flex items-center gap-3">
                    <button
                        class="border border-gray-300 px-4 py-2 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                        Edit Business
                    </button>
                    <button
                        class="border border-gray-300 px-4 py-2 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                        View Activity Log
                    </button>
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
                <span class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs font-medium">Active</span>
                <div class="h-4 w-px bg-gray-300"></div>
                <span class="text-lg font-semibold text-green-600">Credit:
                    $25,000</span>
            </div>
        </header>

        <section id="analytics-cards" class="px-8 py-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-4">
                <div
                    class="bg-white rounded-xl shadow-sm border border-gray-200 p-5 hover:shadow-md transition-shadow duration-200">
                    <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center mb-3">
                        <i class="text-xl" data-fa-i2svg><svg class="svg-inline--fa fa-map-pin" aria-hidden="true"
                                focusable="false" data-prefix="fas" data-icon="map-pin" role="img"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg>
                                <path fill="currentColor"
                                    d="M16 144a144 144 0 1 1 288 0A144 144 0 1 1 16 144zM160 80c8.8 0 16-7.2 16-16s-7.2-16-16-16c-53 0-96 43-96 96c0 8.8 7.2 16 16 16s16-7.2 16-16c0-35.3 28.7-64 64-64zM128 480V317.1c10.4 1.9 21.1 2.9 32 2.9s21.6-1 32-2.9V480c0 17.7-14.3 32-32 32s-32-14.3-32-32z">
                                </path>
                            </svg></i>
                    </div>
                    <div class="text-3xl font-bold text-gray-900 mb-1">5</div>
                    <div class="text-sm font-medium text-gray-500 mb-2">Total
                        Locations</div>
                    <div class="flex items-center gap-1 text-xs text-green-600">
                        <i data-fa-i2svg><svg class="svg-inline--fa fa-arrow-up" aria-hidden="true" focusable="false"
                                data-prefix="fas" data-icon="arrow-up" role="img" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 384 512" data-fa-i2svg>
                                <path fill="currentColor"
                                    d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.2L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z">
                                </path>
                            </svg></i>
                        <span>+2 this month</span>
                    </div>
                </div>

                <div
                    class="bg-white rounded-xl shadow-sm border border-gray-200 p-5 hover:shadow-md transition-shadow duration-200">
                    <div
                        class="w-12 h-12 bg-green-100 text-green-600 rounded-full flex items-center justify-center mb-3">
                        <i class="text-xl" data-fa-i2svg><svg class="svg-inline--fa fa-users" aria-hidden="true"
                                focusable="false" data-prefix="fas" data-icon="users" role="img"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg>
                                <path fill="currentColor"
                                    d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z">
                                </path>
                            </svg></i>
                    </div>
                    <div class="text-3xl font-bold text-gray-900 mb-1">23</div>
                    <div class="text-sm font-medium text-gray-500 mb-2">Total
                        Users</div>
                    <div class="flex items-center gap-1 text-xs text-green-600">
                        <i data-fa-i2svg><svg class="svg-inline--fa fa-arrow-up" aria-hidden="true" focusable="false"
                                data-prefix="fas" data-icon="arrow-up" role="img" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 384 512" data-fa-i2svg>
                                <path fill="currentColor"
                                    d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.2L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z">
                                </path>
                            </svg></i>
                        <span>+5 this month</span>
                    </div>
                </div>

                <div
                    class="bg-white rounded-xl shadow-sm border border-gray-200 p-5 hover:shadow-md transition-shadow duration-200">
                    <div
                        class="w-12 h-12 bg-purple-100 text-purple-600 rounded-full flex items-center justify-center mb-3">
                        <i class="text-xl" data-fa-i2svg><svg class="svg-inline--fa fa-ticket" aria-hidden="true"
                                focusable="false" data-prefix="fas" data-icon="ticket" role="img"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg>
                                <path fill="currentColor"
                                    d="M64 64C28.7 64 0 92.7 0 128v64c0 8.8 7.4 15.7 15.7 18.6C34.5 217.1 48 235 48 256s-13.5 38.9-32.3 45.4C7.4 304.3 0 311.2 0 320v64c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V320c0-8.8-7.4-15.7-15.7-18.6C541.5 294.9 528 277 528 256s13.5-38.9 32.3-45.4c8.3-2.9 15.7-9.8 15.7-18.6V128c0-35.3-28.7-64-64-64H64zm64 112l0 160c0 8.8 7.2 16 16 16H432c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H144c-8.8 0-16 7.2-16 16zM96 160c0-17.7 14.3-32 32-32H448c17.7 0 32 14.3 32 32V352c0 17.7-14.3 32-32 32H128c-17.7 0-32-14.3-32-32V160z">
                                </path>
                            </svg></i>
                    </div>
                    <div class="text-3xl font-bold text-gray-900 mb-1">89</div>
                    <div class="text-sm font-medium text-gray-500 mb-2">Active
                        Vouchers</div>
                    <div class="text-xs text-gray-500">67 redeemed</div>
                </div>

                <div
                    class="bg-white rounded-xl shadow-sm border border-gray-200 p-5 hover:shadow-md transition-shadow duration-200">
                    <div
                        class="w-12 h-12 bg-orange-100 text-orange-600 rounded-full flex items-center justify-center mb-3">
                        <i class="text-xl" data-fa-i2svg><svg class="svg-inline--fa fa-credit-card"
                                aria-hidden="true" focusable="false" data-prefix="fas" data-icon="credit-card"
                                role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                data-fa-i2svg>
                                <path fill="currentColor"
                                    d="M64 32C28.7 32 0 60.7 0 96v32H576V96c0-35.3-28.7-64-64-64H64zM576 224H0V416c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V224zM112 352h64c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16zm112 16c0-8.8 7.2-16 16-16H368c8.8 0 16 7.2 16 16s-7.2 16-16 16H240c-8.8 0-16-7.2-16-16z">
                                </path>
                            </svg></i>
                    </div>
                    <div class="text-3xl font-bold text-gray-900 mb-1">$25,000</div>
                    <div class="text-sm font-medium text-gray-500 mb-2">Credit
                        Balance</div>
                    <div class="flex items-center gap-1 text-xs text-green-600">
                        <i data-fa-i2svg><svg class="svg-inline--fa fa-arrow-up" aria-hidden="true" focusable="false"
                                data-prefix="fas" data-icon="arrow-up" role="img"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg>
                                <path fill="currentColor"
                                    d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.2L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z">
                                </path>
                            </svg></i>
                        <span>+$5,000 this month</span>
                    </div>
                </div>

                <div
                    class="bg-white rounded-xl shadow-sm border border-gray-200 p-5 hover:shadow-md transition-shadow duration-200">
                    <div
                        class="w-12 h-12 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center mb-3">
                        <i class="text-xl" data-fa-i2svg><svg class="svg-inline--fa fa-trending-up"
                                aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trending-up"
                                role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                data-fa-i2svg>
                                <g class="missing">
                                    <path fill="currentColor"
                                        d="M156.5,447.7l-12.6,29.5c-18.7-9.5-35.9-21.2-51.5-34.9l22.7-22.7C127.6,430.5,141.5,440,156.5,447.7z M40.6,272H8.5 c1.4,21.2,5.4,41.7,11.7,61.1L50,321.2C45.1,305.5,41.8,289,40.6,272z M40.6,240c1.4-18.8,5.2-37,11.1-54.1l-29.5-12.6 C14.7,194.3,10,216.7,8.5,240H40.6z M64.3,156.5c7.8-14.9,17.2-28.8,28.1-41.5L69.7,92.3c-13.7,15.6-25.5,32.8-34.9,51.5 L64.3,156.5z M397,419.6c-13.9,12-29.4,22.3-46.1,30.4l11.9,29.8c20.7-9.9,39.8-22.6,56.9-37.6L397,419.6z M115,92.4 c13.9-12,29.4-22.3,46.1-30.4l-11.9-29.8c-20.7,9.9-39.8,22.6-56.8,37.6L115,92.4z M447.7,355.5c-7.8,14.9-17.2,28.8-28.1,41.5 l22.7,22.7c13.7-15.6,25.5-32.9,34.9-51.5L447.7,355.5z M471.4,272c-1.4,18.8-5.2,37-11.1,54.1l29.5,12.6 c7.5-21.1,12.2-43.5,13.6-66.8H471.4z M321.2,462c-15.7,5-32.2,8.2-49.2,9.4v32.1c21.2-1.4,41.7-5.4,61.1-11.7L321.2,462z M240,471.4c-18.8-1.4-37-5.2-54.1-11.1l-12.6,29.5c21.1,7.5,43.5,12.2,66.8,13.6V471.4z M462,190.8c5,15.7,8.2,32.2,9.4,49.2h32.1 c-1.4-21.2-5.4-41.7-11.7-61.1L462,190.8z M92.4,397c-12-13.9-22.3-29.4-30.4-46.1l-29.8,11.9c9.9,20.7,22.6,39.8,37.6,56.9 L92.4,397z M272,40.6c18.8,1.4,36.9,5.2,54.1,11.1l12.6-29.5C317.7,14.7,295.3,10,272,8.5V40.6z M190.8,50 c15.7-5,32.2-8.2,49.2-9.4V8.5c-21.2,1.4-41.7,5.4-61.1,11.7L190.8,50z M442.3,92.3L419.6,115c12,13.9,22.3,29.4,30.5,46.1 l29.8-11.9C470,128.5,457.3,109.4,442.3,92.3z M397,92.4l22.7-22.7c-15.6-13.7-32.8-25.5-51.5-34.9l-12.6,29.5 C370.4,72.1,384.4,81.5,397,92.4z">
                                    </path>
                                    <circle fill="currentColor" cx="256" cy="364" r="28">
                                        <animate attributeType="XML" repeatCount="indefinite" dur="2s"
                                            attributeName="r" values="28;14;28;28;14;28;"></animate>
                                        <animate attributeType="XML" repeatCount="indefinite" dur="2s"
                                            attributeName="opacity" values="1;0;1;1;0;1;"></animate>
                                    </circle>
                                    <path fill="currentColor" opacity="1"
                                        d="M263.7,312h-16c-6.6,0-12-5.4-12-12c0-71,77.4-63.9,77.4-107.8c0-20-17.8-40.2-57.4-40.2c-29.1,0-44.3,9.6-59.2,28.7 c-3.9,5-11.1,6-16.2,2.4l-13.1-9.2c-5.6-3.9-6.9-11.8-2.6-17.2c21.2-27.2,46.4-44.7,91.2-44.7c52.3,0,97.4,29.8,97.4,80.2 c0,67.6-77.4,63.5-77.4,107.8C275.7,306.6,270.3,312,263.7,312z">
                                        <animate attributeType="XML" repeatCount="indefinite" dur="2s"
                                            attributeName="opacity" values="1;0;0;0;0;1;"></animate>
                                    </path>
                                    <path fill="currentColor" opacity="0"
                                        d="M232.5,134.5l7,168c0.3,6.4,5.6,11.5,12,11.5h9c6.4,0,11.7-5.1,12-11.5l7-168c0.3-6.8-5.2-12.5-12-12.5h-23 C237.7,122,232.2,127.7,232.5,134.5z">
                                        <animate attributeType="XML" repeatCount="indefinite" dur="2s"
                                            attributeName="opacity" values="0;0;1;1;0;0;"></animate>
                                    </path>
                                </g>
                            </svg></i>
                    </div>
                    <div class="text-3xl font-bold text-gray-900 mb-1">$142,500</div>
                    <div class="text-sm font-medium text-gray-500 mb-2">Total
                        Revenue</div>
                    <div class="flex items-center gap-1 text-xs text-green-600">
                        <i data-fa-i2svg><svg class="svg-inline--fa fa-arrow-up" aria-hidden="true" focusable="false"
                                data-prefix="fas" data-icon="arrow-up" role="img"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg>
                                <path fill="currentColor"
                                    d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.2L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z">
                                </path>
                            </svg></i>
                        <span>+12% vs last month</span>
                    </div>
                </div>

                <div
                    class="bg-white rounded-xl shadow-sm border border-gray-200 p-5 hover:shadow-md transition-shadow duration-200">
                    <div class="w-12 h-12 bg-red-100 text-red-600 rounded-full flex items-center justify-center mb-3">
                        <i class="text-xl" data-fa-i2svg><svg class="svg-inline--fa fa-circle-exclamation"
                                aria-hidden="true" focusable="false" data-prefix="fas"
                                data-icon="circle-exclamation" role="img" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 512 512" data-fa-i2svg>
                                <path fill="currentColor"
                                    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24V264c0 13.3-10.7 24-24 24s-24-10.7-24-24V152c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z">
                                </path>
                            </svg></i>
                    </div>
                    <div class="text-3xl font-bold text-gray-900 mb-1">7</div>
                    <div class="text-sm font-medium text-gray-500 mb-2">Pending
                        Actions</div>
                    <div class="text-xs text-red-600">3 require
                        attention</div>
                </div>
            </div>
        </section>

        <nav id="tab-navigation" class="bg-white border-b border-gray-200 px-8 mt-6">
            <div class="flex gap-6">
                <button
                    class="tab-btn px-4 py-3 font-medium text-sm cursor-pointer transition-colors text-blue-600 border-b-2 border-blue-600"
                    data-tab="locations">
                    Locations (5)
                </button>
                <button
                    class="tab-btn px-4 py-3 font-medium text-sm cursor-pointer hover:text-gray-700 transition-colors text-gray-500"
                    data-tab="users">
                    Users (23)
                </button>
                <button
                    class="tab-btn px-4 py-3 font-medium text-sm cursor-pointer hover:text-gray-700 transition-colors text-gray-500"
                    data-tab="vouchers">
                    Vouchers (89)
                </button>
                <button
                    class="tab-btn px-4 py-3 font-medium text-sm cursor-pointer hover:text-gray-700 transition-colors text-gray-500"
                    data-tab="activity">
                    Activity Log
                </button>
            </div>
        </nav>

        <div id="locations-tab" class="tab-content">
            <div class="flex items-center justify-between px-8 py-4">
                <div class="flex items-center gap-3">
                    <h2 class="text-xl font-semibold text-gray-900">Locations</h2>
                    <span class="bg-gray-100 text-gray-600 px-2 py-1 rounded-full text-sm">5</span>
                </div>
                <button
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors flex items-center gap-2">
                    <i data-fa-i2svg><svg class="svg-inline--fa fa-plus" aria-hidden="true" focusable="false"
                            data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 448 512" data-fa-i2svg>
                            <path fill="currentColor"
                                d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z">
                            </path>
                        </svg></i>
                    Add New Location
                </button>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6 px-8 pb-8">
                <div
                    class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow duration-200">
                    <div class="h-1 bg-blue-500"></div>
                    <div class="p-6">
                        <div
                            class="bg-blue-50 text-blue-600 w-10 h-10 rounded-lg flex items-center justify-center mb-4">
                            <i data-fa-i2svg><svg class="svg-inline--fa fa-building" aria-hidden="true"
                                    focusable="false" data-prefix="fas" data-icon="building" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg>
                                    <path fill="currentColor"
                                        d="M48 0C21.5 0 0 21.5 0 48V464c0 26.5 21.5 48 48 48h96V432c0-26.5 21.5-48 48-48s48 21.5 48 48v80h96c26.5 0 48-21.5 48-48V48c0-26.5-21.5-48-48-48H48zM64 240c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V240zm112-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H176c-8.8 0-16-7.2-16-16V240c0-8.8 7.2-16 16-16zm80 16c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H272c-8.8 0-16-7.2-16-16V240zM80 96h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V112c0-8.8 7.2-16 16-16zm80 16c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H176c-8.8 0-16-7.2-16-16V112zM272 96h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H272c-8.8 0-16-7.2-16-16V112c0-8.8 7.2-16 16-16z">
                                    </path>
                                </svg></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-1">Downtown
                            Branch</h3>
                        <div class="flex items-center gap-1 text-sm text-gray-500 mb-2">
                            <i class="text-xs" data-fa-i2svg><svg class="svg-inline--fa fa-map-pin"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="map-pin"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                    data-fa-i2svg>
                                    <path fill="currentColor"
                                        d="M16 144a144 144 0 1 1 288 0A144 144 0 1 1 16 144zM160 80c8.8 0 16-7.2 16-16s-7.2-16-16-16c-53 0-96 43-96 96c0 8.8 7.2 16 16 16s16-7.2 16-16c0-35.3 28.7-64 64-64zM128 480V317.1c10.4 1.9 21.1 2.9 32 2.9s21.6-1 32-2.9V480c0 17.7-14.3 32-32 32s-32-14.3-32-32z">
                                    </path>
                                </svg></i>
                            <span>123 Main Street, New York, NY 10001</span>
                        </div>
                        <div class="flex items-center gap-1 text-sm text-gray-500 mb-3">
                            <i class="text-xs" data-fa-i2svg><svg class="svg-inline--fa fa-phone" aria-hidden="true"
                                    focusable="false" data-prefix="fas" data-icon="phone" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg>
                                    <path fill="currentColor"
                                        d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z">
                                    </path>
                                </svg></i>
                            <span>+1 234 567 8901</span>
                        </div>
                        <span
                            class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs font-medium">Active</span>

                        <div class="border-t border-gray-100 pt-4 mt-4">
                            <div class="flex justify-between text-center">
                                <div>
                                    <div class="text-lg font-semibold text-gray-900">2</div>
                                    <div class="text-xs text-gray-500">Managers</div>
                                </div>
                                <div>
                                    <div class="text-lg font-semibold text-gray-900">4</div>
                                    <div class="text-xs text-gray-500">Operators</div>
                                </div>
                                <div>
                                    <div class="text-lg font-semibold text-gray-900">45</div>
                                    <div class="text-xs text-gray-500">Vouchers</div>
                                </div>
                            </div>
                        </div>

                        <div class="border-t border-gray-100 pt-4 mt-4">
                            <div class="flex justify-between items-center">
                                <button class="text-blue-600 hover:text-blue-700 text-sm">View
                                    Details</button>
                                <div class="flex items-center gap-2">
                                    <button class="text-gray-400 hover:text-gray-600">
                                        <i data-fa-i2svg><svg class="svg-inline--fa fa-pen-to-square"
                                                aria-hidden="true" focusable="false" data-prefix="fas"
                                                data-icon="pen-to-square" role="img"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                data-fa-i2svg>
                                                <path fill="currentColor"
                                                    d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z">
                                                </path>
                                            </svg></i>
                                    </button>
                                    <button class="text-gray-400 hover:text-red-600">
                                        <i data-fa-i2svg><svg class="svg-inline--fa fa-trash" aria-hidden="true"
                                                focusable="false" data-prefix="fas" data-icon="trash" role="img"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                                data-fa-i2svg>
                                                <path fill="currentColor"
                                                    d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z">
                                                </path>
                                            </svg></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow duration-200">
                    <div class="h-1 bg-blue-500"></div>
                    <div class="p-6">
                        <div
                            class="bg-blue-50 text-blue-600 w-10 h-10 rounded-lg flex items-center justify-center mb-4">
                            <i data-fa-i2svg><svg class="svg-inline--fa fa-building" aria-hidden="true"
                                    focusable="false" data-prefix="fas" data-icon="building" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg>
                                    <path fill="currentColor"
                                        d="M48 0C21.5 0 0 21.5 0 48V464c0 26.5 21.5 48 48 48h96V432c0-26.5 21.5-48 48-48s48 21.5 48 48v80h96c26.5 0 48-21.5 48-48V48c0-26.5-21.5-48-48-48H48zM64 240c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V240zm112-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H176c-8.8 0-16-7.2-16-16V240c0-8.8 7.2-16 16-16zm80 16c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H272c-8.8 0-16-7.2-16-16V240zM80 96h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V112c0-8.8 7.2-16 16-16zm80 16c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H176c-8.8 0-16-7.2-16-16V112zM272 96h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H272c-8.8 0-16-7.2-16-16V112c0-8.8 7.2-16 16-16z">
                                    </path>
                                </svg></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-1">Westside
                            Location</h3>
                        <div class="flex items-center gap-1 text-sm text-gray-500 mb-2">
                            <i class="text-xs" data-fa-i2svg><svg class="svg-inline--fa fa-map-pin"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="map-pin"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                    data-fa-i2svg>
                                    <path fill="currentColor"
                                        d="M16 144a144 144 0 1 1 288 0A144 144 0 1 1 16 144zM160 80c8.8 0 16-7.2 16-16s-7.2-16-16-16c-53 0-96 43-96 96c0 8.8 7.2 16 16 16s16-7.2 16-16c0-35.3 28.7-64 64-64zM128 480V317.1c10.4 1.9 21.1 2.9 32 2.9s21.6-1 32-2.9V480c0 17.7-14.3 32-32 32s-32-14.3-32-32z">
                                    </path>
                                </svg></i>
                            <span>456 Oak Avenue, Los Angeles, CA
                                90001</span>
                        </div>
                        <div class="flex items-center gap-1 text-sm text-gray-500 mb-3">
                            <i class="text-xs" data-fa-i2svg><svg class="svg-inline--fa fa-phone" aria-hidden="true"
                                    focusable="false" data-prefix="fas" data-icon="phone" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg>
                                    <path fill="currentColor"
                                        d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z">
                                    </path>
                                </svg></i>
                            <span>+1 234 567 8902</span>
                        </div>
                        <span
                            class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs font-medium">Active</span>

                        <div class="border-t border-gray-100 pt-4 mt-4">
                            <div class="flex justify-between text-center">
                                <div>
                                    <div class="text-lg font-semibold text-gray-900">1</div>
                                    <div class="text-xs text-gray-500">Managers</div>
                                </div>
                                <div>
                                    <div class="text-lg font-semibold text-gray-900">3</div>
                                    <div class="text-xs text-gray-500">Operators</div>
                                </div>
                                <div>
                                    <div class="text-lg font-semibold text-gray-900">32</div>
                                    <div class="text-xs text-gray-500">Vouchers</div>
                                </div>
                            </div>
                        </div>

                        <div class="border-t border-gray-100 pt-4 mt-4">
                            <div class="flex justify-between items-center">
                                <button class="text-blue-600 hover:text-blue-700 text-sm">View
                                    Details</button>
                                <div class="flex items-center gap-2">
                                    <button class="text-gray-400 hover:text-gray-600">
                                        <i data-fa-i2svg><svg class="svg-inline--fa fa-pen-to-square"
                                                aria-hidden="true" focusable="false" data-prefix="fas"
                                                data-icon="pen-to-square" role="img"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                data-fa-i2svg>
                                                <path fill="currentColor"
                                                    d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z">
                                                </path>
                                            </svg></i>
                                    </button>
                                    <button class="text-gray-400 hover:text-red-600">
                                        <i data-fa-i2svg><svg class="svg-inline--fa fa-trash" aria-hidden="true"
                                                focusable="false" data-prefix="fas" data-icon="trash" role="img"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                                data-fa-i2svg>
                                                <path fill="currentColor"
                                                    d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z">
                                                </path>
                                            </svg></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow duration-200">
                    <div class="h-1 bg-blue-500"></div>
                    <div class="p-6">
                        <div
                            class="bg-blue-50 text-blue-600 w-10 h-10 rounded-lg flex items-center justify-center mb-4">
                            <i data-fa-i2svg><svg class="svg-inline--fa fa-building" aria-hidden="true"
                                    focusable="false" data-prefix="fas" data-icon="building" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg>
                                    <path fill="currentColor"
                                        d="M48 0C21.5 0 0 21.5 0 48V464c0 26.5 21.5 48 48 48h96V432c0-26.5 21.5-48 48-48s48 21.5 48 48v80h96c26.5 0 48-21.5 48-48V48c0-26.5-21.5-48-48-48H48zM64 240c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V240zm112-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H176c-8.8 0-16-7.2-16-16V240c0-8.8 7.2-16 16-16zm80 16c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H272c-8.8 0-16-7.2-16-16V240zM80 96h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V112c0-8.8 7.2-16 16-16zm80 16c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H176c-8.8 0-16-7.2-16-16V112zM272 96h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H272c-8.8 0-16-7.2-16-16V112c0-8.8 7.2-16 16-16z">
                                    </path>
                                </svg></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-1">North
                            Plaza</h3>
                        <div class="flex items-center gap-1 text-sm text-gray-500 mb-2">
                            <i class="text-xs" data-fa-i2svg><svg class="svg-inline--fa fa-map-pin"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="map-pin"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                    data-fa-i2svg>
                                    <path fill="currentColor"
                                        d="M16 144a144 144 0 1 1 288 0A144 144 0 1 1 16 144zM160 80c8.8 0 16-7.2 16-16s-7.2-16-16-16c-53 0-96 43-96 96c0 8.8 7.2 16 16 16s16-7.2 16-16c0-35.3 28.7-64 64-64zM128 480V317.1c10.4 1.9 21.1 2.9 32 2.9s21.6-1 32-2.9V480c0 17.7-14.3 32-32 32s-32-14.3-32-32z">
                                    </path>
                                </svg></i>
                            <span>789 Pine Road, Chicago, IL 60601</span>
                        </div>
                        <div class="flex items-center gap-1 text-sm text-gray-500 mb-3">
                            <i class="text-xs" data-fa-i2svg><svg class="svg-inline--fa fa-phone" aria-hidden="true"
                                    focusable="false" data-prefix="fas" data-icon="phone" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg>
                                    <path fill="currentColor"
                                        d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z">
                                    </path>
                                </svg></i>
                            <span>+1 234 567 8903</span>
                        </div>
                        <span
                            class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs font-medium">Active</span>

                        <div class="border-t border-gray-100 pt-4 mt-4">
                            <div class="flex justify-between text-center">
                                <div>
                                    <div class="text-lg font-semibold text-gray-900">2</div>
                                    <div class="text-xs text-gray-500">Managers</div>
                                </div>
                                <div>
                                    <div class="text-lg font-semibold text-gray-900">5</div>
                                    <div class="text-xs text-gray-500">Operators</div>
                                </div>
                                <div>
                                    <div class="text-lg font-semibold text-gray-900">38</div>
                                    <div class="text-xs text-gray-500">Vouchers</div>
                                </div>
                            </div>
                        </div>

                        <div class="border-t border-gray-100 pt-4 mt-4">
                            <div class="flex justify-between items-center">
                                <button class="text-blue-600 hover:text-blue-700 text-sm">View
                                    Details</button>
                                <div class="flex items-center gap-2">
                                    <button class="text-gray-400 hover:text-gray-600">
                                        <i data-fa-i2svg><svg class="svg-inline--fa fa-pen-to-square"
                                                aria-hidden="true" focusable="false" data-prefix="fas"
                                                data-icon="pen-to-square" role="img"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                data-fa-i2svg>
                                                <path fill="currentColor"
                                                    d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z">
                                                </path>
                                            </svg></i>
                                    </button>
                                    <button class="text-gray-400 hover:text-red-600">
                                        <i data-fa-i2svg><svg class="svg-inline--fa fa-trash" aria-hidden="true"
                                                focusable="false" data-prefix="fas" data-icon="trash" role="img"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                                data-fa-i2svg>
                                                <path fill="currentColor"
                                                    d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z">
                                                </path>
                                            </svg></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow duration-200">
                    <div class="h-1 bg-orange-500"></div>
                    <div class="p-6">
                        <div
                            class="bg-orange-50 text-orange-600 w-10 h-10 rounded-lg flex items-center justify-center mb-4">
                            <i data-fa-i2svg><svg class="svg-inline--fa fa-building" aria-hidden="true"
                                    focusable="false" data-prefix="fas" data-icon="building" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg>
                                    <path fill="currentColor"
                                        d="M48 0C21.5 0 0 21.5 0 48V464c0 26.5 21.5 48 48 48h96V432c0-26.5 21.5-48 48-48s48 21.5 48 48v80h96c26.5 0 48-21.5 48-48V48c0-26.5-21.5-48-48-48H48zM64 240c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V240zm112-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H176c-8.8 0-16-7.2-16-16V240c0-8.8 7.2-16 16-16zm80 16c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H272c-8.8 0-16-7.2-16-16V240zM80 96h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V112c0-8.8 7.2-16 16-16zm80 16c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H176c-8.8 0-16-7.2-16-16V112zM272 96h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H272c-8.8 0-16-7.2-16-16V112c0-8.8 7.2-16 16-16z">
                                    </path>
                                </svg></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-1">South
                            Station</h3>
                        <div class="flex items-center gap-1 text-sm text-gray-500 mb-2">
                            <i class="text-xs" data-fa-i2svg><svg class="svg-inline--fa fa-map-pin"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="map-pin"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                    data-fa-i2svg>
                                    <path fill="currentColor"
                                        d="M16 144a144 144 0 1 1 288 0A144 144 0 1 1 16 144zM160 80c8.8 0 16-7.2 16-16s-7.2-16-16-16c-53 0-96 43-96 96c0 8.8 7.2 16 16 16s16-7.2 16-16c0-35.3 28.7-64 64-64zM128 480V317.1c10.4 1.9 21.1 2.9 32 2.9s21.6-1 32-2.9V480c0 17.7-14.3 32-32 32s-32-14.3-32-32z">
                                    </path>
                                </svg></i>
                            <span>321 Elm Street, Miami, FL 33101</span>
                        </div>
                        <div class="flex items-center gap-1 text-sm text-gray-500 mb-3">
                            <i class="text-xs" data-fa-i2svg><svg class="svg-inline--fa fa-phone" aria-hidden="true"
                                    focusable="false" data-prefix="fas" data-icon="phone" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg>
                                    <path fill="currentColor"
                                        d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z">
                                    </path>
                                </svg></i>
                            <span>+1 234 567 8904</span>
                        </div>
                        <span
                            class="bg-orange-100 text-orange-700 px-2 py-1 rounded-full text-xs font-medium">Pending</span>

                        <div class="border-t border-gray-100 pt-4 mt-4">
                            <div class="flex justify-between text-center">
                                <div>
                                    <div class="text-lg font-semibold text-gray-900">1</div>
                                    <div class="text-xs text-gray-500">Managers</div>
                                </div>
                                <div>
                                    <div class="text-lg font-semibold text-gray-900">2</div>
                                    <div class="text-xs text-gray-500">Operators</div>
                                </div>
                                <div>
                                    <div class="text-lg font-semibold text-gray-900">18</div>
                                    <div class="text-xs text-gray-500">Vouchers</div>
                                </div>
                            </div>
                        </div>

                        <div class="border-t border-gray-100 pt-4 mt-4">
                            <div class="flex justify-between items-center">
                                <button class="text-blue-600 hover:text-blue-700 text-sm">View
                                    Details</button>
                                <div class="flex items-center gap-2">
                                    <button class="text-gray-400 hover:text-gray-600">
                                        <i data-fa-i2svg><svg class="svg-inline--fa fa-pen-to-square"
                                                aria-hidden="true" focusable="false" data-prefix="fas"
                                                data-icon="pen-to-square" role="img"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                data-fa-i2svg>
                                                <path fill="currentColor"
                                                    d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z">
                                                </path>
                                            </svg></i>
                                    </button>
                                    <button class="text-gray-400 hover:text-red-600">
                                        <i data-fa-i2svg><svg class="svg-inline--fa fa-trash" aria-hidden="true"
                                                focusable="false" data-prefix="fas" data-icon="trash" role="img"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                                data-fa-i2svg>
                                                <path fill="currentColor"
                                                    d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z">
                                                </path>
                                            </svg></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow duration-200">
                    <div class="h-1 bg-blue-500"></div>
                    <div class="p-6">
                        <div
                            class="bg-blue-50 text-blue-600 w-10 h-10 rounded-lg flex items-center justify-center mb-4">
                            <i data-fa-i2svg><svg class="svg-inline--fa fa-building" aria-hidden="true"
                                    focusable="false" data-prefix="fas" data-icon="building" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg>
                                    <path fill="currentColor"
                                        d="M48 0C21.5 0 0 21.5 0 48V464c0 26.5 21.5 48 48 48h96V432c0-26.5 21.5-48 48-48s48 21.5 48 48v80h96c26.5 0 48-21.5 48-48V48c0-26.5-21.5-48-48-48H48zM64 240c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V240zm112-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H176c-8.8 0-16-7.2-16-16V240c0-8.8 7.2-16 16-16zm80 16c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H272c-8.8 0-16-7.2-16-16V240zM80 96h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V112c0-8.8 7.2-16 16-16zm80 16c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H176c-8.8 0-16-7.2-16-16V112zM272 96h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H272c-8.8 0-16-7.2-16-16V112c0-8.8 7.2-16 16-16z">
                                    </path>
                                </svg></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-1">East
                            Side Hub</h3>
                        <div class="flex items-center gap-1 text-sm text-gray-500 mb-2">
                            <i class="text-xs" data-fa-i2svg><svg class="svg-inline--fa fa-map-pin"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="map-pin"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                    data-fa-i2svg>
                                    <path fill="currentColor"
                                        d="M16 144a144 144 0 1 1 288 0A144 144 0 1 1 16 144zM160 80c8.8 0 16-7.2 16-16s-7.2-16-16-16c-53 0-96 43-96 96c0 8.8 7.2 16 16 16s16-7.2 16-16c0-35.3 28.7-64 64-64zM128 480V317.1c10.4 1.9 21.1 2.9 32 2.9s21.6-1 32-2.9V480c0 17.7-14.3 32-32 32s-32-14.3-32-32z">
                                    </path>
                                </svg></i>
                            <span>654 Maple Drive, Boston, MA 02101</span>
                        </div>
                        <div class="flex items-center gap-1 text-sm text-gray-500 mb-3">
                            <i class="text-xs" data-fa-i2svg><svg class="svg-inline--fa fa-phone" aria-hidden="true"
                                    focusable="false" data-prefix="fas" data-icon="phone" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg>
                                    <path fill="currentColor"
                                        d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z">
                                    </path>
                                </svg></i>
                            <span>+1 234 567 8905</span>
                        </div>
                        <span
                            class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs font-medium">Active</span>

                        <div class="border-t border-gray-100 pt-4 mt-4">
                            <div class="flex justify-between text-center">
                                <div>
                                    <div class="text-lg font-semibold text-gray-900">1</div>
                                    <div class="text-xs text-gray-500">Managers</div>
                                </div>
                                <div>
                                    <div class="text-lg font-semibold text-gray-900">3</div>
                                    <div class="text-xs text-gray-500">Operators</div>
                                </div>
                                <div>
                                    <div class="text-lg font-semibold text-gray-900">23</div>
                                    <div class="text-xs text-gray-500">Vouchers</div>
                                </div>
                            </div>
                        </div>

                        <div class="border-t border-gray-100 pt-4 mt-4">
                            <div class="flex justify-between items-center">
                                <button class="text-blue-600 hover:text-blue-700 text-sm">View
                                    Details</button>
                                <div class="flex items-center gap-2">
                                    <button class="text-gray-400 hover:text-gray-600">
                                        <i data-fa-i2svg><svg class="svg-inline--fa fa-pen-to-square"
                                                aria-hidden="true" focusable="false" data-prefix="fas"
                                                data-icon="pen-to-square" role="img"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                data-fa-i2svg>
                                                <path fill="currentColor"
                                                    d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z">
                                                </path>
                                            </svg></i>
                                    </button>
                                    <button class="text-gray-400 hover:text-red-600">
                                        <i data-fa-i2svg><svg class="svg-inline--fa fa-trash" aria-hidden="true"
                                                focusable="false" data-prefix="fas" data-icon="trash" role="img"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                                data-fa-i2svg>
                                                <path fill="currentColor"
                                                    d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z">
                                                </path>
                                            </svg></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="users-tab" class="tab-content hidden">
            <div class="flex items-center justify-between px-8 py-4">
                <div class="flex items-center gap-6">
                    <div class="flex items-center gap-3">
                        <h2 class="text-xl font-semibold text-gray-900">All
                            Users</h2>
                        <span class="bg-gray-100 text-gray-600 px-2 py-1 rounded-full text-sm">23</span>
                    </div>
                    <div class="flex items-center gap-4">
                        <select class="border border-gray-300 rounded-lg px-3 py-2 text-sm">
                            <option>Filter by Role</option>
                            <option>All</option>
                            <option>Managers</option>
                            <option>Operators</option>
                        </select>
                        <select class="border border-gray-300 rounded-lg px-3 py-2 text-sm">
                            <option>Sort by</option>
                            <option>Name A-Z</option>
                            <option>Name Z-A</option>
                            <option>Date Added</option>
                        </select>
                    </div>
                </div>
                <button
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors flex items-center gap-2">
                    <i data-fa-i2svg><svg class="svg-inline--fa fa-plus" aria-hidden="true" focusable="false"
                            data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 448 512" data-fa-i2svg>
                            <path fill="currentColor"
                                d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z">
                            </path>
                        </svg></i>
                    Add New User
                </button>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 mx-8 mb-8">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-200">
                                <th class="text-left text-sm font-medium text-gray-500 px-6 py-4">User</th>
                                <th class="text-left text-sm font-medium text-gray-500 px-6 py-4">Contact</th>
                                <th class="text-left text-sm font-medium text-gray-500 px-6 py-4">Location</th>
                                <th class="text-left text-sm font-medium text-gray-500 px-6 py-4">Role</th>
                                <th class="text-left text-sm font-medium text-gray-500 px-6 py-4">Status</th>
                                <th class="text-left text-sm font-medium text-gray-500 px-6 py-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="hover:bg-gray-50 border-b border-gray-100">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-10 h-10 bg-blue-500 text-white rounded-full flex items-center justify-center font-medium text-sm">
                                            SJ
                                        </div>
                                        <div>
                                            <div class="font-medium text-gray-900">Sarah
                                                Johnson</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-600">sarah@acme.com</div>
                                    <div class="text-sm text-gray-600">+1
                                        234
                                        567 8902</div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">Downtown
                                    Branch</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="bg-blue-100 text-blue-700 px-2 py-1 rounded-full text-xs font-medium">Manager</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs font-medium">Active</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <button class="text-gray-400 hover:text-gray-600">
                                            <i data-fa-i2svg><svg class="svg-inline--fa fa-pen-to-square"
                                                    aria-hidden="true" focusable="false" data-prefix="fas"
                                                    data-icon="pen-to-square" role="img"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                    data-fa-i2svg>
                                                    <path fill="currentColor"
                                                        d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z">
                                                    </path>
                                                </svg></i>
                                        </button>
                                        <button class="text-gray-400 hover:text-red-600">
                                            <i data-fa-i2svg><svg class="svg-inline--fa fa-trash" aria-hidden="true"
                                                    focusable="false" data-prefix="fas" data-icon="trash"
                                                    role="img" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 448 512" data-fa-i2svg>
                                                    <path fill="currentColor"
                                                        d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z">
                                                    </path>
                                                </svg></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50 border-b border-gray-100">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-10 h-10 bg-blue-500 text-white rounded-full flex items-center justify-center font-medium text-sm">
                                            MW
                                        </div>
                                        <div>
                                            <div class="font-medium text-gray-900">Mike
                                                Wilson</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-600">mike@acme.com</div>
                                    <div class="text-sm text-gray-600">+1
                                        234
                                        567 8903</div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">Downtown
                                    Branch</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="bg-blue-100 text-blue-700 px-2 py-1 rounded-full text-xs font-medium">Manager</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs font-medium">Active</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <button class="text-gray-400 hover:text-gray-600">
                                            <i data-fa-i2svg><svg class="svg-inline--fa fa-pen-to-square"
                                                    aria-hidden="true" focusable="false" data-prefix="fas"
                                                    data-icon="pen-to-square" role="img"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                    data-fa-i2svg>
                                                    <path fill="currentColor"
                                                        d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z">
                                                    </path>
                                                </svg></i>
                                        </button>
                                        <button class="text-gray-400 hover:text-red-600">
                                            <i data-fa-i2svg><svg class="svg-inline--fa fa-trash" aria-hidden="true"
                                                    focusable="false" data-prefix="fas" data-icon="trash"
                                                    role="img" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 448 512" data-fa-i2svg>
                                                    <path fill="currentColor"
                                                        d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z">
                                                    </path>
                                                </svg></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50 border-b border-gray-100">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-10 h-10 bg-green-500 text-white rounded-full flex items-center justify-center font-medium text-sm">
                                            ED
                                        </div>
                                        <div>
                                            <div class="font-medium text-gray-900">Emma
                                                Davis</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-600">emma@acme.com</div>
                                    <div class="text-sm text-gray-600">+1
                                        234
                                        567 8904</div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">Downtown
                                    Branch</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs font-medium">Operator</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs font-medium">Active</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <button class="text-gray-400 hover:text-gray-600">
                                            <i data-fa-i2svg><svg class="svg-inline--fa fa-pen-to-square"
                                                    aria-hidden="true" focusable="false" data-prefix="fas"
                                                    data-icon="pen-to-square" role="img"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                    data-fa-i2svg>
                                                    <path fill="currentColor"
                                                        d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z">
                                                    </path>
                                                </svg></i>
                                        </button>
                                        <button class="text-gray-400 hover:text-red-600">
                                            <i data-fa-i2svg><svg class="svg-inline--fa fa-trash" aria-hidden="true"
                                                    focusable="false" data-prefix="fas" data-icon="trash"
                                                    role="img" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 448 512" data-fa-i2svg>
                                                    <path fill="currentColor"
                                                        d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z">
                                                    </path>
                                                </svg></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="flex items-center justify-between px-6 py-4 border-t border-gray-100">
                    <div class="text-sm text-gray-500">Showing 1 to 20 of 23
                        users</div>
                    <div class="flex items-center gap-2">
                        <button
                            class="px-3 py-1 border border-gray-300 rounded text-sm hover:bg-gray-50">Previous</button>
                        <button class="px-3 py-1 border border-gray-300 rounded text-sm hover:bg-gray-50">Next</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="vouchers-tab" class="tab-content hidden">
            <div class="flex items-center justify-between px-8 py-4">
                <div class="flex items-center gap-6">
                    <div class="flex items-center gap-3">
                        <h2 class="text-xl font-semibold text-gray-900">Vouchers</h2>
                        <span class="bg-gray-100 text-gray-600 px-2 py-1 rounded-full text-sm">89</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <button
                            class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-medium">Active</button>
                        <button class="text-gray-500 hover:bg-gray-100 px-3 py-1 rounded-full text-sm">Expired</button>
                    </div>
                    <input type="text" placeholder="Search by code..."
                        class="border border-gray-300 rounded-lg px-3 py-2 text-sm w-64">
                </div>
                <button
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors flex items-center gap-2">
                    <i data-fa-i2svg><svg class="svg-inline--fa fa-plus" aria-hidden="true" focusable="false"
                            data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 448 512" data-fa-i2svg>
                            <path fill="currentColor"
                                d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z">
                            </path>
                        </svg></i>
                    Create New Voucher
                </button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 px-8 pb-8">
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-lg transition-all">
                    <div class="flex items-start justify-between mb-4">
                        <div class="text-xl font-bold text-gray-900 font-mono">SUMMER25</div>
                        <span
                            class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs font-medium">Active</span>
                    </div>
                    <div class="text-2xl font-bold text-blue-600 mb-2">25%
                        OFF</div>
                    <div class="text-sm text-gray-600 mb-4">Valid until Dec
                        31,
                        2024</div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-500">Used: 45/100</span>
                        <div class="flex items-center gap-2">
                            <button class="text-blue-600 hover:text-blue-700">
                                <i data-fa-i2svg><svg class="svg-inline--fa fa-pen-to-square" aria-hidden="true"
                                        focusable="false" data-prefix="fas" data-icon="pen-to-square" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg>
                                        <path fill="currentColor"
                                            d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z">
                                        </path>
                                    </svg></i>
                            </button>
                            <button class="text-gray-400 hover:text-red-600">
                                <i data-fa-i2svg><svg class="svg-inline--fa fa-trash" aria-hidden="true"
                                        focusable="false" data-prefix="fas" data-icon="trash" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg>
                                        <path fill="currentColor"
                                            d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z">
                                        </path>
                                    </svg></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-lg transition-all">
                    <div class="flex items-start justify-between mb-4">
                        <div class="text-xl font-bold text-gray-900 font-mono">WELCOME10</div>
                        <span
                            class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs font-medium">Active</span>
                    </div>
                    <div class="text-2xl font-bold text-purple-600 mb-2">$10
                        OFF</div>
                    <div class="text-sm text-gray-600 mb-4">Valid until Jan
                        15,
                        2025</div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-500">Used: 12/50</span>
                        <div class="flex items-center gap-2">
                            <button class="text-blue-600 hover:text-blue-700">
                                <i data-fa-i2svg><svg class="svg-inline--fa fa-pen-to-square" aria-hidden="true"
                                        focusable="false" data-prefix="fas" data-icon="pen-to-square" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg>
                                        <path fill="currentColor"
                                            d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z">
                                        </path>
                                    </svg></i>
                            </button>
                            <button class="text-gray-400 hover:text-red-600">
                                <i data-fa-i2svg><svg class="svg-inline--fa fa-trash" aria-hidden="true"
                                        focusable="false" data-prefix="fas" data-icon="trash" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg>
                                        <path fill="currentColor"
                                            d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z">
                                        </path>
                                    </svg></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-lg transition-all">
                    <div class="flex items-start justify-between mb-4">
                        <div class="text-xl font-bold text-gray-900 font-mono">HOLIDAY50</div>
                        <span
                            class="bg-gray-100 text-gray-500 px-2 py-1 rounded-full text-xs font-medium">Expired</span>
                    </div>
                    <div class="text-2xl font-bold text-red-600 mb-2">50%
                        OFF</div>
                    <div class="text-sm text-gray-600 mb-4">Expired on Dec
                        25,
                        2023</div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-500">Used: 89/100</span>
                        <div class="flex items-center gap-2">
                            <button class="text-blue-600 hover:text-blue-700">
                                <i data-fa-i2svg><svg class="svg-inline--fa fa-pen-to-square" aria-hidden="true"
                                        focusable="false" data-prefix="fas" data-icon="pen-to-square" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg>
                                        <path fill="currentColor"
                                            d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z">
                                        </path>
                                    </svg></i>
                            </button>
                            <button class="text-gray-400 hover:text-red-600">
                                <i data-fa-i2svg><svg class="svg-inline--fa fa-trash" aria-hidden="true"
                                        focusable="false" data-prefix="fas" data-icon="trash" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg>
                                        <path fill="currentColor"
                                            d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z">
                                        </path>
                                    </svg></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="activity-tab" class="tab-content hidden">
            <div class="px-8 py-4">
                <h2 class="text-xl font-semibold text-gray-900 mb-6">Activity
                    Log</h2>
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <div
                                class="w-8 h-8 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center text-sm">
                                <i data-fa-i2svg><svg class="svg-inline--fa fa-plus" aria-hidden="true"
                                        focusable="false" data-prefix="fas" data-icon="plus" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg>
                                        <path fill="currentColor"
                                            d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z">
                                        </path>
                                    </svg></i>
                            </div>
                            <div class="flex-1">
                                <div class="font-medium text-gray-900">New
                                    location added</div>
                                <div class="text-sm text-gray-500">East Side
                                    Hub
                                    was added to the business</div>
                                <div class="text-xs text-gray-400 mt-1">2
                                    hours
                                    ago</div>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div
                                class="w-8 h-8 bg-green-100 text-green-600 rounded-full flex items-center justify-center text-sm">
                                <i data-fa-i2svg><svg class="svg-inline--fa fa-user" aria-hidden="true"
                                        focusable="false" data-prefix="fas" data-icon="user" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg>
                                        <path fill="currentColor"
                                            d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z">
                                        </path>
                                    </svg></i>
                            </div>
                            <div class="flex-1">
                                <div class="font-medium text-gray-900">New
                                    user
                                    registered</div>
                                <div class="text-sm text-gray-500">Emma
                                    Davis
                                    joined as Operator at Downtown
                                    Branch</div>
                                <div class="text-xs text-gray-400 mt-1">1
                                    day
                                    ago</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <x-slot name="script">
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const tabButtons = document.querySelectorAll('.tab-btn');
                const tabContents = document.querySelectorAll('.tab-content');

                tabButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const targetTab = this.getAttribute('data-tab');

                        tabButtons.forEach(btn => {
                            btn.classList.remove('text-blue-600', 'border-b-2',
                                'border-blue-600');
                            btn.classList.add('text-gray-500');
                        });

                        this.classList.remove('text-gray-500');
                        this.classList.add('text-blue-600', 'border-b-2', 'border-blue-600');

                        tabContents.forEach(content => {
                            content.classList.add('hidden');
                        });

                        const targetContent = document.getElementById(targetTab + '-tab');
                        if (targetContent) {
                            targetContent.classList.remove('hidden');
                        }
                    });
                });
            });
        </script>
    </x-slot>
</x-main-layout>
