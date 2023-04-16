<?php

namespace App\Filament\Resources\ColorsResource\Pages;

use App\Filament\Resources\ColorsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListColors extends ListRecords
{
    protected static string $resource = ColorsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}