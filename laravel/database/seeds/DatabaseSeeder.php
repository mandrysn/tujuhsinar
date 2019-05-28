<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        // $this->call(MemberSeed::class);
        // $this->call(PelangganSeed::class);
        // $this->call(SupplierSeed::class);
        // $this->call(BarangSeed::class);
        // $this->call(EditorsTableSeed::class);
        // $this->call(KakisTableSeed::class);
        // $this->call(UkuranBahanSeeder::class);
        $this->call(HargaSeed::class);
        $this->call(HargaOutdoorSeed::class);
        $this->call(HargaIndoorSeed::class);
        $this->call(HargaMerchantSeed::class);
        $this->call(HargaCostumSeed::class);
        $this->call(HargaPrintSeed::class);
        $this->call(OrderKerjaSeed::class);
        $this->call(OrderKerjaSubSeed::class);
    }
}
