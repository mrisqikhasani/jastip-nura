<?php

namespace App\Filament\Resources\AdminResource\Widgets;

use App\Models\Order;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class RevenuePerMonthChart extends ChartWidget
{
    protected static ?string $heading = 'Pendapatan per Bulan';

    protected function getData(): array
    {
        // Ambil pendapatan total per bulan untuk tahun ini
        $revenue = Order::selectRaw('MONTH(order_date) as month, SUM(total_price) as total')
            ->whereYear('order_date', now()->year)
            ->where('status', 'Selesai') // hanya order selesai
            ->groupByRaw('MONTH(order_date)')
            ->pluck('total', 'month');

        $labels = [];
        $data = [];

        for ($i = 1; $i <= 12; $i++) {
            $labels[] = Carbon::create()->month($i)->format('F');
            $data[] = $revenue[$i] ?? 0;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Pendapatan (Rp)',
                    'data' => $data,
                    'backgroundColor' => '#4ade80', // warna hijau
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
