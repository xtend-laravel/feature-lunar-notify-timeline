<?php

namespace XtendLunar\Features\NotifyTimeline\Livewire;

use Illuminate\Contracts\View\View;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use XtendLunar\Features\NotifyTimeline\Base\Notification;

class RealTimeNotifications extends Component
{
    protected $listeners = [
        'notificationClosed' => 'updateNotificationTimestamp',
    ];

    public function mount(): void
    {
        Session::put('filament.real-time-notifications', []);
    }

    public function pushSystemPopUpNotification()
    {
        $keys = Session::get('filament.real-time-notifications', []);
        $notification = DatabaseNotification::query()
            ->where([
                'realtime_at' => null,
                'data->is_system' => true,
                'data->is_comment' => false,
                'data->format' => 'filament',
            ])
            ->whereNotIn('data->id', array_keys($keys))
            ->orderByDesc('created_at')
            ->first();

        if ($notification) {
            Notification::fromArray($notification->data)
                ->seconds(30)
                ->send();

            Session::put('filament.real-time-notifications', array_merge($keys, [$notification->data['id'] => $notification->id]));
        }
    }

    public function updateNotificationTimestamp(string $key): void
    {
        $keys = Session::get('filament.real-time-notifications', []);
        $notification = DatabaseNotification::query()
            ->where([
                'realtime_at' => null,
                'data->id' => $key,
                'data->is_system' => true,
                'data->is_comment' => false,
                'data->format' => 'filament',
            ])
            ->first();

        if ($notification) {
            unset($keys[$key]);
            Session::put('filament.real-time-notifications', $keys);
            $notification->touch('realtime_at');
        }
    }

    public function render(): View
    {
        return view('notifications::real-time-notifications');
    }
}
