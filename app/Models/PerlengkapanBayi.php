<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DatabaseRentHistory;

class PerlengkapanBayi extends Model
{
    use HasFactory;

    protected $table = 'perlengkapanbayis';

    protected $fillable = [
        'namaBarang',
        'hargaBarang',
        'rating',
        'lokasi',
    ];

    public function databaseRentHistory()
    {
        return $this->hasMany(DatabaseRentHistory::class);
    }
}
