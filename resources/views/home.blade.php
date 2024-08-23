<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo App - Ana Sayfa</title>
    <style>
        /* Genel Stil Tanımları */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            background-color: #e9ecef;
            margin: 0;
            padding: 0;
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
            margin-left: 270px;
            padding: 20px;
            width: calc(100% - 270px);
        }

        /* Sayfa Arka Planı */
        .page-background {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 100%;
            overflow: hidden;
        }

        /* Genel Stil Ayarları */
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .welcome-section, .stats-section {
            background: #ffffff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .welcome-section:hover, .stats-section:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
        }

        .welcome-section h2 {
            margin: 0;
            font-size: 2.2em;
            color: #343a40;
        }

        .user-status {
            font-size: 1.2em;
            color: #6c757d;
        }

        .stats-section h3 {
            margin: 0;
            font-size: 1.8em;
            color: #343a40;
        }

        /* Toplam Not Sayısı İçin Stil */
        .note-count {
            color: #007bff; /* Mavi renk */
        }

        /* Kullanıcı Adı İçin Stil */
        .user-name {
            color: #28a745; /* Yeşil renk */
        }

        /* Responsive Tasarım */
        @media (max-width: 768px) {
            .container {
                width: 95%;
            }

            .welcome-section h2, .stats-section h3 {
                font-size: 1.6em;
            }
        }

        /* Başarı mesajı */
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            padding: 15px;
            margin: 15px 0;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Menü</h2>
        <a href="#">Ana Sayfa</a>
        <a href="{{ route('main.show') }}">Notlar</a>
        <a href="{{ route('settings') }}">Ayarlar</a>
        <a href="{{route('logout')}}">Çıkış</a>
    </div>

    <div class="main-content">
        <div class="page-background">
            <main>
                <div class="container">
                    <section class="welcome-section">
                        <h2>Hoş Geldiniz!</h2>
                        <p class="user-status">Üyelik Durumunuz: Aktif</p>
                    </section>

                    <section class="stats-section">
                        <h3>Toplam Not Sayısı: <span class="note-count">{{$sayi}}</span></h3>
                        <h3>Kullanıcı: <span class="user-name">{{ Auth::user()->name }}</span></h3>
                    </section>
                </div>
            </main>
        </div>
    </div>

    @if(session('user'))
        <div class="alert-success">
            {{ session('user') }}
        </div>
    @endif
</body>
</html>
