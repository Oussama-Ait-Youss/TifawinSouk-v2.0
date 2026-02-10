<?php

namespace App\Filament\Resources\Fournisseurs\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class FournisseursInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('nom'),
                TextEntry::make('email')
                    ->label('Email address'),
                TextEntry::make('ville'),
                TextEntry::make('telephone'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
