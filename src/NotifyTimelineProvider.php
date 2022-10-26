<?php

namespace XtendLunar\Features\NotifyTimeline;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use XtendLunar\Features\NotifyTimeline\Livewire\CommentNotification;
use XtendLunar\Features\NotifyTimeline\Livewire\EmailNotification;
use XtendLunar\Features\NotifyTimeline\Livewire\Notifications;
use XtendLunar\Features\NotifyTimeline\Livewire\RealTimeNotifications;
use XtendLunar\Features\NotifyTimeline\Livewire\StaffNotifications;
use XtendLunar\Features\NotifyTimeline\Livewire\Timeline;

class NotifyTimelineProvider extends ServiceProvider
{
    public function register(): void
    {
        Livewire::component('hub.components.orders.activity.comment-notification', CommentNotification::class);
        Livewire::component('hub.components.orders.email-notification', EmailNotification::class);
        Livewire::component('system.notifications', Notifications::class);
        Livewire::component('system.real-time-notifications', RealTimeNotifications::class);
        Livewire::component('staff.notifications', StaffNotifications::class);
        Livewire::component('hub.components.timeline', Timeline::class);
    }
}
