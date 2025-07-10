<?php
namespace App\Filament\Pages;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Pages\Dashboard as PagesDashboard;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;
use JibayMcs\FilamentTour\Tour\HasTour;
use JibayMcs\FilamentTour\Tour\Step;
use JibayMcs\FilamentTour\Tour\Tour;

class Dashboard extends PagesDashboard {
    use HasFiltersForm, HasTour;

    public function filtersForm(Form $form): Form
    {
        return $form->schema([
            Section::make('Flters')->schema([
                TextInput::make('name'),
                DatePicker::make('startDate'),
                DatePicker::make('endDate'),
                Toggle::make('active')
            ])->collapsible()->columns(3)
        ]);
    }

    // public function tours(): array {
    //     return [
    //         Tour::make('dashboard')
    //             ->steps(
        
    //                 Step::make()
    //                     ->title("Welcome to your Dashboard !"),
    //                     // ->description(view('tutorial.dashboard.introduction')),
        
    //                 Step::make('.fi-avatar')
    //                     ->title('Woaw ! Here is your avatar !')
    //                     ->description('You look nice !')
    //                     ->icon('heroicon-o-user-circle')
    //                     ->iconColor('danger')
    //             ),
    //     ];
    // }

    public function tours(): array
    {
        return [
            Tour::make('dashboard-tour')
                ->steps(
                    Step::make('.fi-sidebar-item[href$="/dashboard"]')
                        ->title('Dashboard')
                        ->description('This is your dashboard. View analytics and summary here.')
                        ->redirectOnNext(route('filament.admin.resources.users.index')), // 👉 Goes to UserResource
                )
        ];
    }

}