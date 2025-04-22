<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class PostData extends ChartWidget
{

    protected static ?string $heading = 'Article Posts';
    protected int | string | array $columnSpan = 1;

    protected function getData(): array
    {

        $data = Trend::model(Post::class)->between(
            start: now()->subMonths(6),
            end: now(),
        )->perMonth()->count();

        return [
            'datasets' => [
                [
                    'label' => 'Article Posts Created',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                    'backgroundColor' => [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'yellow'
                    ],
                    'hoverOffset' => 10
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
