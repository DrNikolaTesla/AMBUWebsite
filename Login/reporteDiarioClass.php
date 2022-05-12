<?php
include_once 'config.php';

class ReporteDiario
{

    private $idReporteDia;
    private $idBosque;
    private $idUsuario;
    private $fechaReali;
    private $horaReali;
    private $andador1;
    private $andador2;
    private $andador3;
    private $areasVerdes1;
    private $areasVerdes2;
    private $areasVerdes3;
    private $areasPergolas1;
    private $areasPergolas2;
    private $areasPergolas3;
    private $fuentes1;
    private $fuentes2;
    private $fuentes3;
    private $activo;

    /**
     * @return mixed
     */
    public function getIdReporteDia()
    {
        return $this->idReporteDia;
    }

    /**
     * @param mixed $idReporteDia
     */
    public function setIdReporteDia($idReporteDia)
    {
        $this->idReporteDia = $idReporteDia;
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
    public function getFechaReali()
    {
        return $this->fechaReali;
    }

    /**
     * @param mixed $fechaReali
     */
    public function setFechaReali($fechaReali)
    {
        $this->fechaReali = $fechaReali;
    }

    /**
     * @return mixed
     */
    public function getHoraReali()
    {
        return $this->horaReali;
    }

    /**
     * @param mixed $horaReali
     */
    public function setHoraReali($horaReali)
    {
        $this->horaReali = $horaReali;
    }

    /**
     * @return mixed
     */
    public function getAndadores1()
    {
        return $this->andador1;
    }

    /**
     * @param mixed $andador1
     */
    public function setAndadores1($andador1)
    {
        $this->andador1 = $andador1;
    }

    /**
     * @return mixed
     */
    public function getAndadores3()
    {
        return $this->andador3;
    }

    /**
     * @param mixed $andador3
     */
    public function setAndadores3($andador3)
    {
        $this->andador3 = $andador3;
    }

    /**
     * @return mixed
     */
    public function getAndadores2()
    {
        return $this->andador2;
    }

    /**
     * @param mixed $andador2
     */
    public function setAndadores2($andador2)
    {
        $this->andador2 = $andador2;
    }


    /**
     * @return mixed
     */
    public function getAreasVerdes1()
    {
        return $this->areasVerdes1;
    }

    /**
     * @param mixed $areasVerdes1
     */
    public function setAreasVerdes1($areasVerdes1)
    {
        $this->areasVerdes1 = $areasVerdes1;
    }

    /**
     * @return mixed
     */
    public function getAreasVerdes2()
    {
        return $this->areasVerdes2;
    }

    /**
     * @param mixed $areasVerdes2
     */
    public function setAreasVerdes2($areasVerdes2)
    {
        $this->areasVerdes2 = $areasVerdes2;
    }

    /**
     * @return mixed
     */
    public function getAreasVerdes3()
    {
        return $this->areasVerdes3;
    }

    /**
     * @param mixed $areasVerdes3
     */
    public function setAreasVerdes3($areasVerdes3)
    {
        $this->areasVerdes3 = $areasVerdes3;
    }



    /**
     * @return mixed
     */
    public function getAreaPergolas1()
    {
        return $this->areasPergolas1;
    }

    /**
     * @param mixed $areasPergolas1
     */
    public function setAreasPergolas1($areasPergolas1)
    {
        $this->areasPergolas1 = $areasPergolas1;
    }




    /**
     * @return mixed
     */
    public function getAreaPergolas2()
    {
        return $this->areasPergolas2;
    }

    /**
     * @param mixed $areasPergolas2
     */
    public function setAreasPergolas2($areasPergolas2)
    {
        $this->areasPergolas2 = $areasPergolas2;
    }




    /**
     * @return mixed
     */
    public function getAreaPergolas3()
    {
        return $this->areasPergolas3;
    }

    /**
     * @param mixed $areasPergolas3
     */
    public function setAreasPergolas3($areasPergolas3)
    {
        $this->areasPergolas3 = $areasPergolas3;
    }



    /**
     * @return mixed
     */
    public function getFuentes1()
    {
        return $this->fuentes1;
    }

    /**
     * @param mixed $fuentes1
     */
    public function setFuentes1($fuentes1)
    {
        $this->fuentes1 = $fuentes1;
    }

    /**
     * @return mixed
     */
    public function getFuentes2()
    {
        return $this->fuentes2;
    }

    /**
     * @param mixed $fuentes2
     */
    public function setFuentes2($fuentes2)
    {
        $this->fuentes2 = $fuentes2;
    }

    /**
     * @return mixed
     */
    public function getFuentes3()
    {
        return $this->fuentes3;
    }

    /**
     * @param mixed $fuentes3
     */
    public function setFuentes3($fuentes3)
    {
        $this->fuentes3 = $fuentes3;
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






    function diarioAlta()
    {
        try {
            $con = new config();
            $query = $con->prepare("INSERT INTO reportediario(idBosque,idUsuario,fechaReali,horaReali,andadores1,areasVerdes1,areaPergolas1,fuentes1,andadores2,areasVerdes2,areaPergolas2,fuentes2,andadores3,areasVerdes3,areaPergolas3,fuentes3)
Values(:idUser2,:idBosque2,NOW(),NOW(),:anda1,:ver1,:per1,:fue1,:anda2,:ver2,:per2,:fue2,:anda3,:ver3,:per3,:fue3)");
            $query->bindValue(':idUser2', $this->getIdUsuario());
            $query->bindValue(':idBosque2', $this->getIdBosque());
            $query->bindValue(':anda1', $this->getAndadores1());
            $query->bindValue(':ver1', $this->getAreasVerdes1());
            $query->bindValue(':per1', $this->getAreaPergolas1());
            $query->bindValue(':fue1', $this->getFuentes1());
            $query->bindValue(':anda2', $this->getAndadores2());
            $query->bindValue(':ver2', $this->getAreasVerdes2());
            $query->bindValue(':per2', $this->getAreaPergolas2());
            $query->bindValue(':fue2', $this->getFuentes2());
            $query->bindValue(':anda3', $this->getAndadores3());
            $query->bindValue(':ver3', $this->getAreasVerdes3());
            $query->bindValue(':per3', $this->getAreaPergolas3());
            $query->bindValue(':fue3', $this->getFuentes3());

            $query->execute();

        } catch (PDOException $e) {
            echo $query . "<br/>" . $e->getMessage();
        }
    }

    function reporteDiarioModificar()
    {
        try {
            $con = new config();
            $query = $con->prepare("SELECT * FROM reportediario WHERE idReporteDia= " . $this->getIdReporteDia() . ";");
            $query->execute();
            $resultado = $query->fetchAll();

            foreach ($resultado as $value) {
                $this->setIdReporteDia($value['idReporteDia']);
                $this->setIdBosque($value['idBosque']);
                 $this->setIdUsuario($value['idUsuario']);
                 $this->setFechaReali($value['fechaReali']);
                 $this->setHoraReali($value['horaReali']);
                $this->setAndadores1($value['andadores1']);
                 $this->setAreasVerdes1($value['areasVerdes1']);
                 $this->setAreasPergolas1($value['areaPergolas1']);
                 $this->setFuentes1($value['fuentes1']);
                 $this->setAndadores2($value['andadores2']);
                 $this->setAreasVerdes2($value['areasVerdes2']);
                 $this->setAreasPergolas2($value['areaPergolas2']);
                 $this->setFuentes2($value['fuentes2']);
                $this->setAndadores3($value['andadores3']);
                $this->setAreasVerdes3($value['areasVerdes3']);
                 $this->setAreasPergolas3($value['areaPergolas3']);
                 $this->setFuentes3($value['fuentes3']);
                 $this->setActivo($value['activo']);
            }
        } catch (PDOException $e) {
            echo $query . "<br>" . $e->getMessage();
        }
    }

    function reportediarioModificarGuardar()
    {
        try {
            $con = new config();
            $query = $con->prepare("UPDATE reportediario"
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




    function consultaDiario()
    {

        $con = new config();
        $query = $con->prepare('SELECT * FROM reportediario where activo=1 and idBosque='.$idbosque3=($_GET['id']).';');
        $query->execute();
        $resultado = $query->fetchAll();

        foreach ($resultado as $key => $value) {
            $agregar = "<a href='MreporteDiario.php?id=" . $value['idReporteDia'] . "' class='btn btn-success'>Ver a Detalle</a>";
            $consulta[$key] = array(
                $value['idReporteDia'],
                $value['idUsuario'],
                $value['fechaReali'],
                $value['horaReali'],
                $agregar,
            );
        }
        return $consulta;
    }
}

?>