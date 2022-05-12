<?php

class menu

{
    function barraMenu()
    {
        $usuarioBarra = $_SESSION['Nombre'];
        ?>
        <nav class="navbar navbar-default" style="color: #0b5c81;">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"></button>
                    <a class="navbar-brand" href="../../index.php">
                        <svg class="bi bi-house-door" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M7.646 1.146a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5H9.5a.5.5 0 0 1-.5-.5v-4H7v4a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4h3.5V7.707L8 2.207l-5.5 5.5z"/>
                            <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                        </svg>
                        AMBU</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">

                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#">Reporte Diario</a>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#">Reporte Seguridad</a>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#">Comerciantes</a>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#">Fauna</a>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#">Personas Situacion</a>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#">Aforo</a>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#">Afectacion por lluvia</a>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#">Incendios</a>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#">Forestal</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a>
                                <svg class="bi bi-person" width="1em" height="1em" viewBox="0 0 16 16"
                                     fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M13 14s1 0 1-1-1-4-6-4-6 3-6 4 1 1 1 1h10zm-9.995-.944v-.002.002zM3.022 13h9.956a.274.274 0 0 0 .014-.002l.008-.002c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664a1.05 1.05 0 0 0 .022.004zm9.974.056v-.002.002zM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                </svg> <?php echo $usuarioBarra; ?></a></li>
                        <li><a href="../../Login/logout.php">
                                <svg class="bi bi-box-arrow-in-right" width="1em" height="1em" viewBox="0 0 16 16"
                                     fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M8.146 11.354a.5.5 0 0 1 0-.708L10.793 8 8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0z"/>
                                    <path fill-rule="evenodd"
                                          d="M1 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 1 8z"/>
                                    <path fill-rule="evenodd"
                                          d="M13.5 14.5A1.5 1.5 0 0 0 15 13V3a1.5 1.5 0 0 0-1.5-1.5h-8A1.5 1.5 0 0 0 4 3v1.5a.5.5 0 0 0 1 0V3a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v10a.5.5 0 0 1-.5.5h-8A.5.5 0 0 1 5 13v-1.5a.5.5 0 0 0-1 0V13a1.5 1.5 0 0 0 1.5 1.5h8z"/>
                                </svg>
                                Cerrar Sesión</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="col-sm-3">
                <center></center>
            </div>
            <div class="col-sm-4"></div>
        </div>
        <?php
    }

}