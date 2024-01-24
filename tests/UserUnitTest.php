<?php

namespace App\Tests;


use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $user = new User();

        $user->setEmail('test@gmail.com')
            ->setPassword('password')
            ->setRoles(['ROLE_USER']);

        $this->assertTrue($user->getEmail() === 'test@gmail.com');
        $this->assertTrue($user->getPassword() === 'password');
        $this->assertTrue($user->getRoles() === ['ROLE_USER']);
    }

    public function testIsFalse()
    {
        $user = new User();

        $user->setEmail('test@gmail.com')
            ->setPassword('password')
            ->setRoles(['ROLE_USER']);

        $this->assertFalse($user->getEmail() === 'false@gmail.com');
        $this->assertFalse($user->getPassword() === 'false');
        $this->assertFalse($user->getRoles() === ['ROLE_ADMIN']);
    }

    public function testIsEmpty()
    {
        $user = new User();

        $this->assertEmpty($user->getEmail());
        $this->assertEmpty($user->getPassword());
        $this->assertEquals(['ROLE_USER'], $user->getRoles());
    }

}
