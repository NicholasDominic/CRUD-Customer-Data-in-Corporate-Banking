<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pic extends Model
{
    protected $table = 'pic_table';
    public $timestamps = false;
    protected $primaryKey = 'pic_id';

    public function pic_func() {
        return $this->hasMany(Customer::class, 'pic_id');
    }
}
