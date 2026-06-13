<?php

namespace App\Filament\Resources\Exams\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class ExamsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
            TextColumn::make('subject.name')->label('Mata Pelajaran')->searchable(),
            TextColumn::make('teacher.name')->label('Guru Pengampu')->searchable(),
            TextColumn::make('title')->label('Judul Ujian')->searchable(),
            TextColumn::make('duration')->label('Durasi (Menit)'),
            TextColumn::make('start_time')->label('Waktu Mulai')->dateTime(),
            TextColumn::make('end_time')->label('Waktu Selesai')->dateTime(),
            ToggleColumn::make('is_active')->label('Aktif')->sortable(),
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
