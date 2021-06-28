<?php

use App\Models\User;
use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new User;
    }

    public function testFirstName()
    {
        $this->model->setFirstName('Irsyadul');
        $this->assertEquals('Irsyadul', $this->model->getFirstName());
    }

    public function testLastName()
    {
        $this->model->setLastName('Ibad');
        $this->assertEquals('Ibad', $this->model->getLastName());
    }

    public function testFullName()
    {
        $this->model->setFirstName('Irsyadul');
        $this->model->setLastName('Ibad');
        $fullName = $this->model->getFullName();
        
        $this->assertEquals('Irsyadul Ibad', $fullName);
    }

    public function testEmail()
    {
        $email = 'ahmadirsyadulibad8@gmail.com';

        $this->model->setEmail($email);
        $this->assertEquals($email, $this->model->getEmail());
    }

    public function testFullUserInformation()
    {
        $this->model->setFirstName('Irsyadul');
        $this->model->setLastName('Ibad');
        $this->model->setEmail('ahmadirsyadulibad8@gmail.com');

        $user = $this->model->get();
        $this->assertArrayHasKey('full_name', $user);
        $this->assertArrayHasKey('email', $user);
        $this->assertIsString($user['full_name']);
        $this->assertIsString($user['email']);
    }
}