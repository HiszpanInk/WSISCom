<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Home</title>
</head>
<body>
    <header class="navbar">
        <span class="fs-4"><b>WSISCom</b></span>
        @if (session()->has('username'))
            <div class="d-flex">{{ session('username') }}<form method="POST" action="{{ route('logoutAction')}}">@csrf<button type="submit">Logout</button></form></div>
        @else
            <a href="{{ route('loginPage')}}" />Login</a>
        @endif
    </header>
    <main>
        
    </main>
    <footer>By HiszpanInk for WSIS</footer>
</body>
</html>