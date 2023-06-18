<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DatabaseRentHistory;
use App\Models\User;

class DatabaseNurse extends Model
{
    use HasFactory;

    protected $table = 'database_nurses';
    protected $fillable = [
        'namaNurse',
        'getNurseReview',
        'asal',
        'tahunPengalaman',
        'spesialis',
        'beratNurse',
        'tinggiNurse',
        'statusNurse',
        'TTLNurse',
        'workExperience',
        'reviewNurse',
        'ratingNurse',
        'harga',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function databaseRentHistory()
    {
        return $this->hasMany(DatabaseRentHistory::class);
    }
}
