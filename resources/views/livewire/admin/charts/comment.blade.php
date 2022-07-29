<div>
    <h4 class="text-lg text-indigo-900 font-bold">فیلتر بر اساس : </h4>
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
