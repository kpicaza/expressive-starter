<?php

declare(strict_types=1);

namespace App\Domain\Event;

use DateTimeImmutable;
use JsonSerializable;

interface DomainEvent extends JsonSerializable
{
    public function name(): string;
    public function payload(): array;
    public function occurredOn(): DateTimeImmutable;
}
