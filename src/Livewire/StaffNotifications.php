<?php

namespace XtendLunar\Features\NotifyTimeline\Livewire;

use Filament\Notifications\Collection;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Notifications\DatabaseNotification;

class StaffNotifications extends Notifications
{
    public Collection $notifications;

    public function getModalKey(): string
    {
        return 'staff-database-notifications';
    }

    public function getDatabaseNotificationsTrigger(): ?View
    {
        $viewPath = config('notifications.database.trigger.staff');

        if (blank($viewPath)) {
            return null;
        }

        return view($viewPath);
    }

    public function getDatabaseNotificationsQuery(): Builder | Relation
    {
        return DatabaseNotification::query()->where([
            'data->is_system' => false,
            'data->is_comment' => true,
            'data->format' => 'filament',
        ]);
    }

    public function render(): View
    {
        return view('notifications::staff-notifications');
    }
}
