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
     * @param int   $id
     * @param array $items
     * @param int   $totalPrice
     */
    public function __construct(int $id, array $items, int $totalPrice)
    {
        $this->id = $id;
        $this->items = $items;
        $this->totalPrice = $totalPrice;
    }

    /**
     * @return array
     */
    public function getDataForView(): array
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
    private function getItemData(Item $item): array
    {
        return [
            'id' => $item->getProduct()->getId(),
            'quantity' => $item->getQuantity(),
            'total_price' => $item->getTotalPrice()
        ];
    }
}
