<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    <nav class="bg-white shadow p-4">
        <div class="flex justify-between">
            <h1 class="font-bold text-xl">Admin Panel</h1>
            <a href="{{ route('dashboard') }}" class="text-blue-600">User Dashboard</a>
        </div>
    </nav>

    <div class="p-6">
        @yield('content')
    </div>

</body>
</html>