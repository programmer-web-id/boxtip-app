<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\IrSequence;

class IrSequenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IrSequence::create([
            'model' => 'res_partners',
            'sequence_code' => 'create.customer',
            'prefix' => 'BOX',
            'is_number' => true,
            'length' => 3,
            'running_number' => 1,
        ]);
        IrSequence::create([
            'model' => 'vouchers',
            'sequence_code' => 'signup.voucher',
            'prefix' => 'NEW-',
            'is_number' => false,
            'length' => 7,
        ]);
    }
}
