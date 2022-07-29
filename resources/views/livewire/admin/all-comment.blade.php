<div>
    <livewire:delete-modal/>
    <!-- BEGIN: Content -->
    <div class="wrapper wrapper--top-nav">
        <div class="wrapper-box">
            <!-- BEGIN: Content -->
            <div class="content">
                <div class="intro-y flex flex-col sm:flex-row items-center mt-8">

                    <x-tables.header>
                        مدیریت نظرات
                    </x-tables.header>
                </div>
                <div class="intro-y box p-5 mt-5">
                    <div class="p-5" id="striped-rows-table">
                        <div class="preview">
                            <div class="overflow-x-auto">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">ردیف</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">نام</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">ایمیل</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">شماره سفارش</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">وضعیت نظر</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">متن نظر</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">امتیاز</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $Row = 0 @endphp
                                    @foreach ($AllComments as $AllComment)
                                        @if( $AllComment->id % 2 == 0  )
                                            <tr>
                                        @else
                                            <tr class="bg-gray-200 dark:bg-dark-1">
                                                @endif
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">{{ ++$Row }}</td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium justify-center flex flex-col">
                                                    <p>
                                                        {{ $AllComment->user->name }}
                                                    </p>
                                                    @if($AllComment->user->role == 'seller')
                                                        <span
                                                            class="py-1 px-2 rounded-full text-xs bg-cyan-400 text-white cursor-pointer font-medium">
                                                            seller</span>
                                                    @elseif($AllComment->user->role == 'user')
                                                        <span
                                                            class="py-1 px-2 rounded-full text-xs
                                                            bg-fuchsia-500 text-white cursor-pointer font-medium">
                                                            user</span>
                                                    @endif
                                                </td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium"> {{ $AllComment->user->email }}</td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">{{$AllComment->orders_id }}</td>
                                                <td class="border-b text-amber-500 dark:border-dark-5 text-lg font-medium">
                                                    @if($AllComment->status == 'suspended')
                                                        <span class="text-red-500">تایید نشده</span>
                                                    @elseif($AllComment->status == 'confirm')
                                                        <span class="text-green-500">تایید شده</span>
                                                    @elseif($AllComment->status == 'reject')
                                                        <span class="text-amber-500">ارجاع به مدیریت</span>
                                                    @endif
                                                </td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">{{$AllComment->opinion}}</td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">{{$AllComment->score}}</td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">
                                                    <x-jet-button
                                                        class="btn btn-elevated-danger w-20 ml-1 mb-2 px-2 h-8 text-indigo-900"
                                                        wire:click="$emit('DeleteModals','\\\App\\\Models\\\Comment',{{$AllComment->id}},'حذف غذا' ,'آیا از حذف غذای {{$AllComment->user->name}} مطمئن هستید ؟')"
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
<!-- END: Content -->

