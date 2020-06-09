<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionDetail extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'products_id', 'transaction_id'
    ];

    //ada bbrp variabel(cth: name) yg gk mau kita munculin kita bs masukan ke hidden
    protected $hidden = [
        
    ];

    public function details() {
        return $this->hasMany(TransactionDetail::class, 'transaction_id');
    }
}
