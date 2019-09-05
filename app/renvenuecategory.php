<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class renvenuecategory extends Model
{
    protected $table = 'renvenuecategory';
    protected $fillable = ['name', 'remark', 'is_deleted'];
}
