<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $fillable=['nama'];

    //satu kelas punya banyak siswa
    public function siswa() {
        return $this->hasMany(siswa::class);
    }
}