<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Pending Leave Requests
        </h2>
    </x-slot>

    <div class="py-6 flex justify-center items-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 w-full">

            <!-- Success Message -->
            @if(session('success'))
                <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Display Leave Requests -->
            @forelse ($leaves as $leave)
                <div class="bg-white p-6 mb-6 shadow-md rounded-lg border border-gray-200">
                    <p><strong>User:</strong> {{ $leave->user->name }}</p>
                    <p><strong>Type:</strong> {{ $leave->leave_type }}</p>
                    <p><strong>From:</strong> {{ \Carbon\Carbon::parse($leave->date_from)->format('M d, Y') }}</p>
                    <p><strong>To:</strong> {{ \Carbon\Carbon::parse($leave->date_to)->format('M d, Y') }}</p>
                    <p><strong>Reason:</strong> {{ $leave->reason }}</p>

                    <div class="mt-4 space-x-2">
                        <!-- Approve Button -->
                        <form action="{{ route('admin.leave.approve', $leave->id) }}" method="POST" class="inline-block">
                            @csrf
                            <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-300">
                                Approve
                            </button>
                        </form>

                        <!-- Reject Button -->
                        <form action="{{ route('admin.leave.reject', $leave->id) }}" method="POST" class="inline-block">
                            @csrf
                            <button class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-300">
                                Reject
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-gray-500">No pending leave requests.</p>
            @endforelse

        </div>

        <!-- Navigation to Admin Dashboard -->
        <div class="mt-6 text-center">
            <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                <button class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg">
                    Back to Dashboard
                </button>
            </x-nav-link>
        </div>
    </div>
</x-app-layout>
