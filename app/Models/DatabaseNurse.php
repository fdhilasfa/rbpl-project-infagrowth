<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatabaseNurse extends Model
{
    use HasFactory;

    protected $table = 'database_nurse';
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
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function DatabaseRentHistory()
    {
        return $this->hasMany(DatabaseRentHistory::class);
    }
}
