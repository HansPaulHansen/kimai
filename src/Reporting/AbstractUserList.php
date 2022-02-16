<?php

/*
 * This file is part of the Kimai time-tracking app.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Reporting;

abstract class AbstractUserList
{
    private $date;
    private $decimal = false;
    private $sumType = 'duration';

    public function getDate(): ?\DateTime
    {
        return $this->date;
    }

    public function setDate(\DateTime $date): void
    {
        $this->date = $date;
    }

    public function isDecimal(): bool
    {
        return $this->decimal;
    }

    public function setDecimal(bool $decimal): void
    {
        $this->decimal = $decimal;
    }

    public function getSumType(): string
    {
        return $this->sumType;
    }

    public function setSumType(string $sumType): void
    {
        if (!\in_array($sumType, ['duration', 'rate', 'internalRate'])) {
            throw new \InvalidArgumentException('Unknown sum type');
        }

        $this->sumType = $sumType;
    }
}
