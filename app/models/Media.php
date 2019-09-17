<?php

namespace App\Media;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table="media";

    protected $casts = [
        'manipulations' => 'array',
        'custom_properties' => 'array',
        'responsive_images' => 'array',
    ];
}
