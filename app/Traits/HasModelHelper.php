<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait HasModelHelper
{
    public function scopeSkipPage(Builder $query, array $fields): void
    {
        $query->skip($fields['page'] > 1 ? $fields['limit_rows'] * $fields['page'] - $fields['limit_rows'] : 0);
    }
}
