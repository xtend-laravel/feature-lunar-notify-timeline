<?php

namespace XtendLunar\Features\NotifyTimeline\Base;

use Filament\Notifications\Notification as FilamentNotification;
use XtendLunar\Features\NotifyTimeline\Concerns;

class Notification extends FilamentNotification
{
    use Concerns\HasSystemProperty;
    use Concerns\HasCommentProperty;

    public function toArray(): array
    {
        return array_merge(parent::toArray(), [
            'is_system' => $this->isSystem(),
            'is_comment' => $this->isComment(),
        ]);
    }

    public function getDatabaseMessage(): array
    {
        $data = $this->toArray();
        $data['duration'] = 'persistent';
        $data['format'] = 'filament';

        return $data;
    }
}
