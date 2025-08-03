<?php

namespace App\Filament\Resources\AdminResource\Widgets;

use App\Models\Order;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget\Card;


class orderPerMonthCharts extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Card::make('Total order', Order::count())
            ->description('Semua jumlah order')
        ];
    }
}
