<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutItemResource\Pages;
use App\Filament\Resources\AboutItemResource\RelationManagers;
use App\Models\AboutItem;
use App\Models\Items;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AboutItemResource extends Resource
{
    protected static ?string $model = AboutItem::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('item_id')->options(Items::all()->pluck('item_name','id'))->required(),
                Forms\Components\RichEditor::make('about_desc'),
                Forms\Components\RichEditor::make('composition'),
                Forms\Components\TextInput::make('code'),
                Forms\Components\TextInput::make('size_table')->Datalist(['Обувь']),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListAboutItems::route('/'),
            'create' => Pages\CreateAboutItem::route('/create'),
            'edit' => Pages\EditAboutItem::route('/{record}/edit'),
        ];
    }
}
