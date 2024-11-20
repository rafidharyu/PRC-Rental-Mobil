<?php

namespace App\Exports;

use App\Models\Transaction;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Style;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class TransactionExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    protected $start_date, $end_date;

    public function __construct($start_date, $end_date)
    {
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }

    /**
     * Mengambil data transaksi
     */
    public function collection()
    {
        return Transaction::whereBetween('created_at', [$this->start_date, $this->end_date])
            ->get()
            ->map(function ($transaction, $index) {
                return [
                    'No' => $index + 1,
                    'Created At' => date('d-m-Y', strtotime($transaction->created_at)),
                    'code' => $transaction->code,
                    'name' => $transaction->name,
                    'email' => $transaction->email,
                    'phone' => $transaction->phone,
                    'car_name' => $transaction->car->name,
                    'pick_date' => date('d-m-Y', strtotime($transaction->pick_date)),
                    'pick_time' => $transaction->pick_time,
                    'drop_date' => date('d-m-Y', strtotime($transaction->drop_date)),
                    'drop_time' => $transaction->drop_time,
                    'pick_option' => $transaction->pick_option,
                    'drop_option' => $transaction->drop_option,
                    'drive_option' => $transaction->drive_option,
                    'price_total' => 'Rp. ' . number_format($transaction->price_total, 0, ',', '.'),
                    'file' => url(asset('storage/' . $transaction->file)),
                    'message' => $transaction->message,
                    'status' => $transaction->status,
                ];
            });
    }

    /**
     * Menentukan heading tabel
     */
    public function headings(): array
    {
        return [
            'No',
            'Created At',
            'code',
            'name',
            'email',
            'phone',
            'car_name',
            'pick_date',
            'pick_time',
            'drop_date',
            'drop_time',
            'pick_option',
            'drop_option',
            'drive_option',
            'price_total',
            'file',
            'message',
            'status',
        ];
    }

    /**
     * Memberikan gaya khusus untuk header tabel
     */
    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:R1')->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
            'font' => [
                'bold' => true,
            ],
        ]);

        return [];
    }

}
