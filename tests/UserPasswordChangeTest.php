<?php

class UserPasswordChangeTest extends TestCase {

    public function testUserPasswordChange() {
        $uuid = '2d9c8c5658268a028d302771aa50e5e6';
        $token = 'b44a4c461097f357c40affd246ab8b00';
        $this->json('POST', '/v1/user/data/password/change?uuid='.$uuid.'&token='.$token,
                    [
                        'password_old' => 'password',
                        'password_new' => 'password'
                    ])
             ->seeJson([
                'code' => 201,
             ]);
    }

}

// RUN ./vendor/bin/phpunit tests/UserPasswordChangeTest.php