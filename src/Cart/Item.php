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
        if ($product->getMinimumQuantity() <= $quantity) {
            $this->product = $product;
            $this->quantity = $quantity;
            $this->total_price = $quantity * $product->getUnitPrice();
        } else {
            throw new QuantityTooLowException('');
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
        if ($this->product->getMinimumQuantity() <= $quantity) {
            $this->quantity = $quantity;
            $this->total_price = $quantity * $this->product->getUnitPrice();
            return $this;
        } else {
            throw new QuantityTooLowException('');
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
