<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout | Najwan Store</title>

    <style>
        * {
            box-sizing: border-box;
        }

        :root {
            --dark: #171717;
            --ivory: #f5f1e9;
            --gold: #c6a875;
            --gold-dark: #9b7b45;
            --muted: #777;
            --border: #e9e3d9;
            --white: #fff;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: var(--ivory);
            color: var(--dark);
        }

        nav {
            background: var(--dark);
            color: var(--white);
            padding: 22px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .brand {
            font-size: 22px;
            font-weight: 800;
            letter-spacing: 2px;
        }

        .brand span {
            color: var(--gold);
        }

        nav a {
            color: var(--white);
            font-size: 12px;
            letter-spacing: 1px;
            text-decoration: none;
        }

        nav a:hover,
        .back:hover {
            color: var(--gold-dark);
        }

        .container {
            max-width: 1080px;
            margin: 48px auto;
            padding: 0 24px;
        }

        .eyebrow {
            color: var(--gold-dark);
            font-size: 11px;
            font-weight: bold;
            letter-spacing: 4px;
        }

        h1 {
            margin: 12px 0;
            font-size: clamp(30px, 5vw, 44px);
            letter-spacing: -1.5px;
        }

        .subtitle {
            color: var(--muted);
            line-height: 1.7;
            font-size: 14px;
        }

        .layout {
            display: grid;
            grid-template-columns: 1.2fr .8fr;
            gap: 24px;
            align-items: start;
            margin-top: 32px;
        }

        .card {
            background: var(--white);
            padding: 28px;
            border: 1px solid rgba(23, 23, 23, .05);
            border-radius: 12px;
            box-shadow: 0 8px 30px rgba(23, 23, 23, .035);
        }

        .card h2 {
            font-size: 18px;
            margin: 0 0 24px;
        }

        .section-label {
            color: var(--gold-dark);
            font-size: 10px;
            font-weight: bold;
            letter-spacing: 2px;
            margin-bottom: 9px;
            display: block;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-size: 13px;
            font-weight: bold;
        }

        textarea {
            width: 100%;
            min-height: 150px;
            padding: 15px;
            border: 1px solid #ded8cd;
            border-radius: 7px;
            font: inherit;
            font-size: 14px;
            line-height: 1.7;
            resize: vertical;
            background: #fff;
        }

        textarea:focus {
            outline: 2px solid rgba(198, 168, 117, .3);
            border-color: var(--gold);
        }

        .helper {
            color: var(--muted);
            font-size: 12px;
            line-height: 1.6;
            margin-top: 10px;
        }

        .item {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 16px;
            padding: 17px 0;
            border-bottom: 1px solid var(--border);
            font-size: 13px;
        }

        .product-name {
            font-weight: bold;
            line-height: 1.6;
        }

        .muted {
            color: var(--muted);
            font-size: 12px;
            margin-top: 5px;
            line-height: 1.6;
        }

        .price {
            text-align: right;
            white-space: nowrap;
            font-weight: bold;
            font-size: 13px;
        }

        .shipping {
            display: flex;
            justify-content: space-between;
            gap: 12px;
            padding: 18px 0;
            font-size: 13px;
        }

        .free {
            color: #52754c;
            font-weight: bold;
        }

        .total {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 16px;
            border-top: 1px solid var(--dark);
            padding-top: 22px;
            margin-top: 5px;
        }

        .total-label {
            font-size: 13px;
            font-weight: bold;
        }

        .total-amount {
            color: var(--gold-dark);
            text-align: right;
            font-size: 19px;
            font-weight: bold;
        }

        .notice {
            padding: 14px 16px;
            border-radius: 7px;
            background: #f8e8e5;
            color: #8b3026;
            margin-top: 20px;
            font-size: 13px;
            line-height: 1.7;
        }

        .button {
            display: block;
            width: 100%;
            padding: 16px;
            margin-top: 24px;
            border: 1px solid var(--dark);
            border-radius: 6px;
            background: var(--dark);
            color: var(--white);
            font-size: 12px;
            font-weight: bold;
            letter-spacing: 1.5px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            transition: .2s ease;
        }

        .button:hover {
            background: var(--gold-dark);
            border-color: var(--gold-dark);
        }

        .button:focus-visible,
        a:focus-visible {
            outline: 3px solid var(--gold);
            outline-offset: 3px;
        }

        .back {
            display: inline-block;
            margin-top: 24px;
            color: var(--dark);
            font-size: 12px;
            text-decoration: none;
        }

        .empty {
            padding: 20px 0;
            color: var(--muted);
            font-size: 13px;
        }

        @media (max-width: 720px) {
            nav {
                padding: 19px 6%;
            }

            .brand {
                font-size: 18px;
            }

            nav a {
                font-size: 10px;
                text-align: right;
            }

            .container {
                margin: 32px auto;
                padding: 0 16px;
            }

            .layout {
                grid-template-columns: 1fr;
            }

            .card {
                padding: 22px;
            }
        }
    </style>
</head>

<body>
    <nav>
        <div class="brand">NAJWAN <span>STORE.</span></div>
        <a href="{{ route('cart.index') }}">← KERANJANG</a>
    </nav>

    <main class="container">
        <span class="eyebrow">FINAL STEP · 03</span>
        <h1>Complete your order.</h1>
        <p class="subtitle">
            Pastikan pesanan dan alamat pengiriman sudah benar sebelum melanjutkan.
        </p>

        @if (session('error'))
            <div class="notice">{{ session('error') }}</div>
        @endif

        @if ($errors->any())
            <div class="notice">
                <strong>Periksa kembali data kamu:</strong>
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form action="{{ route('checkout.store') }}" method="POST">
            @csrf

            <div class="layout">
                <section class="card">
                    <span class="section-label">01 — DELIVERY</span>
                    <h2>Alamat Pengiriman</h2>

                    <label for="alamat_pengiriman">Alamat lengkap</label>

                    <textarea
                        id="alamat_pengiriman"
                        name="alamat_pengiriman"
                        placeholder="Jalan, nomor rumah, kelurahan, kecamatan, kota, dan kode pos..."
                        maxlength="1000"
                        required
                    >{{ old('alamat_pengiriman', auth()->user()->alamat ?? '') }}</textarea>

                    <p class="helper">
                        Pastikan alamat lengkap agar pesanan dapat dikirim ke tujuan yang tepat.
                    </p>

                    <a href="{{ route('cart.index') }}" class="back">
                        ← Kembali dan periksa keranjang
                    </a>
                </section>

                <section class="card">
                    <span class="section-label">02 — ORDER SUMMARY</span>
                    <h2>Ringkasan Pesanan</h2>

                    @forelse ($items as $item)
                        <div class="item">
                            <div>
                                <div class="product-name">
                                    {{ $item['product']->nama_barang }}
                                </div>
                                <div class="muted">
                                    {{ $item['quantity'] }} ×
                                    Rp{{ number_format($item['product']->harga, 0, ',', '.') }}
                                </div>
                            </div>

                            <div class="price">
                                Rp{{ number_format($item['subtotal'], 0, ',', '.') }}
                            </div>
                        </div>
                    @empty
                        <div class="empty">
                            Keranjang kosong. Silakan pilih produk terlebih dahulu.
                        </div>
                    @endforelse

                    <div class="shipping">
                        <span>Biaya pengiriman</span>
                        <span class="free">GRATIS</span>
                    </div>

                    <div class="total">
                        <div class="total-label">Total pembayaran</div>
                        <div class="total-amount">
                            Rp{{ number_format($total, 0, ',', '.') }}
                        </div>
                    </div>

                    @if (count($items) > 0)
                        <button type="submit" class="button">
                            BUAT PESANAN →
                        </button>
                    @else
                        <a href="{{ route('home') }}" class="button">
                            PILIH PRODUK
                        </a>
                    @endif

                    <p class="helper">
                        Dengan menekan tombol di atas, kamu mengonfirmasi pesanan
                        dan alamat pengiriman.
                    </p>
                </section>
            </div>
        </form>
    </main>
</body>
</html>
