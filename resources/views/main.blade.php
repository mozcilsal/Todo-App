<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control Panel</title>
    <style>
        /* Genel Stil Tanımları */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f0f5f9;
            margin: 0;
            padding: 0;
            display: flex;
        }

        /* Sol Menü Paneli */
        .sidebar {
            width: 250px;
            background-color: #3B118C;
            color: #fff;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
            margin-right: 20px;
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
            background-color: #5a2a8b;
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

        /* Tablo Konteyneri */
        .table-container {
            overflow-x: auto;
        }

        /* Tablo */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #e0e7ec;
        }

        th {
            background-color: #3B118C;
            color: #ffffff;
            text-transform: uppercase;
            font-size: 14px;
        }

        tr:nth-child(even) {
            background-color: #f6f9fc;
        }

        tr:hover {
            background-color: #e9f0f5;
        }

        /* Buton Konteyneri */
        .button-container {
            display: flex;
            gap: 10px;
            margin-top: 5px;
        }

        /* Butonlar */
        .add-note-button, .view-button, .delete-button, .edit-button {
            padding: 15px 30px;
            color: #fff;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 14px;
            text-align: center;
            transition: background-color 0.3s;
        }

        .add-note-button {
            background-color: #3B118C;
        }

        .add-note-button:hover {
            background-color: #0056b3;
        }

        .view-button {
            background-color: #28a745;
        }

        .view-button:hover {
            background-color: #218838;
        }

        .delete-button {
            background-color: #ff4d4d;
        }

        .delete-button:hover {
            background-color: #ff1a1a;
        }

        /* Düzenle Butonu */
        .edit-button {
            background-color: #ffc107;
            color: #000;
        }

        .edit-button:hover {
            background-color: #e0a800;
        }

        /* Filtre Konteyneri */
        .filter-container {
            margin-bottom: 20px;
            display: flex;
            gap: 10px;
            align-items: center;
        }

        /* Filtreleme */
        .filter-container select,
        .filter-container button {
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
        }

        .filter-container select {
            background-color: #ffffff;
            color: #333;
        }

        .filter-container button {
            background-color: #3B118C;
            color: #fff;
            border: none;
        }

        .filter-container button:hover {
            background-color: #0056b3;
        }

        .reset-button {
            background-color: #ff4d4d;
        }

        .reset-button:hover {
            background-color: #ff1a1a;
        }

        /* Başarı Mesajı */
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 5px;
            margin-left: 10px; /* Filtre kaldır butonunun sağında olacak şekilde boşluk ekler */
        }

        /* Filtre ve Başarı Mesajı Konteyneri */
        .filter-alert-container {
            display: flex;
            align-items: center;
            gap: 10px;
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
            <form action="{{ route('addview') }}" method="get">
                @csrf
                <div class="button-container">
                    <button type="submit" class="add-note-button">Yeni Not</button> 
                </div>
            </form>
            <br><br>  
            <div class="filter-alert-container">
                <div class="filter-container">
                    <form action="{{ route('sort') }}" method="post">
                        @csrf
                        <label for="not_durumu">Not Durumu:</label>
                        <select id="mySelect" name="not_durumu">
                            <option value="" disabled selected>Seç</option>
                            <option value="Aktif">Aktif</option>
                            <option value="Tamamlanan">Tamamlanan</option>
                            <option value="İptal Edilen">İptal Edilen</option>
                        </select>
                        <button type="submit">Filtrele</button>
                    </form>

                    <form action="{{ route('removeFilter') }}" method="post">
                        @csrf
                        <button type="submit" class="reset-button" name="removeFilter">Filtre kaldır</button>
                    </form>
                </div>
                @if(session('success'))
                <div class="alert-success">
                    {{ session('success') }}
                </div>
                @endif
            </div>
            <div class="table-container">
                <h2>Notlar</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Notlar</th>
                            <th>Not Durumu</th>
                            <th>Oluşturma Tarihi</th>
                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($notes as $note)
                        <tr>
                            <td>{{ $note->not_isim }}</td>
                            <td>{{ $note->durumu }}</td>
                            <td>{{ $note->created_at }}</td>
                            <td>
                                <div class="button-container">
                                    <form action="{{route('viewStatus', $note->id)}}" method="post">
                                        @csrf
                                        <button class="view-button" name="görüntüle" id="gör">Görüntüle</button>
                                    </form>

                                    <form action="{{route('delete', $note->id)}}" method="post">
                                        @csrf
                                        <button class="delete-button" name="sil">Sil</button>
                                    </form>
                                    <form action="{{route('edit',$note->id)}}" method="get">
                                        @csrf
                                        <button class="edit-button" name="edit" id="edit">Düzenle</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
