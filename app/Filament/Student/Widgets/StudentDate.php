<?php

namespace App\Filament\Student\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StudentDate extends StatsOverviewWidget
{
    protected static ?int $sort = -100;

    protected static bool $isLazy = false;

    protected int|string|array $columnSpan = 'full';

    protected function getStats(): array
    {
        return [

            Stat::make('Data Siswa', auth()->user()->name)
            ->description(auth()->user()->classroom?->name ?? 'N/A') 
            ->descriptionIcon('heroicon-o-building-office-2')
            ->color('primary'),

            Stat::make('Ujian Aktif', '2 Ujian')
            ->description('Jangan sampai terlewat')
            ->descriptionIcon('heroicon-m-clipboard-document-check')
            ->color('warning'),
            
            Stat::make('Ujian Belum Dikerjakan', '5')
                ->description('Ujian yang belum dikerjakan')
                ->descriptionIcon('heroicon-m-academic-cap')
                ->color('info'),

            Stat::make('Ujian Selesai', '5 Ujian')
            ->description('Total ujian yang sudah diikuti')
            ->descriptionIcon('heroicon-m-check-circle')
            ->color('success'),

        ];
    }
}