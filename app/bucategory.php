<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bucategory extends Model
{
    protected $table = 'bucategory';
    protected $fillable = ['name', 'remark', 'is_deleted'];
}
