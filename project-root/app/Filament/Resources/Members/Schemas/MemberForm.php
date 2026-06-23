<?php

namespace App\Filament\Resources\Members\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class MemberForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('member_code')
                    ->label('Member Code')
                    ->disabled()
                    ->default(function () {
                        $year = now()->format('Y');
                        $random = str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
                        return 'LIB' . $year . $random;
                    }),

                TextInput::make('name')
                    ->required(),

                TextInput::make('phone')
                    ->tel()
                    ->required(),

                TextInput::make('email')
                    ->label('Email address')
                    ->nullable()
                    ->email(),

                Select::make('status')
                    ->options(['active' => 'Active', 'inactive' => 'Inactive'])
                    ->default('active')
                    ->required(),

                DatePicker::make('registered_at')
                    ->label('Registered Date')
                    ->default(now())
                    ->disabled(),

                DatePicker::make('expired_at')
                    ->default(now()->addYear())
                    ->disabled()
                    ->label('Expired Date'),
            ]);
    }
}
