<?php
namespace Gwo\Recruitment\Cart;

use Gwo\Recruitment\Entity\Product;
use Gwo\Recruitment\Cart\Exception\QuantityTooLowException;

class Item
{

    private $product = null;
    private $quantity = 0;
    private $total_price = 0;

    public function __construct(Product $product, int $quantity)
    {
        $minimum_quantity = $product->getMinimumQuantity();
        if ($minimum_quantity <= $quantity) {
            $this->product = $product;
            $this->quantity = $quantity;
            $this->total_price = $quantity * $product->getUnitPrice();
        } else {
            $text = sprintf('quantity %d too low, minimum quantity is %d', $quantity, $minimum_quantity);
            throw new QuantityTooLowException($text);
        }
    }

    public function increaseQuantity(int $quantity): Item
    {
        $this->quantity += $quantity;
        $this->total_price += $quantity * $this->product->getUnitPrice();
        return $this;
    }

    public function getProduct(): Product
    {
        return $this->product;
    }

    public function setQuantity(int $quantity): Item
    {
        $minimum_quantity = $this->product->getMinimumQuantity();
        if ($minimum_quantity <= $quantity) {
            $this->quantity = $quantity;
            $this->total_price = $quantity * $this->product->getUnitPrice();
            return $this;
        } else {
            $text = sprintf('quantity %d too low, minimum quantity is %d', $quantity, $minimum_quantity);
            throw new QuantityTooLowException($text);
        }
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function getTotalPrice(): int
    {
        return $this->total_price;
    }
}
