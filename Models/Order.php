<?php declare(strict_types = 1);

namespace App\Models;

class Order
{
    /** @var array<Consignment> */
    private array $items = [];

    public function __construct()
    {
    }
}
