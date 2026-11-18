<?php
namespace App;

class Rekening
{
    private float $saldo;

    public function __construct(float $saldoAwal = 0.0)
    {
        $this->saldo = max(0.0, $saldoAwal);
    }

    public function getSaldo(): float
    {
        return $this->saldo;
    }

    public function setor(float $jumlah): void
    {
        if ($jumlah > 0) {
            $this->saldo += $jumlah;
        }
    }

    public function tarik(float $jumlah): void
    {
        if ($jumlah > $this->saldo) {
            throw new SaldoTidakCukupException("Saldo tidak cukup untuk melakukan penarikan.");
        }
        $this->saldo -= $jumlah;
    }
}
