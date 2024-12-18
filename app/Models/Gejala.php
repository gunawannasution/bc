<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    use HasFactory;
    protected $table='gejalas';
    protected $fillable = ['kode', 'nama'];

    public function aturans()
    {
        return $this->hasMany(Aturan::class);
    }

    public function penyakits()
    {
        return $this->belongsToMany(Penyakit::class, 'aturans');
    }

    protected static function booted()
    {
        static::creating(function ($gejala) {
            if (!$gejala->kode) {
                $lastId = self::max('id'); 
                $gejala->kode = 'G' . str_pad($lastId + 1, 3, '0', STR_PAD_LEFT); 
            }
        });
    }
}
