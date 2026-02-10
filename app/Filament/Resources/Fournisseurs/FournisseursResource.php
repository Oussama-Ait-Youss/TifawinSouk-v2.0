<?php

namespace App\Filament\Resources\Fournisseurs;

use App\Filament\Resources\Fournisseurs\Pages\CreateFournisseurs;
use App\Filament\Resources\Fournisseurs\Pages\EditFournisseurs;
use App\Filament\Resources\Fournisseurs\Pages\ListFournisseurs;
use App\Filament\Resources\Fournisseurs\Pages\ViewFournisseurs;
use App\Filament\Resources\Fournisseurs\Schemas\FournisseursForm;
use App\Filament\Resources\Fournisseurs\Schemas\FournisseursInfolist;
use App\Filament\Resources\Fournisseurs\Tables\FournisseursTable;
use App\Models\Fournisseurs;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FournisseursResource extends Resource
{
    protected static ?string $model = Fournisseurs::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Fournisseur';

    public static function form(Schema $schema): Schema
    {
        return FournisseursForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return FournisseursInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FournisseursTable::configure($table);
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
            'index' => ListFournisseurs::route('/'),
            'create' => CreateFournisseurs::route('/create'),
            'view' => ViewFournisseurs::route('/{record}'),
            'edit' => EditFournisseurs::route('/{record}/edit'),
        ];
    }
}
