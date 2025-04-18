<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-battery-100'; // user heroicons website

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required()->maxLength(8),
                TextInput::make('email')->required()->email()->prefix('€'),
                TextInput::make('password')->required()->visibleOn('create'),
                // Select::make('Career')->options([
                //     'PHP' => 'PHP',
                //     'AWS' => 'AWS',
                //     'JAVA' => 'JAVA',
                // ])->required()
                // DatePicker::make('date_of_birth')->required()->label('Date')->maxDate(now())
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('name')->searchable()->sortable(),
                TextColumn::make('email')->searchable()->sortable(),
                TextColumn::make('password'),
                TextColumn::make('role'),

            ])
            ->filters([
                SelectFilter::make('email')->options([
                    'ramu@gmail.com' => 'ramu',
                    'krishnan@gmail.comdd' => 'krishnan'
                ]),
                SelectFilter::make('name')->options([
                    'ramu@gmail.com' => 'Cat',
                    'krishnan@gmail.com' => 'Dog'
                ])
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
