<?php

namespace App\Domains\Auth\Models;

use App\Models\Area\City;
use App\Models\Area\District;
use App\Models\Area\Province;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class UserAddress extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * @var string[]
     */
    protected $with = [
        'rel_province',
        'rel_city',
        'rel_district',
    ];

    /**
     * Get the province associated with the UserAddress
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function rel_province(): HasOne
    {
        return $this->hasOne(Province::class, 'id', 'province');
    }

    /**
     * Get the city associated with the UserAddress
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function rel_city(): HasOne
    {
        return $this->hasOne(City::class, 'id', 'city');
    }

    /**
     * Get the district associated with the UserAddress
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function rel_district(): HasOne
    {
        return $this->hasOne(District::class, 'id', 'district');
    }

    public function hasCity() {
        return $this->city != null;
    }

    public function hasProvince() {
        return $this->province != null;
    }

    public function hasDistrict() {
        return $this->district != null;
    }
}
