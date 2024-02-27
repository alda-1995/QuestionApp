<?php
if (!function_exists('obtenerTresLetrasUsuario')) {
    function obtenerTresLetrasUsuario($nombreCompleto)
    {
        if (strlen($nombreCompleto) >= 3) {
            $primeraLetraNombre = substr($nombreCompleto, 0, 1);
            $partesNombre = explode(' ', $nombreCompleto);
            if (count($partesNombre) >= 3) {
                $primeraLetraApellidoPaterno = substr($partesNombre[1], 0, 1);
                $primeraLetraApellidoMaterno = substr($partesNombre[2], 0, 1);
                return $primeraLetraNombre . $primeraLetraApellidoPaterno . $primeraLetraApellidoMaterno;
            }else if(count($partesNombre) >= 2){
                $primeraLetraApellidoPaterno = substr($partesNombre[1], 0, 1);
                return $primeraLetraNombre . $primeraLetraApellidoPaterno;
            }
            else{
                return $primeraLetraNombre;
            }
        }
        return null;
    }
}
?>