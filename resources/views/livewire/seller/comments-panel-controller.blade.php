<div>
    <livewire:delete-modal/>
    <livewire:edit-modal/>
    <livewire:add-modal/>
    <livewire:seller.modals.answer-comment-modal/>
    <livewire:seller.modals.comment-referral-modal/>
    <livewire:seller.modals.comment-confirm-modal/>
    <!-- BEGIN: Content -->
    <div class="wrapper wrapper--top-nav">
        <div class="wrapper-box">
            <!-- BEGIN: Content -->
            <div class="content">
                <div class="intro-y flex flex-col sm:flex-row items-center mt-8">

                    <x-tables.header>
                        لیست نظرات
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
                                    @foreach ($Category as $Categories)
                                        @if( $Categories->id % 2 == 0  )
                                            <tr>
                                        @else
                                            <tr class="bg-gray-200 dark:bg-dark-1">
                                                @endif
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">{{ ++$Row }}</td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">{{ $Categories->user->name }}</td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium"> {{ $Categories->user->email }}</td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">{{$Categories->orders_id }}</td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">
                                                    @if($Categories->confirm == 0)
                                                        <span class="text-red-500">تایید نشده</span>
                                                    @elseif($Categories->confirm == 1)
                                                        <span class="text-green-500">تایید شده</span>
                                                    @elseif($Categories->confirm == 2)
                                                        <span class="text-amber-500">ارجاع به مدیریت</span>
                                                    @endif</td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">{{$Categories->opinion}}</td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">{{$Categories->score}}</td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">
                                                    @if($Categories->confirm == 0)
                                                        <button class="btn btn-elevated-success w-24 ml-1 mb-2 p-2"
                                                                wire:click="$emit('ConfirmModal',{{$Categories->id}})">
                                                            تایید
                                                        </button>
                                                        <button
                                                            class="btn btn-elevated-warning w-24 text-sm py-3 px-2 ml-1 mb-2"
                                                            wire:click="$emit('referralComment',{{$Categories->id}})">
                                                            ارجاع به مدیر
                                                        </button>
                                                        <x-jet-button
                                                            class="btn btn-elevated-danger w-32 ml-1 mb-2 px-2 h-12 text-indigo-900"
                                                            wire:click="$emit('confirmAndAnswerComment',{{$Categories->id}})"
                                                        >تایید و پاسخ
                                                        </x-jet-button>
                                                    @elseif($Categories->confirm == 1)
                                                        <span class="text-emerald-500"> کامنت تایید و قابل روئیت گردید :)</span>
                                                    @elseif($Categories->confirm == 2)
                                                        <span
                                                            class="text-amber-600"> کامنت مدیریت ارجاع داده شد :)</span>
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
