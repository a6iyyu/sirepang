<?php

namespace App\Exports;

use App\Models\Keluarga;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class KeluargaDataExport implements FromCollection, WithHeadings, WithMapping
{
    protected $tahun;
    protected $kecamatanId;

    public function __construct($tahun, $kecamatanId = null)
    {
        $this->tahun = $tahun;
        $this->kecamatanId = $kecamatanId;
    }

    public function collection()
    {
        return Keluarga::whereYear('created_date', $this->tahun)
            ->when($this->kecamatanId, function ($query) {
                return $query->where('id_kecamatan', $this->kecamatanId);
            })
            ->with(['kecamatan', 'desa', 'kader.user', 'pangan_keluarga'])
            ->get();
    }

    public function headings(): array
    {
        return [
            'ID Keluarga',
            'No KK',
            'Nama Kepala Keluarga',
            'Kecamatan',
            'Desa',
            'Alamat',
            'Kode Pos',
            'Jumlah Anggota',
            'Rentang Pendapatan',
            'Rentang Pengeluaran',
            'Ada Ibu Hamil?',
            'Ada Ibu Menyusui?',
            'Ada Balita?',
            'Nama Kader',
            'Konsumsi Pangan (Nama)',
            'Konsumsi Pangan (URT)',
            'Tanggal Input'
        ];
    }

    public function map($keluarga): array
    {
        $panganData = $keluarga->pangan_keluarga->map(function ($item) {
            return $item->pangan->nama_pangan ?? 'N/A';
        })->implode(', ');

        $panganUrt = $keluarga->pangan_keluarga->map(function ($item) {
            return $item->urt ?? 'N/A';
        })->implode(', ');

        return [
            $keluarga->id_keluarga,
            $keluarga->no_kk ?? '-',
            $keluarga->nama_kepala_keluarga ?? '-',
            $keluarga->kecamatan->nama_kecamatan ?? '-',
            $keluarga->desa->nama_desa ?? '-',
            $keluarga->alamat ?? '-',
            $keluarga->kode_pos ?? '-',
            $keluarga->jumlah_keluarga ?? 0,
            $keluarga->rentang_pendapatan->nama_rentang ?? '-',
            $keluarga->rentang_pengeluaran->nama_rentang ?? '-',
            $keluarga->is_hamil ? 'Ya' : 'Tidak',
            $keluarga->is_menyusui ? 'Ya' : 'Tidak',
            $keluarga->is_balita ? 'Ya' : 'Tidak',
            $keluarga->kader->user->name ?? '-',
            $panganData,
            $panganUrt,
            $keluarga->created_date ? $keluarga->created_date->format('d-m-Y H:i') : '-'
        ];
    }
}
