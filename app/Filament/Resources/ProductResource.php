<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Number;
use Str;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';
    protected static ?string $navigationLabel = 'Produk';
    protected static ?string $modelLabel = 'Produk';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Nama')
                    ->required(),

                TextInput::make('quantity')
                    ->label('Kuantitas')
                    ->numeric()
                    ->default(0)
                    ->required(),

                TextInput::make('price')
                    ->label('Harga')
                    ->prefix('Rp')
                    ->numeric()
                    ->required(),

                Select::make('category')
                    ->label('Kategori')
                    ->options([
                        'atasan' => 'Atasan',
                        'skincare' => 'Skincare',
                        'bodycare' => 'Bodycare',
                        'flatshoes' => 'Flatshoes',
                    ])
                    ->required(),

                Textarea::make('description')
                ->label('Deskripsi'),

                FileUpload::make('image')
                ->label('Foto')
                ->directory('products')
                ->image(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('id')->sortable(),
                TextColumn::make('name')->label('Nama')->searchable()->sortable(),
                ImageColumn::make('image')->label('Foto'),
                TextColumn::make('quantity')->label('Kuantitas')->sortable(),
                TextColumn::make('price')
                ->label('Harga')
                ->sortable()
                ->formatStateUsing(fn ($state) => Str::of(Number::currency($state, 'IDR', 'id'))->replace(',00', '')),

                TextColumn::make('category')->label('Kategori')->searchable()->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
