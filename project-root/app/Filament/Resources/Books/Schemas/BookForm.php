<?php

namespace App\Filament\Resources\Books\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BookForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('author')
                    ->required(),
                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->nullable()
                    ->searchable()
                    ->required(),
                TextInput::make('stock')
                    ->required()
                    ->default(0)
                    ->numeric(),
                TextInput::make('published_year')
                    ->nullable()
                    ->numeric(),
                FileUpload::make('cover')
                    ->image()
                    ->nullable(),
            ]);
    }
}
