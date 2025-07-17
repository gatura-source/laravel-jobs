<x-layout>
    <nav class="mb-4">
        <ul class="flex space-x-4 text-slate-x-500">
            <li>
                <a href="/">Home</a>
            </li>
            <li>
                ->
            </li>
            <li>
                <a href="{{route('jobs.index')}}">
                    Jobs
                </a>
            </li>
             <li>
                ->
            </li>
            <li>{{$job->title}}</li>
        </ul>
    </nav>
    <x-job-card :$job>
         <p class="text-sm text-slate-500">
            {!! nl2br(e($job->description)) !!}
        </p>
    </x-job-card>
    <x-card class="mb-4">
       <h2 class="mb-4 font-medium text-lg">More Jobs by {{$job->employer->company_name}}</h2>
       <div class="text-sm text-slate-500">
        @foreach($job->employer->jobs as $ejob)
        <div class="mb-4 flex justify-between">
            <div>
                <div class="text-slate-700">
                    <a href="{{route('jobs.show', $ejob)}}">{{$ejob->title}}</a>
                </div>
                <div>
                    {{$ejob->created_at->diffForHumans()}}
                </div>
            </div>
            <div class="text-xs">${{number_format($ejob->salary)}}</div>
        </div>
        @endforeach
       </div>
    </x-card>
</x-layout>