<!DOCTYPE html>
<html lang="en">
<?php include('./view/components/head.php') ?>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Employees Details</h2>
                        <a href="./view/create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New Employee</a>
                    </div>
                    <?php
                    // Include config file
                    include('./model/Person.php');
                    include('./controller/ConnectionController.php');
                    include('./controller/ControllerPerson.php');

                    // Attempt select query execution
                    $objPerson = new Person('', '', '', '', '', '');
                    $objPersonCon = new ControllerPerson($objPerson);
                    $row = $objPersonCon->getPeople();
                    if ($row > 0) {
                        echo '<table class="table table-bordered table-striped">';
                        echo "<thead>";
                        echo "<tr>";
                        echo "<th>Código</th>";
                        echo "<th>Nombre</th>";
                        echo "<th>Teléfono</th>";
                        echo "<th>Correo electrónico</th>";
                        echo "<th>Dirección</th>";
                        echo "<th>Acciones</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        foreach ($row as $res) {
                            echo "<tr>";
                            echo "<td>" . $res['codigo'] . "</td>";
                            echo "<td>" . $res['nombre'] . "</td>";
                            echo "<td>" . $res['telefono'] . "</td>";
                            echo "<td>" . $res['email'] . "</td>";
                            echo "<td>" . $res['direccion'] . "</td>";
                            echo "<td>";
                            echo '<a href="./view/read.php?id=' . $res['codigo'] . '" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                            echo '<a href="./view/update.php?id=' . $res['codigo'] . '" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                            echo '<a href="./view/delete.php?id=' . $res['codigo'] . '" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                            echo "</td>";
                            echo "</tr>";
                        }
                        echo "</tbody>";
                        echo "</table>";
                    } else {
                        echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                    }
