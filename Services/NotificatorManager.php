<?php declare(strict_types = 1);

namespace App\Services;

use App\Services\Notificators\FtpNotificator;
use App\Services\Notificators\MailNotificator;
use App\Services\Notificators\Notificator;
use App\Services\Notificators\PushNotificator;
use InvalidArgumentException;

class NotificatorManager
{
    public function select(string $name): Notificator
    {
        $method = 'create' . $this->studly($name) . 'Notificator';

        if (method_exists($this, $method)) {
            return $this->$method();
        }

        throw new InvalidArgumentException("Notificator [$name] not supported.");
    }

    public function createFtpNotificator(): FtpNotificator
    {
        return new FtpNotificator();
    }

    public function createMailNotificator(): MailNotificator
    {
        return new MailNotificator();
    }

    public function createPushNotificator(): PushNotificator
    {
        return new PushNotificator();
    }

    private function studly(string $value): string
    {
        $value = ucwords(str_replace(['-', '_'], ' ', $value));
        return str_replace(' ', '', $value);
    }
}
