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
        $id = $product->getId();
        $index = -1;
        for ($i = 0; $i < count($this->items); $i++) {
            if ($this->items[$i]->getProduct()->getId() === $id) {
                $index = $i;
                break;
            }
        }
        if ($index > -1) {
            $this->items[$index]->setQuantity($this->items[$index]->getQuantity()
                + $quantity);
        } else {
            $item = new Item($product, $quantity);
            $this->items[] = $item;
        }
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

    public function removeProduct(Product $product): Cart
    {
        $id = $product->getId();
        $index = -1;
        for ($i = 0; $i < count($this->items); $i++) {
            if ($this->items[$i]->getProduct()->getId() === $id) {
                $index = $i;
                break;
            }
        }

        unset($this->items[$index]);
        $this->items = array_values($this->items);
        return $this;
    }


}