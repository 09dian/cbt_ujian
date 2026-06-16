<?php

namespace App\Filament\Student\Resources\Exams\Tables;

use Filament\Actions\Action;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ExamsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Nama Ujian')
                    ->searchable(),

                TextColumn::make('duration')
                    ->label('Durasi (Menit)'),

                TextColumn::make('start_time')
                    ->label('Mulai')
                    ->dateTime(),

                TextColumn::make('end_time')
                    ->label('Selesai')
                    ->dateTime(),

                IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),
            ])
            ->actions([
                Action::make('start')
                    ->label('Mulai Ujian')
                    ->icon('heroicon-o-play')
                    ->url(fn ($record) => "/student/exams/{$record->id}/start"),
            ]);
    }
}