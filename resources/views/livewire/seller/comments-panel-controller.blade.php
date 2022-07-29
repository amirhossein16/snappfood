<div>
    <livewire:delete-modal/>
    <livewire:seller.modals.answer-comment-modal/>
    <livewire:seller.modals.comment-referral-modal/>
    <livewire:seller.modals.comment-confirm-modal/>
    <livewire:seller.modals.show-and-edit-comment-modal/>
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
                                                    @if($Categories->status == 'suspended')
                                                        <span class="text-red-500">تایید نشده</span>
                                                    @elseif($Categories->status == 'confirm')
                                                        <span class="text-green-500">تایید شده</span>
                                                    @elseif($Categories->status == 'reject')
                                                        <span class="text-amber-500">ارجاع به مدیریت</span>
                                                    @endif</td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium tooltip cursor-pointer"
                                                    title="{{$Categories->opinion}}">{{\Illuminate\Support\Str::limit($Categories->opinion,20)}}</td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">{{$Categories->score}}</td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">
                                                    @if($Categories->status == 'suspended')
                                                        <button class="btn btn-elevated-success w-24 ml-1 mb-2 p-2"
                                                                wire:click="$emit('ConfirmModal',{{$Categories->id}})">
                                                            تایید
                                                        </button>
                                                        @if(\Illuminate\Support\Facades\DB::table('parent_child_comment')->where('parent_comment_id',$Categories->id)->first() != null)
                                                            @php
                                                                $parent = \Illuminate\Support\Facades\DB::table('parent_child_comment')->where('parent_comment_id',$Categories->id)->first()->child_comment_id
                                                            @endphp
                                                            @if(\App\Models\Comment::where([['id',$parent],['user_id',1]])->first() != null)
                                                                <button
                                                                    title="{{\App\Models\Comment::where('id',$parent)->get()->first()->opinion}}"
                                                                    class="btn btn-elevated-secondary w-24 text-sm py-3 px-2 ml-1 mb-2 tooltip">
                                                                    پاسخ مدیریت
                                                                </button>
                                                            @endif
                                                        @else
                                                            <button
                                                                class="btn btn-elevated-warning w-24 text-sm py-3 px-2 ml-1 mb-2"
                                                                wire:click="$emit('referralComment',{{$Categories->id}})">
                                                                ارجاع به مدیر
                                                            </button>
                                                        @endif
                                                        <x-jet-button
                                                            class="btn btn-elevated-danger w-32 ml-1 mb-2 px-2 h-12 text-indigo-900"
                                                            wire:click="$emit('confirmAndAnswerComment',{{$Categories->id}})"
                                                        >تایید و پاسخ
                                                        </x-jet-button>
                                                    @elseif($Categories->status == 'confirm')
                                                        <span
                                                            class="text-emerald-500"> کامنت تایید و قابل رویت گردید :)</span>
                                                        <button class="tooltip btn btn-outline-success mr-3"
                                                                title="
                                                                {{\App\Models\Comment::find(DB::table('parent_child_comment')->where('parent_comment_id', $Categories->id)->get()->first()->child_comment_id)->opinion}}
                                                                "
                                                                wire:click="$emit('ShowAndEdit',{{$Categories->id}})"
                                                        >نمایش پاسخ یا ویرایش
                                                        </button>
                                                    @elseif($Categories->status == 'reject')
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
