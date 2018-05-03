<?php

use Illuminate\Database\Seeder;

class AsmitProjectTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('asmit_project')->insert([
            [
                'awp_author_id' => 445,
                'awp_slug' => 'the-first-project',
                'awp_category' => 'fullstack',
                'awp_tags' => 'first project, just test',
                'awp_title' => 'The first project',
                'awp_description' => 'this project is build with love',
                'awp_headline' => 'isOrdinary',
                'awp_status' => 'isPublished',
                'awp_link_android' => 'https://play.google.com',
                'awp_link_osx' => 'https://itunes.apple.com',
                'awp_link_web' => 'https://first.id',
                'awp_link_web_demo' => null,
                'awp_link_github' => null,
                'awp_link_guide' => null,
                'awp_logo' => 'first_project.png'

            ]
        ]);
    }
}
