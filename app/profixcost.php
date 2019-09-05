<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profixcost extends Model
{
    protected $table = "profixcost";
    protected $fillable = ['pro_id', 'item', 'itemcategory_id', 'costcategory_id', 'docnum', 'unit_id', 'amount', 'qty', 'total', 'date', 'remark', 'is_deleted'];
}
