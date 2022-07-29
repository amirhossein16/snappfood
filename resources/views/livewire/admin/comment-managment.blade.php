<div>
    <livewire:delete-modal/>
    <livewire:admin.modals.referral-manage-modal/>
    <livewire:admin.modals.food-party-add-modal/>
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
                                    @foreach ($rejectComments as $rejectComment)
                                        @if( $rejectComment->id % 2 == 0  )
                                            <tr>
                                        @else
                                            <tr class="bg-gray-200 dark:bg-dark-1">
                                                @endif
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">{{ ++$Row }}</td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">{{ $rejectComment->user->name }}</td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium"> {{ $rejectComment->user->email }}</td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">{{$rejectComment->orders_id }}</td>
                                                <td class="border-b text-amber-500 dark:border-dark-5 text-lg font-medium">
                                                    ارجاع به مدیریت
                                                </td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">{{$rejectComment->opinion}}</td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">{{$rejectComment->score}}</td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">
                                                    @if($rejectComment->status == 'reject')
                                                        <button class="btn btn-elevated-success w-32 ml-1 mb-2 p-1"
                                                                wire:click="$emit('AnswerManageModal',{{$rejectComment->id}})">
                                                            بازگشت و پاسخ
                                                        </button>
                                                        <x-jet-button
                                                            class="btn btn-elevated-danger w-20 ml-1 mb-2 px-2 h-8 text-indigo-900"
                                                            wire:click="$emit('DeleteModals','\\\App\\\Models\\\Comment',{{$rejectComment->id}},'حذف غذا' ,'آیا از حذف غذای {{$rejectComment->user->name}} مطمئن هستید ؟')"
                                                        >حذف
                                                        </x-jet-button>
                                                    @elseif($rejectComment->status == 'donfirm')
                                                        <span
                                                            class="text-emerald-500"> کامنت تایید و قابل روئیت گردید :)</span>
                                                    @endif
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

