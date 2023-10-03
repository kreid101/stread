<?php

namespace App\Filament\Resources\AboutItemResource\Pages;

use App\Filament\Resources\AboutItemResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAboutItems extends ListRecords
{
    protected static string $resource = AboutItemResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
