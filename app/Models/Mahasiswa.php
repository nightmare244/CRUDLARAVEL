<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    use hasFactory;

    protected $table = 'mahasiswa';

    protected $fillable = [
        'nim',
        'nama',
        'alamat',
        'no_hp',
        'jurusan',
    ];
}
