<?php
namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Siswa;
use App\NilaiTidakValidException;

class SiswaTest extends TestCase
{
    // Skenario Berhasil 1: Mengatur nilai dalam rentang valid
    public function testSetNilaiValid(): void
    {
        $siswa = new Siswa();
        $siswa->setNilai(85);
        $this->assertEquals(85, $siswa->getNilai());
    }

    // Skenario Berhasil 2: Mengatur nilai pada batas bawah (0) dan atas (100)
    public function testSetNilaiBatasValid(): void
    {
        $siswa = new Siswa();
        $siswa->setNilai(0);
        $this->assertEquals(0, $siswa->getNilai());

        $siswa->setNilai(100);
        $this->assertEquals(100, $siswa->getNilai());
    }

    // Skenario Gagal 1: Nilai di luar rentang (150) memicu NilaiTidakValidException
    public function testSetNilaiTidakValidException(): void
    {
        $this->expectException(NilaiTidakValidException::class);
        $siswa = new Siswa();
        $siswa->setNilai(150);
    }
}
