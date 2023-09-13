<?php

namespace App\Domains\Auth\Models\Traits\Method;

use Illuminate\Support\Collection;
use PhpOffice\PhpSpreadsheet\Writer\Ods\Thumbnails;

/**
 * Trait UserMethod.
 */
trait UserMethod
{

    public function isHasDetail()
    {
        if (empty($this->detail)) {
            return false;
        }

        return true;
    }

    public function isHasAddressData()
    {
        if (empty($this->address_data)) {
            return false;
        }

        return true;
    }

    public function isHasCity(): bool {
        if (!$this->isHasAddressData()) {
            return $this->isHasAddressData();
        }

        if ($this->address_data->isHasCity()) {
            return false;
        }

        return true;
    }
    public function isHasProvince(): bool {
        if (!$this->isHasAddressData()) {
            return $this->isHasAddressData();
        }

        if ($this->address_data->isHasProvince()) {
            return false;
        }

        return true;
    }
    public function isHasDistrict(): bool {
        if (!$this->isHasAddressData()) {
            return $this->isHasAddressData();
        }

        if ($this->address_data->isHasDistrict()) {
            return false;
        }

        return true;
    }

    public function isWebUser() {
        return $this->register_channel == 'web';
    }

    public function isWebQrUser() {
        return $this->register_channel == 'web_qr';
    }

    public function isWhatsappUser() {
        return $this->register_channel == 'whatsapp';
    }

    /**
     * @return bool
     */
    public function isMasterAdmin(): bool
    {
        return $this->id === 1;
    }

    /**
     * @return mixed
     */
    public function isAdmin(): bool
    {
        return $this->type === self::TYPE_ADMIN;
    }

    /**
     * @return mixed
     */
    public function isUser(): bool
    {
        return $this->type === self::TYPE_USER;
    }

    /**
     * @return mixed
     */
    public function hasAllAccess(): bool
    {
        return $this->isAdmin() && $this->hasRole(config('boilerplate.access.role.admin'));
    }

    /**
     * @param $type
     * @return bool
     */
    public function isType($type): bool
    {
        return $this->type === $type;
    }

    /**
     * @return mixed
     */
    public function canChangeEmail(): bool
    {
        return config('boilerplate.access.user.change_email');
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    public function isCompleteRegister()
    {
        return $this->completed_at != null;
    }

    /**
     * @return bool
     */
    public function isVerified(): bool
    {
        return $this->whatsapp_validate_at != null;
        return $this->email_verified_at !== null;
    }

    /**
     * @return bool
     */
    public function isWhatsappVerified(): bool
    {
        return $this->whatsapp_validate_at !== null;
    }

    /**
     * @return bool
     */
    public function isSocial(): bool
    {
        return $this->provider && $this->provider_id;
    }

    /**
     * @return Collection
     */
    public function getPermissionDescriptions(): Collection
    {
        return $this->permissions->pluck('description');
    }

    /**
     * @param  bool  $size
     * @return mixed|string
     *
     * @throws \Creativeorange\Gravatar\Exceptions\InvalidEmailException
     */
    public function getAvatar($size = null)
    {
        return 'https://gravatar.com/avatar/'.md5(strtolower(trim($this->email))).'?s='.config('boilerplate.avatar.size', $size).'&d=mp';
    }
}
