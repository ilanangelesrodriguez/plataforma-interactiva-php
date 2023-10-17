<?php

namespace Model;

require_once 'UsuarioModel.php'; // Asegúrate de que la ruta sea correcta

class LoginModel
{
    private $usuarios;

    public function __construct()
    {
        $this->inicializarUsuarios();
    }

    private function inicializarUsuarios()
    {
        // Inicializar usuarios como instancias de la clase UsuarioModel
        $this->usuarios['estudiante'] = UsuarioModel::crearUsuario('Ilan', 'clave1');
        $this->usuarios['docente'] = UsuarioModel::crearUsuario('Docente', 'clave2');
        $this->usuarios['rector'] = UsuarioModel::crearUsuario('Rector', 'clave3');
    }

    public function verificarCredenciales($usuario, $clave)
    {
        // Verificar credenciales llamando al método en UsuarioModel
        $usuarioModel = $this->getUsuario($usuario);

        if ($usuarioModel !== null) {
            return $usuarioModel->verificarCredenciales($clave);
        }

        return false;
    }

    public function getUsuario($nombre)
    {
        return isset($this->usuarios[$nombre]) ? $this->usuarios[$nombre] : null;
    }

}
