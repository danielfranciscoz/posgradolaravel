<?php

use Illuminate\Database\Seeder;
use App\Models\Pago;
class PagosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pago::create([
            'user_id'=>'1'
        ]);
    }
}
