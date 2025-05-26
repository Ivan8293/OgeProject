<?php

namespace App\Filament\Resources\TopicTaskResource\Pages;

use App\Filament\Resources\TopicTaskResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTopicTask extends EditRecord
{
    protected static string $resource = TopicTaskResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
