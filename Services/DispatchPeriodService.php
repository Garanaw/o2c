<?php declare(strict_types = 1);

namespace App\Services;

use App\Models\Courier;
use DateInterval;
use DateTimeInterface;

class DispatchPeriodService
{
    private BatchService $batchService;
    private Notifier $notifier;

    public function __construct(BatchService $batchService, Notifier $notifier)
    {
        $this->batchService = $batchService;
        $this->notifier = $notifier;
    }

    public function startDispatchPeriod(DateTimeInterface $dateTime)
    {
        // Persist the new dispatch period to the database. Then select
        // the courier to dispatch the orders
        $courier = $this->selectCourier();
        $this->batchService->startNewBatch($courier, $dateTime);
    }

    public function endDispatchPeriod(DateTimeInterface $dateTime)
    {
        // Calculate the difference between the $dateTime (start) and NOW() (end)
        $dateRange = new DateInterval(1400);
        $couriers = $this->getCourierForDateTime($dateRange);

        foreach ($couriers as $courier) {
            $this->notifier->notifyCourier($courier);
        }
    }

    /**
     * The courier should be selected based on (? no info has been provided)
     *
     * @return Courier
     */
    public function selectCourier(): Courier
    {
        return new Courier();
    }

    /**
     * Here, the couriers selected for the given date and time should be returned
     * from the database, so it can be notified with the generated numbers. The
     * couriers in this result should be unique, as there's no point in selecting
     * the same courier twice for the same date
     *
     * @param DateInterval $dateTime [$start, $end]
     * @return array<Courier>
     */
    public function getCourierForDateTime(DateInterval $dateTime): array
    {
        return array_unique([
            new Courier(),
        ]);
    }
}
