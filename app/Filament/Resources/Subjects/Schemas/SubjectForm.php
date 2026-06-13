<?php

namespace App\Filament\Resources\Subjects\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SubjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama Mata Pelajaran')
                    ->required(),
                Select::make('teacher_id')
                    ->label('Guru Pengampu')
                    ->relationship('teacher', 'name')
                    ->nullable(),
            ]);
    }
}
