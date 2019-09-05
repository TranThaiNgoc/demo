<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bufixcost extends Model
{
    protected $table = "bufixcost";
    protected $fillable = ['bu_id', 'item', 'docnum', 'itemcategory_id', 'costcategory_id', 'unit_id', 'qty', 'amount', 'total', 'date', 'remark', 'is_deleted'];
}
