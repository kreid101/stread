<?php

namespace App\Filament\Resources\ProductResource\RelationManagers;

use App\Models\item_sizes;
use App\Models\Sizes;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SizesRelationManager extends RelationManager
{
    protected static string $relationship = 'sizes';

    protected static ?string $recordTitleAttribute = 'size';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\AttachAction::make()->form([ Forms\Components\Select::make('recordId')->options(Sizes::all()->pluck('size','id')),Forms\Components\TextInput::make('quntity')->label('количество')])->preloadRecordSelect()
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),

            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
