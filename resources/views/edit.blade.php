<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Not Ekle</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f5f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
        }

        h2 {
            margin-bottom: 10px;
            font-size: 18px;
            color: #333;
        }

        input[type="text"], 
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #dcdcdc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        textarea {
            height: 150px;
            resize: vertical;
        }

        select {
            margin-bottom: 30px; /* Bu satırı ekleyerek boşluk ekleyin */
        }

        button {
            width: 100%;
            padding: 15px;
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease, transform 0.3s ease;
            text-transform: uppercase;
        }

        button:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        button:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('update', ['id' => $note->id]) }}" method="POST">
        @csrf
        @method('PATCH')  <!--   patch methodu kullanmamız gerekiyormuş -->
        <div class="container">
            <h2>Not Adı</h2>
            <input type="text" name="notname" value="{{old('notname',$note->not_isim)}}" placeholder="Not adı girin">
            
            <h2>Not Durumu (Aktif, Tamamlanan, İptal Edilen)</h2>
            <select id="notdurum" name="notdurum">
                <option value="" disabled selected>Seç</option>
                <option value="Aktif">Aktif</option>
                <option value="Tamamlanan">Tamamlanan</option>
                <option value="İptal Edilen">İptal Edilen</option>
            </select>
            
            <h2>Not İçeriği</h2>
            <input type="text" name="noticerik" value="{{old('noticerik',$note->notlar)}}" placeholder="Not içeriğini buraya girin">
            
            <button type="submit">Güncelle</button>
        </div>
    </form>
</body>
</html>
