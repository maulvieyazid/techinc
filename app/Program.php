<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $primaryKey = 'id_program';

    protected $table = 'program';

    protected $guarded = [];
}
