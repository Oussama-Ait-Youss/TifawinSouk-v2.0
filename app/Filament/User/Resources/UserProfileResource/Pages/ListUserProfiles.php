<?php

namespace App\Filament\User\Resources\UserProfileResource\Pages;

use App\Filament\User\Resources\UserProfileResource;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;

class ListUserProfiles extends ListRecords
{
    protected static string $resource = UserProfileResource::class;

    public function mount(): void
    {
        parent::mount();
        // Redirect to edit page since users should only see their own profile
        $this->redirect(UserProfileResource::getUrl('edit', ['record' => Auth::id()]));
    }
}
