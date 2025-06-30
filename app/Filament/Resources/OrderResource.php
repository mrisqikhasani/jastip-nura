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

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->label('Customer'),

                DatePicker::make('order_date')
                    ->native(false)
                    ->displayFormat('j F Y')
                    ->label('Order Date'),


                TextInput::make('payment_method')
                    ->label('Payment Method'),

                Select::make('status')
                    ->label('Status Order')
                    ->options([
                        'pending' => 'Pending',
                        'processing' => 'Processing',
                        'completed' => 'Completed'
                    ]),

                TextInput::make('total_price')
                    ->label('Total Price')
                    ->numeric()
                    ->prefix('Rp'),

                // order line items
                Repeater::make('orderLineItems')
                    ->relationship()
                    ->schema([
                        Select::make('product_id')
                            ->relationship('product', 'name')
                            ->label('Product')
                            ->required()
                            ->searchable(),

                        TextInput::make('quantity')
                            ->numeric()
                            ->required(),

                        TextInput::make('sub_price')
                            ->prefix('Rp')
                            ->numeric()
                            ->required(),
                    ])
                    ->columns(3)
                    ->label('Orders items')
                    ->defaultItems(1)
                    ->columnSpan('full'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('user.name')->label('User')->sortable()->searchable(),
                TextColumn::make('total_price')->label('Total Amount')
                    ->sortable()
                    ->formatStateUsing(fn($state) => Str::of(Number::currency($state, 'IDR', 'id'))->replace(',00', '')),

                TextColumn::make('order_date')
                    ->label('Order Date')
                    ->date('j F Y'),
                TextColumn::make('status')
                ->label('Status')
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

    // public static function canCreate():bool
    // {
    //     return false;
    // }
}
