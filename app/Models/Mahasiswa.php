<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    
    protected $fillable = ['nama','alamat','nomor_telp','tempat_lahir'];
                            












    /** @use HasFactory<\Datab'ase\Factories\MahasiswaFactory> */
    use HasFactory;
}
