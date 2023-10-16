<?php

namespace Model;

use Model\UsuarioActivo;
use Model\UsuarioModel;

class LoginModel
{
    private $usuarios;

    public function __construct() {
        $this->inicializarUsuarios();
    }

    public function inicializarUsuarios() {
        // Inicializar usuarios con nombres y contraseñas
        $this->usuarios['usuario1'] = new UsuarioModel('usuario1', 'clave1', new UsuarioActivo());
        $this->usuarios['usuario2'] = new UsuarioModel('usuario2', 'clave2', new UsuarioActivo());
        $this->usuarios['usuario3'] = new UsuarioModel('usuario3', 'clave3', new UsuarioActivo());
    }

    // En el modelo (modelos/Modelo.php)
    public function getUsuario($usuario) {
        return isset($this->usuarios[$usuario]) ? $this->usuarios[$usuario] : null;
    }

    public function verificarCredenciales($usuario, $clave) {
        return $this->usuarios[$usuario]->getEstado()->verificarCredenciales($this, $usuario, $clave);
    }

    public function incrementarIntentosFallidos($usuario) {
        $this->usuarios[$usuario]->getEstado()->incrementarIntentosFallidos($this, $usuario);
    }

    public function resetearIntentosFallidos($usuario) {
        $this->usuarios[$usuario]->getEstado()->resetearIntentosFallidos($this, $usuario);
    }

    public function obtenerIntentosFallidos($usuario) {
        return $this->usuarios[$usuario]->getEstado()->obtenerIntentosFallidos($this, $usuario);
    }
}
