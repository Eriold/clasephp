<?php
include('../model/Person.php');
$code = isset($_POST['txtCodigo']) && $_POST['txtCodigo'];
$name = $_POST['txtNombre'];
$phone = $_POST['txtTelefono'];
$email = $_POST['txtEmail'];
$address = $_POST['txtDireccion'];
$button = $_POST['btn'];
// $button = 'Guardar';

switch ($button) {
    case 'Guardar':
        $objPerson = new Person('1', 'hugo', '411', 'hugo@', 'calle 13');
        $objControllerPerson = new ControllerPerson($objPerson);
        $objControllerPerson->save();
        break;
    default;
}
?>
<!DOCTYPE html>
<html>

<head>
    <tittle></tittle>
</head>

<body>
    <form action="VistaPersona.php" method="post">
        <table style="margin: 0 auto;">
            <tr>
                <td colspan="2" style="text-align: center;">Datos Persona</td>
            </tr>
            <tr>
                <td>
                    Codigo
                </td>
                <td>
                    <input type="text" name="txtCodigo">
                </td>
            </tr>
            <tr>
                <td>
                    Nombre
                </td>
                <td>
                    <input type="text" name="txtNombre">
                </td>
            </tr>
            <tr>
                <td>
                    Telefono
                </td>
                <td>
                    <input type="text" name="txtTelefono">
                </td>
            </tr>
            <tr>
                <td>
                    Email
                </td>
                <td>
                    <input type="text" name="txtEmail">
                </td>
            </tr>
            <tr>
                <td>
                    Direccion
                </td>
                <td>
                    <input type="text" name="txtDireccion">
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <input type="submit" name="btn" value="Guardar">
                    <!-- <input type="submit" name="btn" value="Consultar">
                    <input type="submit" name="btn" value="Modificar">
                    <input type="submit" name="btn" value="Borrar">
                    <input type="submit" name="btn" value="Listar"> -->
                </td>
            </tr>
        </table>
    </form>
</body>

</html>