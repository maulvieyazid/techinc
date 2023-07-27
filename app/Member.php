<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public static $pathFoto = 'upload/member';

    protected $primaryKey = 'id_member';

    protected $table = 'member';

    protected $guarded = [];

    public function jenisMember()
    {
        return $this->belongsToMany(JenisMember::class, 'role_member', 'id_member', 'id_jenis');
    }

    public function scopeAktif($query)
    {
        return $query->where('status', 1);
    }

}
