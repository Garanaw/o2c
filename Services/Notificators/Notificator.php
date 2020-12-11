<?php declare(strict_types = 1);

namespace App\Services\Notificators;

use App\Models\Courier;

interface Notificator
{
    public function notify(Courier $courier): void;
}
