<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class itemcategory extends Model
{
    protected $table = 'itemcategory';
    protected $fillable = ['name', 'remark', 'is_deleted'];
}
