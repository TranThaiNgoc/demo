<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class procategory extends Model
{
    protected $table = 'procategory';
    protected $fillable = ['name', 'remark', 'is_deleted'];
}
