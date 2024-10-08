<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Produtos';

    protected static ?string $pluralLabel = 'Produtos';

    public static function getLabel(): string
    {
        return 'Produto';
    }


    protected static ?string $navigationGroup = 'Catálogo'; // Grupo do menu
    protected static ?int $navigationSort = 1; // Ordem no menu

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('cd_product')
                ->required()
                ->label('Código do Produto'),
            Forms\Components\TextInput::make('name')
                ->required()
                ->label('Nome'),
            Forms\Components\TextInput::make('description')
                ->label('Descricao'),
            Forms\Components\TextInput::make('base_value')
                ->required()
                ->numeric()
                ->label('Preco'),
            Forms\Components\Select::make('category_id')
                ->relationship('category', 'name')
                ->label('Categoria'),
            Forms\Components\Select::make('brand_id')
                ->relationship('brand', 'name')
                ->label('Marca'),
            Forms\Components\Select::make('bulk_slug')
                ->required()
                ->label('Tipo'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('cd_product'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('base_value')->money('BRL'),
                Tables\Columns\TextColumn::make('category.name'),
                Tables\Columns\TextColumn::make('brand.name'),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
