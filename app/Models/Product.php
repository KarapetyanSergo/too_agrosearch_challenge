<?php

namespace App\Models;

use App\Traits\HasModelHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory, HasModelHelper;

    protected $fillable = [
        'user_id',
        'name',
        'price'
    ];

    public function countries(): BelongsToMany
    {
        return $this->belongsToMany(Country::class, 'product_country');
    }
}
