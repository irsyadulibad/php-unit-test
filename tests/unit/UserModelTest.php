<?php

use App\Models\User;
use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{
    protected function setUp(): void
    {
        $this->model = new User;
    }

    /** @test */
    public function it_can_set_first_name()
    {
        $this->model->setFirstName('Irsyadul');
        $this->assertEquals('Irsyadul', $this->model->getFirstName());
    }

    /** @test */
    public function it_can_set_last_name()
    {
        $this->model->setLastName('Ibad');
        $this->assertEquals('Ibad', $this->model->getLastName());
    }

    /** @test */
    public function can_get_full_name()
    {
        $this->model->setFirstName('Irsyadul');
        $this->model->setLastName('Ibad');
        $fullName = $this->model->getFullName();
        
        $this->assertEquals('Irsyadul Ibad', $fullName);
    }

    /** @test */
    public function it_can_set_email()
    {
        $email = 'ahmadirsyadulibad8@gmail.com';

        $this->model->setEmail($email);
        $this->assertEquals($email, $this->model->getEmail());
    }

    /** @test */
    public function it_can_return_valid_user_information()
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