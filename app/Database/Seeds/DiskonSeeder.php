<?php

    namespace App\Database\Seeds;

    use CodeIgniter\Database\Seeder;
    use CodeIgniter\I18n\Time; // Import class Time

    class DiskonSeeder extends Seeder
    {
        public function run()
        {
            $data = [];
            $today = new Time('now', 'Asia/Jakarta'); // Menggunakan zona waktu Jakarta

            // Opsi nominal diskon (sesuai contoh soal ada 100000, 200000, 300000)
            $nominalOptions = [100000, 200000, 300000, 150000, 250000];

            // Generate 10 data untuk hari ini dan 9 hari ke depan
            for ($i = 0; $i < 10; $i++) {
                $data[] = [
                    'tanggal'    => $today->addDays($i)->toDateString(),
                    'nominal'    => $nominalOptions[array_rand($nominalOptions)], // Ambil nominal acak
                    'created_at' => Time::now('Asia/Jakarta'),
                    'updated_at' => Time::now('Asia/Jakarta'),
                ];
            }

            // Menggunakan Query Builder untuk insert banyak data sekaligus (insertBatch)
            $this->db->table('diskon')->insertBatch($data);
        }
    }