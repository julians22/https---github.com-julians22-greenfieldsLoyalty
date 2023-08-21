<?php

namespace App\Domains\Auth\Models\Traits\Attribute;

use Illuminate\Support\Facades\Hash;

/**
 * Trait UserAttribute.
 */
trait UserAttribute
{
    /**
     * @param $password
     */
    public function setPasswordAttribute($password): void
    {
        // If password was accidentally passed in already hashed, try not to double hash it
        // Note: Password Histories are logged from the \App\Domains\Auth\Observer\UserObserver class
        $this->attributes['password'] =
            (strlen($password) === 60 && preg_match('/^\$2y\$/', $password)) ||
            (strlen($password) === 95 && preg_match('/^\$argon2i\$/', $password)) ?
                $password :
                Hash::make($password);
    }

    /**
     * @return mixed
     */
    public function getAvatarAttribute()
    {
        return $this->getAvatar();
    }

    /**
     * @return string
     */
    public function getPermissionsLabelAttribute()
    {
        if ($this->hasAllAccess()) {
            return 'All';
        }

        if (! $this->permissions->count()) {
            return 'None';
        }

        return collect($this->getPermissionDescriptions())
            ->implode('<br/>');
    }

    /**
     * @return string
     */
    public function getRolesLabelAttribute()
    {
        if ($this->hasAllAccess()) {
            return 'All';
        }

        if (! $this->roles->count()) {
            return 'None';
        }

        return collect($this->getRoleNames())
            ->each(function ($role) {
                return ucwords($role);
            })
            ->implode('<br/>');
    }

    /**
     * @return null|string
     */
    public function getDateOfBirthAttribute()
    {
        if (! $this->isHasDetail()) {
            return null;
        }

        return $this->detail->date_of_birth;
    }

    /**
     * @return null|string
     */
    public function getChildNameAttribute()
    {
        if (! $this->isHasDetail()) {
            return null;
        }

        return $this->detail->child_name;
    }

    /**
     * @return null|string
     */
    public function getChildDateOfBirthAttribute()
    {
        if (! $this->isHasDetail()) {
            return null;
        }

        return $this->detail->child_date_of_birth;
    }

    /**
     * @return null|string
     */
    public function getPostalCodeAttribute()
    {
        if (! $this->isHasAddressData()) {
            return null;
        }

        return $this->address_data->postal_code;
    }

    /**
     * @return null|string
     */
    public function getAddressAttribute()
    {
        if (! $this->isHasAddressData()) {
            return null;
        }

        return $this->address_data->address;
    }

    /**
     * @return null|string
     */
    public function getProvinceAttribute()
    {
        if (! $this->isHasAddressData()) {
            return null;
        }

        return $this->address_data->province;
    }

    /**
     * @return null|string
     */
    public function getCityAttribute()
    {
        if (! $this->isHasAddressData()) {
            return null;
        }

        return $this->address_data->city;
    }

    /**
     * @return null|string
     */
    public function getDistrictAttribute()
    {
        if (! $this->isHasAddressData()) {
            return null;
        }

        return $this->address_data->district;
    }

    /**
     * @return null|string
     */
    public function getDomicileAttribute()
    {
        if (! $this->isHasAddressData()) {
            return null;
        }

        return $this->address_data->domicile;
    }
}
