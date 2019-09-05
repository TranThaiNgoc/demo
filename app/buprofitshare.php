<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class buprofitshare extends Model
{
    protected $table = 'buprofitshare';
    protected $fillable = ['name', 'cart_item', 'bu_id', 'docnum', 'percent', 'amount', 'total', 'date', 'remark', 'is_deleted'];
}
