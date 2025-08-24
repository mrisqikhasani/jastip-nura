<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Number;
use Str;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';
    protected static ?string $navigationLabel = 'Pesanan';
    protected static ?string $modelLabel = 'Pesanan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('id_pelanggan')
                    ->relationship('user', 'nama_lengkap')
                    ->searchable()
                    ->label('Pelanggan'),

                DatePicker::make('tanggal_pemesanan')
                    ->native(false)
                    ->displayFormat('j F Y')
                    ->label('Tanggal'),

                Select::make('status')
                    ->label('Status Pesanan')
                    ->options([
                        'Menunggu' => 'Menunggu',
                        'Diproses' => 'Diproses',
                        'Selesai' => 'Selesai',
                        'Dibatalkan' => 'Dibatalkan',
                    ]),

                TextInput::make('total_harga')
                    ->label('Total Harga')
                    ->numeric()
                    ->prefix('Rp'),

                // order line items
                Repeater::make('orderLineItems')
                    ->relationship()
                    ->schema([
                        Select::make('id_produk')
                            ->relationship('product', 'nama_produk')
                            ->label('Produk')
                            ->required()
                            ->searchable(),

                        TextInput::make('kuantitas')
                            ->numeric()
                            ->required()
                            ->label('Kuantitas'),

                        TextInput::make('subtotal')
                            ->prefix('Rp')
                            ->numeric()
                            ->required()
                            ->label('Harga Satuan'),
                    ])
                    ->columns(3)
                    ->label('Detail Pesanan')
                    ->defaultItems(1)
                    ->columnSpan('full'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id_pesanan')->label('ID Pesanan')->sortable(),
                TextColumn::make('user.nama_lengkap')->label('Pelanggan')->sortable()->searchable(),
                TextColumn::make('total_harga')->label('Total Harga')
                    ->sortable()
                    ->formatStateUsing(fn($state) => Str::of(Number::currency($state, 'IDR', 'id'))->replace(',00', '')),

                TextColumn::make('tanggal_pemesanan')
                    ->label('Tanggal')
                    ->date('j F Y'),
                TextColumn::make('status')
                ->label('Status Pesanan')
                ->badge(),
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }

    public static function canCreate():bool
    {
        return false;
    }
}
