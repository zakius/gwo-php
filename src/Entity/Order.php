<?php


namespace Recruitment\Entity;

use Recruitment\Cart\Item;

class Order
{
    private $id;
    private $items;
    private $totalPrice;
    private $totalPriceGross;

    /**
     * Order constructor.
     *
     * @param int   $id
     * @param array $items
     * @param int   $totalPrice
     * @param int   $totalPriceGross
     */
    public function __construct(int $id, array $items, int $totalPrice, int $totalPriceGross)
    {
        $this->id = $id;
        $this->items = $items;
        $this->totalPrice = $totalPrice;
        $this->totalPriceGross = $totalPriceGross;
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
            'total_price' => $this->totalPrice,
            'total_price_gross' => $this->totalPriceGross
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
            'total_price' => $item->getTotalPrice(),
            'total_price_gross' => $item->getTotalPriceGross(),
            'tax' => $item->getProduct()->getTax() . '%'
        ];
    }
}
