<?php

class Staff {

    private $idStaff;
    private $idUser;
    private $idStore;
    private $role;
    private $createBy;
    private $createAt;
    private $updateAt;

    function __construct() {
        
    }

    public function getIdStaff() {
        return $this->idStaff;
    }

    public function getIdUser() {
        return $this->idUser;
    }

    public function getIdStore() {
        return $this->idStore;
    }

    public function getRole() {
        return $this->role;
    }

    public function getCreateAt() {
        return $this->createAt;
    }

    public function getUpdateAt() {
        return $this->updateAt;
    }

    public function setIdStaff($idStaff): void {
        $this->idStaff = $idStaff;
    }

    public function setIdUser($idUser): void {
        $this->idUser = $idUser;
    }

    public function setIdStore($idStore): void {
        $this->idStore = $idStore;
    }

    public function setRole($role): void {
        $this->role = $role;
    }

    function getCreateBy() {
        return $this->createBy;
    }

    function setCreateBy($createBy): void {
        $this->createBy = $createBy;
    }

    public function setCreateAt($createAt): void {
        $this->createAt = $createAt;
    }

    public function setUpdateAt($updateAt): void {
        $this->updateAt = $updateAt;
    }

}

?>