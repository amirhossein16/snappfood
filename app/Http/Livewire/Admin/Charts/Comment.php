<?php

namespace App\Http\Livewire\Admin\Charts;

use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Asantibanez\LivewireCharts\Models\RadarChartModel;
use Asantibanez\LivewireCharts\Models\TreeMapChartModel;
use Livewire\Component;

class Comment extends Component
{
    public $types = ['confirm', 'suspended', 'reject'];

    public $colors = [
        'confirm' => '#f6ad55',
        'suspended' => '#fc8181',
        'reject' => '#90cdf4',
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
                $value = $data->sum('score');

                return $columnChartModel->addColumn($types[$type], $value, $this->colors[$type]);
            }, LivewireCharts::columnChartModel()
                ->setTitle('دیدگاه ها بر اساس وضعیت')
                ->setAnimated($this->firstRun)
                ->withOnColumnClickEventName('onColumnClick')
                ->setLegendVisibility(false)
                ->setDataLabelsEnabled($this->showDataLabels)
                //->setOpacity(0.25)
                ->setColors(['#b01a1b', '#d41b2c', '#ec3c3b', '#f66665'])
                ->setColumnWidth(90)
                ->withGrid()
            );

        $pieChartModel = $comments->groupBy('status')
            ->reduce(function ($pieChartModel, $data) {
                $type = $data->first()->status;
                $types = ['confirm' => 'تایید شده', 'suspended' => 'معلق', 'reject' => 'رد شده'];
                $value = $data->sum('score');

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

        $lineChartModel = $comments
            ->reduce(function ($lineChartModel, $data) use ($comments) {
                $index = $comments->search($data);

                $amountSum = $comments->take($index + 1)->sum('score');

                if ($index == 6) {
                    $lineChartModel->addMarker(7, $amountSum);
                }

                if ($index == 11) {
                    $lineChartModel->addMarker(12, $amountSum);
                }

                return $lineChartModel->addPoint($index, $data->score, ['id' => $data->id]);
            }, LivewireCharts::lineChartModel()
                ->setTitle('Comments Evolution')
                ->setAnimated($this->firstRun)
                ->withOnPointClickEvent('onPointClick')
                ->setSmoothCurve()
                ->setXAxisVisible(true)
                ->setDataLabelsEnabled($this->showDataLabels)
                ->sparklined()
            );

        $areaChartModel = $comments
            ->reduce(function ($areaChartModel, $data) use ($comments) {
                $index = $comments->search($data);
                return $areaChartModel->addPoint($index, $data->score, ['id' => $data->id]);
            }, LivewireCharts::areaChartModel()
                ->setTitle('Comments Peaks')
                ->setAnimated($this->firstRun)
                ->setColor('#f6ad55')
                ->withOnPointClickEvent('onAreaPointClick')
                ->setDataLabelsEnabled($this->showDataLabels)
                ->setXAxisVisible(true)
                ->sparklined()
            );

        $multiLineChartModel = $comments
            ->reduce(function ($multiLineChartModel, $data) use ($comments) {
                $index = $comments->search($data);

                return $multiLineChartModel
                    ->addSeriesPoint($data->type, $index, $data->score, ['id' => $data->id]);
            }, LivewireCharts::multiLineChartModel()
                ->setTitle('Comments by Type')
                ->setAnimated($this->firstRun)
                ->withOnPointClickEvent('onPointClick')
                ->setSmoothCurve()
                ->multiLine()
                ->setDataLabelsEnabled($this->showDataLabels)
                ->sparklined()
                ->setColors(['#b01a1b', '#d41b2c', '#ec3c3b', '#f66665'])
            );

        $multiColumnChartModel = $comments->groupBy('status')
            ->reduce(function ($multiColumnChartModel, $data) {
                $type = $data->first()->status;
                $types = ['confirm' => 'تایید شده', 'suspended' => 'معلق', 'reject' => 'رد شده'];

                return $multiColumnChartModel
                    ->addSeriesColumn($types[$type], 1, $data->sum('score'));
            }, LivewireCharts::multiColumnChartModel()
                ->setAnimated($this->firstRun)
                ->setDataLabelsEnabled($this->showDataLabels)
                ->withOnColumnClickEventName('onColumnClick')
                ->setTitle('Revenue per Year (K)')
                ->stacked()
                ->withGrid()
            );

        $radarChartModel = $comments
            ->reduce(function (RadarChartModel $radarChartModel, $data) use ($comments) {
                return $radarChartModel->addSeries($data->first()->type, $data->description, $data->score);
            }, LivewireCharts::radarChartModel()
                ->setAnimated($this->firstRun)
            );

        $treeChartModel = $comments->groupBy('status')
            ->reduce(function (TreeMapChartModel $chartModel, $data) {
                $type = $data->first()->status;
                $types = ['confirm' => 'تایید شده', 'suspended' => 'معلق', 'reject' => 'رد شده'];
                $value = $data->sum('score');

                return $chartModel->addBlock($types[$type], $value)->addColor($this->colors[$type]);
            }, LivewireCharts::treeMapChartModel()
                ->setTitle('Comments Weight')
                ->setAnimated($this->firstRun)
                ->setDistributed(true)
                ->withOnBlockClickEvent('onBlockClick')
            );

        $this->firstRun = false;

        return view('livewire.admin.charts.comment')
            ->with([
                'columnChartModel' => $columnChartModel,
                'pieChartModel' => $pieChartModel,
                'lineChartModel' => $lineChartModel,
                'areaChartModel' => $areaChartModel,
                'multiLineChartModel' => $multiLineChartModel,
                'multiColumnChartModel' => $multiColumnChartModel,
                'radarChartModel' => $radarChartModel,
                'treeChartModel' => $treeChartModel,
            ]);
    }
}
