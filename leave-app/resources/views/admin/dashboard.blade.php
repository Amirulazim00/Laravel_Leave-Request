<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Admin Dashboard
        </h2>
    </x-slot>

    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
                <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <p class="text-xl text-gray-800 dark:text-gray-200">
                        Welcome, Admin! 🎉
                    </p>
                </div>

                <!-- Admin Navigation Links as Buttons -->
                <div class="hidden sm:flex space-x-8 sm:-my-px sm:ms-10 sm:justify-start">
                    <x-nav-link :href="route('admin.leave.index')" :active="request()->routeIs('admin.leave.index')">
                        <button class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
                            Leave Approval
                        </button>
                    </x-nav-link>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
