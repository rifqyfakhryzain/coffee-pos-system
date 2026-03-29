<!DOCTYPE html>
<html>
<head>
    <title>Struk</title>
<script>
window.onload = function() {
    window.print();
};

window.onafterprint = function() {
    window.location.href = "{{ route('kasir.index') }}";
};
</script>
</head>
<body class="p-6 font-mono">

    <h2>☕ POS Cafe</h2>
    <p>Tanggal: {{ $transaction->created_at }}</p>
    <hr>

    @foreach($transaction->items as $item)
        <div style="display:flex; justify-content:space-between;">
            <span>{{ $item->product->name }} x{{ $item->qty }}</span>
            <span>Rp {{ number_format($item->subtotal) }}</span>
        </div>
    @endforeach

    <hr>

    <div style="display:flex; justify-content:space-between;">
        <strong>Total</strong>
        <strong>Rp {{ number_format($transaction->total_price) }}</strong>
    </div>

    <hr>

    <p>Terima kasih 🙏</p>

</body>
</html>