<?php

namespace Model;

class UsuarioModel
{
    private $nombre;
    private $clave;
    private $intentosFallidos;
    private $estado;

    public function __construct($nombre, $clave)
    {
        $this->nombre = $nombre;
        $this->clave = password_hash($clave, PASSWORD_DEFAULT);
        $this->intentosFallidos = 0;
        $this->estado = new UsuarioActivo();
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getClave()
    {
        return $this->clave;
    }

    public function getIntentosFallidos()
    {
        return $this->intentosFallidos;
    }

    public function setIntentosFallidos($intentosFallidos)
    {
        $this->intentosFallidos = $intentosFallidos;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado(EstadoUsuario $estado)
    {
        $this->estado = $estado;
    }

    public static function crearUsuario($nombre, $clave)
    {
        return new self($nombre, $clave);
    }


    public function incrementarIntentosFallidos()
    {
        if ($this->intentosFallidos < 3 && !($this->getEstado() instanceof UsuarioBloqueado)) {
            $this->intentosFallidos++;

            if ($this->intentosFallidos >= 3) {
                $this->bloquearUsuario();
            }
        }
    }

    public function resetIntentosFallidos()
    {
        $this->intentosFallidos = 0;
    }

    public function bloquearUsuario()
    {
        $this->setEstado(new UsuarioBloqueado());
        $this->resetIntentosFallidos(); // Resetear intentos fallidos al bloquear al usuario
        echo "<div class='login__response'>Usuario bloqueado. No se permiten intentos de inicio de sesión.</div>";
    }

    public function verificarCredenciales($clave)
    {
        if ($this->getEstado() instanceof UsuarioBloqueado) {
            return false;
        }

        return $this->getEstado()->verificarCredenciales($this, $clave);
    }

    public function manejarIntentosFallidos($clave)
    {
        $this->estado->manejarIntentosFallidos($this,$clave);
        setcookie($this->nombre . '_intentos_fallidos', $this->intentosFallidos, time() + (365 * 24 * 60 * 60));
    }
}
