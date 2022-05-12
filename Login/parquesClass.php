<?php
include_once 'config.php';

class Parques /*insumo*/
{

    private $idBosque;  /*$numInsumo;*/
    private $NombreBosque;/*$nombre;*/
    private $Nomenclatura;/*$medida;*/
    private $Direccion;/*$costo;*/
    private $Zona;/*$existencias;*/
    private $activo;/*$numLote;*/
    private $supervisor;/*$disponible;*/

    /**
     * @return mixed
     */
    public function getIdBosque()
    {
        return $this->idBosque;
    }

    /**
     * @param mixed $idBosque
     */
    public function setIdBosque($idBosque)
    {
        $this->idBosque = $idBosque;
    }

    /**
     * @return mixed
     */
    public function getNombreBos()
    {
        return $this->NombreBosque;
    }

    /**
     * @param mixed $NombreBosque
     */
    public function setNombreBos($NombreBosque)
    {
        $this->NombreBosque = $NombreBosque;
    }


    /**
     * @return mixed
     */
    public function getNomenclatura()
    {
        return $this->Nomenclatura;
    }

    /**
     * @param mixed $Nomenclatura
     */
    public function setNomenclatura($Nomenclatura)
    {
        $this->Nomenclatura = $Nomenclatura;
    }

    /**
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->Direccion;
    }

    /**
     * @param mixed $Direccion
     */
    public function setDireccion($Direccion)
    {
        $this->Direccion = $Direccion;
    }

    /**
     * @return mixed
     */
    public function getZona()
    {
        return $this->Zona;
    }

    /**
     * @param mixed $Zona
     */
    public function setZona($Zona)
    {
        $this->Zona = $Zona;
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

    /**
     * @return mixed
     */
    public function getSupervisor()
    {
        return $this->supervisor;
    }

    /**
     * @param mixed $supervisor
     */
    public function setSupervisor($supervisor)
    {
        $this->supervisor = $supervisor;
    }

    function parquesAlta()
    {
        try {
            $con = new config();
            $query = $con->prepare("INSERT INTO bosques(NombreBosque,Nomenclatura,Direccion,Zona,supervisor)
Values(:nombre,:nomenclatura,:direccion,:zona,:super)");
            $query->bindValue(':nombre', $this->getNombreBos());
            $query->bindValue(':nomenclatura', $this->getNomenclatura());
            $query->bindValue(':direccion', $this->getDireccion());
            $query->bindValue(':zona', $this->getZona());
            $query->bindValue(':super', $this->getSupervisor());
            $query->execute();

        } catch (PDOException $e) {
            echo $query . "<br/>" . $e->getMessage();
        }
    }

    function parquesModificar()
    {
        try {
            $con = new config();
            $query = $con->prepare("SELECT * FROM bosques WHERE idBosque= " . $this->getIdBosque() . ";");
            $query->execute();
            $resultado = $query->fetchAll();

            foreach ($resultado as $value) {
                $this->setIdBosque($value['idBosque']);
                $this->setNombreBos($value['NombreBosque']);
                $this->setNomenclatura($value['Nomenclatura']);
                $this->setDireccion($value['Direccion']);
                $this->setZona($value['Zona']);
                $this->setActivo($value['activo']);
                $this->setSupervisor($value['supervisor']);
            }
        } catch (PDOException $e) {
            echo $query . "<br>" . $e->getMessage();
        }
    }

    function ParquesModificarGuardar()
    {
        try {
            $con = new config();
            $query = $con->prepare("UPDATE bosques"
                . " SET NombreBosque = :NombreBosque,"
                . " Nomenclatura = :Nomenclatura,"
                . " Direccion = :Direccion,"
                . " Zona = :Zona,"
                . " activo = :activo,"
                . " supervisor = :supervisor WHERE idBosque = :idBosque;");

            $query->bindValue(':NombreBosque', $this->getNombreBos());
            $query->bindValue(':Nomenclatura', $this->getNomenclatura());
            $query->bindValue(':Direccion', $this->getDireccion());
            $query->bindValue(':Zona', $this->getZona());
            $query->bindValue(':activo', $this->getActivo());
            $query->bindValue(':supervisor', $this->getSupervisor());
            $query->bindValue(':idBosque', $this->getIdBosque());
            $query->execute();

        } catch (PDOException $e) {
            echo $query . "<br>" . $e->getMessage();
        }
    }




    function consultaParques()
    {

        $con = new config();
        $query = $con->prepare('SELECT * FROM bosques where activo=1');
        $query->execute();
        $resultado = $query->fetchAll();

        foreach ($resultado as $key => $value) {
            $agregar = "<a href='ModificarParques.php?id=" . $value['idBosque'] . "' class='btn btn-success'>Ver a Detalle</a>";
            $consulta[$key] = array(
                $value['idBosque'],
                $value['NombreBosque'],
                $value['Nomenclatura'],
                $value['Direccion'],
                $value['Zona'],
                $value['supervisor'],
                $agregar,
            );
        }
        return $consulta;
    }
}

?>