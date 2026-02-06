<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('reference')
                    ->required(),
                TextInput::make('nom')
                    ->required(),
                TextInput::make('prix_achat')
                    ->required()
                    ->numeric(),
                TextInput::make('prix_vente')
                    ->required()
                    ->numeric(),
                TextInput::make('stock')
                    ->required()
                    ->numeric(),
                TextInput::make('category_id')
                    ->required()
                    ->numeric(),
                TextInput::make('fournisseurs_id')
                    ->required()
                    ->numeric(),
            ]);
    }
}
