<?php

class UserDataDetailTest extends TestCase {

    public function testUser() {
        $uuid = '2d9c8c5658268a028d302771aa50e5e6';
        $token = 'b44a4c461097f357c40affd246ab8b00';
        $this->json('GET', '/v1/user/data/detail?uuid='.$uuid.'&token='.$token)
             ->seeJson([
                'code' => 200,
             ]);
    }

}

// RUN ./vendor/bin/phpunit tests/UserDataDetailTest.php