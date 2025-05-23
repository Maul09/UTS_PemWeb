<?php

namespace App\Filament\Admin\Resources\TahunAkademikResource\Pages;

use App\Filament\Admin\Resources\TahunAkademikResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTahunAkademiks extends ListRecords
{
    protected static string $resource = TahunAkademikResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
