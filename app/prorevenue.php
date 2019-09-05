<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prorevenue extends Model
{
    protected $table = "prorevenue";
    protected $fillable = ['name', 'code', 'pro_id', 'cart_item', 'docnum', 'date', 'amount', 'remark', 'is_deleted'];
}
