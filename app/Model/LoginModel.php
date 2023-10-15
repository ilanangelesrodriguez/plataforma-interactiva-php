<?php

namespace Model;

use View\LoginObserver;

class LoginModel
{
    private $observers = [];
    private $users = [
        'usuario1' => ['password' => 'clave1'],
        'usuario2' => ['password' => 'clave2'],
        // ... otros usuarios
    ];

    public function addObserver(LoginObserver $observer)
    {
        $this->observers[] = $observer;
    }

    public function authenticate($username, $password)
    {
        // Lógica de autenticación
        if (isset($this->users[$username]) && $this->users[$username]['password'] === $password) {
            // Notificar a los observadores sobre el cambio de estado
            foreach ($this->observers as $observer) {
                $observer->update($username, $password);
            }
            return true; // Autenticación exitosa
        }

        return false; // Autenticación fallida
    }
}

// Resto del código ...
