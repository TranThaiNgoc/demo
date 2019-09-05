<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prolinevarcost extends Model
{
    protected $table = "prolinevarcost";
    protected $fillable = ['proline_id', 'item', 'docnum', 'itemcategory_id', 'costcategory_id', 'unit_id', 'qty', 'amount', 'total', 'date', 'remark', 'is_deleted'];
}
