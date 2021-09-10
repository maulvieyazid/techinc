<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'about';

    protected $guarded = [];
}
