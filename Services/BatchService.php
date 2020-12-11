<?php declare(strict_types = 1);

namespace App\Services;

use App\Models\Batch;
use App\Models\Consignment;
use App\Models\Courier;
use DateTimeInterface;

class BatchService
{
    private CourierAlgorithmManager $algorithmManager;

    public function __construct(CourierAlgorithmManager $algorithmManager)
    {
        $this->algorithmManager = $algorithmManager;
    }

    public function startNewBatch(Courier $courier, DateTimeInterface $dateTime)
    {
        // Initiate a new batch in the database. This also implements the
        // ability to add consignments to the batch
        $parcels = $this->selectParcelsBasedOnDate($courier, $dateTime);
    }

    /**
     * Selects all the parcels (Consignments) to be sent today
     *
     * @param Courier $courier
     * @param DateTimeInterface $dateTime
     * @return array
     */
    public function selectParcelsBasedOnDate(Courier $courier, DateTimeInterface $dateTime): array
    {
        // This should be based on the payment date and time
        // and should be read from the database. Another variable
        // to consider is the delivery method (one-day, one-week...)
        $parcels = array_pad([], rand(1, 10), new Consignment());
        $batch = new Batch();

        // Based on the selected courier, generate a consignment number with their algorithms
        $algorithm = $this->algorithmManager->select($courier->getName());
        return array_map(function (Consignment $consignment) use ($algorithm, $batch) {
            // This will need to be saved to the database so it can be sent at the end of
            // the dispatch period
            return $consignment
                ->setBatch($batch->getId())
                ->setConsignmentNumber($algorithm->generateParcelNumber());
        }, $parcels);
    }
}
