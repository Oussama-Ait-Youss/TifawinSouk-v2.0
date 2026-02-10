<?php

namespace App\Filament\Resources\Fournisseurs\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class FournisseursForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nom')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('ville')
                    ->required(),
                TextInput::make('telephone')
                    ->tel()
                    ->required(),
            ]);
    }
}
