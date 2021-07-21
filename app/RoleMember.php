<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleMember extends Model
{
    protected $table = 'role_member';

    protected $guarded = [];

    public function member()
    {
        return $this->belongsTo(Member::class, 'id_member', 'id_member');
    }

    public function jenisMember()
    {
        return $this->belongsTo(JenisMember::class, 'id_jenis', 'id_jenis');
    }
}
