<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class News extends Model
{
    use Sluggable;

    public static $pathThumbnail = 'upload/news/thumbnail';

    protected $primaryKey = 'slug';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $table = 'news';

    protected $guarded = [];

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

    public function kategoriNews()
    {
        return $this->belongsTo(KategoriNews::class, 'slug_kategori', 'slug');
    }
}
