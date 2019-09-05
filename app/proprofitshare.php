<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class proprofitshare extends Model
{
    protected $table = "proprofitshare";
    protected $fillable = ['name', 'cart_item', 'pro_id', 'docnum', 'percent', 'amount', 'total', 'date', 'remark', 'is_deleted'];
}
