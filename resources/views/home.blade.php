
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Najwan Store | Basketball Footwear</title>

    <style>
        :root {
            --dark: #171717;
            --ivory: #f5f1e9;
            --gold: #c6a875;
            --stone: #e8e4dc;
            --muted: #77736c;
            --white: #ffffff;
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: var(--ivory);
            color: var(--dark);
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        button {
            font: inherit;
        }

        /* NAVIGATION */

        nav {
            min-height: 82px;
            padding: 18px 7%;
            background: var(--dark);
            color: var(--white);
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .brand {
            font-size: 24px;
            font-weight: 800;
            letter-spacing: 1px;
        }

        .brand span {
            color: var(--gold);
        }

        .brand small {
            display: block;
            margin-top: 5px;
            color: #b5b0a8;
            font-size: 9px;
            font-weight: 400;
            letter-spacing: 3px;
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 25px;
            font-size: 13px;
        }

        .nav-actions a:not(.nav-cta):hover {
            color: var(--gold);
        }

        .nav-cta {
            background: var(--gold);
            color: var(--dark);
            padding: 12px 18px;
            border-radius: 3px;
            font-weight: 700;
        }

        .logout-form {
            margin: 0;
        }

        .logout-button {
            background: transparent;
            color: white;
            border: 0;
            cursor: pointer;
        }

        /* HERO */

        .hero {
            background: var(--dark);
            color: var(--white);
            padding: 55px 7% 80px;
        }

        .hero-inner {
            max-width: 1250px;
            margin: auto;
            min-height: 330px;
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            align-items: center;
            gap: 40px;
        }

        .eyebrow {
            color: var(--gold);
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 3px;
        }

        .hero h1 {
            font-size: clamp(42px, 5.5vw, 72px);
            line-height: 1.05;
            letter-spacing: -2px;
            margin: 22px 0;
            font-weight: 700;
        }

        .hero h1 span {
            color: var(--gold);
        }

        .hero p {
            max-width: 440px;
            color: #c3c0ba;
            font-size: 15px;
            line-height: 1.8;
            margin-bottom: 30px;
        }

        .hero-button {
            display: inline-block;
            padding: 15px 22px;
            background: var(--gold);
            color: var(--dark);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 1px;
            border-radius: 3px;
            transition: 0.2s;
        }

        .hero-button:hover {
            background: #dfc89d;
        }

        .hero-art {
            min-height: 280px;
            background: var(--stone);
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .hero-art::before {
            content: "";
            position: absolute;
            width: 240px;
            height: 240px;
            border: 1px solid rgba(23, 23, 23, 0.15);
            border-radius: 50%;
        }

        .hero-art::after {
            content: "BASKETBALL";
            position: absolute;
            bottom: 20px;
            right: 20px;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 3px;
            color: #625d53;
        }

        .hero-art span {
            position: relative;
            z-index: 1;
            font-size: clamp(38px, 5vw, 65px);
            font-weight: 800;
            letter-spacing: -3px;
            transform: rotate(-8deg);
        }

        .hero-art span i {
            color: #9c8050;
            font-style: normal;
        }

        /* SMALL BENEFITS */

        .benefits {
            background: var(--white);
            padding: 22px 7%;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 60px;
            border-bottom: 1px solid var(--stone);
        }

        .benefit {
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .benefit span {
            color: #a18450;
            margin-right: 8px;
        }

        /* PRODUCTS */

        .catalog {
            max-width: 1400px;
            margin: auto;
            padding: 75px 7%;
        }

        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: end;
            gap: 20px;
            margin-bottom: 32px;
        }

        .section-label {
            color: #9c8050;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 3px;
            margin-bottom: 12px;
        }

        .section-heading h2 {
            margin: 0;
            font-size: clamp(28px, 4vw, 40px);
            letter-spacing: -1px;
        }

        .section-heading p {
            color: var(--muted);
            max-width: 330px;
            font-size: 13px;
            line-height: 1.7;
        }

        .products {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 22px;
        }

        .product-card {
            background: var(--white);
            border: 1px solid #e8e3da;
            border-radius: 4px;
            overflow: hidden;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .product-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 30px rgba(23, 23, 23, 0.08);
        }

        .product-photo {
            height: 225px;
            padding: 16px;
            background: #eeece6;
            position: relative;
        }

        .product-image {
            width: 100%;
            height: 100%;
            object-fit: contain;
            display: block;
            mix-blend-mode: multiply;
        }

        .product-tag {
            position: absolute;
            left: 12px;
            top: 12px;
            background: var(--white);
            padding: 6px 8px;
            font-size: 9px;
            letter-spacing: 1px;
            font-weight: 700;
        }

        .product-info {
            padding: 18px;
        }

        .category {
            color: var(--muted);
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }

        .product-card h3 {
            margin: 10px 0;
            font-size: 15px;
            line-height: 1.5;
        }

        .description {
            min-height: 36px;
            color: var(--muted);
            font-size: 12px;
            line-height: 1.6;
        }

        .price {
            margin: 17px 0 10px;
            font-size: 16px;
            font-weight: 700;
        }

        .stock {
            color: #527258;
            font-size: 11px;
            margin-bottom: 16px;
        }

        .stock.empty {
            color: #b44141;
        }

        .buy-button {
            display: block;
            width: 100%;
            padding: 13px 10px;
            border: 1px solid var(--dark);
            border-radius: 3px;
            background: var(--dark);
            color: var(--white);
            text-align: center;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1px;
            cursor: pointer;
            transition: 0.2s;
        }

        .buy-button:hover {
            background: var(--gold);
            border-color: var(--gold);
            color: var(--dark);
        }

        .buy-button:disabled {
            background: #e1ded7;
            border-color: #e1ded7;
            color: #77736c;
            cursor: not-allowed;
        }

        .notice {
            max-width: 1200px;
            margin: 20px auto 0;
            padding: 14px 18px;
            background: #e5eee4;
            color: #315d38;
            border-radius: 3px;
        }

        .empty-state {
            grid-column: 1 / -1;
            text-align: center;
            padding: 50px 20px;
            background: white;
        }

        /* FOOTER */

        footer {
            background: var(--dark);
            color: var(--white);
            padding: 35px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .footer-brand {
            font-size: 20px;
            font-weight: 700;
        }

        .footer-brand span {
            color: var(--gold);
        }

        footer p {
            color: #aaa69e;
            font-size: 11px;
            line-height: 1.7;
        }

        /* RESPONSIVE */

        @media (max-width: 1000px) {
            .products {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }

            .benefits {
                gap: 25px;
            }
        }

        @media (max-width: 760px) {
            nav {
                padding: 18px 5%;
                flex-wrap: wrap;
            }

            .nav-actions {
                gap: 15px;
                flex-wrap: wrap;
            }

            .hero {
                padding: 45px 5%;
            }

            .hero-inner {
                grid-template-columns: 1fr;
            }

            .hero-art {
                min-height: 220px;
            }

            .benefits {
                padding: 22px 5%;
                align-items: flex-start;
                flex-direction: column;
                gap: 18px;
            }

            .catalog {
                padding: 50px 5%;
            }

            .section-heading {
                align-items: flex-start;
                flex-direction: column;
            }

            .products {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 12px;
            }

            .product-photo {
                height: 170px;
                padding: 10px;
            }

            .product-info {
                padding: 13px;
            }

            .product-card h3 {
                font-size: 13px;
            }

            .price {
                font-size: 14px;
            }

            footer {
                padding: 30px 5%;
            }
        }

        @media (max-width: 380px) {
            .products {
                grid-template-columns: 1fr;
            }

            .product-photo {
                height: 230px;
            }

            .brand {
                font-size: 21px;
            }
        }
    </style>
</head>

    <body>
    <nav>
        <a href="{{ route('home') }}" class="brand">
            NAJWAN STORE<span>.</span>
            <small>BASKETBALL FOOTWEAR</small>
        </a>

        <div class="nav-actions">
            <a href="#koleksi">Collection</a>

            @auth
                <a href="{{ route('orders.index') }}">Riwayat Pesanan</a>

                <span>Hi, {{ Auth::user()->nama_lengkap }}</span>

                <form action="{{ route('logout') }}" method="POST"
                    class="logout-form">
                    @csrf
                    <button type="submit" class="logout-button">
                        Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}">Login</a>

                <a href="{{ route('register') }}" class="nav-cta">
                    Register
                </a>
            @endauth
        </div>
    </nav>


@if (session('success'))
    <div class="notice">
        {{ session('success') }}
    </div>
@endif

<section class="hero">
    <div class="hero-inner">
        <div>
            <span class="eyebrow">BASKETBALL FOOTWEAR COLLECTION</span>

            <h1>
                Find Your<br>
                <span>Game.</span>
            </h1>

            <p>
                Temukan sepatu basket yang sesuai dengan gaya bermainmu.
                Pilihan model, harga, dan stok dalam satu tempat.
            </p>

            <a href="#koleksi" class="hero-button">
                EXPLORE COLLECTION &nbsp; ↗
            </a>
        </div>

        <div class="hero-art">
            <span>PLAY <i>YOUR</i><br>WAY.</span>
        </div>
    </div>
</section>

<section class="benefits">
    <div class="benefit">
        <span>01</span> BASKETBALL SPECIALIST
    </div>

    <div class="benefit">
        <span>02</span> CLEAR PRICE & STOCK
    </div>

    <div class="benefit">
        <span>03</span> EASY ORDER
    </div>
</section>

<main class="catalog" id="koleksi">
    <div class="section-heading">
        <div>
            <div class="section-label">THE COLLECTION</div>
            <h2>Basketball Shoes<span style="color:#c6a875">.</span></h2>
        </div>

        <p>
            Pilih sepatu favoritmu dan temukan pasangan yang cocok
            untuk setiap langkah di lapangan.
        </p>
    </div>

    <div class="products">
        @forelse ($products as $product)
            <article class="product-card">
                <div class="product-photo">
                    <span class="product-tag">BASKETBALL</span>

                    <img
                        src="{{ asset($product->gambar) }}"
                        alt="{{ $product->nama_barang }}"
                        class="product-image"
                        onerror="this.style.display='none'"
                    >
                </div>

                <div class="product-info">
                    <div class="category">Basketball Shoes</div>

                    <h3>{{ $product->nama_barang }}</h3>

                    <p class="description">
                        {{ $product->deskripsi }}
                    </p>

                    <div class="price">
                        Rp{{ number_format((float) $product->harga, 0, ',', '.') }}
                    </div>

                    @if ($product->stok > 0)
                        <div class="stock">
                            Stok tersedia: {{ $product->stok }}
                        </div>
                    @else
                        <div class="stock empty">
                            Stok habis
                        </div>
                    @endif

                    @if ($product->stok > 0)
                        @auth
                            
                    <form action="{{ route('cart.add', ['id' => $product->id_barang]) }}" method="POST">
                        @csrf
                        <button type="submit" class="buy-button">
                            ADD TO CART
                        </button>
                    </form>

                        @else
                            <a href="{{ route('login') }}" class="buy-button">
                                LOGIN TO PURCHASE
                            </a>
                        @endauth
                    @else
                        <button type="button" class="buy-button" disabled>
                            OUT OF STOCK
                        </button>
                    @endif
                </div>
            </article>
        @empty
            <div class="empty-state">
                <h3>Belum ada produk tersedia.</h3>
                <p>Produk akan muncul di sini setelah ditambahkan.</p>
            </div>
        @endforelse
    </div>
</main>

<footer>
    <div>
        <div class="footer-brand">NAJWAN STORE<span>.</span></div>
        <p>Basketball footwear for your everyday game.</p>
    </div>

    <p>© {{ date('Y') }} Najwan Store. All rights reserved.</p>
</footer>

</body>
</html>
