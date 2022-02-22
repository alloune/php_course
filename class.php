<?php

class Item{
    public string $name;
    public string $imageURL;
    public int $id;
    public int $price;
}

class Catalog{

    public array $productList;
    function __construct($db){

        $queryDB=$db->query("SELECT * FROM products");
        $this->productList = $queryDB->fetchAll();

    }

}

class Client{

    private string $firstName;
    private string $lastName;
    private string $adress;
    private int $zipCode;

    function setFirstName(string $firstName){
        $this->firstName = $firstName;
    }
    function setLastName(string $lastName){
        $this->lastName = $lastName;
    }
    function setAdress(string $adress){
        $this->adress = $adress;
    }
    function setZipCode(int $zipCode){
        $this->zipCode = $zipCode;
    }
    function getFirstName(){
        echo $this->firstName;
    }
    function getLastName(){
        echo $this->lastName;
    }
    function getAdress(){
        echo $this->adress ;
    }
    function getZipCode(){
       echo $this->zipCode ;
    }

}

class ClientList{

    ///ATTENTION AUX PRIVATE !!!
    private array $list;

    /**
     * @return array
     */
    public function getList(): array
    {
        return $this->list;
    }

    function __construct($db)
    {
        $co = $db->query("SELECT * FROM customers");
        $this->list = $co->fetchAll(PDO::FETCH_ASSOC);
    }
}