<div>
    <!-- BEGIN: Content -->
    <div class="wrapper wrapper--top-nav">
        <div class="wrapper-box">
            <!-- BEGIN: Content -->
            <div class="content">
                <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                    <x-tables.header>
                        مدیریت گزارشات
                    </x-tables.header>
                </div>
                <div class="intro-y box p-5 mt-5">
                    <div>
                        <h3 class="text-xl text-red-500 font-bold">دیدگاه ها</h3>
                        <h4 class="text-lg text-indigo-900 font-medium">فیلتر بر اساس : </h4>
                        <div class="space-y-4 sticky top-0 bg-white p-4 shadow z-50 flex flex-row justify-between">
                            <ul class="flex flex-col gap-6 sm:flex-row sm:space-x-8 sm:items-center">
                                <li>
                                    <input type="checkbox" value="confirm" wire:model="types"/>
                                    <span>تایید شده</span>
                                </li>
                                <li>
                                    <input type="checkbox" value="suspended" wire:model="types"/>
                                    <span>معلق</span>
                                </li>
                                <li>
                                    <input type="checkbox" value="reject" wire:model="types"/>
                                    <span>حذف شده</span>
                                </li>
                            </ul>

                            <div>
                                <input type="checkbox" value="other" wire:model="showDataLabels"/>
                                <span>نمایش اطلاعات جدول</span>
                            </div>
                        </div>

                        <div class="container mx-auto space-y-4 p-4 sm:p-0 mt-8">
                            <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                                <div class="shadow rounded p-4 border bg-white flex-1" style="height: 32rem;">
                                    <livewire:livewire-column-chart
                                        key="{{ $columnChartModel->reactiveKey() }}"
                                        :column-chart-model="$columnChartModel"
                                    />
                                </div>

                                <div class="shadow rounded p-4 border bg-white flex-1" style="height: 32rem;">
                                    <livewire:livewire-pie-chart
                                        key="{{ $pieChartModel->reactiveKey() }}"
                                        :pie-chart-model="$pieChartModel"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-xl text-red-500 font-bold">سفارشات</h3>
                        <h4 class="text-lg text-indigo-900 font-medium">فیلتر بر اساس : </h4>
                        <div class="space-y-4 sticky top-0 bg-white p-4 shadow z-50 flex flex-row justify-between">
                            <ul class="flex flex-col gap-6 sm:flex-row sm:space-x-8 sm:items-center">
                                <li>
                                    <input type="checkbox" value="1" wire:model="Orders"/><span>در حال بررسی</span>
                                </li><li>
                                    <input type="checkbox" value="2" wire:model="Orders"/><span>در حال آماده سازی</span>
                                </li><li>
                                    <input type="checkbox" value="3" wire:model="Orders"/><span>ارسال به مقصد</span>
                                </li><li>
                                    <input type="checkbox" value="4" wire:model="Orders"/><span>تحویل گرفته شد</span>
                                </li>
                            </ul>

                            <div>
                                <input type="checkbox" value="other" wire:model="showDataLabels"/>
                                <span>نمایش اطلاعات جدول</span>
                            </div>
                        </div>

                        <div class="container mx-auto space-y-4 p-4 sm:p-0 mt-8">
                            <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                                <div class="shadow rounded p-4 border bg-white flex-1" style="height: 32rem;">
                                    <livewire:livewire-pie-chart
                                        key="{{ $pieChartModelOrder->reactiveKey() }}"
                                        :pie-chart-model="$pieChartModelOrder"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Content -->

