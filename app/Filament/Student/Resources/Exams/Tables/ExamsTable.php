<?php

namespace App\Filament\Student\Resources\Exams\Tables;

use Carbon\Carbon;
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

                //hitung mundur waktu ujian
               TextColumn::make('remaining_time')
    ->label('Sisa Waktu')
    ->getStateUsing(function ($record) {
        $now = now();
        
        // Pastikan formatnya adalah objek Carbon
        $startTime = $record->start_time instanceof Carbon ? $record->start_time : Carbon::parse($record->start_time);
        $endTime = $record->end_time instanceof Carbon ? $record->end_time : Carbon::parse($record->end_time);

        // KONDISI 1: Belum masuk waktu mulai
        if ($now->lessThan($startTime)) {
            return 'Belum Mulai';
        }

        // KONDISI 3: Sudah melewati waktu selesai
        if ($now->greaterThan($endTime)) {
            return 'Waktu Habis';
        }

        // KONDISI 2: Sedang berlangsung (Hitung selisih dari 'now' ke 'end_time')
        $diffInSeconds = $now->diffInSeconds($endTime);
        
        $hours = floor($diffInSeconds / 3600);
        $minutes = floor(($diffInSeconds % 3600) / 60);
        $seconds = $diffInSeconds % 60;

        // Output format: 01:30:05 (1 jam, 30 menit, 5 detik)
        return sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
    }),

                IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),
            ])
           ->actions([
        Action::make('start')
            ->label(fn ($record) => $record->is_active ? 'Mulai Ujian' : 'Belum Ujian')        
            ->icon(fn ($record) => $record->is_active ? 'heroicon-o-play' : 'heroicon-o-x-circle')       
            ->color(fn ($record) => $record->is_active ? 'success' : 'danger')        
            ->url(fn ($record) => "/student/exams/{$record->id}/start")
            ->disabled(fn ($record) => !$record->is_active),
]);
    }
}