<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;

class TransactionController extends Controller
{
    public function getTransaction()
    {
        return response()->json(Transaction::all());
    }
}
