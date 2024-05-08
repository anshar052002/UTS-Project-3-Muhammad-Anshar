<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class siswa extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_siswa';
    protected $table = 'siswa';
    protected $fillable =['nis','nama','alamat','jenis_kelamin','tanggal_lahir','email','id_kelas'];

    public function kelas (): BelongsTo
    {
        return $this->belongsTo(kelas::class, 'id_kelas','id_kelas');
    }
}
