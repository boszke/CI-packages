<?php

class UserTest extends TestCase
{

    public function test_getUser()
    {
        $user = new app\models\User();
        $actual = $user->getUser(1);
        $expected = 'michal';
        $this->assertEquals($expected, $actual);
    }

}
