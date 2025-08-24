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

        Carbon::setLocale('id');
        // Ambil pendapatan total per bulan untuk tahun ini
        $revenue = Order::selectRaw('MONTH(tanggal_pemesanan) as month, SUM(total_harga) as total')
            ->whereYear('tanggal_pemesanan', now()->year)
            ->where('status', 'Selesai') // hanya order selesai
            ->groupByRaw('MONTH(tanggal_pemesanan)')
            ->pluck('total', 'month');

        $labels = [];
        $data = [];

        for ($i = 1; $i <= 12; $i++) {
            $labels[] = Carbon::create()->month($i)->translatedFormat('F');
            $data[] = $revenue[$i] ?? 0;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Pendapatan (Rp)',
                    'data' => $data,
                    'backgroundColor' => '#555879', // warna hijau
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
