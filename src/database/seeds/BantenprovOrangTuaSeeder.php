<?php

use Illuminate\Database\Seeder;

class BantenprovOrangTuaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(BantenprovOrangTuaSeederOrangTua::class);
    }
}
