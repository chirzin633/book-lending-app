<?php

namespace App\Filament\Resources\Members\Pages;

use App\Filament\Resources\Members\MemberResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Override;

class CreateMember extends CreateRecord
{
    protected static string $resource = MemberResource::class;

    #[Override]
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    #[Override]
    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->title('New member has been created!')
            ->success();
    }
}
