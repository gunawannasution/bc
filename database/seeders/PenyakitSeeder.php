<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenyakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $penyakits = DB::table('penyakits')->get();
        $kodeAwal = 1;
        foreach ([
                    ['nama' => 'Diabetes Mellitus', 'deskripsi' => 'Penyakit ini disebabkan oleh ketidakmampuan tubuh dalam memproduksi insulin atau resistensi insulin.'],
                    ['nama' => 'Hipertensi', 'deskripsi' => 'Tekanan darah tinggi yang dapat menyebabkan kerusakan pada organ tubuh.'],
                    ['nama' => 'Tuberkulosis (TBC)', 'deskripsi' => 'Penyakit infeksi yang disebabkan oleh bakteri Mycobacterium tuberculosis yang menyerang paru-paru.'],
                    ['nama' => 'Asma', 'deskripsi' => 'Penyakit pernapasan yang menyebabkan saluran udara menjadi sempit dan sulit bernapas.'],
                    ['nama' => 'Stroke', 'deskripsi' => 'Gangguan aliran darah ke otak yang dapat merusak jaringan otak.'],
                    ['nama' => 'Gastritis', 'deskripsi' => 'Peradangan pada lapisan lambung yang menyebabkan rasa sakit dan gangguan pencernaan.'],
                    ['nama' => 'Kanker Paru-paru', 'deskripsi' => 'Penyakit kanker yang dimulai di paru-paru dan sering kali berhubungan dengan merokok.'],
                    ['nama' => 'Penyakit Jantung Koroner', 'deskripsi' => 'Penyakit yang disebabkan oleh penyumbatan pembuluh darah yang memasok darah ke jantung.'],
                    ['nama' => 'Malaria', 'deskripsi' => 'Penyakit yang disebabkan oleh parasit Plasmodium yang ditularkan melalui gigitan nyamuk Anopheles.'],
                    ['nama' => 'HIV/AIDS', 'deskripsi' => 'Infeksi virus HIV yang merusak sistem kekebalan tubuh dan dapat berkembang menjadi AIDS.'],
                    ['nama' => 'Hepatitis B', 'deskripsi' => 'Infeksi virus yang menyebabkan peradangan hati dan dapat mengarah pada kerusakan hati serius.'],
                    ['nama' => 'Gagal Ginjal', 'deskripsi' => 'Kondisi di mana ginjal tidak dapat menyaring limbah dan cairan secara efektif.'],
                    ['nama' => 'Penyakit Alzheimer', 'deskripsi' => 'Gangguan neurodegeneratif yang menyebabkan penurunan fungsi kognitif dan ingatan.'],
                    ['nama' => 'Penyakit Parkinson', 'deskripsi' => 'Penyakit yang memengaruhi sistem saraf, menyebabkan tremor, kekakuan otot, dan gangguan gerakan.'],
                    ['nama' => 'Sakit Kepala Migrain', 'deskripsi' => 'Sakit kepala parah yang disertai gejala seperti mual dan sensitif terhadap cahaya.'],
                    ['nama' => 'Penyakit Celiac', 'deskripsi' => 'Gangguan pencernaan yang disebabkan oleh intoleransi terhadap gluten.'],
                    ['nama' => 'Penyakit Autoimun', 'deskripsi' => 'Kondisi di mana sistem kekebalan tubuh menyerang sel-sel tubuh sendiri.'],
                    ['nama' => 'Osteoartritis', 'deskripsi' => 'Penyakit sendi yang menyebabkan peradangan dan kerusakan pada tulang rawan sendi.'],
                    ['nama' => 'Infeksi Saluran Kemih (ISK)', 'deskripsi' => 'Infeksi yang terjadi di saluran kemih, termasuk ginjal, ureter, dan kandung kemih.'],
                    ['nama' => 'Depresi', 'deskripsi' => 'Gangguan suasana hati yang menyebabkan perasaan sedih, kehilangan minat, dan kelelahan.'],
                ] as $penyakit) {
                    $kode = 'P' . str_pad($kodeAwal++, 3, '0', STR_PAD_LEFT); 
            
                DB::table('penyakits')->insert([
                    'kode' => $kode,
                    'nama' => $penyakit['nama'],
                    'deskripsi' => $penyakit['deskripsi'],
                    ]);
                }
    }
}
