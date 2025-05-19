<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\JurusanResource\Pages;
use App\Filament\Admin\Resources\JurusanResource\RelationManagers;
use App\Models\Jurusan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JurusanResource extends Resource
{
    protected static ?string $model = Jurusan::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static ?string $pluralModelLabel = 'Jurusan';
    protected static ?string $modelLabel = 'Jurusan';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('nama_jurusan')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('kode_jurusan')
                ->required()
                ->unique(ignoreRecord: true)
                ->maxLength(10),

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
                Tables\Columns\TextColumn::make('nama_jurusan')->searchable(),
                Tables\Columns\TextColumn::make('kode_jurusan')->searchable(),
                Tables\Columns\TextColumn::make('deskripsi')
                ->limit(50),

                Tables\Columns\TextColumn::make('created_at')->since(),
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
            'index' => Pages\ListJurusans::route('/'),
            'create' => Pages\CreateJurusan::route('/create'),
            'edit' => Pages\EditJurusan::route('/{record}/edit'),
        ];
    }
}
