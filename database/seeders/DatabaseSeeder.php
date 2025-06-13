<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Poli;
use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\Jadwal;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // ✅ Buat Admin
        $user = User::updateOrCreate(
            ['email' => 'harun@harun'],
            [
                'name' => 'Harun',
                'password' => bcrypt('12345678'),
                'role' => 'admin'
            ]
        );

        // ✅ Buat Poli
        $polis = [
            [
                'id_poli' => 'POL-00001',
                'nama_poli' => 'Poli Gigi',
                'deskripsi' => 'Pelayanan kesehatan gigi dan mulut',
            ],
            [
                'id_poli' => 'POL-00002',
                'nama_poli' => 'Poli Anak',
                'deskripsi' => 'Pelayanan kesehatan untuk pasien anak-anak',
            ],
            [
                'id_poli' => 'POL-00003',
                'nama_poli' => 'Poli Penyakit Dalam',
                'deskripsi' => 'Pelayanan kesehatan untuk penyakit dalam',
            ],
            [
                'id_poli' => 'POL-00004',
                'nama_poli' => 'Poli Bedah',
                'deskripsi' => 'Pelayanan kesehatan untuk tindakan bedah',
            ],
            [
                'id_poli' => 'POL-00005',
                'nama_poli' => 'Poli Kandungan',
                'deskripsi' => 'Pelayanan kesehatan ibu dan kandungan',
            ],
            [
                'id_poli' => 'POL-00006',
                'nama_poli' => 'Poli Saraf',
                'deskripsi' => 'Pelayanan kesehatan saraf dan neurologi',
            ],
        ];

        foreach ($polis as $poli) {
            Poli::updateOrCreate(['id_poli' => $poli['id_poli']], $poli);
        }

        // ✅ Buat Pasien
        $pasien = Pasien::updateOrCreate(
            ['user_id' => $user->id],
            [
                'id_pasien' => 'PSN-' . str_pad(1, 5, '0', STR_PAD_LEFT),
                'nama_pasien' => 'Jarjit Sin',
                'jenis_kelamin' => 'Laki-laki',
                'tanggal_lahir' => '2000-05-15',
                'no_telp' => '08434344344',
                'alamat' => 'Jl. Perintis'
            ]
        );

        // ✅ Buat Dokter
        $dokters = [
            [
                'id_dokter' => 'DKT-' . str_pad(1, 5, '0', STR_PAD_LEFT),
                'nama_dokter' => 'Farid',
                'id_poli' => 'POL-00001',
                'jenis_kelamin_dokter' => 'Laki-laki',
                'bidang_keahlian' => 'Dokter Gigi',
                'no_telp_dokter' => '08434344344'
            ],
            [
                'id_dokter' => 'DKT-' . str_pad(2, 5, '0', STR_PAD_LEFT),
                'nama_dokter' => 'Budi Santoso',
                'id_poli' => 'POL-00002',
                'jenis_kelamin_dokter' => 'Laki-laki',
                'bidang_keahlian' => 'Spesialis Anak',
                'no_telp_dokter' => '08567890123'
            ],
            [
                'id_dokter' => 'DKT-' . str_pad(3, 5, '0', STR_PAD_LEFT),
                'nama_dokter' => 'Anita Rahayu',
                'id_poli' => 'POL-00003',
                'jenis_kelamin_dokter' => 'Perempuan',
                'bidang_keahlian' => 'Penyakit Dalam',
                'no_telp_dokter' => '08765432109'
            ],
        ];

        foreach ($dokters as $dokter) {
            Dokter::updateOrCreate(['id_dokter' => $dokter['id_dokter']], $dokter);
        }

        // ✅ Buat Jadwal Konsultasi
        $jadwalData = [
            [
                'id_jadwal' => 'JDW-' . str_pad(1, 5, '0', STR_PAD_LEFT),
                'id_pasien' => $pasien->id_pasien,
                'id_dokter' => $dokters[0]['id_dokter'],
                'id_poli' => 'POL-00001',
                'tanggal_konsultasi' => now()->addDays(3)->format('Y-m-d'),
                'jam_konsultasi' => '08:00',
                'status' => 'terdaftar',
                'keluhan' => 'Sakit gigi geraham sebelah kanan'
            ],
            [
                'id_jadwal' => 'JDW-' . str_pad(2, 5, '0', STR_PAD_LEFT),
                'id_pasien' => $pasien->id_pasien,
                'id_dokter' => $dokters[1]['id_dokter'],
                'id_poli' => 'POL-00002',
                'tanggal_konsultasi' => now()->addDays(5)->format('Y-m-d'),
                'jam_konsultasi' => '10:00',
                'status' => 'terdaftar',
                'keluhan' => 'Kontrol rutin tumbuh kembang anak'
            ],
        ];

        foreach ($jadwalData as $data) {
            Jadwal::updateOrCreate(
                ['id_jadwal' => $data['id_jadwal']],
                $data
            );
        }
    }
}
