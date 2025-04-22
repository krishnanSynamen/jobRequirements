<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class TestWidget extends BaseWidget
{
    use InteractsWithPageFilters;

    protected function getStats(): array
    {

        $data = Trend::model(User::class)->between(
            start:now()->subMonths(6),
            end: now(),
        )->perMonth()->count();
        $chartData =$data->map(fn (TrendValue $value) => $value->aggregate)->toArray();

        return [
            Stat::make('old User', User::where('created_at', null)->count())->descriptionIcon('heroicon-m-users', IconPosition::Before)
            ->description('old User you have')->chart($chartData)->color('danger'),
            Stat::make('New User', User::where('created_at', '!=', null)->count()),
            Stat::make('All User', User::count())
        ];
    }
}
