<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Customer extends Model
{
    use Sortable;
    public $sortable = ['customer_name', 'customer_category', 'pic_id'];

    protected $table = 'customer_table';
    public $timestamps = false;
    protected $primaryKey = 'customer_id';

    public function customer_func() {
        return $this->belongsTo(Pic::class, 'pic_id');
    }
}
