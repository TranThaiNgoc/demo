<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class costcategory extends Model
{
    protected $table = 'costcategory';
    protected $fillable = ['name', 'remark', 'is_deleted'];
}
