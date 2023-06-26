<?php

namespace App\Domains\Auth\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class UserDetail extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Get the user associated with the UserDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function getSurveyCategoryAttribute() {
        return $this->history_milk_category ?? null;
    }

    public function getSurveyProductAttribute() {
        return $this->history_milk_product ?? null;
    }

    public function getSurveyPacksizeAttribute() {
        return $this->history_milk_packsize ?? null;
    }

}
