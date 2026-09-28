<?php

namespace App\Filament\Resources\Loans\Schemas;

use App\Models\Member;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class LoanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('book_id')
                    ->relationship('book', 'title')
                    ->required()
                    ->searchable()
                    ->label('Book'),

                Select::make('member_id')
                    ->relationship('member', 'name')
                    ->searchable()
                    ->required()
                    ->label('Member')
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set) {
                        $member = Member::find($state);
                        if ($member) {
                            $set('member_code', $member->member_code);
                        }
                    }),

                TextInput::make('member_code')
                    ->label('Member Code')
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set) {
                        $member = Member::where('member_code', $state)->first();
                        if ($member) {
                            $set('member_id', $member->id);
                        }
                    }),

                DatePicker::make('loan_date')
                    ->required(),

                DatePicker::make('due_date')
                    ->required(),

                DatePicker::make('return_date')
                    ->nullable(),

                TextInput::make('fine')
                    ->numeric()
                    ->default(0),
            ]);
    }
}
