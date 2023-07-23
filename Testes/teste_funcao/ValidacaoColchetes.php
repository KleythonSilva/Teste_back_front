<?php

function validarColchetes($entrada) {
    $stack = [];
    $map = [
        ')' => '(',
        '}' => '{',
        ']' => '['
    ];

    for ($i = 0; $i < strlen($entrada); $i++) {
        $char = $entrada[$i];

        if (in_array($char, ['(', '{', '['])) {
            array_push($stack, $char);
        } elseif (in_array($char, [')', '}', ']'])) {
            if (empty($stack) || $stack[count($stack) - 1] != $map[$char]) {
                return false;
            } else {
                array_pop($stack);
            }
        }
    }

    return empty($stack);
}

echo validarColchetes("(){}[]") ? "Válido" : "Inválido"; // Saída: Válido
echo validarColchetes("[{()}](){}") ? "Válido" : "Inválido"; // Saída: Válido
echo validarColchetes("[]{()") ? "Válido" : "Inválido"; // Saída: Inválido
echo validarColchetes("[{)]") ? "Válido" : "Inválido"; // Saída: Inválido
