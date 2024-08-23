<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form page</title>

</head>
<body>
    <form action="{{route('sonuc')}}"method="post">

    @csrf
<textarea name="metin" ></textarea> <br>
<input type="submit" name="gönder" value="gönder">

 
    </form>
    
</body>
</html>