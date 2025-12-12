<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoreBalance extends Model
{
    protected $fillable = [
        'store_id',
        'balance',
    ];

    protected $casts = [
        'balance' => 'decimal:2'
    ];

    public static function addToStore($storeId, $amount)
{
    $balance = self::firstOrCreate(
        ['store_id' => $storeId],
        ['balance' => 0]
    );

    $balance->balance += $amount;
    $balance->save();

    StoreBalanceHistory::create([
        'store_balance_id' => $balance->id,
        'type' => 'in',   
        'reference_id' => null,
        'reference_type' => 'transaction',
        'amount' => $amount,
        'remarks' => 'Pembayaran transaksi',
    ]);

    return $balance;
}

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function storeBalanceHistories()
    {
        return $this->hasMany(StoreBalanceHistory::class);
    }

    public function withdrawals()
    {
        return $this->hasMany(Withdrawal::class);
    }
}
