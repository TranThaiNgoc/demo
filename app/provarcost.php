<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class provarcost extends Model
{
    protected $table = "provarcost";
    protected $fillable = ['pro_id', 'item', 'docnum', 'itemcategory_id', 'costcategory_id', 'unit_id', 'amount', 'qty', 'total', 'date', 'remark', 'is_deleted'];
}
