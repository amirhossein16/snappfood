<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Roles Setting') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                {{-- Header Section --}}
                <div class="mt-8 pb-4 text-2xl flex justify-between">
                    <div>افزودن نقش جدید</div>
                    {{-- Add Button Action --}}
                    <div class="mr-2">
                        <x-jet-button wire:click="confirmCategoryAdd" class="bg-indigo-700 hover:bg-indigo-900">
                            افزودن نقش
                        </x-jet-button>
                    </div>
                </div>

                {{-- Table Section --}}
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left">
                                            ردیف
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left">
                                            نام نقش
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left">
                                            عملیات
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">

                                    @foreach ($roles as $role)
                                        <tr>
                                            <td class="px-6 py-4">
                                                {{ $role->name }}
                                            </td>
                                            <td class="px-6 py-4 gap-1 flex flex-wrap">
                                                @foreach($role->permissions as $perm)
                                                    <span class="bg-indigo-900 text-sm rounded-full text-white p-2">
                                                {{ $perm->name }}
                                            </span>
                                                @endforeach
                                            </td>
                                            <td class="px-6 py-4">
                                                {{-- Edit Button Action --}}
                                                <x-jet-button wire:click="confirmCategoryEdit({{$role->id}})"
                                                              class="bg-orange-500 hover:bg-orange-700">
                                                    ویرایش
                                                </x-jet-button>
                                                {{-- Delete Button Action --}}
                                                <x-jet-danger-button wire:click="confirmCategoryDeletion({{$role->id}})"
                                                                     wire:loading.attr="disabled">
                                                    حذف
                                                </x-jet-danger-button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    {{--                        @endforeach--}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Footer Section --}}
                {{--        <div class="mt-4">--}}
                {{--            {{ $foodCategory->links() }}--}}
                {{--        </div>--}}

                {{-- Modal Section --}}
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
                            <x-jet-input type="text" class="mt-1 block w-full" id="roleName" wire:model.defer="RoleCategory.name"
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

            </div>
        </div>
    </div>
</div>
