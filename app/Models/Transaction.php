<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'payer_id',
        'payee_id',
        'amount',
        'type',
    ];

    public function payer()
    {
        return $this->belongsTo(User::class, 'payer_id');
    }
    
    public function payee()
    {
        return $this->belongsTo(User::class, 'payee_id');
    }
}
