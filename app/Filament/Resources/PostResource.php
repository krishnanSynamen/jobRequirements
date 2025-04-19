<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Filament\Resources\PostResource\RelationManagers\CategoryRelationManager;
use App\Models\Category;
use App\Models\Post;
use Filament\Actions\DeleteAction;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
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
                // ->aside()
                ->collapsible()
                ->schema([
                    TextInput::make('title')->rules(['min:3','max:15'])->required(),
                    TextInput::make('slug')->required()->different('title'),
                    Select::make('category_id')->label('Category')
                            ->relationship('category', 'name')
                            // ->searchable()
                            ->required(),
                            // ->options(Category::all()->pluck('name', 'id')),
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

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('thumbnail')->toggleable(),
                TextColumn::make('title')->searchable()->sortable()->toggleable(),
                TextColumn::make('slug')->sortable()->toggleable(),
                TextColumn::make('category.name')->label('Category')->sortable()->toggleable(),
                ColorColumn::make('color')->toggleable(),
                TextColumn::make('tags')->toggleable(),
                CheckboxColumn::make('published')->toggleable(),
                TextColumn::make('content')->toggleable(),
                TextColumn::make('created_at')->date()->label('Posted On')->toggleable()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\CreateAction::make()->label('Create')->color('grey')
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ])
            ]);
    }

    public static function getRelations(): array
    {
        return [
            CategoryRelationManager::class
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
