<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarouselImage extends Model
{
    public static $pathFoto = 'upload/carousel';

    protected $primaryKey = 'id_carousel';

    protected $table = 'carousel_image';

    protected $guarded = [];

}
