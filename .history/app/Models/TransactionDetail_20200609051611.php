<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionDetail extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'products_id', 'transactions_id'
    ];

    //ada bbrp variabel(cth: name) yg gk mau kita munculin kita bs masukan ke hidden
    protected $hidden = [
        
    ];

    //relasi ke tabel transaction
    public function transaction() {
        return $this->belongsTo(Transaction::class, 'transactions_id');
    }
}
