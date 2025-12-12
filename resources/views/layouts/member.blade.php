<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Panel</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Custom Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: #FAFAFA;
            font-family: 'Poppins', sans-serif;
            
        }
        html {
        font-size: 14px; 
    }

    h2, h3, h4 {
        font-size: 1.7rem !important; 
    }
        .navbar {
            border-bottom: 2px solid #f5d7dd;
        }
        .navbar-brand img {
            width: 70px;
        }
        .search-bar {
            border-radius: 20px;
            border: 1px solid #A4133C;
        }
    </style>

    @stack('styles')
</head>

<body>


    @include('layouts.navbar-member')

    <div style="height: 90px;"></div>

    <div class="container py-4">
        @yield('content')
    </div>

</body>
</html>