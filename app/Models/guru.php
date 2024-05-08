<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class guru extends Model
{
    use HasFactory;
    protected $table = 'guru';
    protected $primaryKey = 'id';
    protected $fillable = ['nip','nama','email','alamat','jenis_kelamin','tanggal_lahir'];


}
