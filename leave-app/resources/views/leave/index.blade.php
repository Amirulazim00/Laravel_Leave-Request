<!-- resources/views/leave/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-black-200 leading-tight">
            Leave History
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
        <nav class="mb-6">
                    <ul class="flex space-x-8">
                        <li>
                            <a href="{{ route('dashboard') }}" class="text-gray-700 dark:text-black-300 hover:text-blue-500">
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('leave.create') }}" class="text-gray-700 dark:text-black-300 hover:text-blue-500">
                                Leave Request
                            </a>
                        </li>
                    </ul>
                </nav>
            <div class="bg-white dark:bg-white-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if(session('success'))
                    <div class="mb-4 text-green-500">{{ session('success') }}</div>
                @endif

                @if($leaves->count())
                    <table class="w-full text-sm text-left text-gray-500 dark:text-black-400">
                        <thead class="text-xs text-gray-700 uppercase dark:text-black-400">
                            <tr>
                                <th class="px-6 py-3">Type</th>
                                <th class="px-6 py-3">Reason</th>
                                <th class="px-6 py-3">From</th>
                                <th class="px-6 py-3">To</th>
                                <th class="px-6 py-3">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($leaves as $leave)
                                <tr class="bg-white dark:bg-black-800">
                                    <td class="px-6 py-4">{{ $leave->leave_type }}</td>
                                    <td class="px-6 py-4">{{ $leave->reason }}</td>
                                    <td class="px-6 py-4">{{ $leave->date_from }}</td>
                                    <td class="px-6 py-4">{{ $leave->date_to }}</td>
                                    <td class="px-6 py-4 capitalize">{{ $leave->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-gray-500 dark:text-gray-300">No leave requests yet.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
