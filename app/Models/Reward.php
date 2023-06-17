<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reward extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Scope a query to only include status == 1
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('status', 1)
            ->where('current_stock', '>', 0);
    }

    /**
     * @param $query
     * @param $term
     * @return mixed
     */
    public function scopeSearch($query, $term)
    {
        return $query->where(function ($query) use ($term) {
            $query->where('name', 'like', '%'.$term.'%');
        });
    }

    public function isPublished()
    {
        return $this->status === 1;
    }

    public function isAvailable()
    {
        return $this->stock >= 1;
    }

    /**
     * Get all of the redeems for the Reward
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function redeems(): HasMany
    {
        return $this->hasMany(Redeem::class, 'reward_id', 'id');
    }
}
