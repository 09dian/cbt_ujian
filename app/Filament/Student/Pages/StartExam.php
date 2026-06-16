<?php

namespace App\Filament\Student\Pages;

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
    }
}