<?php

class UserRegisterTest extends TestCase {

    public function testUserRegister() {
        $this->json('POST',
                    '/v1/user/auth/signup',
                    [
                        'fullname'  => 'Agus Adhi Sumitro',
                        'username'  => 'asmit',
                        'phone'     => '+6282271115593',
                        'email'     => 'mail@asmith.my.id',
                        'password'  => 'password'
                    ])
                ->seeJson([
                    'error' => false,
                    'message' => 'success created new user'
                ]);
    }

}

// Run ./vendor/bin/phpunit tests/UserRegisterTest.php