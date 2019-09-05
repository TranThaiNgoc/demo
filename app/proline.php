<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class proline extends Model
{
    protected $table = "proline";
    protected $fillable = ['name', 'pro_id', 'code', 'address', 'prolinecategory_id', 'follow', 'mail', 'phone', 'remark', 'is_deleted'];
}
