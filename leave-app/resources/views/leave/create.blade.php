
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Apply for Leave
        </h2>
    </x-slot>
    <div class="py-6">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <nav class="mb-6">
                    <ul class="flex space-x-8">
                        <li>
                            <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-blue-500">
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('leave.index') }}" class="text-gray-700 hover:text-blue-500">
                                Leave History
                            </a>
                        </li>
                    </ul>
                </nav>
                <form method="POST" action="{{ route('leave.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-black-700">Leave Type</label>
                        <select name="leave_type" class="w-full rounded border p-2">
                        <option value="">-- Select Leave Type --</option>
                        <option value="Annual">Annual Leave (AL)</option>
                        <option value="Medical">Medical Leave</option>
                        <option value="Emergency">Emergency Leave</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Reason</label>
                        <textarea name="reason" class="w-full rounded border p-2"></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Date From</label>
                        <input type="date" name="date_from" class="w-full rounded border p-2">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Date To</label>
                        <input type="date" name="date_to" class="w-full rounded border p-2">
                    </div>

                    <div class="flex justify-center mt-4">
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                            Submit
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
