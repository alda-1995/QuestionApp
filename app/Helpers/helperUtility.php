<?php
if (!function_exists('obtenerTresLetrasUsuario')) {
    function obtenerTresLetrasUsuario($nombreCompleto)
    {
        if (strlen($nombreCompleto) >= 3) {
            $primeraLetraNombre = substr($nombreCompleto, 0, 1);
            $partesNombre = explode(' ', $nombreCompleto);
            $primeraLetraApellidoPaterno = substr($partesNombre[1], 0, 1);
            if (count($partesNombre) >= 3) {
                $primeraLetraApellidoMaterno = substr($partesNombre[2], 0, 1);
                return $primeraLetraNombre . $primeraLetraApellidoPaterno . $primeraLetraApellidoMaterno;
            }
        }
        return null;
    }
}
?>