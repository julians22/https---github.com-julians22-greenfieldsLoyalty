<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    const TYPE_LONGTEXT = 'longtext';
    const TYPE_TEXT = 'text';
    const TYPE_IMAGE = 'image';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function isLongtext() {
        return $this->type == self::TYPE_LONGTEXT;
    }
    public function isText() {
        return $this->type == self::TYPE_TEXT;
    }
    public function isImage() {
        return $this->type == self::TYPE_IMAGE;
    }
}
