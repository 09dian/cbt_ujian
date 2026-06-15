<?php

namespace App\Filament\Resources\Teachers\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TeacherForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('name')->label('Nama Guru')->required(),
            TextInput::make('nip')->label('NIP')->required(),
            TextInput::make('no_hp')
                ->label('Nomor HP')
                ->required()
                ->unique(table: 'teachers', column: 'no_hp', ignoreRecord: true)
                ->validationMessages([
                    'unique' => 'Nomor HP sudah terdaftar. Silakan gunakan nomor lain.',
                ]),
            TextInput::make('email')->label('Email')->email()->required(),
            TextInput::make('password')->label('Password')->password()->required()->helperText('Password harus memiliki minimal 8 karakter'), // Cek langsung saat user pindah kolom
        ]);
    }
}
