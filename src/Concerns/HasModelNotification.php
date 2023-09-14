<?php

namespace XtendLunar\Features\NotifyTimeline\Concerns;

use Filament\Notifications\Actions\Action;
use Filament\Notifications\DatabaseNotification;
use Illuminate\Support\Str;
use XtendLunar\Features\NotifyTimeline\Base\Notification;

trait HasModelNotification
{
    protected static function makeNotification(
        string $type,
        string $title,
        string $body,
        ?string $route,
    ): DatabaseNotification
    {
        return Notification::make()
            ->status($type)
            ->system()
            ->id(Str::random())
            ->title($title)
            ->body($body)
            ->actions($route ? [
                Action::make('view')
                    ->button()
                    ->url($route),
            ] : [])
            ->toDatabase();
    }
}
