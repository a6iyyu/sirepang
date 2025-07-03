<?php

declare(strict_types=1);

namespace App\Exports;

use App\Models\Keluarga as KeluargaModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class Keluarga implements FromCollection, WithHeadings, WithMapping
{
    protected $tahun;
    protected $id_kecamatan;

    public function __construct(int $tahun, ?int $id_kecamatan = null)
    {
        $this->tahun = $tahun;
        $this->id_kecamatan = $id_kecamatan;
    }

    public function collection(): Collection
    {
        return KeluargaModel::whereYear('created_date', $this->tahun)
            ->when($this->id_kecamatan, fn($query) => $query->where('id_kecamatan', $this->id_kecamatan))
            ->with(['desa', 'kader', 'kecamatan', 'pangan_keluarga', 'rentang_pendapatan', 'rentang_pengeluaran'])
            ->get();
    }

    public function headings(): array
    {
        return [
            'ID Keluarga',
            'Nama Kepala Keluarga',
            'Kecamatan',
            'Desa',
            'Alamat',
            'Kode Wilayah',
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
        $pangan = $keluarga->pangan_keluarga->map(fn($item) => $item->pangan->nama_pangan ?? 'N/A')->implode(', ');
        $urt = $keluarga->pangan_keluarga->map(fn($item) => $item->urt ?? 'N/A')->implode(', ');

        return [
            $keluarga->id_keluarga,
            $keluarga->nama_kepala_keluarga ?? '-',
            $keluarga->kecamatan->nama_kecamatan ?? '-',
            $keluarga->desa->nama_desa ?? '-',
            $keluarga->alamat ?? '-',
            $keluarga->kecamatan->kode_wilayah ?? '-',
            $keluarga->jumlah_keluarga ?? 0,
            $keluarga->rentang_uang->batas_bawah ?? '-',
            $keluarga->rentang_uang->batas_atas ?? '-',
            $keluarga->is_hamil ? 'Ya' : 'Tidak',
            $keluarga->is_menyusui ? 'Ya' : 'Tidak',
            $keluarga->is_balita ? 'Ya' : 'Tidak',
            $keluarga->kader->nama ?? '-',
            $pangan,
            $urt,
            $keluarga->created_date ? Carbon::parse($keluarga->created_date)->format('d-m-Y H:i') : '-'
        ];
    }
}