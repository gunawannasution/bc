<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    use HasFactory;
    protected $table='penyakits';

    protected $fillable = ['kode', 'nama', 'deskripsi'];

    public function aturans()
    {
        return $this->hasMany(Aturan::class);
    }

    public function gejalas()
    {
        return $this->belongsToMany(Gejala::class, 'aturans');
    }

    protected static function booted()
    {
        static::creating(function ($penyakit) {
            if (!$penyakit->kode) {
                $lastId = self::max('id'); 
                $penyakit->kode = 'P' . str_pad($lastId + 1, 3, '0', STR_PAD_LEFT);
            }
        });
    }
}
