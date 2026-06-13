<?php

namespace App\Filament\Resources\Exams\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ExamForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Select::make('subject_id')->label('Mata Pelajaran')->relationship('subject', 'name')->searchable()->required(),
            Select::make('teacher_id')->label('Guru')->relationship('teacher', 'name')->searchable()->required(),
            TextInput::make('title')->label('Judul Ujian')->required(),
            TextInput::make('duration')->label('Durasi')->numeric()->suffix('Menit')->minValue(1)->required(),
            DateTimePicker::make('start_time')->label('Waktu Mulai')->required(),
            DateTimePicker::make('end_time')->label('Waktu Selesai')->required()
        ]);
    }
}
