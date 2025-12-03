<?php
class OrderItem{
  public $productNumber
        ,$productName
        ,$unitPrice
        ,$totalAmount
        ,$quantityOrdered
        ,$pickUpDate
        ,$pickUpTime
        ,$image
        ;

  function __construct($productNumber
                      ,$productName
                      ,$unitPrice
                      ,$totalAmount
                      ,$quantityOrdered
                      ,$pickUpDate
                      ,$pickUpTime
                      ,$image
      )
  {
    $this->productNumber = $productNumber;
    $this->productName = $productName;
    $this->unitPrice = $unitPrice;
    $this->totalAmount = $totalAmount;
    $this->quantityOrdered = $quantityOrdered;
    $this->pickUpDate = $pickUpDate;
    $this->pickUpTime = $pickUpTime;
    $this->image = $image;
  }//function __construct

  // Getter methods
  public function getProductNumber() {
    return $this->productNumber;
  }

  public function getProductName() {
    return $this->productName;
  }

  public function getUnitPrice() {
    return $this->unitPrice;
  }

  public function getTotalAmount() {
    return $this->totalAmount;
  }

  public function getQuantityOrdered() {
    return $this->quantityOrdered;
  }

  public function getPickUpDate() {
    return $this->pickUpDate;
  }

  public function getPickUpTime() {
    return $this->pickUpTime;
  }

  public function getProductImage() {
    return $this->image;
  }

}//$orderItemclass OrderItem
 ?>
