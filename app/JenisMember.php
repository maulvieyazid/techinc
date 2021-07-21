<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisMember extends Model
{
    protected $primaryKey = 'id_jenis';

    protected $table = 'jenis_member';

    protected $guarded = [];

    public function member()
    {
        return $this->belongsToMany(Member::class, 'role_member', 'id_jenis', 'id_member');
    }
}
