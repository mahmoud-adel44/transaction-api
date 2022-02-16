<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dates = [
        'transactions_date'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function amount(): Attribute
    {
        return new Attribute(
            set: fn($value) => $value * 100,
        );
    }

    public function transactions_date(): Attribute
    {
        return new Attribute(
            set: fn($value) => Carbon::createFromFormat('m/d/Y', $value)->format('Y-m-d'),
        );
    }

    protected static function booted()
    {
        if (auth()->check()) {
            static::addGlobalScope('by_user', function (Builder $builder) {
                $builder->where('user_id', auth()->id());
            });
        }
    }
}
