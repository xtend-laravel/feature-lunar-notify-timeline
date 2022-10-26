<?php

namespace XtendLunar\Features\NotifyTimeline\Concerns;

trait HasSystemProperty
{
    protected bool $isSystem = false;

    public function system(bool $condition = true): static
    {
        $this->isSystem = $condition;

        return $this;
    }

    public function isSystem(): bool
    {
        return $this->isSystem;
    }
}
