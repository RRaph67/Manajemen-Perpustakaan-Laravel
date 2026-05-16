<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="container" style="max-width:400px">
        <h1>Form Login</h1>
        <form action="{{ route('loginProses') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" id="">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" id="">
            </div>
            <button type="submit" class="tombol">Login</button>
        </form>
    </div>
</body>

</html>