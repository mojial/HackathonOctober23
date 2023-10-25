<?php

$fp = fopen("c1", "r");
$elfos = array();
$indice = 1;
$suma = 0;

while (!feof($fp)) {
    $linea = fgets($fp);
    // Eliminas espacios en blanco y saltos de linea
    $linea = trim($linea);

    if ($linea !== "") {
        if (is_numeric($linea)) {
            // si es un numero valido lo sumamos
            $valor = (int)$linea;
            $suma += $valor;
        }
    } else {
        // asignamos la suma al individuo cuando encontramos la vacia
        $elfos["elfo" . $indice] = $suma;
        $indice++;
        $suma = 0;
    }
}

fclose($fp);

// Elfo maximo
$maxElfo = array_search(max($elfos), $elfos);

echo "El elfo con el valor máximo es: " . $maxElfo . " con un valor de " . $elfos[$maxElfo];

