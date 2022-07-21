<div>
    <livewire:admin.modals.banner-modal/>
    <!-- BEGIN: Content -->
    <div class="wrapper wrapper--top-nav">
        <div class="wrapper-box">
            <!-- BEGIN: Content -->
            <div class="content">
                <div class="intro-y flex flex-col sm:flex-row items-center mt-8">

                    <x-tables.header>
                        تنظیمات کدتخفیف
                    </x-tables.header>
                    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                        <button wire:click="$emit('confirmDiscountAdd')" class="btn btn-primary shadow-md ml-2">افزودن
                            کد تخفیف جدید
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
                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">ردیف</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">تصویر بنر</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $Row = 0;
                                    @endphp
                                    @foreach($image as $pic)
                                        {{--                                        @if( $pic  )--}}
                                        {{--                                            <tr>--}}
                                        {{--                                        @else--}}
                                        <tr class="bg-gray-200 dark:bg-dark-1 h-64">
                                            {{--                                                @endif--}}
                                            <td class="border-b dark:border-dark-5 text-lg font-medium">{{ ++$Row }}</td>
                                            <td class="w-2/3">
                                                <div class="flex">
                                                    @if(Storage::disk('public')->exists("$pic"))
                                                        <div class="w-full h-56 image-fit zoom-in">
                                                            <img alt="Icewall Tailwind HTML Admin Template"
                                                                 class="tooltip rounded"
                                                                 src="{{asset("storage/$pic")}}"
                                                                 title="آپلود شده در19 آذر 1400"/>
                                                        </div>
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="border-b dark:border-dark-5 text-lg font-medium">
                                                @php
                                                    preg_match("#[^/]+$#",$pic,$match);
                                                @endphp
                                                <button class="btn text-sm btn-elevated-primary w-20 ml-1 mb-2"
                                                        wire:click="$emit('EditModalConfirm',{{$match[0]}})">
                                                    ویرایش
                                                </button>
                                                <x-jet-button
                                                    class="btn btn-elevated-secondary w-16 ml-1 mb-2 text-indigo-900"
                                                    wire:click="$emit('DeleteModal',{{$match[0]}})"
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
