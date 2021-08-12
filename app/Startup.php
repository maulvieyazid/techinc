<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Startup extends Model
{
    use Sluggable;

    public static $pathLogo = 'upload/startup/logo';

    protected $primaryKey = 'slug';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $table = 'startup';

    protected $guarded = [];

    protected $dates = [
        'tanggal_gabung',
        'tanggal_lulus'
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'nama_startup',
            ]
        ];
    }
}
