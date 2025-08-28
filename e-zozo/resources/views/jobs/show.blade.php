<x-layout>
    <x-slot:heading>
        About Page
    </x-slot:heading>

    <h1>Hello from the Jobs Page</h1>

    <h2 class="font-bold text-lg">{{ $job['title'] }}</h2>
    <p>
        This job pays {{ $job->salary }} per year.
    </p>

    @can('edit', $job)
        <p class="mt-6 text-bg-danger">
            <x-button href="/jobs/{{ $job->id }}/edit">Edit Job</x-button>
        </p>
    @endcan
</x-layout>
