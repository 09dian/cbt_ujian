<?php

namespace App\Filament\Resources\Students\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class StudentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nis')
                    ->label('NIS')
                    ->required(),
                     TextInput::make('name')
                    ->label('Nama')
                    ->required(),
                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->nullable(),
                TextInput::make('password')
                    ->label('Password')
                    ->password()
                    ->required(),
                Select::make('classroom_id')
                    ->label('Kelas')
                    ->relationship('classroom', 'name')
                    ->nullable(),

                    

            ]);
    }
}
