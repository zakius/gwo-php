<?php


namespace Recruitment\Cart;


use Recruitment\Entity\Product;

class Item
{
    private $product;
    private $quantity;

    /**
     * Item constructor.
     *
     * @param Product $product
     * @param int     $quantity
     */
    public function __construct(Product $product, int $quantity)
    {
        $this->product = $product;
        $this->quantity = $quantity;
    }

    /**
     * @return Product
     */
    public function getProduct(): Product
    {
        return $this->product;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function getTotalPrice(): int
    {
        return $this->product->getUnitPrice() * $this->quantity;
    }
}