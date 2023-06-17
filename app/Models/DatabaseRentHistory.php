<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\DatabaseNurse;

class DatabaseRentHistory extends Model
{
    protected $table = 'database_rent_history';

    protected $primaryKey = 'orderID';

    protected $fillable = [
        'user_id',
        'nurse_id',
        'durasiSewa',
        'paymentDate',
        'paymentStatus',
        'namaBarang',
        'harga',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function nurse()
    {
        return $this->belongsTo(DatabaseNurse::class);
    }
}
