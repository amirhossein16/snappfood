<div>
    <livewire:delete-modal/>
    <livewire:admin.modals.banner-modal/>
    <!-- BEGIN: Content -->
    <div class="wrapper wrapper--top-nav">
        <div class="wrapper-box">
            <!-- BEGIN: Content -->
            <div class="content">
                <div class="intro-y flex flex-col sm:flex-row items-center mt-8">

                    <x-tables.header>
                        تنظیمات بنر
                    </x-tables.header>
                    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                        <button wire:click="$emit('confirmBannerAdd')" class="btn btn-primary shadow-md ml-2">افزودن
                            بنر جدید
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
                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">نام بنر</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">تصویر بنر</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $Row = 0;
                                    @endphp
                                    @foreach($image as $pic)
                                        <tr class="bg-gray-200 dark:bg-dark-1 h-64">
                                            <td class="border-b dark:border-dark-5 text-lg font-medium">{{ ++$Row }}</td>
                                            <td class="report-box__indicator tooltip cursor-pointer border-b dark:border-dark-5 text-lg font-medium"
                                                title="{{$pic->name}}">
                                                {{ Str::limit($pic->name, 30) }}
                                            </td>
                                            <td class="w-2/3">
                                                <div class="flex">
                                                    @if(Storage::disk('public')->exists("$pic->path"))
                                                        <div class="w-full h-56 image-fit zoom-in">
                                                            <img alt="Icewall Tailwind HTML Admin Template"
                                                                 class="tooltip rounded"
                                                                 src="{{asset("storage/$pic->path")}}"
                                                                 title="بارگزاری شده در تاریخ : {{$pic->created_at}}"/>
                                                        </div>
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="border-b dark:border-dark-5 text-lg font-medium">
                                                <x-jet-button
                                                    class="btn btn-elevated-danger w-16 ml-1 mb-2 text-indigo-900"
                                                    wire:click="$emit('DeleteModals','\\\App\\\Models\\\Banner',{{$pic->id}},'حذف بنر' ,'آیا از حذف بنر {{$pic->name}} مطمئن هستید ؟')"
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
