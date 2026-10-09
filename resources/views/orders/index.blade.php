<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pesanan | Najwan Store</title>

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            background: #f5f1e9;
            color: #171717;
            font-family: Arial, sans-serif;
        }

        nav {
            padding: 22px 7%;
            background: #171717;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
        }

        .brand {
            font-size: 21px;
            font-weight: 800;
            letter-spacing: 1px;
            text-decoration: none;
            color: white;
        }

        .brand span { color: #c6a875; }

        nav a:last-child {
            color: #f5f1e9;
            text-decoration: none;
            font-size: 12px;
        }

        main {
            max-width: 1000px;
            margin: 45px auto;
            padding: 0 20px;
        }

        .eyebrow {
            color: #9b7b45;
            font-size: 11px;
            font-weight: bold;
            letter-spacing: 3px;
        }

        h1 {
            font-size: 36px;
            margin: 12px 0;
        }

        .subtitle {
            color: #77736c;
            font-size: 14px;
            margin-bottom: 30px;
        }

        .order-card {
            background: white;
            border: 1px solid #e6e1d8;
            border-radius: 8px;
            padding: 25px;
            margin-bottom: 18px;
        }

        .order-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 15px;
            flex-wrap: wrap;
        }

        .label {
            color: #77736c;
            font-size: 11px;
            letter-spacing: 1px;
            margin-bottom: 8px;
        }

        .order-id {
            font-weight: bold;
            font-size: 15px;
        }

        .date {
            color: #77736c;
            font-size: 12px;
            margin-top: 7px;
        }

        .status {
            display: inline-block;
            padding: 7px 11px;
            background: #f5f1e9;
            color: #806438;
            border-radius: 3px;
            font-size: 10px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .order-bottom {
            border-top: 1px solid #e6e1d8;
            margin-top: 22px;
            padding-top: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .total-label {
            color: #77736c;
            font-size: 12px;
            margin-bottom: 7px;
        }

        .total {
            font-size: 19px;
            font-weight: bold;
        }

        .detail-button {
            display: inline-block;
            background: #c6a875;
            color: #171717;
            padding: 12px 16px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 11px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .detail-button:hover { background: #b59660; }

        .empty {
            background: white;
            padding: 45px 20px;
            text-align: center;
            border: 1px solid #e6e1d8;
            border-radius: 8px;
        }

        .empty p {
            color: #77736c;
            font-size: 14px;
        }

        .shop-button {
            display: inline-block;
            background: #171717;
            color: white;
            padding: 13px 18px;
            margin-top: 10px;
            text-decoration: none;
            font-size: 12px;
        }

        @media (max-width: 600px) {
            h1 { font-size: 29px; }
            .order-card { padding: 19px; }
            nav { padding: 20px; }
            .brand { font-size: 17px; }
        }
    </style>
</head>
<body>
    <nav>
        <a href="{{ route('home') }}" class="brand">
            NAJWAN <span>STORE.</span>
        </a>

        <a href="{{ route('home') }}">← Kembali ke toko</a>
    </nav>

    <main>
        <span class="eyebrow">YOUR PURCHASES</span>
        <h1>Riwayat Pesanan.</h1>
        <p class="subtitle">
            Lihat daftar transaksi yang pernah kamu lakukan.
        </p>

        @forelse ($orders as $order)
            <article class="order-card">
                <div class="order-top">
                    <div>
                        <div class="label">NOMOR PESANAN</div>
                        <div class="order-id">
                            {{ $order->id_order }}
                        </div>
                        <div class="date">
                            {{ \Carbon\Carbon::parse($order->tanggal_order)->format('d M Y, H:i') }}
                        </div>
                    </div>

                    <span class="status">PESANAN TERCATAT</span>
                </div>

                <div class="order-bottom">
                    <div>
                        <div class="total-label">Total pembayaran</div>
                        <div class="total">
                            Rp{{ number_format($order->total_harga, 0, ',', '.') }}
                        </div>
                    </div>

                    <a
                        href="{{ route('orders.show', $order->id_order) }}"
                        class="detail-button"
                    >
                        LIHAT DETAIL →
                    </a>
                </div>
            </article>
        @empty
            <div class="empty">
                <h2>Belum Ada Pesanan</h2>
                <p>Pesanan yang berhasil kamu buat akan muncul di sini.</p>

                <a href="{{ route('home') }}" class="shop-button">
                    MULAI BELANJA
                </a>
            </div>
        @endforelse
    </main>
</body>
</html>

