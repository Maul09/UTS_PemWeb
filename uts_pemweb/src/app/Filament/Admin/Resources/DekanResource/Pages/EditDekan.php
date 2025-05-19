<?php

namespace App\Filament\Admin\Resources\DekanResource\Pages;

use App\Filament\Admin\Resources\DekanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDekan extends EditRecord
{
    protected static string $resource = DekanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
