<?php
namespace Gwo\Recruitment\Entity;

use InvalidArgumentException;

class Product
{

    private $id = 0;
    private $unit_price = 0;
    private $quantity = 1;

    public function setId(int $id): Product
    {
        $this->id = $id;
        return $this;
    }

    public function setUnitPrice(int $unit_price): Product
    {
        if ($unit_price > 0) {
            $this->unit_price = $unit_price;
        } else {
            throw new InvalidArgumentException(sprintf('%d is too small, must be greater than zero', $unit_price));
        }
        return $this;
    }

    public function setMinimumQuantity(int $quantity): Product
    {
        if ($quantity > 0) {
            $this->quantity = $quantity;
        } else {
            throw new InvalidArgumentException(sprintf('%d is too small, must be greater than zero', $quantity));
        }
        return $this;
    }

    public function getUnitPrice(): int
    {
        return $this->unit_price;
    }

    public function getMinimumQuantity(): int
    {
        return $this->quantity;
    }
}
