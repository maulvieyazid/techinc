<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    public static $pathFoto = 'upload/partner';

    protected $primaryKey = 'id_partner';

    protected $table = 'partner';

    protected $guarded = [];
}
