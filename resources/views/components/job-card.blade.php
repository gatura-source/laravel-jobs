<div class="mb-4">
        <div class="flex justify-between mb-4">
            <h2 class="text-lg font-semibold">{{ $job->title }}</h2>
            <div class="text-gray-600">${{ number_format($job->salary, 2) }}</div>
        </div>
        <div class="mb-4 flex items-center justify-between text-sm text-gray-500 items-center">
            <div class="text-sm text-gray-500 flex space-x-4">
                <div>
                  {{$job->employer->company_name}},
                </div>
                <div>
                    {{ $job->location }}
                </div>
            </div>
            <div class="text-sm text-gray-500 flex space-x-4">
                <x-tag class="bg-blue-100">
                    <a href="{{route('jobs.index',['experience' => $job->experience])}}"> {{ Str::ucfirst($job->experience) }}</a>
                   
                </x-tag>
                 <x-tag class="bg-blue-100">
                    <a href="{{route('jobs.index',['category' => $job->category])}}"> {{ Str::ucfirst($job->category) }}</a>
                   
                </x-tag>
            </div>

        </div>
       

       {{ $slot }}
        
</div>