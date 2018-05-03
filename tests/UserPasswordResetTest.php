<?php

class UserPasswordResetTest extends TestCase {

    public function testUserPasswordReset() {
        $email = 'aasumitro@gmail.com';
        $this->json('GET', '/v1/user/data/password/reset?email='.$email)
             ->seeJson([
                'code' => 201,
             ]);
    }

}

// RUN ./vendor/bin/phpunit tests/UserPasswordResetTest.php