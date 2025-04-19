<?php

namespace App\Filament\Resources\CategoryResource\RelationManagers;

use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;

class PostsRelationManager extends RelationManager
{
    protected static string $relationship = 'posts';

    public function form(Form $form): Form
    {
        return $form
        ->schema([
            Section::make('Create')
            ->description('We Can Create New Post')
            // ->aside()
            ->collapsible()
            ->schema([
                TextInput::make('title')->rules(['min:3','max:15'])->required(),
                TextInput::make('slug')->required()->different('title'),
                ColorPicker::make('color')->required(),
                TagsInput::make('tags')
                        ->color('success')->required()
                        ->reorderable()
                        ->tagSuffix('&')
                        ->splitKeys(['Tab', ' ']),
            ])->columnSpan(2)->columns(2),

            Group::make()->schema([
                Section::make('File Upload')
                ->description('We Can Upload Post Image')
                ->collapsible()
                ->schema([
                    MarkdownEditor::make('content')->required()->columnSpan(3),
                ])->columnSpan(1),
                Section::make('Meta')->collapsible()
                ->schema([
                    FileUpload::make('thumbnail')->required()->disk('public')
                            ->directory('thumbnail'),
                    Checkbox::make('published')->required(),
                ])
            ])
        ])->columns(3);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('slug'),
                Tables\Columns\CheckboxColumn::make('published'),
                Tables\Columns\ImageColumn::make('thumbnail'),

            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            // ->emptyStateActions([
            //     Tables\Actions\CreateAction::make()->label('New Post')->color('grey')
            // ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ExportBulkAction::make()
                ]),
            ]);
    }
}
