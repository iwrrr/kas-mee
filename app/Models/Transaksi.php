<?php

namespace App\Models;

use App\Models\Kas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id_kas',
        'pemasukan',
        'pengeluaran',
        'keuntungan',
    ];

    public function kas()
    {
        return $this->belongsTo(Kas::class, 'id_kas');
    }
}
