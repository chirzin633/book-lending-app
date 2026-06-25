<?php

namespace App\Filament\Resources\Loans\Pages;

use App\Filament\Resources\Loans\LoanResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Override;

class CreateLoan extends CreateRecord
{
    protected static string $resource = LoanResource::class;

    #[Override]
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    #[Override]
    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->title('New loan has been created!')
            ->success();
    }
}
