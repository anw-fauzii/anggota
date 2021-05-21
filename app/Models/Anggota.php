<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;
    protected $table= 'anggota';
    protected $fillable = [
        'nama',
        'nta',
        'pangkalan',
        'tempat',
        'tgl_lahir',
        'agama',
        'gol',
        'kwaran',
        'kwarcab',
        'goldar',
    ]; 
    public function merk(){
        return $this->belongsTo(Merk::class);
    }
}