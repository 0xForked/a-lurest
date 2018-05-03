<?php

use Illuminate\Database\Seeder;

class AsmitMessageTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('asmit_message')->insert([
            [
                'awm_sender_name' => 'Muh. Rizal',
                'awm_sender_email' => 'rizalstw@merahputih.id',
                'awm_message_title' => 'Hanya menyapa!',
                'awm_message_body' => 'Hai, i just wanna say hello to you.',
                'awm_message_status' => 'UnReplied'
            ],
            [
                'awm_sender_name' => 'Evert T.',
                'awm_sender_email' => 'evertstw@merahputih.id',
                'awm_message_title' => 'Just want to send a message!',
                'awm_message_body' => 'Hai, i just wanna send you a message',
                'awm_message_status' => 'Replied'
            ]
        ]);
    }
}
