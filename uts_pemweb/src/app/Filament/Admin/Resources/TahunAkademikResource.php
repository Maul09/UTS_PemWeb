<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\TahunAkademikResource\Pages;
use App\Filament\Admin\Resources\TahunAkademikResource\RelationManagers;
use App\Models\TahunAkademik;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TahunAkademikResource extends Resource
{
    protected static ?string $model = TahunAkademik::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('tahun')->required()->placeholder('contoh: 2024/2025'),
                Forms\Components\Select::make('semester')
                    ->options([
                        'Ganjil' => 'Ganjil',
                        'Genap' => 'Genap',
                    ])
                    ->required(),
                Forms\Components\Textarea::make('keterangan'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('tahun'),
                Tables\Columns\TextColumn::make('semester'),
                Tables\Columns\TextColumn::make('keterangan')->limit(30),
            ])
            ->filters([
                //
            ])
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
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTahunAkademiks::route('/'),
            'create' => Pages\CreateTahunAkademik::route('/create'),
            'edit' => Pages\EditTahunAkademik::route('/{record}/edit'),
        ];
    }
}
