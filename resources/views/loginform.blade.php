<!DOCTYPE html>
<html lang="tr-TR">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <meta http-equiv="Content-Language" content="tr">
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Login</title>
    
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #2c3e50, #34495e); /* Antrasit tonları */
        }

        .form-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #1c1c1c; /* Koyu arka plan */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
            max-width: 400px;
            width: 100%;
        }

        .form-container h2 {
            margin-bottom: 20px;
            color: #ecf0f1;
            font-size: 28px;
            font-weight: 700;
        }

        .form-container p {
            margin-bottom: 5px;
            color: #bdc3c7;
        }

        .form-container input {
            width: 100%;
            padding: 15px;
            margin-bottom: 15px;
            border: 1px solid #7f8c8d;
            border-radius: 8px;
            background: #2c3e50;
            color: #ecf0f1;
        }

        .form-container input:focus {
            border-color: #e74c3c;
            outline: none;
        }

        .form-container button, .btn-custom {
            padding: 15px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            width: calc(100% - 20px); /* Buton genişliğini margin ile eşitle */
            margin: 10px 0;
        }

        .form-container button {
            background-color: #339026; /* Kırmızımsı ton */
        }

        .form-container button:hover {
            background-color: #339026;
        }

        .btn-custom {
            background-color: #206F92; /* Yeşil ton */
            text-align: center;
            display: inline-block; /* Link elementini buton gibi göstermek için */
            text-decoration: none; /* Alt çizgi olmaması için */
        }

        .btn-custom:hover {
            background-color: #206F92;
        }

        .btn-custom img {
            width: 20px;
            margin-right: 8px;
        }
        .filter-alert-container {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .alert-success {
            background-color: red;
            color: #155724;
            padding: 10px;
            border-radius: 5px;
            margin-left: 10px; /* Filtre kaldır butonunun sağında olacak şekilde boşluk ekler */
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Login</h2>
        <form action="{{route('login')}}" method="post">
            @csrf
            <p>User Name</p>
            <input type="text" name="name" id="username" placeholder="Kullanıcı adınızı girin" required>

            <p>Password</p>
            <input type="password" name="password" id="password" placeholder="Şifrenizi girin" required>

            <button type="submit" name="giris">Login</button>
            <a href="{{ route('registerpage') }}" class="btn-custom">
                
                Register
            </a>
        </form>
    </div>
    </div>
                @if(session('error'))
                <div class="alert-success">
                    {{ session('error') }}
                </div>
                @endif
</body>

</html>
