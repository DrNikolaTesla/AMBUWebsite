<?php
include_once 'config.php';

class ParquesUsuario /*insumo*/
{

    private $idBosqueUsuario;  /*$numInsumo;*/
    private $idUsuario;/*$nombre;*/
    private $idBosque;/*$medida;*/
    private $activo;/*$costo;*/


    /**
     * @return mixed
     */
    public function getIdBosqueUsuario()
    {
        return $this->idBosqueUsuario;
    }

    /**
     * @param mixed $idBosqueUsuario
     */
    public function setIdBosqueUsuario($idBosqueUsuario)
    {
        $this->idBosqueUsuario = $idBosqueUsuario;
    }

    /**
     * @return mixed
     */
    public function getIdUsuarios()
    {
        return $this->idUsuario;
    }

    /**
     * @param mixed $idUsuario
     */
    public function setidUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }


    /**
     * @return mixed
     */
    public function getidBosque()
    {
        return $this->idBosque;
    }

    /**
     * @param mixed $idBosque
     */
    public function setidBosque($idBosque)
    {
        $this->idBosque = $idBosque;
    }

    /**
     * @return mixed
     */
    public function getActivo()
    {
        return $this->activo;
    }

    /**
     * @param mixed $activo
     */
    public function setActivo($activo)
    {
        $this->activo = $activo;
    }


    function parquesUsuarioAlta()
    {
        try {
            $con = new config();
            $query = $con->prepare("INSERT INTO bosque_usuario (idUsuario,idBosque)
Values(:idUsuario3,:idBosque3)");
            $query->bindValue(':idUsuario3', $this->getIdUsuarios());
            $query->bindValue(':idBosque3', $this->getidBosque());
            $query->execute();

        } catch (PDOException $e) {
            echo $query . "<br/>" . $e->getMessage();
        }
    }

    function parquesUsuarioModificar()
    {
        try {
            $con = new config();
            $query = $con->prepare("SELECT * FROM bosque_usuario WHERE idBosqueUsuario= " . $this->getIdBosqueUsuario() . ";");
            $query->execute();
            $resultado = $query->fetchAll();

            foreach ($resultado as $value) {
                $this->setIdBosqueUsuario($value['idBosqueUsuario']);
                $this->setidUsuario($value['idUsuario']);
                $this->setIdBosque($value['idBosque']);
                $this->setActivo($value['activo']);
            }
        } catch (PDOException $e) {
            echo $query . "<br>" . $e->getMessage();
        }
    }

    function ParquesUsuarioModificarGuardar()
    {
        try {
            $con = new config();
            $query = $con->prepare("UPDATE bosque_usuario"
                . " SET idUsuario = :idUsuario,"
                . " idBosque = :idBosque,"
                . " activo = :activo WHERE idBosqueUsuario = :idBosqueUsuario;");

            $query->bindValue(':idUsuario', $this->getIdUsuarios());
            $query->bindValue(':idBosque', $this->getidBosque());
            $query->bindValue(':activo', $this->getActivo());
            $query->bindValue(':idBosqueUsuario', $this->getIdBosqueUsuario());
            $query->execute();

        } catch (PDOException $e) {
            echo $query . "<br>" . $e->getMessage();
        }
    }




    function consultaParquesUsuario()
    {

        $con = new config();
        $query = $con->prepare('SELECT * FROM bosque_usuario where activo=1');
        $query->execute();
        $resultado = $query->fetchAll();

        foreach ($resultado as $key => $value) {
            $agregar = "<a href='ModificarParquesUsuario.php?id=" . $value['idBosqueUsuario'] . "' class='btn btn-success'>Ver a Detalle</a>";
            $consulta[$key] = array(
                $value['idBosqueUsuario'],
                $value['idUsuario'],
                $value['idBosque'],
                $agregar,
            );
        }
        return $consulta;
    }
}

?>