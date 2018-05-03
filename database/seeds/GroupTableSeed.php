<?php

use Illuminate\Database\Seeder;

class GroupTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('groups')->insert([
            [
                'name' => 'root',
                'description' => 'Super level administrator'
            ],
            [
                'name' => 'admin',
                'description' => 'Low level administrator'
            ],
            [
                'name' => 'member',
                'description' => 'Limited access users'
            ]
        ]);
    }
}

