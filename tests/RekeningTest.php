<?php
namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Rekening;
use App\SaldoTidakCukupException;

class RekeningTest extends TestCase
{
    // Skenario Berhasil 3: Penarikan saldo yang mencukupi
    public function testTarikSaldoBerhasil(): void
    {
        $rekening = new Rekening(100000.0);
        $rekening->tarik(40000.0);
        $this->assertEquals(60000.0, $rekening->getSaldo());
    }

    // Skenario Gagal 2: Penarikan melebihi saldo memicu SaldoTidakCukupException
    public function testTarikSaldoTidakCukupException(): void
    {
        $this->expectException(SaldoTidakCukupException::class);
        $rekening = new Rekening(50000.0);
        $rekening->tarik(100000.0);
    }
}
