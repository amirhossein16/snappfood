<div>
    <div class="col-span-12 mt-8">
        <div class="intro-y flex items-center h-10">
            <h2 class="text-lg font-medium truncate ml-5">
                رستوران های مجاز اسنپ فود
            </h2>
            <a href="" class="mr-auto flex items-center text-theme-26 dark:text-theme-33"> <i data-feather="refresh-ccw"
                                                                                              class="w-4 h-4 ml-3"></i>
                به روزرسانی داده </a>
        </div>
        <div class="grid grid-cols-12 gap-6 mt-5">
            @foreach($Restaurant as $item)
                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                    <div class="report-box zoom-in">
                        <div class="box p-5">
                            <div class="flex">
                                <i data-feather="shopping-cart" class="report-box__icon text-theme-21"></i>
                                <div class="mr-auto">
                                    <div class="report-box__indicator bg-theme-10 tooltip cursor-pointer"
                                         title="تعداد فروش"> {{$item->Orders->count()}} <i data-feather="chevron-up"
                                                                                           class="w-4 h-4 mr-0.5"></i>
                                    </div>
                                </div>
                                <div class="mr-auto">
                                    @if($item->is_open)
                                        <div class="report-box__indicator bg-green-500 tooltip cursor-pointer"
                                             title="وضعیت فروشگاه">
                                            باز است
                                            <i data-feather="chevron-up"
                                               class="w-4 h-4 mr-0.5"></i></div>
                                    @else
                                        <div class="report-box__indicator bg-red-500 tooltip cursor-pointer"
                                             title="وضعیت فروشگاه">
                                            بسته است
                                            <i data-feather="chevron-up"
                                               class="w-4 h-4 mr-0.5"></i></div>
                                    @endif
                                </div>
                            </div>
                            <div class="text-xl font-bold leading-8 mt-6 text-theme-17">
                                <span class="text-sm text-gray-700">تعداد غذای موجود :</span>
                                {{$item->food->count()}}</div>
                            <div class="text-xl font-bold leading-8 mt-6 text-theme-17">
                                <span class="text-sm text-gray-700">نام رستوران :</span>
                                {{$item->name}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
