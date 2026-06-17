<?php

namespace App\Filament\Student\Resources\Exams;

use App\Filament\Student\Resources\Exams\Tables\ExamsTable;
use App\Models\Exam;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Filament\Resources\Pages\ListRecords; // Import ListRecords bawaan

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

    // Proteksi Hak Akses
    public static function canCreate(): bool { return false; }
    public static function canEdit(Model $record): bool { return false; }
    public static function canDelete(Model $record): bool { return false; }

    public static function getPages(): array
    {
        return [
            // Panggil class CustomListExams yang kita buat di bawah
            'index' => CustomListExams::route('/'),
        ];
    }
}

/**
 * Class halaman khusus untuk list ujian siswa.
 * Ditulis di sini agar hemat berkas & folder Pages bisa dihapus total.
 */
class CustomListExams extends ListRecords
{
    protected static string $resource = ExamResource::class;

    protected function getHeaderActions(): array
    {
        // Kosongkan array ini agar tombol "New Exam" hilang total
        return [];
    }
}