<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk #{{ $transaction->id }}</title>
    <style>
        @page { size: 58mm auto; margin: 0; }
        body { 
            font-family: 'Courier New', Courier, monospace; 
            width: 58mm; 
            margin: 0 auto; 
            padding: 10px; 
            font-size: 12px; 
            color: #000;
            line-height: 1.4;
        }
        .text-center { text-align: center; }
        .text-right { text-align: right; }
        .flex { display: flex; justify-content: space-between; }
        .hr { border-top: 1px dashed #000; margin: 8px 0; }
        .brand { font-size: 18px; font-weight: bold; margin-bottom: 2px; }
        .items { margin-bottom: 10px; }
        .item-row { margin-bottom: 4px; }
        .total-row { font-size: 14px; font-weight: bold; }
        
        /* Tombol navigasi jika print dibatalkan */
        .no-print { 
            display: flex; 
            justify-content: center; 
            margin-top: 20px; 
        }
        .btn-back {
            background: #000; color: #fff; padding: 10px 20px;
            text-decoration: none; border-radius: 5px; font-family: sans-serif;
        }

        @media print {
            .no-print { display: none; }
        }
    </style>
    <script>
        window.onload = function() {
            window.print();
        };
        // Kembali ke kasir setelah print selesai atau dibatalkan
        window.onafterprint = function() {
            window.location.href = "{{ route('kasir.index') }}";
        };
    </script>
</head>
<body>

    <div class="text-center">
        <div class="brand">☕ COFFEE POS</div>
        <div>Jl. Aroma Kopi No. 123</div>
        <div>Telp: 0812-3456-7890</div>
    </div>

    <div class="hr"></div>

    <div>
        <div>No: #{{ str_pad($transaction->id, 5, '0', STR_PAD_LEFT) }}</div>
        <div>Tgl: {{ $transaction->created_at->format('d/m/y H:i') }}</div>
        <div>Kasir: {{ Auth::user()->name }}</div>
    </div>

    <div class="hr"></div>

    <div class="items">
        @foreach($transaction->items as $item)
            <div class="item-row">
                <div>{{ $item->product->name }}</div>
                <div class="flex">
                    <span>{{ $item->qty }} x {{ number_format($item->product->price, 0, ',', '.') }}</span>
                    <span>{{ number_format($item->subtotal, 0, ',', '.') }}</span>
                </div>
            </div>
        @endforeach
    </div>

    <div class="hr"></div>

    <div class="total-row flex">
        <span>TOTAL</span>
        <span>Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</span>
    </div>

    <div class="hr"></div>

    <div class="text-center" style="margin-top: 15px;">
        <div>Terima Kasih Atas Kunjungan Anda</div>
        <div style="font-size: 10px; margin-top: 5px;">Powered by CoffeePOS v1.0</div>
    </div>

    <div class="no-print">
        <a href="{{ route('kasir.index') }}" class="btn-back">Kembali ke Kasir</a>
    </div>

</body>
</html>