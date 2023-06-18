<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\DatabaseNurse;
use App\Models\PerlengkapanBayi;

class DatabaseRentHistory extends Model
{
    protected $table = 'database_rent_history';

    protected $primaryKey = 'orderID';

    protected $fillable = [
        'user_id',
        'nurse_id',
        'durasiSewa',
        'paymentDate',
        'status',
        'namaBarang',
        'harga',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function DatabaseNurse()
    {
        return $this->belongsTo(DatabaseNurse::class);
    }

    public function PerlengkapanBayi()
    {
        return $this->belongsTo(DatabaseNurse::class);
    }
}
