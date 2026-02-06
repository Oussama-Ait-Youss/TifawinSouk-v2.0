<?php

namespace App\Filament\User\Resources\ProfileResource\Pages;

use App\Filament\User\Resources\ProfileResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;
use Illuminate\Support\Facades\Auth;

class ManageProfile extends ManageRecords
{
    protected static string $resource = ProfileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Ensure users can only create/edit their own profile
        $data['id'] = Auth::id();
        return $data;
    }

    public function mount(): void
    {
        // Redirect to edit page since users should only see their own profile
        $this->redirect(ProfileResource::getUrl('edit', ['record' => Auth::id()]));
    }
}
