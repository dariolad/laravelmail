<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\UserService;

class UserAuthenticationTest extends TestCase
{
    public function test_authenticate_user_success()
    {
        $userService = new UserService();

        // Test con credenziali corrette
        $result = $userService->authenticate('utente1@example.com', 'password1');

        $this->assertTrue($result, 'Autenticazione utente fallita con credenziali corrette.');
    }

    public function test_authenticate_user_failure()
    {
        $userService = new UserService();

        // Test con credenziali errate
        $result = $userService->authenticate('utente1@example.com', 'passwordErrata');

        $this->assertFalse($result, 'Autenticazione utente riuscita con credenziali errate.');
    }
}
