<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class buvarcost extends Model
{
    protected $table = "buvarcost";
    protected $fillable = ['bu_id', 'item', 'docnum', 'itemcategory_id', 'costcategory_id', 'unit_id', 'qty', 'amount', 'total', 'date', 'person', 'remark', 'is_deleted'];
}
