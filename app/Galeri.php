<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    public static $pathFoto = 'upload/galeri';

    protected $primaryKey = 'id_galeri';

    protected $table = 'galeri';

    protected $guarded = [];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'slug_kategori', 'slug');
    }
}
