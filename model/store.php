<?php

class Store {

    private $idStore;
    private $nameStore;
    private $phone;
    private $email;
    private $address;
    private $createAt;
    private $updateAt;
    private $optionCategory;
    private $desciption;
    private $idUser;

    function __construct() {
        
    }

    function getIdUser() {
        return $this->idUser;
    }

    function setIdUser($idUser): void {
        $this->idUser = $idUser;
    }

    function getOptionCategory() {
        return $this->optionCategory;
    }

    function getDesciption() {
        return $this->desciption;
    }

    function setOptionCategory($optionCategory): void {
        $this->optionCategory = $optionCategory;
    }

    function setDesciption($desciption): void {
        $this->desciption = $desciption;
    }

    function getIdStore() {
        return $this->idStore;
    }

    function getNameStore() {
        return $this->nameStore;
    }

    function getPhone() {
        return $this->phone;
    }

    function getEmail() {
        return $this->email;
    }

    function getAddress() {
        return $this->address;
    }

    function getCreateAt() {
        return $this->createAt;
    }

    function getUpdateAt() {
        return $this->updateAt;
    }

    function setIdStore($idStore): void {
        $this->idStore = $idStore;
    }

    function setNameStore($nameStore): void {
        $this->nameStore = $nameStore;
    }

    function setPhone($phone): void {
        $this->phone = $phone;
    }

    function setEmail($email): void {
        $this->email = $email;
    }

    function setAddress($address): void {
        $this->address = $address;
    }

    function setCreateAt($createAt): void {
        $this->createAt = $createAt;
    }

    function setUpdateAt($updateAt): void {
        $this->updateAt = $updateAt;
    }

}

?>