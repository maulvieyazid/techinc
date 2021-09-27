<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Storage;

class Registrasi extends Model
{
    use Sluggable;

    public static $pathFoto = 'upload/registrasi';

    protected $primaryKey = 'slug';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $table = 'registrasi';

    protected $guarded = [];

    protected $dates = [
        'tanggal_mulai',
        'tanggal_selesai'
    ];

    public function file_photo(){
        $semuaFoto = Storage::allFiles(self::$pathFoto . '/' . $this->folder);
        return $semuaFoto;
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'judul',
            ]
        ];
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
