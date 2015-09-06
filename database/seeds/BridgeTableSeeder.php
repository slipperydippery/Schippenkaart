<?php

use Illuminate\Database\Seeder;

class BridgeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('bridges')->delete();

        $bridges = array(
            array(
                'name' => 'Provinciale Brug',
                'openings_total' => '0'
                
            ),
            array(
                'name' => 'Trambrug',
                'openings_total' => '0'

            ),
            array(
                'name' => 'Kwakelbrug',
                'openings_total' => '0'

            ),
            array(
                'name' => 'Constabelbrug',
                'openings_total' => '0'

            ),
            array(
                'name' => 'Baanbrug',
                'openings_total' => '0'

            ),
            array(
                'name' => 'Kettingbrug',
                'openings_total' => '0'

            ),
        );

        DB::table('bridges')->insert($bridges);
    }
}
