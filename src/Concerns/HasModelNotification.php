<?php

namespace XtendLunar\Features\NotifyTimeline\Concerns;

use Filament\Notifications\Actions\Action;
use Filament\Notifications\DatabaseNotification;
use Illuminate\Support\Str;
use Lunar\Models\Customer;
use Lunar\Models\Order;
use XtendLunar\Features\NotifyTimeline\Base\Notification;

trait HasModelNotification
{
    public function customerNotification(Customer $customer): DatabaseNotification
    {
        return Notification::make()
            ->success()
            ->system()
            ->id(Str::random())
            ->title('New customer registered successfully!')
            ->body('System detected new customer registration named **'.$customer->fullName.'**.')
            ->actions([
                Action::make('view')
                    ->button()
                    ->url(route('hub.customers.show', ['customer' => $customer])),
            ])
            ->toDatabase();
    }

    public function orderNotification(Order $order): DatabaseNotification
    {
        return Notification::make()
            ->success()
            ->system()
            ->id(Str::random())
            ->title('New order placed successfully!')
            ->body("**{$order->customer->fullName}** ordered **{$order->lines->count()}** products.")
            ->actions([
                Action::make('view')
                    ->button()
                    ->url(route('hub.orders.show', ['order' => $order])),
            ])
            ->toDatabase();
    }

    public function cartNotification()
    {
        // @todo Handle notification for abandon cart
    }
}
