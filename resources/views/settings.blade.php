<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayarlar</title>
    <style>
        /* Genel Stil Tanımları */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f0f5f9;
            margin: 0; /* Tarayıcı varsayılan margin'ini sıfırlar */
            padding: 0; /* İç boşluk sıfırlandı */
            display: flex;
        }

        /* Sol Menü Paneli */
        .sidebar {
            width: 250px; /* Menü genişliği */
            background-color: #3B118C; /* Arka plan rengi */
            color: #fff; /* Yazı rengi */
            height: 100vh; /* Tam yükseklik */
            position: fixed; /* Sabit konum */
            top: 0;
            left: 0;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1); /* Gölgelendirme */
            overflow-y: auto; /* Dikey kaydırma */
            margin-right: 20px; /* Sağ boşluk */
        }

        /* Menü Bağlantıları */
        .sidebar a {
            display: block;
            color: #fff;
            padding: 10px;
            text-decoration: none;
            margin-bottom: 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .sidebar a:hover {
            background-color: #5a2a8b; /* Üzerine gelince rengi değişir */
        }

        /* Ana İçerik */
        .main-content {
            margin-left: 270px; /* Menü genişliği + sağ boşluk kadar sol boşluk */
            padding: 20px;
            width: calc(100% - 270px); /* Menü genişliği + sağ boşluk kadar genişlik */
        }

        /* Sayfa Arka Planı */
        .page-background {
            background-color: #ffffff; /* Beyaz arka plan */
            padding: 20px; /* İç boşluk */
            border-radius: 8px; /* Köşe yuvarlama */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Gölgelendirme */
            max-width: 100%; /* Sayfa genişliği */
            overflow: hidden; /* Taşmayı önler */
        }

        /* Şifre Değiştirme Formu */
        .password-change-form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .password-change-form label {
            font-weight: bold;
        }

        .password-change-form input {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 16px;
        }

        .password-change-form button {
            padding: 10px;
            background-color: #3B118C;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .password-change-form button:hover {
            background-color: #5a2a8b;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Menü</h2>
        <a href="{{route('homeview')}}">Ana Sayfa</a>
        <a href="{{ route('main.show') }}">Notlar</a>
        <a href="{{route('settings')}}">Ayarlar</a>
        <a href="{{route('logout')}}">Çıkış</a>
    </div>

    <div class="main-content">
        <div class="page-background">
            <h2>Şifre Değiştir</h2>
            
            <form action="{{ route('change', ['id' => $user->id]) }}" method="POST" class="password-change-form">

                @csrf
                <label for="new-password">Yeni Şifre:</label>
                <input type="password" id="new-password" name="new-password" required>

                <button type="submit">Şifreyi Değiştir</button>
            </form>
        </div>
    </div>
</body>
</html>
