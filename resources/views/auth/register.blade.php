
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Najwan Store</title>

    <style>
        :root {
            --dark: #171717;
            --ivory: #f5f1e9;
            --gold: #c6a875;
            --muted: #77736c;
            --white: #ffffff;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            padding: 24px;
            display: grid;
            place-items: center;
            font-family: Arial, Helvetica, sans-serif;
            background: var(--ivory);
            color: var(--dark);
        }

        .auth-container {
            width: 100%;
            max-width: 1000px;
            display: grid;
            grid-template-columns: 0.8fr 1.2fr;
            background: var(--white);
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 18px 50px rgba(23, 23, 23, 0.09);
        }

        .auth-brand {
            background: var(--dark);
            color: var(--white);
            padding: 42px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .brand {
            font-size: 23px;
            font-weight: 800;
            letter-spacing: 1px;
        }

        .brand span {
            color: var(--gold);
        }

        .brand small {
            display: block;
            margin-top: 6px;
            color: #aaa69e;
            font-size: 9px;
            font-weight: 400;
            letter-spacing: 3px;
        }

        .brand-message h1 {
            font-size: 42px;
            line-height: 1.1;
            margin: 0 0 18px;
        }

        .brand-message h1 span {
            color: var(--gold);
        }

        .brand-message p {
            color: #c3c0ba;
            font-size: 13px;
            line-height: 1.9;
        }

        .brand-footer {
            color: #aaa69e;
            font-size: 10px;
            letter-spacing: 1px;
        }

        .auth-form {
            padding: 38px 45px;
        }

        .back-link {
            display: inline-block;
            margin-bottom: 25px;
            color: var(--muted);
            font-size: 12px;
            text-decoration: none;
        }

        .back-link:hover {
            color: var(--dark);
        }

        .eyebrow {
            color: #9c8050;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 2px;
        }

        .auth-form h2 {
            margin: 10px 0 8px;
            font-size: 31px;
            letter-spacing: -1px;
        }

        .subtitle {
            margin: 0 0 24px;
            color: var(--muted);
            font-size: 13px;
            line-height: 1.7;
        }

        .alert {
            padding: 12px;
            margin-bottom: 18px;
            border-radius: 4px;
            font-size: 12px;
            line-height: 1.7;
        }

        .alert-error {
            background: #fce8e6;
            color: #a12b24;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0 16px;
        }

        .field {
            margin-bottom: 16px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-size: 12px;
            font-weight: 700;
        }

        input,
        textarea {
            width: 100%;
            padding: 12px 13px;
            border: 1px solid #e2ded6;
            border-radius: 4px;
            background: #fdfcf9;
            font-family: inherit;
            font-size: 13px;
            outline: none;
        }

        textarea {
            resize: vertical;
            min-height: 75px;
        }

        input:focus,
        textarea:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(198, 168, 117, 0.15);
        }

        .full-width {
            grid-column: 1 / -1;
        }

        .submit-button {
            width: 100%;
            margin-top: 6px;
            padding: 15px;
            background: var(--dark);
            color: var(--white);
            border: none;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 1px;
            cursor: pointer;
        }

        .submit-button:hover {
            background: #35332e;
        }

        .switch-auth {
            margin-top: 20px;
            text-align: center;
            font-size: 12px;
            color: var(--muted);
        }

        .switch-auth a {
            color: #927346;
            font-weight: 700;
            text-decoration: none;
        }

        .switch-auth a:hover {
            text-decoration: underline;
        }

        @media (max-width: 700px) {
            body {
                padding: 16px;
            }

            .auth-container {
                grid-template-columns: 1fr;
                max-width: 480px;
            }

            .auth-brand {
                padding: 25px;
                gap: 30px;
            }

            .brand-message h1 {
                font-size: 30px;
            }

            .brand-footer {
                display: none;
            }

            .auth-form {
                padding: 28px 24px;
            }
        }

        @media (max-width: 420px) {
            .form-grid {
                grid-template-columns: 1fr;
            }

            .full-width {
                grid-column: auto;
            }
        }
    </style>
</head>
<body>

<div class="auth-container">

    <section class="auth-brand">
        <a href="{{ route('home') }}" class="brand"
           style="color: inherit; text-decoration: none;">
            NAJWAN STORE<span>.</span>
            <small>BASKETBALL FOOTWEAR</small>
        </a>

        <div class="brand-message">
            <h1>Join the<br><span>Game.</span></h1>
            <p>
                Buat akun Najwan Store dan temukan sepatu basket
                yang cocok dengan gaya bermainmu.
            </p>
        </div>

        <div class="brand-footer">
            YOUR GAME. YOUR STYLE.
        </div>
    </section>

    <section class="auth-form">
        <a href="{{ route('home') }}" class="back-link">
            ← Kembali ke halaman utama
        </a>

        <span class="eyebrow">CREATE YOUR ACCOUNT</span>
        <h2>Register</h2>
        <p class="subtitle">
            Isi informasi berikut untuk membuat akun baru.
        </p>

        @if ($errors->any())
            <div class="alert alert-error">
                <strong>Periksa kembali data kamu:</strong>
                <ul style="margin: 8px 0 0; padding-left: 18px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf

            <div class="form-grid">
                <div class="field full-width">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input
                        id="nama_lengkap"
                        type="text"
                        name="nama_lengkap"
                        value="{{ old('nama_lengkap') }}"
                        placeholder="Nama lengkap"
                        autocomplete="name"
                        required
                    >
                </div>

                <div class="field">
                    <label for="username">Username</label>
                    <input
                        id="username"
                        type="text"
                        name="username"
                        value="{{ old('username') }}"
                        placeholder="Username"
                        autocomplete="username"
                        required
                    >
                </div>

                <div class="field">
                    <label for="email">Email</label>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="nama@email.com"
                        autocomplete="email"
                        required
                    >
                </div>

                <div class="field">
                    <label for="no_hp">Nomor HP</label>
                    <input
                        id="no_hp"
                        type="tel"
                        name="no_hp"
                        value="{{ old('no_hp') }}"
                        placeholder="08xxxxxxxxxx"
                        autocomplete="tel"
                        required
                    >
                </div>

                <div class="field">
                    <label for="password">Password</label>
                    <input
                        id="password"
                        type="password"
                        name="password"
                        placeholder="Buat password"
                        autocomplete="new-password"
                        required
                    >
                </div>

                <div class="field full-width">
                    <label for="alamat">Alamat</label>
                    <textarea
                        id="alamat"
                        name="alamat"
                        placeholder="Alamat lengkap"
                        autocomplete="street-address"
                        required
                    >{{ old('alamat') }}</textarea>
                </div>

                <div class="field full-width">
                    <label for="password_confirmation">
                        Konfirmasi Password
                    </label>
                    <input
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        placeholder="Ulangi password"
                        autocomplete="new-password"
                        required
                    >
                </div>
            </div>

            <button type="submit" class="submit-button">
                CREATE ACCOUNT
            </button>
        </form>

        <div class="switch-auth">
            Sudah punya akun?
            <a href="{{ route('login') }}">Login di sini</a>
        </div>
    </section>

</div>

</body>
</html>
