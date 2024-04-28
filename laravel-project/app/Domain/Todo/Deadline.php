<?php
namespace App\Domain\Todo;
use DateTime;

final class Deadline
{
    private $value;

    public function __construct($value)
    {
        $this->value = new DateTime($value);
    }

    public function value(): \DateTime
    {
        return $this->value;
    }

    public function __toString()
    {
        return $this->value->format('Y-m-d');
    }
}
