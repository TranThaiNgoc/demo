<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prolineprofitshare extends Model
{
    protected $table = "prolineprofitshare";
    protected $fillable = ['name', 'cart_item', 'proline_id', 'docnum', 'percent', 'amount', 'total', 'date', 'remark', 'is_deleted'];
}
