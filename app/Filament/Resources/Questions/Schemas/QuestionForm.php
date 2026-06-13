<?php

namespace App\Filament\Resources\Questions\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class QuestionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Select::make('exam_id')->label('Ujian')->relationship('exam', 'title')->searchable()->required(),

            Textarea::make('question')->label('Soal')->required(),

            TextInput::make('option_a')->label('Pilihan A')->required(),

            TextInput::make('option_b')->label('Pilihan B')->required(),

            TextInput::make('option_c')->label('Pilihan C')->required(),

            TextInput::make('option_d')->label('Pilihan D')->required(),

            Select::make('correct_answer')
                ->options([
                    'A' => 'A',
                    'B' => 'B',
                    'C' => 'C',
                    'D' => 'D',
                ])
                ->required(),

            TextInput::make('score')->numeric()->default(1)->required(),
        ]);
    }
}
