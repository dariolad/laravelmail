<?php

namespace App\Services;

class UserService
{
    protected $users;

    public function __construct()
    {
        $this->loadUsersFromJson();
    }

    // Carica gli utenti dal file JSON
    protected function loadUsersFromJson()
    {
        $path = storage_path('users.json');
        $this->users = json_decode(file_get_contents($path), true);
    }

    // Verifica le credenziali dell'utente
    public function authenticate($email, $password)
    {
        foreach ($this->users as $user) {
            if ($user['email'] === $email && $user['password'] === $password) {
                return true;
            }
        }
        return false;
    }
}
