<?php

namespace App\Http\Livewire\Admin;

use App\Models\restaurantCategories;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Asantibanez\LivewireCharts\Models\RadarChartModel;
use Asantibanez\LivewireCharts\Models\TreeMapChartModel;
use Livewire\Component;

class ReportCharts extends Component
{
    public $types = ['confirm', 'suspended', 'reject'];
    public $Orders = [1, 2, 3, 4];

    public $colors = [
        'confirm' => '#f6ad55',
        'suspended' => '#fc8181',
        'reject' => '#90cdf4',
    ];

    public $orderColors = [
        1 => '#f6ad55',
        2 => '#fc8181',
        3 => '#90cdf4',
        4 => '#52cd65',
    ];

    public $firstRun = true;

    public $showDataLabels = false;

    protected $listeners = [
        'onPointClick' => 'handleOnPointClick',
        'onSliceClick' => 'handleOnSliceClick',
        'onColumnClick' => 'handleOnColumnClick',
        'onBlockClick' => 'handleOnBlockClick',
    ];

    public function handleOnPointClick($point)
    {
        dd($point);
    }

    public function handleOnSliceClick($slice)
    {
        dd($slice);
    }

    public function handleOnColumnClick($column)
    {
        dd($column);
    }

    public function handleOnBlockClick($block)
    {
        dd($block);
    }

    public function render()
    {
        $comments = \App\Models\Comment::whereIn('status', $this->types)->get();
        $columnChartModel = $comments->groupBy('status')
            ->reduce(function ($columnChartModel, $data) {
                $type = $data->first()->status;
                $types = ['confirm' => 'تایید شده', 'suspended' => 'معلق', 'reject' => 'رد شده'];
                $value = count($data->all("$type"));

                return $columnChartModel->addColumn($types[$type], $value, $this->colors[$type]);
            }, LivewireCharts::columnChartModel()
                ->setTitle('دیدگاه ها بر اساس وضعیت')
                ->setAnimated($this->firstRun)
                ->withOnColumnClickEventName('onColumnClick')
                ->setLegendVisibility(false)
                ->setDataLabelsEnabled($this->showDataLabels)
                ->setOpacity(0.5)
                ->setColors(['#b01a1b', '#d41b2c', '#ec3c3b', '#f66665'])
                ->setColumnWidth(90)
                ->withGrid()
            );

        $pieChartModel = $comments->groupBy('status')
            ->reduce(function ($pieChartModel, $data) {
                $type = $data->first()->status;
                $types = ['confirm' => 'تایید شده', 'suspended' => 'معلق', 'reject' => 'رد شده'];
                $value = count($data->all("$type"));

                return $pieChartModel->addSlice($types[$type], $value, $this->colors[$type]);
            }, LivewireCharts::pieChartModel()
                ->setTitle('دیدکاه ها بر اساس وضعیت')
                ->setAnimated($this->firstRun)
                ->setType('donut')
                ->withOnSliceClickEvent('onSliceClick')
                //->withoutLegend()
                ->legendPositionBottom()
                ->legendHorizontallyAlignedCenter()
                ->setDataLabelsEnabled($this->showDataLabels)
                ->setColors(['#b01a1b', '#d41b2c', '#ec3c3b', '#f66665'])
            );
        $orders = \App\Models\Orders::whereIn('OrderStatus', $this->Orders)->get();
        $pieChartModelOrder = $orders->groupBy('OrderStatus')
            ->reduce(function ($pieChartModelOrder, $data) {
                $type = $data->first()->OrderStatus;
                $types = [1 => 'در حال بررسی', 2 => 'در حال آماده سازی', 3 => 'ارسال به مقصد', 4=> 'تحویل گرفته شد'];
                $value = count($data->all("$type"));

                return $pieChartModelOrder->addSlice($types[$type], $value, $this->orderColors[$type]);
            }, LivewireCharts::pieChartModel()
                ->setTitle('سفارشات بر اساس وضعیت')
                ->setAnimated($this->firstRun)
                ->setType('donut')
                ->withOnSliceClickEvent('onSliceClick')
                //->withoutLegend()
                ->legendPositionBottom()
                ->legendHorizontallyAlignedCenter()
                ->setDataLabelsEnabled($this->showDataLabels)
                ->setColors(['#b01a1b', '#d41b2c', '#ec3c3b', '#f66665'])
            );
        $columnChartModelOrder = $orders->groupBy('OrderStatus')
            ->reduce(function ($columnChartModelOrder, $data) {
                $type = $data->first()->OrderStatus;
                $types = [1 => 'در حال بررسی', 2 => 'در حال آماده سازی', 3 => 'ارسال به مقصد', 4=> 'تحویل گرفته شد'];
                $value = count($data->all("$type"));

                return $columnChartModelOrder->addColumn($types[$type], $value, $this->orderColors[$type]);
            }, LivewireCharts::columnChartModel()
                ->setTitle('سفارشات بر اساس وضعیت')
                ->setAnimated($this->firstRun)
                ->withOnColumnClickEventName('onColumnClick')
                ->setLegendVisibility(false)
                ->setDataLabelsEnabled($this->showDataLabels)
                ->setOpacity(0.5)
                ->setColors(['#b01a1b', '#d41b2c', '#ec3c3b', '#f66665'])
                ->setColumnWidth(90)
                ->withGrid()
            );
        $lineChartModel = $orders
            ->reduce(function ($lineChartModel, $data) use ($orders) {
                $index = $orders->search($data);

                $amountSum = $orders->take($index + 1)->sum('score');

                if ($index == 6) {
                    $lineChartModel->addMarker(7, $amountSum);
                }

                if ($index == 11) {
                    $lineChartModel->addMarker(12, $amountSum);
                }

                return $lineChartModel->addPoint($index, $data->OrderStatus, ['id' => $data->id]);
            }, LivewireCharts::lineChartModel()
                ->setTitle('Comments Evolution')
                ->setAnimated($this->firstRun)
                ->withOnPointClickEvent('onPointClick')
                ->setSmoothCurve()
                ->setXAxisVisible(true)
                ->setDataLabelsEnabled($this->showDataLabels)
                ->sparklined()
            );

        $this->firstRun = false;

        return view('livewire.admin.report-charts')
            ->with([
                'columnChartModel' => $columnChartModel,
                'columnChartModelOrder' => $columnChartModelOrder,
                'pieChartModel' => $pieChartModel,
                'pieChartModelOrder' => $pieChartModelOrder,
                'lineChartModel' => $lineChartModel,
            ]);
    }
}
