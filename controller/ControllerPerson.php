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
        $recordSet = $objControllerPerson->ejecutarSelect($sql);
        $row = $recordSet->fetch_all(MYSQLI_ASSOC);
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
    public function updatePerson() {
        $code = $this->objPerson->getCode();
        $sql = "SELECT FROM persona WHERE codigo='$code'";
        $objControllerPerson = new ConnectionController();
        $objControllerPerson->abrirBd("localhost", "root", "", "bdclients");
        $objControllerPerson->ejecutarComandoSql($sql);
        $objControllerPerson->cerrarBd();
    }
}
