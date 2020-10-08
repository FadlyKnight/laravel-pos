<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use Illuminate\Support\Facades\Auth;
use App\TransactionDetail;
use App\TransactionTemporary;
use DB;

class TransactionController extends Controller
{
    public function getTransaction()
    {
        return response()->json(Transaction::all());
    }

    public function transactionTemp()
    {
        TransactionTemporary::create(request()->all());
        return response()->json([ 'status' => true, 'messages' => 'Product Added' ]);   
    }

    public function storeTransaction()
    {

        DB::beginTransaction();
        $data = [
            'total' => 150000,
            'pay_total' => 150000,
        ];
        $data['users_id'] = auth()->user()->id;

        $transaction = new Transaction;
        $validator = $transaction->validation($data, $transaction->rules());
        
        try {
            $db = auth()->user()->transaction();

            if ( $validator->fails() ) {
                return response()->json([ 'status' => false, 'message' => $validator->messages() ]);
            };

            $db->create($data)
            ->transactionDetail()
            ->createMany(TransactionTemporary::all()->map(function ($transTemp) { 
                $product = Product::where('id', $transTemp->product_id)->first();
                $product->stock = $product->stock - $transTemp->qty;
                $product->save();
                return [
                    'product_id' => $transTemp->product_id,
                    'qty' => $transTemp->qty,
                    'subtotal' => $transTemp->product->price * $transTemp->qty
                ];
            })->toArray());
            DB::table('transaction_temporary')->delete();
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }

        return 'sukses';
        /*
        $transaction = new Transaction;
        $transactionDetail = new TransactionDetail;
        $data = $request->all();
        $data['users_id'] = Auth::user()->id;

        $validator = $transaction->validation($data, $transaction->rules());
        if( $validator->fails() ) {
            return response()->json(['status' => false, 'message' => $validator->messages()]);
        }
        $transaction::create($data);
        $validatorDetail = $transactionDetail->validation($data, $transaction->rules());
        */
        // if( $validatorDetail )

        // return response()->json(['status' => true, 'message' => 'Transaction Added']);


    }

}
