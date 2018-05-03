<?php

use Illuminate\Database\Seeder;

class AsmitArticleCategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('asmit_category')->insert([
            [
                'awac_slug' => 'uncategory',
                'awac_title' => 'uncategory',
                'awac_description' => 'this uncategory category',
                'awac_count' => '0',
            ],
            [
                'awac_slug' => 'blow-mid',
                'awac_title' => 'blow mind',
                'awac_description' => 'this blow mind category',
                'awac_count' => '0',
            ],
            [
                'awac_slug' => 'mobile-development',
                'awac_title' => 'mobile',
                'awac_description' => 'this mobile category',
                'awac_count' => '0',
            ],
            [
                'awac_slug' => 'web-development',
                'awac_title' => 'web',
                'awac_description' => 'this web category',
                'awac_count' => '0',
            ],
            [
                'awac_slug' => 'android-app',
                'awac_title' => 'android',
                'awac_description' => 'this android category',
                'awac_count' => '0',
            ],
            [
                'awac_slug' => 'ios-app',
                'awac_title' => 'ios',
                'awac_description' => 'this ios category',
                'awac_count' => '0',
            ],
            [
                'awac_slug' => 'java-lang',
                'awac_title' => 'java',
                'awac_description' => 'this java category',
                'awac_count' => '0',
            ],
            [
                'awac_slug' => 'kotlin-lang',
                'awac_title' => 'kotlin',
                'awac_description' => 'this kotlin category',
                'awac_count' => '0',
            ],
            [
                'awac_slug' => 'php-lang',
                'awac_title' => 'php',
                'awac_description' => 'this php category',
                'awac_count' => '0',
            ],
            [
                'awac_slug' => 'js-lang',
                'awac_title' => 'javascript',
                'awac_description' => 'this javascript category',
                'awac_count' => '0',
            ],
        ]);
    }
}
