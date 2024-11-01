<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BeritaResource\Pages;
use App\Filament\Resources\BeritaResource\RelationManagers;
use App\Models\Berita;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

use Filament\Resources\Resource;
use Filament\Forms\Components\RichEditor;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Placeholder;

class BeritaResource extends Resource
{
    protected static ?string $model = Berita::class;
    // title pada side bar
    protected static ?string $navigationLabel = 'Berita'; // Set the sidebar label
    // title pada tabel
    protected static ?string $pluralLabel = 'Berita';

    // logo pada side bar
    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    public static function form(Form $form): Form
    {

        // write the form in filament
        return $form
            ->schema([
                TextInput::make('judul_berita')
                    ->label('Judul Berita')
                    ->required()
                    ->maxLength(255),



                // tambahkan relasi disini
                Select::make('kategori_berita')
                    ->label('Kategori')
                    ->relationship('kategori', 'nama_kategori')
                    ->required(),
                FileUpload::make('gambar')
                    ->label('Gambar')
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
                    ->moveFiles(),

                Placeholder::make('help_text')
                    ->content('Upload an image up to 1 MB in size. Only JPEG or PNG formats are allowed.')
                    ->columnSpan('full'), // This will make the help text span the entire width of the form

                TextInput::make('jumlah_views')
                    ->label('Jumlah Views')
                    ->numeric()
                    ->default(0),

                TextInput::make('author')
                    ->label('Author')
                    ->required()
                    ->maxLength(255),

                Select::make('is_headline')
                    ->label('Headline')
                    ->options([
                        'yes' => 'Yes',
                        'no' => 'No',
                    ])
                    ->default('no'),

                Select::make('is_berita_pilihan')
                    ->label('Berita Pilihan')
                    ->options([
                        'yes' => 'Yes',
                        'no' => 'No',
                    ])
                    ->default('no'),

                TextInput::make('slug')
                    ->label('Slug')
                    ->unique(ignoreRecord: true)
                    ->required()
                    ->maxLength(255),
                RichEditor::make('konten_berita')
                    ->label('Konten Berita')
                    ->required()
                    ->toolbarButtons([
                        'bold',
                        'italic',
                        'underline',
                        'strike',
                        'link',
                        'orderedList',
                        'unorderedList',
                        'h2',
                        'h3',
                        'blockquote',
                        'codeBlock',
                    ]), // Specify the toolbar buttons you want


                //
            ]);
    }

    public static function table(Table $table): Table
    {
        // tabel untuk menampilkan data hasil form
        return $table
            ->columns([
                //
                TextColumn::make('judul_berita')
                    ->label('Judul Berita')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('kategori.nama_kategori')
                    ->label('Kategori')
                    ->sortable()
                    ->searchable(),

                ImageColumn::make('gambar')
                    ->label('Gambar')
                    ->disk('public') // Set the disk to 'public'

                ,


                TextColumn::make('jumlah_views')
                    ->label('Jumlah Views')
                    ->sortable(),

                TextColumn::make('author')
                    ->label('Author')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('is_headline')
                    ->label('Headline')
                    ->sortable(),

                TextColumn::make('is_berita_pilihan')
                    ->label('Berita Pilihan')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Tanggal Dibuat')
                    ->dateTime()
                    ->sortable(),
            ])

            // membuat filter untuk tabel
            ->filters([
                // filter berdasarkan kategori berita
                Tables\Filters\SelectFilter::make('kategori_berita'),
                Tables\Filters\Filter::make('is_headline')
                    ->label('Headline')
                    ->query(fn(Builder $query) => $query->where('is_headline', 'yes')),
                Tables\Filters\Filter::make('is_berita_pilihan')
                    ->label('Berita Pilihan')
                    ->query(fn(Builder $query) => $query->where('is_berita_pilihan', 'yes')),

                //
            ])
            ->actions([
                // This section defines actions available for each individual row in the table.
                // The `EditAction` allows the user to click an "Edit" button on each row
                // to edit the specific `berita` record directly from the table view.
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // This section defines actions that can be applied to multiple records at once.
                // The `DeleteBulkAction` allows the user to select multiple records and delete them
                // in a single action, making it more efficient for managing large numbers of entries.
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListBeritas::route('/'),
            'create' => Pages\CreateBerita::route('/create'),
            'edit' => Pages\EditBerita::route('/{record}/edit'),
        ];
    }
}
