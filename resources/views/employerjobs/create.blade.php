<x-layout>
    <x-bread-crumbs-card class="mb-4"
    :links="[
    'Listed Jobs' => route('employer_jobs.index'),
    'Create a Job' => '#']"></x-bread-crumbs-card >
    <x-card class="mb-8">
        @if ($errors->any())
        <div class="mb-4 text-red-600">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form class="" method="POST" action="{{route('employer_jobs.store')}}">
            @csrf
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <label for="title">Job title</label>
                    <x-text-input name="title"></x-text-input>
                </div>
                 <div>
                    <label for="location">Job Location</label>
                    <x-text-input name="location"></x-text-input>
                </div>
                 <div class="col-span-2">
                    <label for="salary">Job salary</label>
                    <x-text-input type="number" name="salary"></x-text-input>
                </div>
                <div class="col-span-2">
                    <label for="description">Job description</label>
                    <textarea name="description" rows="6" class="w-full p-3 text-base border rounded" placeholder="Type your paragraph here..."></textarea>

                </div>
                <div>
                    <label for="experience">Experience</label>
                     <x-radio-group name="experience" :options="\App\Models\Jobs::getExperienceLevels()" :all="false" :value='old("experience")' />
                </div>
                <div>
                    <label for="category">Category</label>
                     <x-radio-group name="category" :options="\App\Models\Jobs::getCategories()" :all="false" :value='old("category")'/>
                </div>
               
                <div class="col-span-2">
                    <x-button class="w-full">List Job</x-button>
                </div>
            </div>
        </form>
    </x-card>
</x-layout>