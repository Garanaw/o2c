<?php declare(strict_types = 1);

namespace App\Services\CourierAlgorithms;

class ParcelForceAlgorithm implements CourierAlgorithm
{
    /**
     * This algorithm is provided by Parcel Force
     *
     * @return string
     */
    public function generateParcelNumber(): string
    {
        return 'Number: ' . rand(51, 100);
    }
}
