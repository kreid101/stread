<?php

namespace App\Filament\Resources\AboutItemResource\Pages;

use App\Filament\Resources\AboutItemResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAboutItem extends EditRecord
{
    protected static string $resource = AboutItemResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
