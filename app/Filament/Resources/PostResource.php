<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Category;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = 'Post Category';
    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Create')
                    ->description('We Can Create New Post')
                    ->collapsible()
                    ->schema([
                        TextInput::make('title')->required(),
                        TextInput::make('slug')->required(),
                        Select::make('category_id')->label('Category')->searchable()
                                ->required()->options(Category::all()->pluck('name', 'id')),
                        ColorPicker::make('color')->required(),
                        TagsInput::make('tags')
                                ->color('success')->required()
                                ->reorderable()
                                ->tagSuffix('&')
                                ->splitKeys(['Tab', ' ']),
                        Checkbox::make('published')->required(),
                    ])->columns(2),
                Section::make('File Upload')
                ->description('We Can Upload Post Image')
                ->collapsible()
                    ->schema([
                        MarkdownEditor::make('content')->required()->columnSpan(3),
                        FileUpload::make('thumbnail')->required()->disk('public')
                                ->directory('thumbnail'),
                    ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('thumbnail'),
                TextColumn::make('title'),
                TextColumn::make('slug'),
                TextColumn::make('getCategory.name')->label('Category'),
                ColorColumn::make('color'),
                TextColumn::make('tags'),
                CheckboxColumn::make('published'),
                TextColumn::make('content'),
            ])
            ->filters([
                //
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
