<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulangan extends Model
{
    use HasFactory;
    protected $table = 'ulangan';
    protected $fillable = [
        'jadwal_id',
        'judul',
        'type',
        'file_or_link',
        'description',
        'pengumpulan',
        'tanggal',
        'pertemuan',
        'semester',
        'kelas_id',
        'tahun_ajaran'
    ];

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
