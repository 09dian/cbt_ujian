<?php

namespace App\Filament\Student\Resources\Exams;

use App\Filament\Student\Resources\Exams\Pages\ListExams;
use App\Filament\Student\Resources\Exams\Tables\ExamsTable;
use App\Models\Exam;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class ExamResource extends Resource
{
    protected static ?string $model = Exam::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static ?string $navigationLabel = 'Ujian Saya';

    protected static ?string $recordTitleAttribute = 'title';

    public static function table(Table $table): Table
    {
        return ExamsTable::configure($table);
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canEdit(Model $record): bool
    {
        return false;
    }

    public static function canDelete(Model $record): bool
    {
        return false;
    }

    public static function getPages(): array
    {
        return [
            'index' => ListExams::route('/'),
        ];
    }
}
