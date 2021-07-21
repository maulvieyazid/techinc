<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimStartup extends Model
{
    public static $pathFoto = 'upload/startup/tim';

    protected $primaryKey = 'id_tim';

    protected $table = 'tim_startup';

    protected $guarded = [];

    public function startup()
    {
        return $this->belongsTo(Startup::class, 'slug_startup', 'slug');
    }
}
