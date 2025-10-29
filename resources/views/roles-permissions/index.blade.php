<x-main-layout>
    <x-slot name="style">
        <style>
            .chevron {
                transition: transform 0.3s ease;
            }

            .chevron.rotate {
                transform: rotate(90deg);
            }

            .modal-backdrop {
                transition: opacity 0.3s ease;
            }

            .modal-content-wrapper {
                transition: transform 0.3s ease, opacity 0.3s ease;
            }

            /* Confirmation Dialog */
            .confirmation-dialog {
                backdrop-filter: blur(4px);
            }
        </style>
    </x-slot>

    <!-- Modal Backdrop -->
    <div id="modal-backdrop" class="fixed inset-0 bg-gray-900 bg-opacity-50 z-40 hidden modal-backdrop opacity-0"
        onclick="closeModal()"></div>

    <!-- Add Role Modal -->
    <div id="add-role-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4 hidden">
        <div class="modal-content-wrapper bg-white rounded-lg shadow-xl max-w-md w-full transform scale-95 opacity-0">
            <div class="flex items-center justify-between p-6 border-b border-gray-200">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900">Add New Role</h3>
                </div>
                <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>

            <form id="add-role-form" onsubmit="handleSubmit(event)">
                @csrf
                <div class="p-6 space-y-4">
                    <div>
                        <label for="role-name" class="block text-sm font-medium text-gray-700 mb-2">
                            Role Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="role-name" name="role_name" required
                            placeholder="Enter role name (e.g., Manager, Operator)"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <div class="flex items-center gap-4">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="role_status" value="active" checked
                                    class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500">
                                <span class="text-sm text-gray-700">Active</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="role_status" value="inactive"
                                    class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500">
                                <span class="text-sm text-gray-700">Inactive</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-3 p-6 border-t border-gray-200 bg-gray-50">
                    <button type="button" onclick="closeModal()"
                        class="px-5 py-2.5 text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                        Cancel
                    </button>
                    <button type="submit"
                        class="px-5 py-2.5 text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        <span>Create Role</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Confirmation Dialog -->
    <div id="confirmation-dialog"
        class="fixed inset-0 bg-gray-900 bg-opacity-50 z-50 hidden confirmation-dialog flex items-center justify-center p-4">
        <div class="bg-white rounded-lg shadow-xl max-w-md w-full transform scale-95 opacity-0"
            id="confirmation-content">
            <div class="p-6">
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Confirm Permission Change</h3>
                        <p class="text-sm text-gray-600 mt-1" id="confirmation-message"></p>
                    </div>
                </div>
                <div class="flex justify-end gap-3">
                    <button onclick="cancelPermissionChange()"
                        class="px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">
                        Cancel
                    </button>
                    <button onclick="confirmPermissionChange()"
                        class="px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                        Confirm
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <main class="lg:ml-64 min-h-screen">
        <div class="bg-white border-b border-gray-200 px-6 py-4 mt-16 lg:mt-0">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Roles & Permissions</h1>
                    <p class="text-sm text-gray-500 mt-1">Manage user roles and their associated permissions</p>
                </div>
                <button onclick="openModal()"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    <span>Add New Role</span>
                </button>
            </div>
        </div>

        <div id="content-area" class="p-6">
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                <!-- Header -->
                <div class="grid grid-cols-{{ count($roles) + 1 }} bg-gray-50 border-b border-gray-200">
                    <div class="px-6 py-3 text-left">
                        <span class="text-sm font-medium text-gray-600">Module Permission</span>
                    </div>
                    @foreach ($roles as $role)
                        <div class="px-6 py-3 text-left">
                            <div class="text-sm font-medium text-gray-600">Role</div>
                            <div class="text-sm font-semibold text-gray-900 mt-1">{{ $role->name }}</div>
                        </div>
                    @endforeach
                </div>

                @foreach ($permissions as $module => $moduleData)
                    <!-- Module Section -->
                    <div class="border-b border-gray-200">
                        <div class="grid grid-cols-{{ count($roles) + 1 }} bg-blue-50 hover:bg-blue-100 transition-colors cursor-pointer"
                            onclick="toggleSection('{{ $module }}')">
                            <div class="px-6 py-3 flex items-center gap-2">
                                <svg id="chevron-{{ $module }}" class="w-4 h-4 text-gray-600 chevron"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                                <span
                                    class="text-sm font-medium text-gray-900 uppercase">{{ $moduleData['name'] }}</span>
                            </div>
                            @foreach ($roles as $role)
                                <div class="px-6 py-3 flex items-center">
                                    <!-- Module level checkbox placeholder -->
                                </div>
                            @endforeach
                        </div>

                        <div id="{{ $module }}-permissions" class="hidden">
                            @foreach ($moduleData['permissions'] as $permission)
                                <div
                                    class="grid grid-cols-{{ count($roles) + 1 }} hover:bg-gray-50 transition-colors border-t border-gray-100">
                                    <div class="px-6 py-3 pl-16">
                                        <span class="text-sm text-gray-700">{{ $permission['display_name'] }}</span>
                                    </div>
                                    @foreach ($roles as $role)
                                        <div class="px-6 py-3 flex items-center">
                                            <input type="checkbox"
                                                class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 permission-checkbox"
                                                data-role-id="{{ $role->id }}"
                                                data-role-name="{{ $role->name }}"
                                                data-permission-id="{{ $permission['id'] }}"
                                                data-permission-name="{{ $permission['name'] }}"
                                                {{ $role->permissions->contains('id', $permission['id']) ? 'checked' : '' }}
                                                onchange="handlePermissionChange(event)">
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>

    <x-slot name="script">
        <script>
            let currentCheckbox = null;

            function getCsrfToken() {
                const metaTag = document.querySelector('meta[name="csrf-token"]');
                if (metaTag) return metaTag.content;
                const csrfInput = document.querySelector('input[name="_token"]');
                if (csrfInput) return csrfInput.value;
                return '';
            }

            function toggleSection(section) {
                const permissions = document.getElementById(section + '-permissions');
                const chevron = document.getElementById('chevron-' + section);

                if (permissions.classList.contains('hidden')) {
                    permissions.classList.remove('hidden');
                    permissions.classList.add('block');
                    chevron.classList.add('rotate');
                } else {
                    permissions.classList.remove('block');
                    permissions.classList.add('hidden');
                    chevron.classList.remove('rotate');
                }
            }

            function handlePermissionChange(event) {
                const checkbox = event.target;
                currentCheckbox = checkbox;

                const roleName = checkbox.dataset.roleName;
                const permissionName = checkbox.dataset.permissionName;

                const message = checkbox.checked ?
                    `Grant "${permissionName}" permission to "${roleName}" role?` :
                    `Revoke "${permissionName}" permission from "${roleName}" role?`;

                document.getElementById('confirmation-message').textContent = message;
                showConfirmationDialog();
            }

            function showConfirmationDialog() {
                const dialog = document.getElementById('confirmation-dialog');
                const content = document.getElementById('confirmation-content');
                dialog.classList.remove('hidden');
                setTimeout(() => {
                    content.classList.remove('scale-95', 'opacity-0');
                    content.classList.add('scale-100', 'opacity-100');
                }, 10);
            }

            function hideConfirmationDialog() {
                const dialog = document.getElementById('confirmation-dialog');
                const content = document.getElementById('confirmation-content');
                content.classList.remove('scale-100', 'opacity-100');
                content.classList.add('scale-95', 'opacity-0');
                setTimeout(() => dialog.classList.add('hidden'), 300);
            }

            function cancelPermissionChange() {
                if (currentCheckbox) {
                    currentCheckbox.checked = !currentCheckbox.checked;
                    currentCheckbox = null;
                }
                hideConfirmationDialog();
            }

            async function confirmPermissionChange() {
                if (!currentCheckbox) return;

                const roleId = currentCheckbox.dataset.roleId;
                const permissionId = currentCheckbox.dataset.permissionId;
                const action = currentCheckbox.checked ? 'grant' : 'revoke';

                try {
                    const response = await fetch('{{ route('roles-permissions.permissions.bulk-update') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': getCsrfToken(),
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            updates: [{
                                role_id: parseInt(roleId),
                                permission_id: parseInt(permissionId),
                                action: action
                            }]
                        })
                    });

                    const result = await response.json();

                    if (result.success) {
                        showNotification('Permission updated successfully!', 'success');
                    } else {
                        currentCheckbox.checked = !currentCheckbox.checked;
                        showNotification('Error: ' + result.message, 'error');
                    }
                } catch (error) {
                    console.error('Error:', error);
                    currentCheckbox.checked = !currentCheckbox.checked;
                    showNotification('An error occurred while updating permission.', 'error');
                }

                currentCheckbox = null;
                hideConfirmationDialog();
            }

            function showNotification(message, type = 'success') {
                const bgColor = type === 'success' ? 'bg-green-500' : 'bg-red-500';
                const notification = document.createElement('div');
                notification.className =
                    `fixed top-4 right-4 ${bgColor} text-white px-6 py-3 rounded-lg shadow-lg z-50 transform transition-all duration-300`;
                notification.textContent = message;
                document.body.appendChild(notification);
                setTimeout(() => {
                    notification.style.opacity = '0';
                    setTimeout(() => notification.remove(), 300);
                }, 3000);
            }

            function openModal() {
                const modal = document.getElementById('add-role-modal');
                const backdrop = document.getElementById('modal-backdrop');
                const modalContent = modal.querySelector('.modal-content-wrapper');

                modal.classList.remove('hidden');
                backdrop.classList.remove('hidden');

                setTimeout(() => {
                    backdrop.classList.remove('opacity-0');
                    backdrop.classList.add('opacity-100');
                    modalContent.classList.remove('scale-95', 'opacity-0');
                    modalContent.classList.add('scale-100', 'opacity-100');
                }, 10);

                document.body.style.overflow = 'hidden';
                setTimeout(() => document.getElementById('role-name').focus(), 300);
            }

            function closeModal() {
                const modal = document.getElementById('add-role-modal');
                const backdrop = document.getElementById('modal-backdrop');
                const modalContent = modal.querySelector('.modal-content-wrapper');

                backdrop.classList.remove('opacity-100');
                backdrop.classList.add('opacity-0');
                modalContent.classList.remove('scale-100', 'opacity-100');
                modalContent.classList.add('scale-95', 'opacity-0');

                setTimeout(() => {
                    modal.classList.add('hidden');
                    backdrop.classList.add('hidden');
                    document.body.style.overflow = 'auto';
                    document.getElementById('add-role-form').reset();
                }, 300);
            }

            async function handleSubmit(event) {
                event.preventDefault();
                const formData = new FormData(event.target);

                try {
                    const response = await fetch('{{ route('roles-permissions.roles.store') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': getCsrfToken(),
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            role_name: formData.get('role_name'),
                            role_status: formData.get('role_status')
                        })
                    });

                    const result = await response.json();

                    if (result.success) {
                        showNotification('Role created successfully!', 'success');
                        closeModal();
                        setTimeout(() => window.location.reload(), 1000);
                    } else {
                        showNotification('Error: ' + result.message, 'error');
                    }
                } catch (error) {
                    showNotification('An error occurred while creating the role.', 'error');
                }
            }

            document.addEventListener('keydown', function(event) {
                if (event.key === 'Escape') {
                    if (!document.getElementById('add-role-modal').classList.contains('hidden')) {
                        closeModal();
                    }
                    if (!document.getElementById('confirmation-dialog').classList.contains('hidden')) {
                        cancelPermissionChange();
                    }
                }
            });
        </script>
    </x-slot>
</x-main-layout>
