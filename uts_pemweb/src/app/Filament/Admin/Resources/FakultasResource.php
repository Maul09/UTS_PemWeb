<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\FakultasResource\Pages;
use App\Filament\Admin\Resources\FakultasResource\RelationManagers;
use App\Models\Fakultas;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FakultasResource extends Resource
{
    protected static ?string $model = Fakultas::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_fakultas')
                    ->label('Nama Fakultas')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('kode_fakultas')
                    ->label('Kode Fakultas')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(10),

                Forms\Components\TextInput::make('jurusan')
                    ->label('Jurusan')
                    ->nullable()
                    ->maxLength(255),

                Forms\Components\TextInput::make('tahun_berdiri')
                    ->label('Tahun Berdiri')
                    ->numeric()
                    ->minValue(1900)
                    ->maxValue(date('Y'))
                    ->required(),

                Forms\Components\TextInput::make('dekan')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Textarea::make('deskripsi')
                    ->nullable()
                    ->maxLength(1000),               
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('nama_fakultas')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('jurusan')
                    ->label('Jurusan')
                    ->limit(30),  

                Tables\Columns\TextColumn::make('dekan')
                    ->limit(20),

                Tables\Columns\TextColumn::make('kode_fakultas')
                    ->searchable(),

                Tables\Columns\TextColumn::make('tahun_berdiri')
                    ->label('Tahun'),

                Tables\Columns\TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->limit(40)
                    ->tooltip(fn ($record) => $record->deskripsi),                

                Tables\Columns\TextColumn::make('created_at')
                    ->since()
                    ->label('Dibuat'),
            ])
            ->filters([
                //
                Tables\Filters\Filter::make('tahun_berdiri')
                    ->form([
                        Forms\Components\TextInput::make('tahun'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when($data['tahun'], fn ($q, $tahun) => $q->where('tahun_berdiri', $tahun));
                    }),
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
            'index' => Pages\ListFakultas::route('/'),
            'create' => Pages\CreateFakultas::route('/create'),
            'edit' => Pages\EditFakultas::route('/{record}/edit'),
        ];
    }
}
