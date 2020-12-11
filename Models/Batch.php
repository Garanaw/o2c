<?php declare(strict_types = 1);

namespace App\Models;

class Batch
{
    private int $id;

    /**
     * The courier ID
     *
     * @var int
     */
    private int $sentBy;

    public function getId(): int
    {
        return $this->id;
    }

    public function isSentBy(): int
    {
        return $this->sentBy;
    }

    public function setSentBy(int $id): self
    {
        $this->sentBy = $id;
        return $this;
    }
}
