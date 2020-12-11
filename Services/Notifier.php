<?php declare(strict_types = 1);

namespace App\Services;

use App\Models\Courier;

class Notifier
{
    private NotificatorManager $notificatorManager;

    public function __construct(NotificatorManager $notificatorManager)
    {
        $this->notificatorManager = $notificatorManager;
    }

    public function notifyCourier(Courier $courier): void
    {
        $notificator = $this->notificatorManager->select($courier->getDataTransportMethod());
        $notificator->notify($courier);
    }
}
