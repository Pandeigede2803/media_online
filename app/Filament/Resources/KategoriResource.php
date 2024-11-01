<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KategoriResource\Pages;
use App\Filament\Resources\KategoriResource\RelationManagers;
use App\Models\Kategori;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;


class KategoriResource extends Resource
{
    protected static ?string $model = Kategori::class;
    protected static ?string $pluralLabel = 'Kategori';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_kategori')
                    ->label('Nama Kategori')
                    ->required()
                    ->maxLength(255),  // Field for category name

                TextInput::make('slug')
                    ->label('Slug')
                    ->unique(ignoreRecord: true)
                    ->required()
                    ->maxLength(255),

                FileUpload::make('image')
                    ->label('Gambar Berita')
                    ->image()
                    ->directory('uploads/gambar')
                    ->visibility('public')
                    ->maxSize(1024)
                    ->nullable()
                    ->preserveFilenames()
                    ->imageEditor()
                    ->imageEditorAspectRatios(['16:9', '4:3', '1:1'])
                    ->acceptedFileTypes(['image/jpeg', 'image/png'])
                    ->downloadable()
                    ->deletable(true)
                    ->moveFiles(), // Unique slug field for SEO-friendly URLs
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_kategori')
                    ->label('Nama Kategori')
                    ->sortable()
                    ->searchable(),  // Column for category name with sortable and searchable options

                TextColumn::make('slug')
                    ->label('Slug')
                    ->sortable()
                    ->searchable(),  // Column for slug with sortable and searchable options

                ImageColumn::make('image')
                    ->label('Gambar')
                    ->disk('public') // Set the disk to 'public'

                    ->sortable(), // Column for image with sortable option

                TextColumn::make('created_at')
                    ->label('Tanggal Dibuat')
                    ->dateTime()
                    ->sortable(),  // Column for creation date with sortable option
            ])
            ->filters([
                // Define any custom filters here if needed
            ])
            ->actions([
                // Edit action to allow editing of individual records
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Bulk actions group including the Delete action for multiple records
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
            'index' => Pages\ListKategoris::route('/'),
            'create' => Pages\CreateKategori::route('/create'),
            'edit' => Pages\EditKategori::route('/{record}/edit'),
        ];
    }
}
