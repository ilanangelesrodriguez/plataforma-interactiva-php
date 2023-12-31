<?php

namespace Model\Login;

require_once 'UsuarioModel.php';

class LoginModel
{
    private $usuarios;

    public function __construct()
    {
        $this->inicializarUsuarios();
    }

    private function inicializarUsuarios()
    {

        $this->usuarios['estudiante'] = UsuarioModel::crearUsuario('Ilan', 'clave1');
        $this->usuarios['docente'] = UsuarioModel::crearUsuario('Docente', 'clave2');
        $this->usuarios['rector'] = UsuarioModel::crearUsuario('Rector', 'clave3');

    }

    public function verificarCredenciales($usuario, $clave)
    {

        $usuarioModel = $this->getUsuario($usuario);

        if ($usuarioModel !== null) {
            return $usuarioModel->verificarCredenciales($clave);
        }

        return false;

    }

    public function registrarUsuario($nombre, $usuario, $password)
    {
        // Verifica si el usuario ya existe
        if ($this->usuarioExiste($usuario)) {
            return false; // Usuario ya registrado
        }

        // Agrega el usuario si no está registrado
        $this->usuarios[$usuario] = UsuarioModel::crearUsuario($nombre, $password);
        return true;
    }

    private function usuarioExiste($usuario)
    {
        return isset($this->usuarios[$usuario]);
    }

    public function getUsuario($nombre)
    {
        return isset($this->usuarios[$nombre]) ? $this->usuarios[$nombre] : null;
    }

}
