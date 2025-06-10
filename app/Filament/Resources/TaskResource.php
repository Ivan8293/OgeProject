<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TaskResource\Pages;
use App\Filament\Resources\TaskResource\RelationManagers;
use App\Models\Task;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MultiSelect;
use Filament\Tables\Columns\TagsColumn;

class TaskResource extends Resource
{
    protected static ?string $model = Task::class;

    protected static ?string $modelLabel = 'Задача'; // Название модели в единственном числе
    protected static ?string $pluralModelLabel = 'Задачи'; // Название модели во множественном числе

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            TextInput::make('text')
                ->label('Ссылка на задачу') // Произвольное название для поля "text"
                ->required(),
            TextInput::make('video')
                ->label('Ссылка на видео'), // Произвольный лейбл
            TextInput::make('answer')
                ->label('Ответ')
                ->numeric()
                ->step(0.1)
                ->required(),
            TextInput::make('task_oge_id')
                ->label('Номер задания ОГЭ')
                ->numeric(),

            MultiSelect::make('topics')
                ->relationship('topics', 'name') // 'topics' — имя связи, 'name' — поле модели Topic для отображения
                ->label('Темы')
                ->preload() // опционально, чтобы загрузить все варианты сразу
                ->required(),
        ]);
}

public static function table(Table $table): Table
{
    return $table
        ->columns([
            TextColumn::make('task_id')
                ->label('ID задачи') // Произвольный лейбл для колонки
                ->sortable(),
            TextColumn::make('text')
                ->label('Описание задачи'),
            TextColumn::make('video')
                ->label('Видео ссылка'),
            TextColumn::make('answer')
                ->label('Ответ'),
            TextColumn::make('task_oge_id')
                ->label('Номер задания ОГЭ'),

            // TagsColumn::make('topics.name')
            //     ->label('Темы'),
        ])
        ->filters([
            //
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]);
}
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTasks::route('/'),
            'create' => Pages\CreateTask::route('/create'),
            'edit' => Pages\EditTask::route('/{record}/edit'),
        ];
    }    
}
