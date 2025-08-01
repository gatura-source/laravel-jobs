<x-layout>
  

  @forelse ($applications as $application)
  <hr/>
    <x-job-card :job="$application->job">
      <div class="flex items-center justify-between text-xs text-slate-500">
        <div>
          <div>
            Applied {{ $application->created_at->diffForHumans() }}
          </div>
          <div>
            Other {{ Str::plural('applicant', $application->job->job_applications_count - 1) }}
            {{ $application->job->job_applications_count - 1 }}
          </div>
          <div>
            Your asking salary ${{ number_format($application->expected_salary) }}
          </div>
          <div>
            Average asking salary
            ${{ number_format($application->job->job_applications_avg_expected_salary) }}
          </div>
        </div>
        <div>
            <form action="{{route('my_applications.destroy', ['my_application' => $application])}}" method="POST">
                @method('DELETE')
                @csrf
                <x-button>
                    Withdraw Application
                </x-button>
            </form>
      </div>
    </x-job-card>
  @empty
  <div class="rounded-md border border-dashed border-slate-300 p-8">
      <div class="text-center font-medium">
        No job application yet
      </div>
      <div class="text-center">
        Go find some jobs <a class="text-indigo-500 hover:underline"
          href="{{ route('jobs.index') }}">here!</a>
      </div>
    </div>
  @endforelse
</x-layout>