<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prolinefixcost extends Model
{
    protected $table = "prolinefixcost";
    protected $fillable = ['proline_id', 'item', 'itemcategory_id', 'costcategory_id', 'docnum', 'unit_id', 'qty', 'amount', 'total', 'date', 'remark', 'is_deleted'];
}
