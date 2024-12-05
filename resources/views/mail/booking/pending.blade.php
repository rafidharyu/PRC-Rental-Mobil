<x-mail::message>
# Konfirmasi Pemesanan

Kepada Yth. {{ $data['name'] }},

Pemesanan booking mobil pada tanggal {{ date('d-m-Y', strtotime($data['pick_date'])) }} pukul {{ $data['pick_time'] }}. Berikut adalah detail pemesanan Anda:

- Jenis mobil: {{ \App\Models\Car::where('id', $data['car_id'])->pluck('name')->first() }}
- Jenis mengemudi: {{ $data['drive_option'] == 'menyetir_sendiri' ? 'Menyetir Sendiri' : 'Include Sopir' }}
- Lokasi pengambilan: {{ $data['pick_option'] == 'garasi' ? 'Garasi' : 'Tempat Lain' }}
{{-- - Alamat pengambilan (jika tempat lain): {{ $data['pick_address'] ?? '' }} --}}
{{-- - Total biaya sewa selama {{ \Carbon\Carbon::parse($data['pick_date'])->diffInDays(\Carbon\Carbon::parse($data['drop_date'])) + 1 }} hari: Rp. {{ number_format($data['price_total'], 0, ',', '.') }} --}}
- Total biaya sewa selama {{ $data['duration'] }} hari: Rp. {{ number_format($data['price_total'], 0, ',', '.') }}
- Biaya DP: Rp. {{ number_format($data['down_payment'], 0, ',', '.') }}
- Catatan: {{ $data['message'] ?? '-' }}

Mohon menunggu verifikasi dari staf kami. Kami akan mengirimkan email verifikasi setelah pemesanan Anda dikonfirmasi.

Terima kasih telah memilih kami.

Hormat kami,
PRC Sewa Mobil Lampung
</x-mail::message>

