<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


use  App\Models\users;
use App\Models\seller;
use App\Models\buyer;
use App\Models\purchase_invoice;




use Faker\Factory as Faker;


class test extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker= Faker::create();
        for ($i=1; $i <=9999; $i++) { 






                // Create a new Invoice instance
    $invoice = new purchase_invoice;

    // Assign form field values to the Invoice instance
    $invoice->item = $faker->address;
    $invoice->rate_type = $faker->address;
    $invoice->vehicle_No = $faker->address;
    $invoice->crate_type = $faker->address;
    $invoice->crate_qty = $faker->address;
    $invoice->hen_qty = $faker->address;
    $invoice->gross_weight	 = $faker->address;
    $invoice->actual_rate = $faker->address;
    $invoice->feed_cut = $faker->address;
    $invoice->mor_cut = $faker->address;
    $invoice->crate_cut = $faker->address;
    $invoice->avg = $faker->address;
    $invoice->n_weight = $faker->address;
    $invoice->rate_diff = $faker->address;
    $invoice->rate = $faker->address;
    $invoice->amount = $faker->address;

    // Save the Invoice instance
    $invoice->save();





        }
    }
}
