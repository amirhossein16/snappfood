<div>
    <livewire:admin.modals.restore-comment/>
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
                                    @foreach ($comments as $comment)
                                        @if( $comment->id % 2 == 0  )
                                            <tr>
                                        @else
                                            <tr class="bg-gray-200 dark:bg-dark-1">
                                                @endif
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">{{ ++$Row }}</td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">{{ $comment->user->name }}</td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium"> {{ $comment->user->email }}</td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">{{$comment->orders_id }}</td>
                                                <td class="border-b text-red-500 dark:border-dark-5 text-lg font-medium">
                                                    حذف شده
                                                </td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">{{$comment->opinion}}</td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">{{$comment->score}}</td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">
                                                    <button class="btn btn-elevated-success w-32 ml-1 mb-2 p-1"
                                                            wire:click="$emit('RestoreComment',{{$comment->id}},'باز گردانی نظر' ,'{{$comment->opinion}}')"
                                                    > بازگردانی نظر
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

