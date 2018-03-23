<?php

/* Require */
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

/* Models */
use Bantenprov\OrangTua\Models\Bantenprov\OrangTua\OrangTua;

class BantenprovOrangTuaSeederOrangTua extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
	public function run()
	{
        Model::unguard();        
        $orang_tuas = (object) [
            (object) [
                'nomor_un' => '123456789',
                'no_kk' => '12345',
                'alamat_ortu' => 'alamat 1',
                'nama_ayah' => 'nama ayah 1',
                'nama_ibu' => 'nama ibu 1',
                'kerja_ayah' => 'pekerjaan ayah 1',
                'pendidikan_ayah' => 'pendidikan ayah 1',
                'kerja_ibu' => 'pekerjaan ibu 1',
                'pendidikan_ibu' => 'pendidikan ibu 1',
                'no_telp' => '085212345',
                'user_id' => '1',
            ],
            (object) [
                'nomor_un' => '123456730',
                'no_kk' => '123653',
                'alamat_ortu' => 'alamat 2',
                'nama_ayah' => 'nama ayah 2',
                'nama_ibu' => 'nama ibu 2',
                'kerja_ayah' => 'pekerjaan ayah 2',
                'pendidikan_ayah' => 'pendidikan ayah 2',
                'kerja_ibu' => 'pekerjaan ibu 2',
                'pendidikan_ibu' => 'pendidikan ibu 2',
                'no_telp' => '085222345',
                'user_id' => '2',
            ]
        ];

        foreach ($orang_tuas as $orang_tua) {
            $model = OrangTua::create(
                [
                    'nomor_un' => $orang_tua['nomor_un'],
                    'no_kk' => $orang_tua['no_kk'],
                    'alamat_ortu' => $orang_tua['alamat_ortu'],
                    'nama_ayah' => $orang_tua['nama_ayah'],
                    'nama_ibu' => $orang_tua['nama_ibu'],
                    'kerja_ayah' => $orang_tua['kerja_ayah'],
                    'pendidikan_ayah' => $orang_tua['pendidikan_ayah'],
                    'kerja_ibu' => $orang_tua['kerja_ibu'],
                    'pendidikan_ibu' => $orang_tua['pendidikan_ibu'],
                    'no_telp' => $orang_tua['no_telp'],
                    'user_id' => $orang_tua['user_id'],
                ]
            );
            $model->save();
        }
	}
}
