<?php

namespace App\Filament\Resources\Categories\Pages;

use App\Filament\Resources\Categories\CategoryResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Override;

class CreateCategory extends CreateRecord
{
    protected static string $resource = CategoryResource::class;

    #[Override]
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    #[Override]
    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->title('Category has been created!')
            ->success();
    }
}
