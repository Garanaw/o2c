<?php declare(strict_types = 1);

namespace App\Services\CourierAlgorithms;

class RoyalMailAlgorithm implements CourierAlgorithm
{
    /**
     * This algorithm is provided by Royal Mail
     *
     * @return string
     */
    public function generateParcelNumber(): string
    {
        return 'Number: ' . rand(101, 150);
    }
}
