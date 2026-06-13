<?php

namespace App\Filament\Resources\Questions\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class QuestionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('exam.title')->label('Ujian')->searchable(),
                TextColumn::make('question')->label('Soal')->searchable(),
                TextColumn::make('option_a')->label('Pilihan A'),
                TextColumn::make('option_b')->label('Pilihan B'),
                TextColumn::make('option_c')->label('Pilihan C'),
                TextColumn::make('option_d')->label('Pilihan D'),
                TextColumn::make('correct_answer')->label('Jawaban Benar'),
                TextColumn::make('score')->label('Nilai'),
                
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
