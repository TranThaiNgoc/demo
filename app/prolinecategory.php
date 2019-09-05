<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prolinecategory extends Model
{
    protected $table = 'prolinecategory';
    protected $fillable = ['name', 'remark', 'is_deleted'];
}
