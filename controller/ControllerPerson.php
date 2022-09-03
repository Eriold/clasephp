<?php
class ControllerPerson
{
    var $objPerson;

    public function __construct(Person $objPerson)
    {
        $this->objPerson = $objPerson;
    }

    public function create()
    {
        $code = $this->objPerson->getCode();
        $name = $this->objPerson->getName();
        $phone = $this->objPerson->getPhone();
        $email = $this->objPerson->getEmail();
        $address = $this->objPerson->getAddress();
        $sql = "INSERT INTO Persona VALUES ('$code','$name','$phone','$email','$address')";
        $objControllerPerson = new ConnectionController();
        $objControllerPerson->abrirBd("localhost", "root", "", "bdclients");
        $objControllerPerson->ejecutarComandoSql($sql);
        $objControllerPerson->cerrarBd();
    }

    public function getPeople()
    {
        $sql = "SELECT * FROM persona";
        $objControllerPerson = new ConnectionController();
        $objControllerPerson->abrirBd("localhost", "root", "", "bdclients");
        $resSet = $objControllerPerson->ejecutarSelect($sql);
        $row = $resSet->fetch_all(MYSQLI_ASSOC);
        return $row;
    }

    public function deletePerson()
    {
        $code = $this->objPerson->getCode();
        $sql = "DELETE FROM persona WHERE codigo='$code'";
        $objControllerPerson = new ConnectionController();
        $objControllerPerson->abrirBd("localhost", "root", "", "bdclients");
        $objControllerPerson->ejecutarComandoSql($sql);
        $objControllerPerson->cerrarBd();
    }
    public function getPersonCode()
    {
        $code = $this->objPerson->getCode();
        $sql = "SELECT * FROM persona WHERE codigo='$code'";
        $objControllerPerson = new ConnectionController();
        $objControllerPerson->abrirBd("localhost", "root", "", "bdclients");
        $resSet = $objControllerPerson->ejecutarSelect($sql);
        // $row = $resSet->fetch_array(MYSQLI_ASSOC);
        if ($row = $resSet->fetch_array(MYSQLI_BOTH)) {
            $code = $row['codigo'];
            $name = $row['nombre'];
            $phone = $row['telefono'];
            $email = $row['email'];
            $address = $row['direccion'];
            $this->objPerson->setCode($code);
            $this->objPerson->setName($name);
            $this->objPerson->setPhone($phone);
            $this->objPerson->setEmail($email);
            $this->objPerson->setAddress($address);
        }
        return $this->objPerson;
        // return $row;
    }
    public function updatePerson()
    {
        $code = $this->objPerson->getCode();
        $name = $this->objPerson->getName();
        $phone = $this->objPerson->getPhone();
        $email = $this->objPerson->getEmail();
        $address = $this->objPerson->getAddress();
        $sql = "UPDATE persona SET codigo='$code', nombre='$name', telefono='$phone', email='$email', direccion='$address' WHERE codigo='$code'";
        $objControllerPerson = new ConnectionController();
        $objControllerPerson->abrirBd("localhost", "root", "", "bdclients");
        $objControllerPerson->ejecutarComandoSql($sql);
        $objControllerPerson->cerrarBd();
    }
}
