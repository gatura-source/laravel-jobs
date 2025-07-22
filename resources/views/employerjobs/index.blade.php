<x-layout>
    <x-bread-crumbs-card class="mb-4"
    :links="['Jobs' => route('jobs.index'), 'Home' => route('jobs.index'), 'My Jobs'=>'#']"/>
    <div class="mb-4 text-right">
        <x-link href="{{route('employer_jobs.create') }}">
            Add a new Job
        </x-link>
    </div>
    @forelse($jobs as $job)
    <x-job-card :job="$job">
    <div class="text-xs text-slate-500">
        @forelse($job->jobapplications as $application)
        <div class="mb-4 flex items-center justify-between">
            <div>
                <div>{{ $application->user->name }}</div>
                <div>Applied on: {{ $application->created_at->diffForHumans() }}</div>
                <div>Download CV</div>
            </div>
            <div>${{ $application->expected_salary }}</div>
        </div>
        @empty
       <div> No Applications</div>
        @endforelse
        
        <div class="flex space-x-2">
            <x-link :href="route('employer_jobs.edit', ['employer_job' => $job])">
                Edit Job
               
            </x-link>
        </div>

    </div>
    </x-job-card>
    @empty
    <div class="rounded-md border border-dashed border-slate-300 p-8">
        <div class="text-center font-medium">
            No Jobs
        </div>
        <div class="text-center">
            Post your first job <a href="{{route('employer_jobs.create') }}" class="text-indigo hover:underline">here</a>
        </div>
    </div>
    @endforelse
</x-layout>