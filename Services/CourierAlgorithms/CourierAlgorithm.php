<?php declare(strict_types = 1);

namespace App\Services\CourierAlgorithms;

interface CourierAlgorithm
{
    public function generateParcelNumber(): string;
}
