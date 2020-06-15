<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\CheckoutRequest;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout(CheckoutRequest $request)
    {
        //untuk membuat transaksi baru
        $data = $request->except('transaction_details');
        $data['uuid'] = 'TRX' . mt_rand(10000,99999) . mt_rand(100,999);
        
        //memasukkan data $data ke tabel transaction
        $transaction = Transaction::create($data);

        foreach ($request->transaction_details as $product)
        {
            //membuat array utk memasukkan transaction_details
            $details[] = new TransactionDetail([
                'transactions_id' => $transaction->id,
                'products_id' => $product,
            ]);

            //membuat pengurangan di sisi product
            Product::find($product)->decrement('quantity');
        }

        //menyimpan detail transaksi
        $transaction->details()->saveMany($details);

        return ResponseFormatter::success($transaction);

    }
}