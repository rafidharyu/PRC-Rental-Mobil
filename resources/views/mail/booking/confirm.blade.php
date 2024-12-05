<x-mail::message>
# Konfirmasi Pemesanan, Status: {{ $data['status'] }}

Kepada Yth. {{ $data['name'] }},

Pemesanan Anda pada {{ date('d-m-Y', strtotime($data['date'])) }} pukul {{ $data['time'] }} telah dikonfirmasi. Berikut adalah detail pemesanan Anda:

- Code Booking: {{ $data['code'] }} <small>*Dapat digunakan untuk mengisi review</small>
- Jenis mobil: {{ \App\Models\Car::where('id', $data['car_id'])->pluck('name')->first() }}
- Jenis mengemudi: {{ $data['drive_option'] == 'menyetir_sendiri' ? 'Menyetir Sendiri' : 'Include Sopir' }}
- Lokasi pengambilan: {{ $data['pick_option'] == 'garasi' ? 'Garasi' : 'Tempat Lain' }}
- Total biaya sewa selama {{ \Carbon\Carbon::parse($data['pick_date'])->diffInDays(\Carbon\Carbon::parse($data['drop_date'])) + 1 }} hari: Rp. {{ number_format($data['price_total'], 0, ',', '.') }}
- Biaya DP: Rp. {{ number_format($data['down_payment'], 0, ',', '.') }}
- Catatan: {{ $data['message'] ?? '-' }}

{{-- <x-mail::button :url="asset('storage/'. $data['file'])">
Download Struk Bayar
</x-mail::button> --}}

@if ($data['status'] == 'failed')
    Maaf, pemesanan Anda tidak dapat diproses.
@else
    Terima kasih, telah memilih kami.
@endif

Hormat kami,
PRC Sewa Mobil Lampung
</x-mail::message>

