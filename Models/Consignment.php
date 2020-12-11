<?php declare(strict_types = 1);

namespace App\Models;

class Consignment
{
    private int $id;

    /**
     * Initially this value is null in the database and
     * it'll be filled when the dispatch period starts
     *
     * @var string|null
     */
    private ?string $consignmentNumber = null;

    /**
     * Nullable, it will be set when the parcel is assigned
     * to a courier in a batch
     *
     * @var int|null
     */
    private ?int $batch = null;

    public function setConsignmentNumber(string $number): self
    {
        $this->consignmentNumber = $number;
        return $this;
    }

    public function setBatch(int $batch): self
    {
        $this->batch = $batch;
        return $this;
    }
}
