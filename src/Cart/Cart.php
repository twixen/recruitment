<?php
namespace Gwo\Recruitment\Cart;

use Gwo\Recruitment\Entity\Product;
use Gwo\Recruitment\Cart\Item;
use OutOfBoundsException;

class Cart
{

    private $items = [];
    private $total_price = 0;

    public function addProduct(Product $product, int $quantity): Cart
    {
        $key = $this->searchItem($product);
        if ($key >= 0) {
            $this->items[$key]->increaseQuantity($quantity);
        } else {
            $this->items[] = new Item($product, $quantity);
        }
        $this->calculateTotalPrice();
        return $this;
    }

    public function removeProduct(Product $product): Cart
    {
        $key = $this->searchItem($product);
        $items = $this->items;
        unset($items[$key]);
        $this->items = array_values($items);
        $this->calculateTotalPrice();
        return $this;
    }

    public function setQuantity(Product $product, int $quantity): Cart
    {
        $key = $this->searchItem($product);
        $this->items[$key]->setQuantity($quantity);
        $this->calculateTotalPrice();
        return $this;
    }

    public function getItem(int $index): Item
    {
        $min = min(array_keys($this->items));
        $max = max(array_keys($this->items));
        if ($index >= $min && $index <= $max) {
            return $this->items[$index];
        } else {
            throw new OutOfBoundsException(sprintf('%d out of bounds [%d, %d]', $index, $min, $max));
        }
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function getTotalPrice(): int
    {
        return $this->total_price;
    }

    private function calculateTotalPrice()
    {
        $total_price = 0;
        foreach ($this->items as $item) {
            $total_price += $item->getTotalPrice();
        }
        $this->total_price = $total_price;
    }

    private function searchItem(Product $product): int
    {
        foreach ($this->items as $key => $item) {
            if ($item->getProduct() === $product) {
                return $key;
            }
        }
        return -1;
    }
}
