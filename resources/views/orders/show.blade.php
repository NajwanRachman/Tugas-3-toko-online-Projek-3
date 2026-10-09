<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan | Najwan Store</title>

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
            color: white;
            font-size: 21px;
            font-weight: 800;
            letter-spacing: 1px;
            text-decoration: none;
        }

        .brand span { color: #c6a875; }

        nav a:last-child {
            color: #f5f1e9;
            text-decoration: none;
            font-size: 12px;
        }

        main {
            max-width: 950px;
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
            margin: 12px 0;
            font-size: 36px;
        }

        .subtitle {
            color: #77736c;
            font-size: 14px;
            line-height: 1.7;
        }

        .card {
            background: white;
            border: 1px solid #e6e1d8;
            border-radius: 8px;
            padding: 25px;
            margin-top: 25px;
        }

        .card h2 {
            font-size: 18px;
            margin: 0 0 22px;
        }

        .info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 22px;
        }

        .label {
            color: #77736c;
            font-size: 10px;
            letter-spacing: 1.5px;
            margin-bottom: 9px;
        }

        .value {
            font-size: 14px;
            font-weight: bold;
            overflow-wrap: anywhere;
        }

        .address {
            font-size: 13px;
            line-height: 1.8;
            font-weight: normal;
        }

        .table-wrap {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
        }

        th {
            padding: 14px 10px;
            background: #f5f1e9;
            text-align: left;
            font-size: 10px;
            letter-spacing: 1px;
        }

        td {
            padding: 17px 10px;
            border-bottom: 1px solid #e6e1d8;
            vertical-align: top;
        }

        .number {
            text-align: right;
            white-space: nowrap;
        }

        .product-name {
            font-weight: bold;
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-top: 24px;
            padding-top: 22px;
            border-top: 1px solid #171717;
        }

        .total-label {
            font-size: 13px;
            font-weight: bold;
        }

        .total-price {
            color: #9b7b45;
            font-size: 21px;
            font-weight: bold;
            text-align: right;
        }

        .free {
            color: #52754c;
            font-weight: bold;
        }

        .button {
            display: inline-block;
            padding: 14px 20px;
            margin-top: 24px;
            background: #c6a875;
            color: #171717;
            border-radius: 4px;
            font-size: 11px;
            font-weight: bold;
            letter-spacing: 1px;
            text-decoration: none;
        }

        .button:hover { background: #b59660; }

        @media (max-width: 600px) {
            nav { padding: 20px; }
            .brand { font-size: 17px; }
            h1 { font-size: 29px; }
            .card { padding: 18px; }
            .info { grid-template-columns: 1fr; }
        }
    </style>
</head>

<body>
    <nav>
        <a href="{{ route('home') }}" class="brand">
            NAJWAN <span>STORE.</span>
        </a>

        <a href="{{ route('orders.index') }}">← Riwayat Pesanan</a>
    </nav>

    <main>
        <span class="eyebrow">ORDER INFORMATION</span>
        <h1>Detail Pesanan.</h1>
        <p class="subtitle">
            Informasi lengkap mengenai transaksi yang kamu lakukan.
        </p>

        <section class="card">
            <h2>Informasi Transaksi</h2>

            <div class="info">
                <div>
                    <div class="label">NOMOR PESANAN</div>
                    <div class="value">{{ $order->id_order }}</div>
                </div>

                <div>
                    <div class="label">TANGGAL PESANAN</div>
                    <div class="value">
                        {{ \Carbon\Carbon::parse($order->tanggal_order)->format('d M Y, H:i') }}
                    </div>
                </div>

                <div>
                    <div class="label">ALAMAT PENGIRIMAN</div>
                    <div class="value address">
                        {{ $order->alamat_pengiriman }}
                    </div>
                </div>

                <div>
                    <div class="label">BIAYA PENGIRIMAN</div>
                    <div class="value free">GRATIS</div>
                </div>
            </div>
        </section>

        <section class="card">
            <h2>Barang yang Dibeli</h2>

            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>PRODUK</th>
                            <th class="number">HARGA SATUAN</th>
                            <th class="number">JUMLAH</th>
                            <th class="number">SUBTOTAL</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($details as $detail)
                            <tr>
                                <td>
                                    <div class="product-name">
                                        {{ $detail->nama_barang }}
                                    </div>
                                    <div class="label" style="margin-top: 6px">
                                        {{ $detail->id_barang }}
                                    </div>
                                </td>

                                <td class="number">
                                    Rp{{ number_format($detail->harga_satuan, 0, ',', '.') }}
                                </td>

                                <td class="number">
                                    {{ $detail->jumlah_beli }}
                                </td>

                                <td class="number">
                                    Rp{{ number_format($detail->harga_satuan * $detail->jumlah_beli, 0, ',', '.') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">
                                    Detail barang tidak ditemukan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="total-row">
                <span class="total-label">TOTAL PEMBAYARAN</span>
                <span class="total-price">
                    Rp{{ number_format($order->total_harga, 0, ',', '.') }}
                </span>
            </div>

            <a href="{{ route('orders.index') }}" class="button">
                ← KEMBALI KE RIWAYAT
            </a>
        </section>
    </main>
</body>
</html>
