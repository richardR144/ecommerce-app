<?php

class Order
{
    public $id;
    public $customerName;

    public $status;

    public $totalPrice;

    public $products;

    public function addProduct()
    {
        if ($this->status === "cart") {
            $this->products[] = "Pringles";
            $this->totalPrice += 3;
        }
    }

    public function pay() {
        if($this->status === "cart") {
            $this->status = "paid";
        }
    }
}