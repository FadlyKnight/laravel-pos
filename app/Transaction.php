<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\TransactionDetail;

class Transaction extends Model
{
    protected $table = 'transaction';
    protected $guarded = [];

    public function user() {
    	return $this->belongsTo(User::class, 'users_id');
    }

    public function transactionDetail() {
        return $this->hasOne(TransactionDetail::class);
    }

    public function rules()
    {
        return [
            'users_id' => 'required',
            'total' => 'required',
            'pay_total' => 'required',
        ];
    }
}
