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

    /**
     * Get the value of Code
     */
    public function getCode()
    {
        return $this->Code;
    }

    /**
     * Set the value of Code
     *
     * @return  self
     */
    public function setCode($Code)
    {
        $this->Code = $Code;

        return $this;
    }

    /**
     * Get the value of Name
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * Set the value of Name
     *
     * @return  self
     */
    public function setName($Name)
    {
        $this->Name = $Name;

        return $this;
    }

    /**
     * Get the value of Phone
     */
    public function getPhone()
    {
        return $this->Phone;
    }

    /**
     * Set the value of Phone
     *
     * @return  self
     */
    public function setPhone($Phone)
    {
        $this->Phone = $Phone;

        return $this;
    }

    /**
     * Get the value of Email
     */
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * Set the value of Email
     *
     * @return  self
     */
    public function setEmail($Email)
    {
        $this->Email = $Email;

        return $this;
    }

    /**
     * Get the value of Address
     */
    public function getAddress()
    {
        return $this->Address;
    }

    /**
     * Set the value of Address
     *
     * @return  self
     */
    public function setAddress($Address)
    {
        $this->Address = $Address;

        return $this;
    }
}
