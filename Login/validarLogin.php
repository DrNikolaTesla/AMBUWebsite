<?php
include 'config.php';
$pdo = new config();
session_start();

//variables que pasamos del formulario de IndexLogin
$vPass='p';
$vUser='u';
$pass=$_POST['password'];
$user=$_POST['user'];

//Conexion a base de datos

if($user=='' || $pass==''){header('location: index.php');}
else {
    try{
        $query=$pdo->prepare("SELECT * FROM usuarios WHERE NombreUsuario=".$pdo->quote($user)." and Password=MD5('".$pass."') and Activo=1;");
        $query->execute();
        $resultado=$query->fetchAll();

        //Validacion y comparacion del usuario y contraseña
        foreach($resultado as $value){
            $vPass='p'.$value['Password'];
            $vUser='u'.$value['NombreUsuario'];
            $nombre=$value['Nombre'];
            $usuarioId=$value["idUsuario"];
            $privilegios=$value['CategoriaUs'];
            $activo=$value['Activo'];
        }
        if($vUser=='u' && $vPass=='p'){
            echo '<script>alert("El usuario o contraseña son incorrectos. Intente de nuevo.")</script>';
            echo '<script>location.href="index.php"</script>';
        }else{
            $_SESSION['Activo']=$activo;
            $_SESSION['Nombre']=$nombre;
            $_SESSION['idUsuario']=$usuarioId;
            $_SESSION['CategoriaUs']=$privilegios;

            if (isset($_SESSION['direccionURL'])) {
                echo "<script>location.href='".$_SESSION['direccionURL']."'</script>";
            }else{
                header('location: ../index.php');
            }
        }

    }catch(PDOException $ex){
        echo 'Error: '.$ex->getMessage();
    }
    $pdo = null;

}
?>