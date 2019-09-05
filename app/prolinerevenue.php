<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prolinerevenue extends Model
{
    protected $table = "prolinerevenue";
    protected $fillable = ['name', 'code', 'proline_id', 'cart_item', 'docnum', 'date', 'amount', 'remark', 'is_deleted'];
}
