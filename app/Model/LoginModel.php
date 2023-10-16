<?php

namespace Model;

class LoginModel
{
    private $usuarios;

    public function __construct()
    {
        $this->inicializarUsuarios();
    }

    private function inicializarUsuarios()
    {
        // Inicializar usuarios como instancias de la clase Usuario
        $this->usuarios['usuario1'] = UsuarioModel::crearUsuario('usuario1', 'clave1');
        $this->usuarios['usuario2'] = UsuarioModel::crearUsuario('usuario2', 'clave2');
        $this->usuarios['usuario3'] = UsuarioModel::crearUsuario('usuario3', 'clave3');
    }

    public function verificarCredenciales($usuario, $clave)
    {
        // Verificar credenciales llamando al método en Usuario
        return isset($this->usuarios[$usuario]) && $this->usuarios[$usuario]->verificarCredenciales($clave);
    }

    public function getUsuario($nombre)
    {
        return isset($this->usuarios[$nombre]) ? $this->usuarios[$nombre] : null;
    }
}

