<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GejalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $penyakits = DB::table('gejalas')->get();
        $kodeAwal = 1;
        foreach ([
            ['nama' => 'Sering merasa haus'],
            ['nama' => 'Sering buang air kecil'],
            ['nama' => 'Kelelahan yang berlebihan'],
            ['nama' => 'Mudah marah'],
            
            ['nama' => 'Sakit kepala'],
            ['nama' => 'Pusing'],
            ['nama' => 'Sesak napas'],
            ['nama' => 'Darah keluar dari hidung'],
            
            ['nama' => 'Batuk berdarah'],
            ['nama' => 'Keringat malam'],
            ['nama' => 'Penurunan berat badan'],
            ['nama' => 'Nyeri dada'],
            
            ['nama' => 'Kesulitan bernapas'],
            ['nama' => 'Batuk yang parah'],
            ['nama' => 'Dada terasa sesak'],
            ['nama' => 'Mengi saat bernapas'],
            
            ['nama' => 'Kehilangan keseimbangan'],
            ['nama' => 'Kebingungan'],
            ['nama' => 'Kesulitan berbicara'],
            ['nama' => 'Kelumpuhan'],
            
            ['nama' => 'Nyeri perut'],
            ['nama' => 'Mual'],
            ['nama' => 'Muntah'],
            ['nama' => 'Kehilangan nafsu makan'],
            
            ['nama' => 'Batuk berkepanjangan'],
            ['nama' => 'Lelah'],
            
            ['nama' => 'Demam'],
            ['nama' => 'Keringat malam'],
            ['nama' => 'Nyeri otot'],
            ['nama' => 'Menggigil'],
            
            ['nama' => 'Penurunan berat badan drastis'],
            ['nama' => 'Demam berkepanjangan'],
            ['nama' => 'Kelelahan'],
            
            ['nama' => 'Kulit dan mata menguning'],
            
            ['nama' => 'Pembengkakan kaki'],
            ['nama' => 'Penurunan jumlah urine'],
            
            ['nama' => 'Lupa'],
            ['nama' => 'Perubahan suasana hati'],
            ['nama' => 'Kesulitan melakukan aktivitas sehari-hari'],
            
            ['nama' => 'Tremor atau gemetar'],
            ['nama' => 'Kekakuan otot'],
            ['nama' => 'Kehilangan keseimbangan'],
            ['nama' => 'Kesulitan bergerak'],
            
            ['nama' => 'Sensitif terhadap cahaya'],
            ['nama' => 'Sensitif terhadap suara'],
            
            ['nama' => 'Diare'],
            ['nama' => 'Kembung'],
            
            ['nama' => 'Nyeri sendi'],
            ['nama' => 'Pembengkakan sendi'],
            ['nama' => 'Kesulitan bergerak'],
            ['nama' => 'Kekakuan sendi'],
            
            ['nama' => 'Perasaan sedih yang berlebihan'],
            ['nama' => 'Kehilangan minat'],
            ['nama' => 'Kesulitan tidur'],
                ] as $penyakit) {
                    $kode = 'G' . str_pad($kodeAwal++, 3, '0', STR_PAD_LEFT); 
                DB::table('gejalas')->insert([
                    'kode' => $kode,
                    'nama' => $penyakit['nama'],
                    // 'deskripsi' => $penyakit['deskripsi'],
                    ]);
          }     
                    
    }
}



