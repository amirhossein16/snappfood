<div>
    <livewire:delete-modal/>
    <livewire:edit-modal/>
    <!-- BEGIN: Content -->
    <div class="wrapper wrapper--top-nav">
        <div class="wrapper-box">
            <!-- BEGIN: Content -->
            <div class="content">
                <div class="intro-y flex flex-col sm:flex-row items-center mt-8">

                    <x-tables.header>
                        تنظیمات دسترسی ها
                    </x-tables.header>
                    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                        <button wire:click="confirmCategoryAdd" class="btn btn-primary shadow-md ml-2">افزودن محصول جدید
                        </button>
                        <div class="dropdown mr-auto sm:ml-0">
                            <button class="dropdown-toggle btn px-2 box text-white dark:text-gray-200"
                                    aria-expanded="false">
                            <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4"
                                                                                       data-feather="plus"></i> </span>
                            </button>
                            <div class="dropdown-menu w-40">
                                <div class="dropdown-menu__content box dark:bg-dark-1 p-2">
                                    <button
                                        class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                                        <i data-feather="file-plus" class="w-4 h-4 ml-2"></i>دسته بندی جدید
                                    </button>
                                    <a href=""
                                       class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                                        <i data-feather="users" class="w-4 h-4 ml-2"></i> گروه جدید </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="intro-y box p-5 mt-5">
                    <div class="p-5" id="striped-rows-table">
                        <div class="preview">
                            <div class="overflow-x-auto">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">#</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">نام دسته بندی</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($roles as $role)
                                        @if( $role->id % 2 == 0  )
                                            <tr>
                                        @else
                                            <tr class="bg-gray-200 dark:bg-dark-1">
                                                @endif
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">{{ $role->id }}</td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">{{ $role->name }}</td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">
                                                    @foreach($role->permissions as $perm)
                                                        <span class="bg-indigo-900 text-sm rounded-full text-white p-2">
                                                            {{ $perm->name }}
                                                        </span>
                                                    @endforeach
                                                </td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">
                                                    <button class="btn btn-elevated-primary w-24 ml-1 mb-2"
                                                            wire:click="$emit('EditModalConfirm',{{$role->id}})">
                                                        ویرایش
                                                    </button>
                                                    <x-jet-button
                                                        class="btn btn-elevated-secondary w-24 ml-1 mb-2 text-indigo-900"
                                                        wire:click="$emit('DeleteModal',{{$role->id}})"
                                                    >حذف
                                                    </x-jet-button>
                                                </td>
                                            </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<x-jet-confirmation-modal wire:model="confirmingCategoryDeletion">
    <x-slot name="title">
        {{--            {{ __('Delete Product') }}--}}
    </x-slot>

    <x-slot name="content">
        {{ __('Are you sure you want to delete Product? ') }}
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$set('confirmingCategoryDeletion', false)"
                                wire:loading.attr="disabled">
            {{ __('Conceal') }}
        </x-jet-secondary-button>

        <x-jet-danger-button class="ml-2" wire:click="deleteCategory({{ $confirmingCategoryDeletion }})"
                             wire:loading.attr="disabled">
            {{ __('Delete') }}
        </x-jet-danger-button>
    </x-slot>
</x-jet-confirmation-modal>

<x-jet-dialog-modal wire:model="confirmingCategoryUpdate">
    <x-slot name="title">
        {{ isset($this->foodCategory->id) ? 'Edit Product' : 'Add Product' }}
    </x-slot>

    <x-slot name="content">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="roleName" value="{{__('Role Name')}}"/>
            <x-jet-input type="text" class="mt-1 block w-full" id="roleName"
                         wire:model.defer="RoleCategory.name"
                         placeholder="Enter a Role Name"/>
            <x-jet-input-error for="RoleController.roleName" class="mt-2"/>
        </div>

        <div class="col-span-6 sm:col-span-4 mt-3">
            <x-jet-label for="name" value="{{__('Permissions')}}"/>

            <div class="form-check">
                <x-jet-input type="checkbox" class="mt-1" id="checkPermissionAll" value="1"/>
                <x-jet-label class="form-check-label" for="checkPermissionAll" value="{{__('All')}}"/>
            </div>
            <hr>
            @php $i = 1; @endphp
            @foreach ($permission_groups as $group)
                <div class="flex flex-row">
                    <div class="p-2 mr-4">
                        <div class="form-check">
                            <x-jet-input type="checkbox" class="form-check-input"
                                         id="{{ $i }}Management"
                                         value="{{ $group->name }}"
                                {{--                                                 onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox' this)"--}}
                            />
                            <x-jet-label class="form-check-label" for="checkPermission"
                                         value="{{ $group->name }}"/>
                        </div>
                    </div>

                    <div
                        class="flex flex-row justify-between w-full p-2 align-middle items-end role-{{ $i }}-management-checkbox">
                        @php
                            $permissions = App\Models\User::getpermissionsByGroupName($group->name);
                            $j = 1;
                        @endphp
                        @foreach ($permissions as $permission)
                            <div class="form-check">
                                <x-jet-input type="checkbox" class="block"
                                             wire:model.lazy="permissions"
                                             id="checkPermission{{ $permission->id }}"
                                             value="{{ $permission->name }}"/>
                                <x-jet-label class="form-check-label"
                                             for="checkPermission{{ $permission->id }}"
                                             value="{{ $permission->name }}"/>
                            </div>
                            @php  $j++; @endphp
                        @endforeach
                        <br>
                    </div>
                </div>
                <hr>
                @php  $i++; @endphp
            @endforeach
        </div>
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$set('confirmingCategoryUpdate', false)"
                                wire:loading.attr="disabled">
            {{ __('Conceal') }}
        </x-jet-secondary-button>

        <x-jet-danger-button class="ml-2" wire:click="saveCategory()" wire:loading.attr="disabled">
            {{ __('Save') }}
        </x-jet-danger-button>
    </x-slot>
</x-jet-dialog-modal>
