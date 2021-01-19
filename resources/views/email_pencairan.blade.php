<div style="font-family: sans-serif">
    Saldo anda telah dicairkan.<br />
    ID : {{ $user->id }}<br />
    Tanggal : {{ Carbon::now()->format('d F Y') }}<br />
    Saldo yang dicairkan : {{ rupiah($total_pencairan) }}<br />
    <br><br>
    Terimakasih telah melakukan penjualan Logam.
</div>