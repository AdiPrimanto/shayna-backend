<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Http\Requests\API\CheckoutRequest;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{    
    public function checkout(CheckoutRequest $request){
        $data = $request->except('transaction_details');
        $data['uuid'] = 'TRX' . mt_rand(10000,99999) . mt_rand(100,999);

        //untuk membuat transaksi baru
        //memasukkan data $data ke tabel transaction
        $transaction = Transaction::create($data);

        //membuat array utk memasukkan transaction_details
        foreach($request->transaction_details as $product){
            $details[] = new TransactionDetail([
                'transaction_id' => $transaction->id,
                'products_id' => $product
            ]);

            //membuat pengurangan di sisi product
            Product::find($product)->decrement('quantity');
        }

        //menyimpan detail transaksi
        $transaction->details()->saveMany($details);

        return ResponseFormatter::success($transaction);
    }
}
