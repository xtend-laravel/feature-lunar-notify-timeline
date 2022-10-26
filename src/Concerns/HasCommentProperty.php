<?php

namespace XtendLunar\Features\NotifyTimeline\Concerns;

trait HasCommentProperty
{
    protected bool $isComment = false;

    public function comment(bool $condition = true): static
    {
        $this->isComment = $condition;

        return $this;
    }

    public function isComment(): bool
    {
        return $this->isComment;
    }
}
