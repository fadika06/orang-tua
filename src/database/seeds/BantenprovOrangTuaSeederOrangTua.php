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
                'label' => 'G2G',
                'description' => 'Goverment to Goverment',
            ],
            (object) [
                'label' => 'G2E',
                'description' => 'Goverment to Employee',
            ],
            (object) [
                'label' => 'G2C',
                'description' => 'Goverment to Citizen',
            ],
            (object) [
                'label' => 'G2B',
                'description' => 'Goverment to Business',
            ],
        ];

        foreach ($orang_tuas as $orang_tua) {
            $model = OrangTua::updateOrCreate(
                [
                    'label' => $orang_tua->label,
                ],
                [
                    'description' => $orang_tua->description,
                ]
            );
            $model->save();
        }
	}
}
