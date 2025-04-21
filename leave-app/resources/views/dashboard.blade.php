<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-black-800 dark:text-white-200 leading-tight">
            Welcome, {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-white-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                <!-- Navigation Links -->
                <nav class="mb-6">
                    <ul class="flex space-x-8">
                        <li>
                            <a href="{{ route('dashboard') }}" class="text-black-700 dark:text-black-300 hover:text-blue-500">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('leave.create') }}" class="text-black-700 dark:text-black-300 hover:text-blue-500">
                                Leave Request
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('leave.index') }}" class="text-black-700 dark:text-black-300 hover:text-blue-500">
                                Leave History
                            </a>
                        </li>
                    </ul>
                </nav>

                <!-- Leave Balances Section -->
            <div class="py-6">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-white-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <h3 class="text-lg font-semibold mb-4">Your Leave Balances</h3>
                        @if($balance)
                            <ul class="list-disc pl-5 text-gray-700 dark:black-gray-300">
                                <li><strong>Annual Leave:</strong> {{ $balance->annual_leave }} days</li>
                                <li><strong>Medical Leave:</strong> {{ $balance->medical_leave }} days</li>
                                <li><strong>Emergency Leave:</strong> Used {{ $balance->emergency_leave }} time(s)</li>
                            </ul>
                        @else
                            <p class="text-red-500">Leave balance not available.</p>
                        @endif
                    </div>
                </div>
            </div>

            </div>
        </div>
    </div>
</x-app-layout>
