<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class produce extends Model
{
    protected $table = 'produce';
    protected $fillable = ['name', 'bu_id', 'code', 'address', 'procategory_id', 'follow', 'mail', 'phone', 'remark', 'is_deleted'];

    public function bu() {
        return $this->belongsTo('App\bu', 'bu_id', 'id');
    }

    public function proline() {
        return $this->hasMany('App\proline', 'pro_id', 'id');
    }
}
