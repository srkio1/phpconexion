<?php

header("Access-Control-Allow-Origin: *");
include './conexion.php';


if(isset ($_POST['email'])&& isset ($_POST['password'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $checkSQL = "SELECT * FROM users WHERE email = '$email'";
    $checkResult = mysqli_query($conexion, $checkSQL);
    
    if($checkResult->num_rows > 0)
    {
        $row = $checkResult->fetch_assoc();
        if(password_verify($password, $row['password'])){
        $data = [
            'success' => true,
            'message' => 'Login correcto',
            'user' => $row
        ];
    }else {
        $data = [
            'success' => false,
            'message' => 'Contraseña incorrecta'
        ];
    }
}else{
    $data = [
        'success' => false,
        'message' => 'Usuario no registrado'
    ];
}
echo json_encode($data);
}

else{
    $data = [
        'success' => false,
        'message' => 'Faltan datos'
    ];
    echo json_encode($data);
}    