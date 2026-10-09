
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Najwan Store</title>

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
            display: grid;
            grid-template-columns: 0.9fr 1.1fr;
            width: 100%;
            max-width: 900px;
            min-height: 540px;
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
            font-size: 43px;
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
            padding: 55px 48px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .back-link {
            color: var(--muted);
            font-size: 12px;
            text-decoration: none;
            margin-bottom: 40px;
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
            margin: 12px 0 8px;
            font-size: 32px;
            letter-spacing: -1px;
        }

        .subtitle {
            margin: 0 0 30px;
            color: var(--muted);
            font-size: 13px;
            line-height: 1.7;
        }

        .alert {
            margin-bottom: 20px;
            padding: 12px;
            border-radius: 4px;
            font-size: 12px;
            line-height: 1.6;
        }

        .alert-error {
            background: #fce8e6;
            color: #a12b24;
        }

        .alert-success {
            background: #e5eee4;
            color: #315d38;
        }

        .field {
            margin-bottom: 19px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 12px;
            font-weight: 700;
        }

        input {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #e2ded6;
            border-radius: 4px;
            background: #fdfcf9;
            font-size: 13px;
            outline: none;
        }

        input:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(198, 168, 117, 0.15);
        }

        .submit-button {
            width: 100%;
            margin-top: 5px;
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
            margin-top: 24px;
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

        @media (max-width: 650px) {
            body {
                padding: 16px;
            }

            .auth-container {
                grid-template-columns: 1fr;
                max-width: 440px;
                min-height: auto;
            }

            .auth-brand {
                padding: 25px;
                gap: 35px;
            }

            .brand-message h1 {
                font-size: 30px;
            }

            .brand-footer {
                display: none;
            }

            .auth-form {
                padding: 30px 25px;
            }

            .back-link {
                margin-bottom: 28px;
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
            <h1>Find Your<br><span>Game.</span></h1>
            <p>
                Masuk ke akunmu untuk melanjutkan perjalanan
                dan menemukan sepatu basket favoritmu.
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

        <span class="eyebrow">WELCOME BACK</span>
        <h2>Login</h2>
        <p class="subtitle">
            Masukkan akunmu untuk melanjutkan.
        </p>

        @if ($errors->any())
            <div class="alert alert-error">
                {{ $errors->first() }}
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div class="field">
                <label for="username">Username</label>
                <input
                    id="username"
                    type="text"
                    name="username"
                    value="{{ old('username') }}"
                    placeholder="Masukkan username"
                    autocomplete="username"
                    required
                >
            </div>

            <div class="field">
                <label for="password">Password</label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    placeholder="Masukkan password"
                    autocomplete="current-password"
                    required
                >
            </div>

            <button type="submit" class="submit-button">
                LOGIN TO YOUR ACCOUNT
            </button>
        </form>

        <div class="switch-auth">
            Belum punya akun?
            <a href="{{ route('register') }}">Daftar sekarang</a>
        </div>
    </section>

</div>

</body>
</html>
