<?php

namespace App\Filament\Student\Pages;
use Filament\Notifications\Notification; 
use Illuminate\Support\Carbon;           
use App\Models\Exam;
use Filament\Pages\Page;

class StartExam extends Page
{
    protected static ?string $slug = 'exams/{record}/start';

    protected static bool $shouldRegisterNavigation = false;

    protected string $view = 'filament.student.pages.start-exam';

    public Exam $exam;

public function mount($record): void
{
    $this->exam = Exam::with('questions')->findOrFail($record);

    $now = now();
    $endTime = $this->exam->end_time instanceof Carbon ? $this->exam->end_time : Carbon::parse($this->exam->end_time);

    if (!$this->exam->is_active || $now->greaterThan($endTime)) {
        
        Notification::make()
            ->title('Akses Ditutup')
            ->body('Ujian ini sudah berakhir atau telah dinonaktifkan oleh pengawas.')
            ->danger()
            ->persistent()
            ->send();

        $this->redirect('/student/exams'); 
        
        return;
    }
}
}