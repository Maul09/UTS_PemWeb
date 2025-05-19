<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\DekanResource\Pages;
use App\Models\Dekan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class DekanResource extends Resource
{
    protected static ?string $model = Dekan::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('foto')
                    ->label('Foto Dosen')
                    ->image()
                    ->directory('dekan-foto')
                    ->imagePreviewHeight(150)
                    ->maxSize(2048)
                    ->nullable(),

                Forms\Components\TextInput::make('nama')
                    ->required(),

                Forms\Components\TextInput::make('nip_nidn')
                    ->label('NIP/NIDN')
                    ->required(),

                Forms\Components\TextInput::make('jabatan')
                    ->required(),

                Forms\Components\Select::make('fakultas_id')
                    ->label('Fakultas')
                    ->relationship('fakultas', 'nama_fakultas')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto')
                    ->label('Foto')
                    ->circular()
                    ->height(50),

                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),

                Tables\Columns\TextColumn::make('nip_nidn'),

                Tables\Columns\TextColumn::make('jabatan'),

                Tables\Columns\TextColumn::make('fakultas.nama_fakultas')
                    ->label('Fakultas'),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDekans::route('/'),
            'create' => Pages\CreateDekan::route('/create'),
            'edit' => Pages\EditDekan::route('/{record}/edit'),
        ];
    }
}
