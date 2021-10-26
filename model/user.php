<?php
class User{
    
    private $id;
    private $userName;
    private $password;
    private $fullName;
    private $phone;
    private $email;
    private $address;
    private $gender;
    private $dateOfBirth;
    private $createAt;
    private $updateAt;
    
    function __construct(){
        
    }
    function getId() {
        return $this->id;
    }

    function getUserName() {
        return $this->userName;
    }

    function getPassword() {
        return $this->password;
    }

    function getFullName() {
        return $this->fullName;
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

    function getGender() {
        return $this->gender;
    }

    function getDateOfBirth() {
        return $this->dateOfBirth;
    }

    function getCreateAt() {
        return $this->createAt;
    }

    function getUpdateAt() {
        return $this->updateAt;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setUserName($userName): void {
        $this->userName = $userName;
    }

    function setPassword($password): void {
        $this->password = $password;
    }

    function setFullName($fullName): void {
        $this->fullName = $fullName;
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

    function setGender($gender): void {
        $this->gender = $gender;
    }

    function setDateOfBirth($dateOfBirth): void {
        $this->dateOfBirth = $dateOfBirth;
    }

    function setCreateAt($createAt): void {
        $this->createAt = $createAt;
    }

    function setUpdateAt($updateAt): void {
        $this->updateAt = $updateAt;
    }

}
?>