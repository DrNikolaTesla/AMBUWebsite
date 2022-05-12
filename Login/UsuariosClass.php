<?php
include_once 'config.php';

class Usuarios
{
    private $idUsuario;
    private $Nombre;  /*$numInsumo;*/
    private $Apellidos;/*$nombre;*/
    private $NombreUsuario;/*$medida;*/
    private $Password;/*$costo;*/
    private $CategoriaUs;/*$existencias;*/
    private $Activo;/*$numLote;*/

    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * @param mixed $idUsuario
     */
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->Nombre;
    }

    /**
     * @param mixed $Nombre
     */
    public function setNombre($Nombre)
    {
        $this->Nombre = $Nombre;
    }


    /**
     * @return mixed
     */
    public function getApellidos()
    {
        return $this->Apellidos;
    }

    /**
     * @param mixed $Apellidos
     */
    public function setApellidos($Apellidos)
    {
        $this->Apellidos = $Apellidos;
    }

    /**
     * @return mixed
     */
    public function getNombreUs()
    {
        return $this->NombreUsuario;
    }

    /**
     * @param mixed $NombreUsuario
     */
    public function setNombreUs($NombreUsuario)
    {
        $this->NombreUsuario = $NombreUsuario;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->Password;
    }

    /**
     * @param mixed $Password
     */
    public function setPassword($Password)
    {
        $this->Password = $Password;
    }

    /**
     * @return mixed
     */
    public function getCategoriaUs()
    {
        return $this->CategoriaUs;
    }

    /**
     * @param mixed $CategoriaUs
     */
    public function setCategoriaUs($CategoriaUs)
    {
        $this->CategoriaUs = $CategoriaUs;
    }

    /**
     * @return mixed
     */
    public function getActivo()
    {
        return $this->Activo;
    }

    /**
     * @param mixed $Activo
     */
    public function setActivo($Activo)
    {
        $this->Activo = $Activo;
    }

    function usuariosAlta()
    {
        try {
            $con = new config();
            $query = $con->prepare("INSERT INTO usuarios(Nombre,Apellidos,NombreUsuario,Password,CategoriaUs)
Values(:Nombre,:Apellidos,:NombreUs,:Password,:CategoriaUs)");
            $query->bindValue(':Nombre', $this->getNombre());
            $query->bindValue(':Apellidos', $this->getApellidos());
            $query->bindValue(':NombreUs', $this->getNombreUs());
            $query->bindValue(':Password', $this->getPassword());
            $query->bindValue(':CategoriaUs', $this->getCategoriaUs());
            $query->execute();

        } catch (PDOException $e) {
            echo $query . "<br/>" . $e->getMessage();
        }
    }

    function usuariosModificar()
    {
        try {
            $con = new config();
            $query = $con->prepare("SELECT * FROM usuarios WHERE idUsuario= " . $this->getIdUsuario() . ";");
            $query->execute();
            $resultadoU2 = $query->fetchAll();

            foreach ($resultadoU2 as $value) {
                $this->setIdUsuario($value['idUsuario']);
                $this->setNombre($value['Nombre']);
                $this->setApellidos($value['Apellidos']);
                $this->setNombreUs($value['NombreUsuario']);
                $this->setPassword($value['Password']);
                $this->setCategoriaUs($value['CategoriaUs']);
                $this->setActivo($value['Activo']);
            }
        } catch (PDOException $e) {
            echo $query . "<br>" . $e->getMessage();
        }
    }

    function usuariosModificarGuardar()
    {
        try {
            $con = new config();
            $query = $con->prepare("UPDATE usuarios"
                . " SET Nombre = :nombre,"
                . " Apellidos = :apellidos,"
                . " NombreUsuario = :nombreUsuario,"
                . " Password = :password,"
                . " CategoriaUs = :categoriaUs,"
                . " Activo = :activo WHERE idUsuario = :idUsuario;");

            $query->bindValue(':nombre', $this->getNombre());
            $query->bindValue(':apellidos', $this->getApellidos());
            $query->bindValue(':nombreUsuario', $this->getNombreUs());
            $query->bindValue(':password', $this->getPassword());
            $query->bindValue(':categoriaUs', $this->getCategoriaUs());
            $query->bindValue(':activo', $this->getActivo());
            $query->bindValue(':idUsuario', $this->getIdUsuario());
            $query->execute();

        } catch (PDOException $e) {
            echo $query . "<br>" . $e->getMessage();
        }
    }




    function consultaUsuarios()
    {

        $con = new config();
        $query = $con->prepare('SELECT * FROM usuarios where Activo=1 ');
        $query->execute();
        $resultado2 = $query->fetchAll();

        foreach ($resultado2 as $key2 => $value2) {
            $agregar2 = "<a href='ModificarUsuarios.php?id=" . $value2['idUsuario'] . "' class='btn btn-success'>Ver a Detalle</a>";

            if ($value2['CategoriaUs'] == 1){
                $catego = 'Consulta y Capturas';
            }elseif($value2['CategoriaUs'] == 2){
                $catego = 'Modificacion y Consultas';
            }elseif ($value2['CategoriaUs'] == 3){
                $catego = 'Captura y Modificación';
            }elseif ($value2['CategoriaUs'] == 4){
                $catego = 'Captura';
            }else{
                $catego = 'Acceso Completo';
            }
            $consulta2[$key2] = array(
                $value2['idUsuario'],
                $value2['Nombre'],
                $value2['Apellidos'],
                $value2['NombreUsuario'],
                $catego,
                $agregar2,
            );
        }
        return $consulta2;
    }
}

?>
