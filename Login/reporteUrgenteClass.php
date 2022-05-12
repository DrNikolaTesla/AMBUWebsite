<?php
include_once 'config.php';

class ReporteUrgente /*insumo*/
{

    private $idReporte;  /*$numInsumo;*/
    private $idUsuario;/*$nombre;*/
    private $idBosque;/*$medida;*/
    private $incidencia;/*$costo;*/
    private $fecha;/*$existencias;*/
    private $hora;/*$numLote;*/
    private $resuelto;/*$disponible;*/

    /**
     * @return mixed
     */
    public function getIdReporte()
    {
        return $this->idReporte;
    }

    /**
     * @param mixed $idReporte
     */
    public function setIdReporte($idReporte)
    {
        $this->idReporte = $idReporte;
    }

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
    public function getIncidencia()
    {
        return $this->incidencia;
    }

    /**
     * @param mixed $incidencia
     */
    public function setIncidencia($incidencia)
    {
        $this->incidencia = $incidencia;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * @return mixed
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * @param mixed $hora
     */
    public function setHora($hora)
    {
        $this->hora = $hora;
    }

    /**
     * @return mixed
     */
    public function getResuelto()
    {
        return $this->resuelto;
    }

    /**
     * @param mixed $resuelto
     */
    public function setResuelto($resuelto)
    {
        $this->resuelto = $resuelto;
    }

    function urgenteAlta()
    {
        try {
            $con = new config();
            $query = $con->prepare("INSERT INTO reportesurgentes(IdUsuario,idBosque,incidencia,fecha,hora)
Values(:idUser,:idBosque1,:inci,NOW(),NOW())");
            $query->bindValue(':idUser', $this->getIdUsuario());
            $query->bindValue(':idBosque1', $this->getIdBosque());
            $query->bindValue(':inci', $this->getIncidencia());
            $query->execute();

        } catch (PDOException $e) {
            echo $query . "<br/>" . $e->getMessage();
        }
    }

    function reporteModificar()
    {
        try {
            $con = new config();
            $query = $con->prepare("SELECT * FROM reportesurgentes WHERE idReporteUr= " . $this->getIdReporte() . ";");
            $query->execute();
            $resultado = $query->fetchAll();

            foreach ($resultado as $value) {
                $this->setIdReporte($value['idReporteUr']);
                $this->setIdUsuario($value['IdUsuario']);
                $this->setIdBosque($value['idBosque']);
                $this->setIncidencia($value['incidencia']);
                $this->setFecha($value['fecha']);
                $this->setHora($value['hora']);
                $this->setResuelto($value['resuelto']);
            }
        } catch (PDOException $e) {
            echo $query . "<br>" . $e->getMessage();
        }
    }

    function reporteURModificarGuardar()
    {
        try {
            $con = new config();
            $query = $con->prepare("UPDATE reportesurgentes"
                . " SET IdUsuario = :IdUsuario,"
                . " idBosque = :idBosque,"
                . " incidencia = :incidencia,"
                . " fecha = :fecha,"
                . " hora = :hora,"
                . " resuelto = :resuelto WHERE idReporteUr = :idReporteUr;");

            $query->bindValue(':IdUsuario', $this->getIdUsuario());
            $query->bindValue(':idBosque', $this->getIdBosque());
            $query->bindValue(':incidencia', $this->getIncidencia());
            $query->bindValue(':fecha', $this->getFecha());
            $query->bindValue(':hora', $this->getHora());
            $query->bindValue(':resuelto', $this->getResuelto());
            $query->bindValue(':idReporteUr', $this->getIdReporte());
            $query->execute();

        } catch (PDOException $e) {
            echo $query . "<br>" . $e->getMessage();
        }
    }




    function consultaUrgente()
    {

        $con = new config();
        $query = $con->prepare('SELECT * FROM reportesurgentes where resuelto="NO" and idBosque='.$idbosque2=($_GET['id']).';');
        $query->execute();
        $resultado = $query->fetchAll();

        foreach ($resultado as $key => $value) {
            $agregar = "<a href='rUrgenteModificar.php?id=" . $value['idReporteUr'] . "' class='btn btn-success '  >Ver a Detalle</a>";
            $consulta[$key] = array(
                $value['idReporteUr'],
                $value['IdUsuario'],
                $value['incidencia'],
                $value['fecha'],
                $value['hora'],
                $value['resuelto'],
                $agregar,
            );
        }
        return $consulta;
    }
}

?>