<?php
// Include config file
include('../model/Person.php');
include('../controller/ConnectionController.php');
include('../controller/ControllerPerson.php');

// Define variables and initialize with empty values
$code = $name = $phoneNumber = $email = $address = '';
$code_err = $name_err = $phoneNumber_err = $email_err = $address_err =  '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Validate code
    $inputCode = trim($_POST["txtCode"]);
    if (empty($inputCode)) {
        $code_err = "Debes ingresar un código.";
    } else {
        $code = $inputCode;
    }
    //Validate name
    $inputName = trim($_POST["txtName"]);
    if (empty($inputName)) {
        $name_err = "Debes ingresar un nombre.";
    } else {
        $name = $inputName;
    }
    //Validate phone number
    $inputPhoneNumber = trim($_POST["txtPhoneNumber"]);
    if (empty($inputPhoneNumber)) {
        $phoneNumber_err = "Debes ingresar un teléfono.";
    } else {
        $phoneNumber = $inputPhoneNumber;
    }
    //Validate email
    $inputEmail = trim($_POST["txtEmail"]);
    if (empty($inputEmail)) {
        $email_err = "Debes ingresar un correo electrónico.";
    } else {
        $email = $inputEmail;
    }
    //Validate address
    $inputAddress = trim($_POST["txtAddress"]);
    if (empty($inputAddress)) {
        $address_err = "Debes ingresar una dirección.";
    } else {
        $address = $inputAddress;
    }

    // Check input errors before inserting in database
    if (empty($code_err) && empty($name_err) && empty($phoneNumber_err) && empty($email_err) && empty($address_err)) {
        $objPerson = new Person($code, $name, $phoneNumber, $email, $address);
        $objPersonCon = new ControllerPerson($objPerson);
        $objPersonCon->updatePerson();
        header("location: ../index.php");
    }
} else {
    // Check existence of id parameter before processing further
    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        // Get URL parameter
        $id =  trim($_GET["id"]);
        $objPerson = new Person($id, '', '', '', '');
        $objPersonCon = new ControllerPerson($objPerson);
        $resGet = $objPersonCon->getPersonCode();
        // echo gettype($resGet), '<br>';
        // echo var_dump($objPerson);

        if ($resGet->getCode() && $resGet->getEmail()) {
            $code = $resGet->getCode();
            $name = $resGet->getName();
            $phoneNumber = $resGet->getPhone();
            $email = $resGet->getEmail();
            $address = $resGet->getAddress();
        } else {
            // URL doesn't contain valid id. Redirect to error page
            header("location: error.php");
            exit();
        }
    } else {
        // URL doesn't contain id parameter. Redirect to error page

        header("location: error.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<?php include('./components/head.php') ?>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Datos persona</h2>
                    <p>Puedes editar los campos y enviarlos para actualizarlos en la base de datos.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Código</label>
                            <input type="text" name="txtCode" class="form-control <?php echo (!empty($code_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $code ?>">
                            <span class="invalid-feedback"><?php echo $code_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" name="txtName" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name ?>">
                            <span class="invalid-feedback"><?php echo $name_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Teléfono</label>
                            <input type="text" name="txtPhoneNumber" class="form-control <?php echo (!empty($phoneNumber_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $phoneNumber ?>">
                            <span class="invalid-feedback"><?php echo $phoneNumber_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Correo electrónico</label>
                            <input type="text" name="txtEmail" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email ?>">
                            <span class="invalid-feedback"><?php echo $email_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Dirección</label>
                            <input type="text" name="txtAddress" class="form-control <?php echo (!empty($address_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $address ?>">
                            <span class="invalid-feedback"><?php echo $address_err; ?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Enviar">
                        <a href="../index.php" class="btn btn-secondary ml-2">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>