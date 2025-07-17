<x-layout>
    <x-bread-crumbs-card class="mb-4"
    :links="['Jobs' => route('jobs.index'), 'Home' => route('jobs.index')]"/>
   
    <x-card class="mb-4 text-sm">
         <form action="{{route('jobs.index')}}" method="GET">
        <div class="mb-4 grid grid-cols-2 gap-4">
            <div>
                <div class="mb-1 font-semibold">
                    Search
                </div>
                <x-text-input name="search" value="{{request('search')}}" placeholder="search"/>
            </div>
            <div>
                <div class="mb-1 font-semibold">
                    Salary
                </div>
                <div class="flex px-1.5 gap-1">
                    <x-text-input name="min_salary" type="number" value="{{request('min_salary')}}" placeholder="Min. Salary"/>
                    <x-text-input name="max_salary" type="number" value="{{request('max_salary')}}" placeholder="Max. Salary"/>
                </div>
            </div>
            <div>
                <div class="mb-1 font-semibold">
                    Experience Level
                </div>
                <div class="mb-1 semi-bold">
                    
                     <x-radio-group name="experience" :options="\App\Models\Jobs::getExperienceLevels()" />
                </div>


            </div>
            <div>
                <div class="mb-1 font-semibold">
                   Job Category
                </div>
                <div class="mb-1 semi-bold">
                    
                     <x-radio-group name="category" :options="\App\Models\Jobs::getCategories()" />
                </div>
            </div>
        </div>
        <x-button class="w-full bg-dark">
            Filter
        </x-button>
        </form>
    </x-card>
    
    @foreach($jobs as $job)
    <x-job-card class="mb-4" :$job>
        <div>
        <x-link :href="route('jobs.show', $job)">
        View Job
       </x-link>
        </div>
        
    </x-job-card>
    @endforeach
</x-layout>