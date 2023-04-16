<?php

namespace App\Filament\Resources\ColorsResource\Pages;

use App\Filament\Resources\ColorsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditColors extends EditRecord
{
    protected static string $resource = ColorsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}