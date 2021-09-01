<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Storage;


class Kategori extends Model
{
    use Sluggable;

    public static $pathFoto = 'upload/galeri';

    protected $primaryKey = 'slug';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $table = 'kategori';

    protected $guarded = [];

    public function file_photo(){
        $semuaFoto = Storage::allFiles(self::$pathFoto . '/' . $this->folder_kategori);
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
                'source' => 'nama_kategori',
            ]
        ];
    }

    public function startup()
    {
        return $this->belongsTo(Startup::class, 'slug_startup', 'slug');
    }
}
