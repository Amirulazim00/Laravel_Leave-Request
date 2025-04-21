<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Leave Requests (Admin Panel)
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @foreach ($leaveRequests as $leave)
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                                User: <span class="text-gray-600 dark:text-gray-400">{{ $leave->user->name }}</span>
                            </p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Type: <span class="font-medium text-gray-700 dark:text-gray-300">{{ $leave->leave_type }}</span>
                            </p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Reason: <span class="text-gray-600 dark:text-gray-300">{{ $leave->reason }}</span>
                            </p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Dates: <span class="font-medium text-gray-700 dark:text-gray-300">{{ $leave->date_from }} to {{ $leave->date_to }}</span>
                            </p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Status: 
                                <span class="capitalize font-medium text-gray-800 dark:text-gray-200">
                                    {{ ucfirst($leave->status) }}
                                </span>
                            </p>
                        </div>
                        <div class="space-x-4">
                            @if ($leave->status === 'pending')
                                <form method="POST" action="{{ route('admin.leave.approve', $leave->id) }}" style="display:inline;">
                                    @csrf
                                    <button class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg shadow-md transition duration-300">
                                        Approve
                                    </button>
                                </form>
                                <form method="POST" action="{{ route('admin.leave.reject', $leave->id) }}" style="display:inline;">
                                    @csrf
                                    <button class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg shadow-md transition duration-300">
                                        Reject
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
