<?php

namespace App\Filament\Resources\TopicTaskResource\Pages;

use App\Filament\Resources\TopicTaskResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTopicTasks extends ListRecords
{
    protected static string $resource = TopicTaskResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
