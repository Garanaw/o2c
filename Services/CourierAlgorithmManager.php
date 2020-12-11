<?php declare(strict_types = 1);

namespace App\Services;

use App\Services\CourierAlgorithms\AncAlgorithm;
use App\Services\CourierAlgorithms\CourierAlgorithm;
use App\Services\CourierAlgorithms\ParcelForceAlgorithm;
use App\Services\CourierAlgorithms\RoyalMailAlgorithm;
use InvalidArgumentException;

class CourierAlgorithmManager
{
    public function select(string $name): CourierAlgorithm
    {
        $method = 'create' . $this->studly($name) . 'Algorithm';

        if (method_exists($this, $method)) {
            return $this->$method();
        }

        throw new InvalidArgumentException("Algorithm [$name] not supported.");
    }

    public function createRoyalMailAlgorithm(): RoyalMailAlgorithm
    {
        return new RoyalMailAlgorithm();
    }

    public function createAncAlgorithm(): AncAlgorithm
    {
        return new AncAlgorithm();
    }

    public function createParcelForceAlgorithm(): ParcelForceAlgorithm
    {
        return new ParcelForceAlgorithm();
    }

    private function studly(string $value): string
    {
        $value = ucwords(str_replace(['-', '_'], ' ', $value));
        return str_replace(' ', '', $value);
    }
}
