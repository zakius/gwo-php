<?php


namespace Recruitment\Cart;


use Recruitment\Entity\Product;

class Cart
{
    private $items;

    public function __construct()
    {
        $this->items = [];
    }

    public function addProduct(Product $product, int $quantity): Cart
    {
        $item = new Item($product, $quantity);
        $this->items[] = $item;
        return $this;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function getTotalPrice(): int
    {
        $totalPrice = 0;
        foreach ($this->items as $item) {
            $totalPrice += $item->getTotalPrice();
        }
        return $totalPrice;
    }

    public function getItem(int $index): Item
    {
        return $this->items[$index];
    }


}