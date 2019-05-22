<?php


namespace Recruitment\Cart;

use OutOfBoundsException;
use Recruitment\Entity\Order;
use Recruitment\Entity\Product;

class Cart
{
    private $items;

    /**
     * Cart constructor.
     */
    public function __construct()
    {
        $this->items = [];
    }

    /**
     * @param Product $product
     *
     * @return int
     */
    private function getProductIndex(Product $product): int
    {
        $id = $product->getId();
        $index = -1;
        for ($i = 0; $i < count($this->items); $i++) {
            if ($this->items[$i]->getProduct()->getId() === $id) {
                $index = $i;
                break;
            }
        }
        return $index;
    }

    /**
     * @param Product $product
     * @param int     $quantity
     *
     * @return Cart
     */
    public function addProduct(Product $product, int $quantity = 1): Cart
    {
        $index = $this->getProductIndex($product);
        if ($index > -1) {
            $currentQuantity = $this->items[$index]->getQuantity();
            $this->items[$index]->setQuantity($currentQuantity + $quantity);
        } else {
            $item = new Item($product, $quantity);
            $this->items[] = $item;
        }
        return $this;
    }

    /**
     * @return int
     */
    public function getTotalPrice(): int
    {
        $totalPrice = 0;
        foreach ($this->items as $item) {
            $totalPrice += $item->getTotalPrice();
        }
        return $totalPrice;
    }

    /**
     * @return array
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param int $index
     *
     * @return Item
     */
    public function getItem(int $index): Item
    {
        if ($index < 0 || $index >= count($this->items)) {
            throw new OutOfBoundsException();
        }
        return $this->items[$index];
    }

    /**
     * @param Product $product
     *
     * @return Cart
     */
    public function removeProduct(Product $product): Cart
    {
        $index = $this->getProductIndex($product);
        if ($index === -1) {
            return $this;
        }
        unset($this->items[$index]);
        $this->items = array_values($this->items);
        return $this;
    }

    /**
     * @param Product $product
     * @param int     $quantity
     *
     * @return Cart
     */
    public function setQuantity(Product $product, int $quantity): Cart
    {
        $index = $this->getProductIndex($product);
        if ($index === -1) {
            return $this->addProduct($product, $quantity);
        }
        $this->items[$index]->setQuantity($quantity);

        return $this;
    }

    /**
     * @param int $id
     *
     * @return Order
     */
    public function checkout(int $id)
    {
        $order = new Order($id, $this->items, $this->getTotalPrice());
        $this->items = [];
        return $order;
    }
}
