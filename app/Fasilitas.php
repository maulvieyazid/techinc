<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    public static $pathLogo = 'upload/fasilitas';

    protected $primaryKey = 'id_fasilitas';

    protected $table = 'fasilitas';

    protected $guarded = [];
}
