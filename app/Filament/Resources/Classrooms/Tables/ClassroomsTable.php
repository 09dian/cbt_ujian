<?php

namespace App\Filament\Resources\Classrooms\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ClassroomsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
            TextColumn::make('name')->label('Nama Kelas')->searchable()->sortable(),
             TextColumn::make('academic_year')->label('Tahun Ajaran')->searchable()->sortable()])
            ->filters([
                //
            ])
            ->recordActions([EditAction::make()])
            ->toolbarActions([BulkActionGroup::make([DeleteBulkAction::make()])]);
    }
}
