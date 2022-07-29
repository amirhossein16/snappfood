<div>
    <livewire:delete-modal/>
    <livewire:admin.modals.food-party-add-modal/>
    <!-- BEGIN: Content -->
    <div class="wrapper wrapper--top-nav">
        <div class="wrapper-box">
            <!-- BEGIN: Content -->
            <div class="content">
                <div class="intro-y flex flex-col sm:flex-row items-center mt-8">

                    <x-tables.header>
                        تنظیمات فودپارتی
                    </x-tables.header>
                    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                        <button wire:click="$emit('confirmFoodPartyAdd')" class="btn btn-primary shadow-md ml-2">افزودن
                            فودپارتی جدید
                        </button>
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
                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">وضعیت</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($FoodParty as $FoodParties)
                                        @if( $FoodParties->id % 2 == 0  )
                                            <tr>
                                        @else
                                            <tr class="bg-gray-200 dark:bg-dark-1">
                                                @endif
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">{{ $FoodParties->id }}</td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">{{ $FoodParties->foodPartyName }}</td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">
                                                    <button wire:click="$emit('ChangeStatus',{{$FoodParties->id}})">
                                                        {!! $FoodParties->status ? "<span class='text-green-500'>فعال</span>":"<span class='text-red-500'>غیرفعال</span>" !!}
                                                    </button>
                                                </td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">
                                                    <button class="btn btn-elevated-primary w-24 ml-1 mb-2"
                                                            wire:click="$emit('EditModalConfirm',{{$FoodParties->id}})">
                                                        ویرایش
                                                    </button>
                                                    <button
                                                        class="btn btn-elevated-secondary w-24 ml-1 mb-2 text-indigo-900"
                                                        wire:click="$emit('DeleteModals','App\\\Models\\\FoodParty',{{$FoodParties->id}},'حذف عنوان فودپارتی' ,'آیا از حذف فودپارتی{{$FoodParties->foodPartyName}} مطمئن هستید ؟')"
                                                    >حذف
                                                    </button>
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
<!-- END: Content -->

