<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\TransactionDetail;
use Illuminate\Support\Facades\Validator;

class Transaction extends Model
{
    protected $table = 'transaction';
    protected $guarded = [];

    public function user() {
        // $this->belongsToMany()
    	return $this->belongsToMany(User::class, 'users_id', 'id');
    }

    public function transactionDetail() {
        return $this->hasOne(TransactionDetail::class, 'transaction_id', 'id');
    }

    public function rules()
    {
        return [
            'users_id' => 'required',
            'total' => 'required',
            'pay_total' => 'required',
        ];
    }

    public function validation($data, Array $rules = [])
    {
        return Validator::make($data, $rules);
    }
}
