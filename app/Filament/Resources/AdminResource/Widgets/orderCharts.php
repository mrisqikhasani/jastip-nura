<?php

namespace App\Filament\Resources\AdminResource\Widgets;

use App\Models\Order;
use DB;
use Filament\Widgets\ChartWidget;

class orderCharts extends ChartWidget
{
    // protected static ?string $heading = 'Chart';
    protected static ?string $heading = 'Pesanan per Bulan';
    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $orders = Order::select(
                DB::raw("DATE_FORMAT(created_at, '%Y-%m') as month"),
                DB::raw("count(*) as total")
            )
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Pesanan',
                    'data' => $orders->pluck('total'),
                    'backgroundColor' => '#555879', // indigo-500
                ],
            ],
            'labels' => $orders->pluck('month'),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
