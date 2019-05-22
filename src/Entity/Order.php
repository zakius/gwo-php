<?php


namespace Recruitment\Entity;


use Recruitment\Cart\Item;

class Order
{
    private $id;
    private $items;
    private $totalPrice;

    /**
     * Order constructor.
     *
     * @param int $id
     * @param     $items
     * @param     $totalPrice
     */
    public function __construct(int $id, $items, $totalPrice)
    {
        $this->id = $id;
        $this->items = $items;
        $this->totalPrice = $totalPrice;
    }

    /**
     * @return array
     */
    public function getDataForView()
    {
        $itemsData = [];
        foreach ($this->items as $item) {
            $itemsData[] = $this->getItemData($item);
        }

        return [
            'id' => $this->id,
            'items' => $itemsData,
            'total_price' => $this->totalPrice
        ];
    }

    /**
     * @param Item $item
     *
     * @return array
     */
    private function getItemData(Item $item)
    {
        return [
            'id' => $item->getProduct()->getId(),
            'quantity' => $item->getQuantity(),
            'total_price' => $item->getTotalPrice()
        ];
    }

}