<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-blue-900">
            Dashboard Test
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-xl font-bold mb-4">Debug Information</h3>

                <div class="space-y-4">
                    <div>
                        <strong>User:</strong> {{ Auth::user()->name }} (ID: {{ Auth::user()->id }})
                    </div>

                    <div>
                        <strong>Stats:</strong>
                        <pre class="bg-gray-100 p-2 rounded">{{ json_encode($stats ?? [], JSON_PRETTY_PRINT) }}</pre>
                    </div>

                    <div>
                        <strong>Progress Data:</strong>
                        <pre class="bg-gray-100 p-2 rounded">{{ json_encode($progressData ?? [], JSON_PRETTY_PRINT) }}</pre>
                    </div>

                    <div>
                        <strong>Recent Tryouts:</strong> {{ isset($recentTryouts) ? $recentTryouts->count() : 'N/A' }}
                    </div>

                    <div>
                        <strong>User Tryouts:</strong> {{ isset($userTryouts) ? $userTryouts->count() : 'N/A' }}
                    </div>

                    <div>
                        <strong>Recent Materis:</strong> {{ isset($recentMateris) ? $recentMateris->count() : 'N/A' }}
                    </div>

                    <div>
                        <strong>Performance By Category:</strong>
                        <pre class="bg-gray-100 p-2 rounded">{{ json_encode($performanceByCategory ?? [], JSON_PRETTY_PRINT) }}</pre>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
