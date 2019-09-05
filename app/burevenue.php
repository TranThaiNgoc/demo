<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class burevenue extends Model
{
    protected $table = 'burevenue';
    protected $fillable = ['name', 'code', 'bu_id', 'cart_item', 'docnum', 'date', 'amount', 'remark', 'is_deleted'];
}
