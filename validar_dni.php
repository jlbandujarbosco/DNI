<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dni_input = $_POST['dni'];
    
    // Separar el número y la letra
    $numero = substr($dni_input, 0, 8);
    $letra = substr($dni_input, -1);
    
    // Validar formato del DNI (debe tener 9 caracteres: 8 números y 1 letra)
    if (!preg_match("/^[0-9]{8}[A-Z]$/", $dni_input)) {
        echo "Formato de DNI no válido.";
        exit;
    }

    // Calcular la letra correspondiente
    $letras = "TRWAGMYFPDXBNJZSQVHLCKE";
    $indice = $numero % 23;
    $letra_correcta = $letras[$indice];

    // Comparar letras
    if (strtoupper($letra) === $letra_correcta) {
        echo "El DNI es correcto.";
    } else {
        echo "El DNI es incorrecto. La letra correcta es: $letra_correcta";
    }
}
?>
