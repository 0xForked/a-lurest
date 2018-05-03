<?php

class JSONTest extends TestCase {

    /**
     * A basic test example for view.
     *
     * @return void
     */
    public function testVersion() {
        $this->json('GET', '/version')
             ->seeJson([
                'version' => $this->app->version(),
             ]);
    }

    public function testAbout() {
        $this->json('GET', '/about', ['name' => 'Agus Adhi Sumitro'])
             ->seeJson([
                'email' => 'aasumitro@gmail.com',
             ]);
    }

}

// Run ./vendor/bin/phpunit tests/JSONTest.php
