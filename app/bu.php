<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bu extends Model
{
    protected $table = 'bu';
    protected $fillable = ['name', 'code', 'address', 'bucategory_id', 'tax', 'follow', 'mail', 'phone', 'remark', 'is_deleted'];

    public function produce() {
        return $this->hasMany('App\produce', 'bu_id', 'id');
    }

    public function proline() {
        return $this->hasManyThrough('App\proline', 'App\produce', 'bu_id', 'pro_id', 'id');
    }
}
