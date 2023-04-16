<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ColorsResource\Pages;
use App\Filament\Resources\ColorsResource\RelationManagers;
use App\Models\Colors;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ColorsResource extends Resource
{
    protected static ?string $model = Colors::class;

    protected static ?string $navigationIcon = 'heroicon-o-archive';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('color'),
                Forms\Components\ColorPicker::make('hex')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('color'),
                Tables\Columns\ColorColumn::make('hex')

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
            'index' => Pages\ListColors::route('/'),
            'create' => Pages\CreateColors::route('/create'),
            'edit' => Pages\EditColors::route('/{record}/edit'),
        ];
    }
}
