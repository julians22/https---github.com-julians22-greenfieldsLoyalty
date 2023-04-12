<?php

namespace App\Domains\Auth\Models\Traits\Relationship;

use App\Domains\Auth\Models\PasswordHistory;
use App\Domains\Auth\Models\UserDetail;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class UserRelationship.
 */
trait UserRelationship
{
    /**
     * @return mixed
     */
    public function passwordHistories()
    {
        return $this->morphMany(PasswordHistory::class, 'model');
    }

    /**
     * Get the detail that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function detail(): HasOne
    {
        return $this->hasOne(UserDetail::class, 'user_id');
    }
}
