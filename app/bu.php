<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bu extends Model
{
    protected $table = 'bu';
    protected $fillable = ['name', 'code', 'address', 'bucategory_id', 'tax', 'follow', 'mail', 'phone', 'remark', 'is_deleted'];
}
