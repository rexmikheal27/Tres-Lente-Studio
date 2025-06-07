<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Tres Lente Studio</title>
</head>
<body>
    <h1>Welcome to Dashboard</h1>
    <p>Hello, {{ Session::get('user')->name }}!</p>
    
    <form action="{{ route('logout.user') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>