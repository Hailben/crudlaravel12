<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable=['nama', 'kelas', 'jurusan'];

    //satu siswa milik 1kelas
    public function kelas() {
        return $this->belongsTo(kelas::class);
    }
}