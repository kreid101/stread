<?php

namespace App\Filament\Resources\SizesResource\Pages;

use App\Filament\Resources\SizesResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSizes extends ListRecords
{
    protected static string $resource = SizesResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
