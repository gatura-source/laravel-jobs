<x-layout>
    <x-bread-crumbs-card class="mb-4"
    :links="[
    'Home' => route('jobs.index'),
    'Jobs' => route('jobs.index'),
    $job->title => route('jobs.show', ['job' => $job]),
    'Apply' => route('jobs.applications.create', ['job' => $job])]"></x-bread-crumbs-card >
    <h1 class="my-16 text-center text-4xl font-medium text-slate-500">{{ $job->title }}</h1>
    <x-job-card :$job>

    </x-job-card>
    <x-card class="py-8 py-16">
        <form action="{{ route('jobs.applications.store', ['job' => $job->id]) }}" method="POST">
            @csrf
            <div class="mb-8">
                <label for="expected_salary" class="mb-2 block text-sm font-medium text-slate-900">What is your expected salary?</label>
                <x-text-input name="expected_salary" type="number"/>
            </div>
            <x-button class="w-full bg-green-50">Apply </x-button>
       </form>
    </x-card>
</x-layout>