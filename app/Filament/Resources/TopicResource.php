<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TopicResource\Pages;
use App\Filament\Resources\TopicResource\RelationManagers;
use App\Models\Topic;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\DateTimeColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;

class TopicResource extends Resource
{
    protected static ?string $model = Topic::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                    
                TextInput::make('name')
                    ->label('Название'),
                TextInput::make('description')
                    ->label('Описание'),
                TextInput::make('video')
                    ->label('Ссылка на видео'),
                TimePicker::make('work_time')
                    ->label('Время на выполнение')
                    ->required(),
                TextInput::make('type')
                    ->label('Тип'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('topic_id')
                    ->label('ID Темы') // Произвольный лейбл для колонки
                    ->sortable(),
                TextColumn::make('name')
                    ->label('Название'),
                TextColumn::make('description')
                    ->label('Описание'),
                TextColumn::make('video')
                    ->label('Ссылка на видео'),
                TextColumn::make('work_time')
                    ->label('Время на выполнение')
                    ->formatStateUsing(fn ($state) => date('H:i', strtotime($state)))
                    ->sortable(),
                TextColumn::make('type')
                    ->label('Тип'),
                
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
            'index' => Pages\ListTopics::route('/'),
            'create' => Pages\CreateTopic::route('/create'),
            'edit' => Pages\EditTopic::route('/{record}/edit'),
        ];
    }    
}
