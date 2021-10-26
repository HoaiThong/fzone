<?php

class Product {

    private $idProduct;
    private $idStore;
    private $skuProduct;
    private $nameProduct;
    private $iconLink;
    private $imageSource;
    private $description;
    private $inventory;
    //--- Giá dropship ---
    private $dropPrices;
    //--- Giá gốc ---
    private $originalPrices;
    //--- Giá bán buôn ---
    private $wholesalePrices;
    //--- giá bán lẻ ---
    private $retailPrices;
    //--- đơn vị đo lường ----
    private $unitProduct;
    //--- Phân loại hàng hóa ---
    private $categoryProduct;
    
    private $createAt;
    private $updateAt;
    //-------------- TAG -------------------
    public $tagIdProduct = "idProduct";
    public $tagIdStore = "idStore";
    public $tagSkuProduct = "skuProduct";
    public $tagNameProduct = "nameProduct";
    public $tagIconLink = "iconLink";
    public $tagImageSource = "imageSource";
    public $tagDescription = "description";
    public $tagInventory = "inventory";
    public $tagDropPrices = "dropPrices";
    public $tagOriginalPrices = "originalPrices";
    public $tagWholesalePrices = "wholesalePrices";
    public $tagRetailPrices = "retailPrices";
    public $tagUnitProduct="unitProduct";
    public $tagCategoryProduct="category";
    public $tagCreateAt = "createAt";
    public $tagUpdateAt = "updateAt";

    function __construct() {
        
    }
    function getIdProduct() {
        return $this->idProduct;
    }

    function getIdStore() {
        return $this->idStore;
    }

    function getSkuProduct() {
        return $this->skuProduct;
    }

    function getNameProduct() {
        return $this->nameProduct;
    }

    function getIconLink() {
        return $this->iconLink;
    }

    function getImageSource() {
        return $this->imageSource;
    }

    function getDescription() {
        return $this->description;
    }

    function getInventory() {
        return $this->inventory;
    }

    function getDropPrices() {
        return $this->dropPrices;
    }

    function getOriginalPrices() {
        return $this->originalPrices;
    }

    function getWholesalePrices() {
        return $this->wholesalePrices;
    }

    function getRetailPrices() {
        return $this->retailPrices;
    }

    function getUnitProduct() {
        return $this->unitProduct;
    }

    function getCategoryProduct() {
        return $this->categoryProduct;
    }

    function getCreateAt() {
        return $this->createAt;
    }

    function getUpdateAt() {
        return $this->updateAt;
    }

    function setIdProduct($idProduct): void {
        $this->idProduct = $idProduct;
    }

    function setIdStore($idStore): void {
        $this->idStore = $idStore;
    }

    function setSkuProduct($skuProduct): void {
        $this->skuProduct = $skuProduct;
    }

    function setNameProduct($nameProduct): void {
        $this->nameProduct = $nameProduct;
    }

    function setIconLink($iconLink): void {
        $this->iconLink = $iconLink;
    }

    function setImageSource($imageSource): void {
        $this->imageSource = $imageSource;
    }

    function setDescription($description): void {
        $this->description = $description;
    }

    function setInventory($inventory): void {
        $this->inventory = $inventory;
    }

    function setDropPrices($dropPrices): void {
        $this->dropPrices = $dropPrices;
    }

    function setOriginalPrices($originalPrices): void {
        $this->originalPrices = $originalPrices;
    }

    function setWholesalePrices($wholesalePrices): void {
        $this->wholesalePrices = $wholesalePrices;
    }

    function setRetailPrices($retailPrices): void {
        $this->retailPrices = $retailPrices;
    }

    function setUnitProduct($unitProduct): void {
        $this->unitProduct = $unitProduct;
    }

    function setCategoryProduct($categoryProduct): void {
        $this->categoryProduct = $categoryProduct;
    }

    function setCreateAt($createAt): void {
        $this->createAt = $createAt;
    }

    function setUpdateAt($updateAt): void {
        $this->updateAt = $updateAt;
    }


}

?>