<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class UserLoginTest extends TestCase {

    public function testUserLogin() {
        $response = $this->call('POST', '/v1/user/auth/signin',
                                [
                                    'email' => 'aasumitro@gmail.com',
                                    'password' => 'newpassword'
                                ]);
        $this->assertEquals(200, $response->status());
    }

}

// Run ./vendor/bin/phpunit tests/UserLoginTest.php
