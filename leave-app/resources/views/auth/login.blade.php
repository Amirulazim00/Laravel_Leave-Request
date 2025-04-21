<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">

    <form method="POST" action="{{ route('login') }}" class="bg-white p-8 rounded shadow-md w-96">
        @csrf

        <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>

        @if ($errors->any())
            <div class="mb-4 text-red-600">
                {{ $errors->first() }}
            </div>
        @endif

        <div class="mb-4">
            <label for="employee_id" class="block text-sm font-medium">Employee ID</label>
            <input type="text" id="employee_id" name="employee_id" required autofocus
                   class="w-full px-4 py-2 border rounded mt-1">
        </div>

        <div class="mb-6">
            <label for="password" class="block text-sm font-medium">Password</label>
            <input type="password" id="password" name="password" required
                   class="w-full px-4 py-2 border rounded mt-1">
        </div>

        <button type="submit"
                class="w-full bg-indigo-600 text-white py-2 rounded hover:bg-indigo-700 transition">
            Log in
        </button>
    </form>

</body>
</html>
