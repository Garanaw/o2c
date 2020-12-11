<?php declare(strict_types = 1);

namespace App\Services\CourierAlgorithms;

class AncAlgorithm implements CourierAlgorithm
{
    /**
     * This algorithm is provided by ANC
     *
     * @return string
     */
    public function generateParcelNumber(): string
    {
        return 'number: ' . rand(1, 50);
    }
}
