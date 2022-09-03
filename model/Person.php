<?php
class Person
{
    private string $Code;
    private string $Name;
    private string $Phone;
    private string $Email;
    private string $Address;

    public function __construct(
        string $Code,
        string $Name,
        string $Phone,
        string $Email,
        string $Address,
    ) {
        $this->code = $Code;
        $this->name = $Name;
        $this->phone = $Phone;
        $this->email = $Email;
        $this->address = $Address;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function setCode($Code)
    {
        $this->code = $Code;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($Name)
    {
        $this->name = $Name;

        return $this;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($Phone)
    {
        $this->phone = $Phone;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($Email)
    {
        $this->email = $Email;

        return $this;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($Address)
    {
        $this->address = $Address;

        return $this;
    }
}
