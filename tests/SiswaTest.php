<?php
namespace App;

class Siswa
{
    private string $nama;
    private int $nilai;

    public function __construct(string $nama = '', int $nilai = 0)
    {
        $this->nama = $nama;
        $this->setNilai($nilai);
    }

    public function setNilai(int $nilai): void
    {
        if ($nilai < 0 || $nilai > 100) {
            throw new NilaiTidakValidException("Nilai harus berada di antara 0 dan 100.");
        }
        $this->nilai = $nilai;
    }

    public function getNilai(): int
    {
        return $this->nilai;
    }

    public function setNama(string $nama): void
    {
        $this->nama = $nama;
    }

    public function getNama(): string
    {
        return $this->nama;
    }
}
