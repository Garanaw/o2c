<?php declare(strict_types = 1);

namespace App\Models;

class Courier
{
    private int $id;
    private string $name;
    private string $dataTransportMethod;

    public function __construct()
    {
        // The idea is to map this from a persistent data source
        $couriers = [
            'Royal Mail',
            'ANC',
            'Parcel Force',
        ];
        $dtm = [
            'ftp',
            'mail',
            'push',
        ];
        $this->name = $couriers[array_rand($couriers)];
        $this->dataTransportMethod = $dtm[array_rand($dtm)];
    }

    /**
     * The consignment numbers will be generated based on this name.
     * This is a basic version of the strategy pattern
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    public function getDataTransportMethod(): string
    {
        return $this->dataTransportMethod;
    }
}
