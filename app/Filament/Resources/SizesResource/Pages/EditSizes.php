<?php

namespace App\Filament\Resources\SizesResource\Pages;

use App\Filament\Resources\SizesResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSizes extends EditRecord
{
    protected static string $resource = SizesResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
