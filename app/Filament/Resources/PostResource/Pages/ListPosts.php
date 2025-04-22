<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use App\Filament\Widgets\PostData;
use App\Filament\Widgets\TestWidget;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListPosts extends ListRecords
{
    protected static string $resource = PostResource::class;

    protected function getHeaderWidgets(): array
    {
        return [
            PostData::class
        ];
    }
    
    protected function getFooterWidgets(): array
    {
        return [
            TestWidget::class
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'All' => Tab::make()->icon('heroicon-m-user-group'),
            'published' => Tab::make()->modifyQueryUsing(function (Builder $query) {
                $query->where('published', true);
            }),
        ];
    }
}
