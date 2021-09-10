<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    public static $pathFile = 'upload/document';

    protected $primaryKey = 'id_document';

    protected $table = 'document';

    protected $guarded = [];
}
