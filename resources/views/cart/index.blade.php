<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang | Najwan Store</title>

    <style>
        :root {
            --dark: #171717;
            --ivory: #f5f1e9;
            --gold: #c6a875;
            --white: #ffffff;
            --muted: #77736c;
            --border: #e6e1d8;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--ivory);
            color: var(--dark);
            font-family: Arial, Helvetica, sans-serif;
        }

        a {
            color: inherit;
            text-decoration: none;
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
            letter-spacing: 1px;
        }

        .brand span {
            color: var(--gold);
        }

        .nav-link {
            font-size: 13px;
            color: #e2ded6;
        }

        main {
            max-width: 1100px;
            margin: auto;
            padding: 55px 24px 80px;
        }

        .eyebrow {
            color: #927346;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 3px;
        }

        h1 {
            margin: 12px 0;
            font-size: clamp(30px, 4vw, 42px);
            letter-spacing: -1px;
        }

        .subtitle {
            color: var(--muted);
            font-size: 14px;
            margin-bottom: 30px;
        }

        .alert {
            padding: 14px 18px;
            border-radius: 4px;
            margin-bottom: 18px;
            font-size: 13px;
        }

        .success {
            background: #e5eee4;
            color: #315d38;
        }

        .error {
            background: #fce8e6;
            color: #a12b24;
        }

        .cart-layout {
            display: grid;
            grid-template-columns: 1fr 310px;
            gap: 24px;
            align-items: start;
        }

        .cart-items,
        .summary {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 5px;
        }

        .cart-header {
            padding: 20px 24px;
            border-bottom: 1px solid var(--border);
            font-weight: 700;
        }

        .cart-item {
            display: grid;
            grid-template-columns: 100px 1fr;
            gap: 20px;
            padding: 24px;
            border-bottom: 1px solid var(--border);
        }

        .cart-image {
            width: 100px;
            height: 100px;
            background: var(--ivory);
            object-fit: contain;
            mix-blend-mode: multiply;
        }

        .item-category {
            color: var(--muted);
            font-size: 10px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        .item-name {
            margin: 8px 0;
            font-size: 16px;
        }

        .item-price {
            font-size: 14px;
            font-weight: 700;
        }

        .item-bottom {
            margin-top: 17px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .quantity-form {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .quantity-input {
            width: 65px;
            padding: 9px;
            border: 1px solid var(--border);
            border-radius: 3px;
        }

        .small-button {
            padding: 9px 12px;
            border: 1px solid var(--dark);
            border-radius: 3px;
            background: var(--dark);
            color: var(--white);
            font-size: 11px;
            font-weight: 700;
            cursor: pointer;
        }

        .remove-button {
            background: transparent;
            border: 0;
            color: #a33c32;
            font-size: 12px;
            cursor: pointer;
        }

        .summary {
            padding: 24px;
        }

        .summary h2 {
            margin: 0 0 22px;
            font-size: 19px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            margin: 17px 0;
            font-size: 13px;
        }

        .summary-total {
            border-top: 1px solid var(--border);
            padding-top: 20px;
            margin-top: 22px;
            font-size: 15px;
            font-weight: 800;
        }

        
        .checkout-button {
            display: block;
            width: 100%;
            padding: 15px 20px;
            margin-top: 22px;
            background: #c6a875;
            color: #171717;
            border: 1px solid #c6a875;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .checkout-button:hover {
            background: #171717;
            color: #f5f1e9;
            border-color: #171717;
        }


        .continue-link {
            display: block;
            text-align: center;
            margin-top: 18px;
            color: var(--muted);
            font-size: 12px;
        }

        .empty-cart {
            background: var(--white);
            padding: 60px 24px;
            text-align: center;
            border: 1px solid var(--border);
            border-radius: 5px;
        }

        .empty-cart p {
            color: var(--muted);
            font-size: 14px;
        }

        .shop-button {
            display: inline-block;
            margin-top: 15px;
            padding: 14px 20px;
            background: var(--dark);
            color: var(--white);
            border-radius: 3px;
            font-size: 12px;
            font-weight: 700;
        }

        footer {
            background: var(--dark);
            color: #aaa69e;
            padding: 25px 7%;
            text-align: center;
            font-size: 11px;
        }

        @media (max-width: 760px) {
            nav {
                padding: 20px;
            }

            main {
                padding: 38px 16px 55px;
            }

            .cart-layout {
                grid-template-columns: 1fr;
            }

            .cart-item {
                grid-template-columns: 75px 1fr;
                gap: 14px;
                padding: 18px;
            }

            .cart-image {
                width: 75px;
                height: 85px;
            }

            .item-bottom {
                align-items: flex-start;
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

<nav>
    <a href="{{ route('home') }}" class="brand">
        NAJWAN STORE<span>.</span>
    </a>

    <a href="{{ route('home') }}" class="nav-link">
        ← Lanjut Belanja
    </a>
</nav>

<main>
    <span class="eyebrow">YOUR SELECTION</span>
    <h1>Keranjang Belanja</h1>
    <p class="subtitle">
        Periksa pilihan sepatu dan jumlah pesananmu.
    </p>

    @if (session('success'))
        <div class="alert success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert error">{{ session('error') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert error">
            {{ $errors->first() }}
        </div>
    @endif

    @if (count($items) > 0)
        <div class="cart-layout">

            <section class="cart-items">
                <div class="cart-header">
                    Produk pilihanmu ({{ count($items) }})
                </div>

                @foreach ($items as $item)
                    <article class="cart-item">
                        <img
                            src="{{ asset($item['product']->gambar) }}"
                            alt="{{ $item['product']->nama_barang }}"
                            class="cart-image"
                            onerror="this.style.display='none'"
                        >

                        <div>
                            <div class="item-category">
                                Basketball Shoes
                            </div>

                            <h3 class="item-name">
                                {{ $item['product']->nama_barang }}
                            </h3>

                            <div class="item-price">
                                Rp{{ number_format((float) $item['product']->harga, 0, ',', '.') }}
                            </div>

                            <div class="item-bottom">
                                <form
                                    action="{{ route('cart.update', $item['product']->id_barang) }}"
                                    method="POST"
                                    class="quantity-form"
                                >
                                    @csrf
                                    @method('PATCH')

                                    <input
                                        type="number"
                                        name="quantity"
                                        class="quantity-input"
                                        value="{{ $item['quantity'] }}"
                                        min="1"
                                        max="{{ $item['product']->stok }}"
                                        required
                                    >

                                    <button type="submit" class="small-button">
                                        Update
                                    </button>
                                </form>

                                <form
                                    action="{{ route('cart.remove', $item['product']->id_barang) }}"
                                    method="POST"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="remove-button">
                                        Hapus produk
                                    </button>
                                </form>
                            </div>

                            <div class="summary-row">
                                <span>Subtotal</span>
                                <strong>
                                    Rp{{ number_format($item['subtotal'], 0, ',', '.') }}
                                </strong>
                            </div>
                        </div>
                    </article>
                @endforeach
            </section>

            <aside class="summary">
                <h2>Ringkasan Pesanan</h2>

                <div class="summary-row">
                    <span>Total produk</span>
                    <span>{{ count($items) }} jenis</span>
                </div>

                <div class="summary-row">
                    <span>Ongkos kirim</span>
                    <span>Gratis</span>
                </div>

                <div class="summary-row summary-total">
                    <span>Total</span>
                    <span>
                        Rp{{ number_format($total, 0, ',', '.') }}
                    </span>
                </div>
                
                <a href="{{ route('checkout.index') }}" class="checkout-button">
                    CHECKOUT →
                </a>

                <a href="{{ route('home') }}" class="continue-link">
                    Tambah produk lainnya
                </a>
            </aside>

        </div>
    @else
        <div class="empty-cart">
            <h2>Keranjangmu masih kosong</h2>
            <p>Pilih sepatu basket favoritmu untuk mulai berbelanja.</p>

            <a href="{{ route('home') }}" class="shop-button">
                LIHAT KOLEKSI
            </a>
        </div>
    @endif
</main>

<footer>
    © {{ date('Y') }} Najwan Store · Basketball Footwear
</footer>

</body>
</html>
