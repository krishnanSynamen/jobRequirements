<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Exports\UserExporter;
use App\Filament\Imports\UserImporter;
use App\Filament\Resources\UserResource;
use App\Imports\UserImport;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Actions\ExportAction;
use Filament\Actions\ImportAction;
use Filament\Forms\Components\FileUpload;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Maatwebsite\Excel\Facades\Excel;

class ListUsers extends ListRecords
{
    
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            ExportAction::make()->exporter(UserExporter::class),
            // ImportAction::make()->importer(UserImporter::class)
            Action::make('Import Users')
            ->icon('heroicon-o-arrow-down-tray')
            ->color('warning')
            ->action(function(array $data) {
                Excel::import(new UserImport, storage_path('app/public/') . $data['file_upload']);
                Notification::make()
                ->title('Imported successfully')
                ->success()
                ->send();
            })
            ->form([
                FileUpload::make('file_upload')
                ->required()
            ])
        ];
    }
}
