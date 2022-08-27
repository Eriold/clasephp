<?php
include('../model/Person.php');
include('./connectionController.php');
class ControllerPerson
{
    var Person $objPerson;

    public function __construct(Person $objPerson)
    {
        $this->objPerson = $objPerson;
    }

    public function save()
    {
        $cod = $this->objPerson->getCode();
        $nam = $this->objPerson->getName();
        $pho = $this->objPerson->getPhone();
        $ema = $this->objPerson->getEmail();
        $add = $this->objPerson->getAddress();
        $sql = "intert into Person values ('" . $cod . "', '" . $nam . "','" . $pho . "','" . $ema . "','" . $add . "')";
        $objControllerPerson = new ConnectionController();
        $objControllerPerson->abrirBd("localhost", "root", "", "bdclients");
        $objControllerPerson->ejecutarComandoSql($sql);
        $objControllerPerson->cerrarBd();
    }
}
