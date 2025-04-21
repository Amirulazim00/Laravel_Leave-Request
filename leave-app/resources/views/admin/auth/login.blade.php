<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">

    <form method="POST" action="{{ route('admin.login.submit') }}" class="bg-white p-8 rounded shadow-md w-96">
        @csrf

        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Admin Login</h2>

        @if ($errors->any())
            <div class="mb-4 text-red-600 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <div class="mb-4">
            <label for="employee_id" class="block text-sm font-medium text-gray-700">Employee ID</label>
            <input type="text" id="employee_id" name="employee_id" required autofocus
                   class="w-full px-4 py-2 border rounded mt-1 focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>

        <div class="mb-6">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" id="password" name="password" required
                   class="w-full px-4 py-2 border rounded mt-1 focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>

        <button type="submit"
                class="w-full bg-indigo-600 text-white py-2 rounded hover:bg-indigo-700 transition">
            Log in
        </button>
    </form>

</body>
</html>
