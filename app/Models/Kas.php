<?php

namespace App\Models;

use App\Models\User;
use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kas extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'nama',
        'slug',
        'id_user',
        'target',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_kas');
    }
}
