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

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Product Name')
                    ->required(),

                TextInput::make('quantity')
                    ->label('Quantity Product')
                    ->numeric()
                    ->default(0)
                    ->required(),

                TextInput::make('price')
                    ->label('Price')
                    ->prefix('Rp')
                    ->numeric()
                    ->required(),

                Select::make('category')
                    ->label('Category')
                    ->options([
                        'atasan' => 'Atasan',
                        'skincare' => 'Skincare',
                        'bodycare' => 'Bodycare',
                        'flatshoes' => 'Flatshoes',
                    ])
                    ->required(),

                Textarea::make('description')
                ->label('Description Product'),

                FileUpload::make('image')
                ->label('Photo Product')
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
                TextColumn::make('name')->label('Product Name')->searchable()->sortable(),
                ImageColumn::make('image')->label('Photo Product'),
                TextColumn::make('quantity')->label('Quantity')->sortable(),
                TextColumn::make('price')->prefix('Rp')->sortable(),
                TextColumn::make('category')->label('Category')->searchable()->sortable(),
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
