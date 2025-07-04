<?php

namespace  App\Domain\ValueObjects;

use InvalidArgumentException;

final class ISBN
{
    private string $value;

    public function __construct(string $value)
    {
        $normalized = $this->normalize($value);

        if (!$this->isValid($normalized)) {
            throw new InvalidArgumentException("Invalid ISBN: $value");
        }

        $this->value = $normalized;
    }

    private function normalize(string $isbn): string
    {
        // Remove hífens e espaços
        return str_replace(['-', ' '], '', $isbn);
    }

    private function isValid(string $isbn): bool
    {
        if (strlen($isbn) === 10) {
            return $this->isValidIsbn10($isbn);
        }

        if (strlen($isbn) === 13) {
            return $this->isValidIsbn13($isbn);
        }

        return false;
    }

    private function isValidIsbn10(string $isbn): bool
    {
        if (!preg_match('/^\d{9}[\dX]$/', $isbn)) {
            return false;
        }

        $sum = 0;
        for ($i = 0; $i < 9; $i++) {
            $sum += ((int) $isbn[$i]) * ($i + 1);
        }

        $check = $isbn[9];
        $sum += ($check === 'X') ? 10 * 10 : (int) $check * 10;

        return $sum % 11 === 0;
    }

    private function isValidIsbn13(string $isbn): bool
    {
        if (!preg_match('/^\d{13}$/', $isbn)) {
            return false;
        }

        $sum = 0;
        for ($i = 0; $i < 12; $i++) {
            $digit = (int) $isbn[$i];
            $sum += $digit * ($i % 2 === 0 ? 1 : 3);
        }

        $checkDigit = (10 - ($sum % 10)) % 10;

        return $checkDigit === (int) $isbn[12];
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }

    public function equals(ISBN $other): bool
    {
        return $this->value === $other->value;
    }
}
