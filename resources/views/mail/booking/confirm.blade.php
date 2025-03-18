<x-mail::message>
# Konfirmasi Reservasi, Status: {{ $data['status'] }}

Kepada Yth. {{ $data['name'] }},

@if ($data['status'] != 'failed')
Kode Reservasi Anda: {{ strtoupper($data['code']) }}.
@endif

@if ($data['status'] == 'failed')
Maaf, reservasi Anda tidak dapat diproses.
@else
Terima kasih telah memilih kami.
@endif

Silakan klik tombol di bawah ini untuk konfirmasi lebih lanjut melalui WhatsApp.

<x-mail::button :url="'https://wa.me/6285769040309?text='.urlencode('Halo, saya ingin konfirmasi terkait reservasi dengan kode: '.$data['code'])">
Konfirmasi via WhatsApp
</x-mail::button>

Hormat kami,
PRC Sewa Mobil Lampung
</x-mail::message>
