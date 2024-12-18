<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aturan extends Model
{
    use HasFactory;
    protected $table='aturans';
    protected $fillable = ['penyakit_id', 'gejala_id'];

    public function penyakit()
    {
        return $this->belongsTo(Penyakit::class);
    }

    public function gejala()
    {
        return $this->belongsTo(Gejala::class);
    }

    protected static function booted()
    {
        static::creating(function ($aturan) {
            if (!$aturan->kode) {
                $lastId = self::max('id');
                $aturan->kode = 'A' . str_pad($lastId + 1, 3, '0', STR_PAD_LEFT); 
            }
        });
    }
}
