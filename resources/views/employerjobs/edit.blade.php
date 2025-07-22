<x-layout>
    <x-bread-crumbs-card class="mb-4"
    :links="[
    'Listed Jobs' => route('employer_jobs.index'),
    'Edit a Job' => '#']"></x-bread-crumbs-card >
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
        <form class="" method="POST" action="{{route('employer_jobs.update', $job) }}">
            @csrf
            @method('PUT')
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <label for="title">Job title</label>
                    <x-text-input name="title" value="{{ old('title', $job->title) }}" />

                </div>
                 <div>
                    <label for="location">Job Location</label>
                    <x-text-input name="location" :value="$job->location"></x-text-input>
                </div>
                 <div class="col-span-2">
                    <label for="salary">Job salary</label>
                    <x-text-input type="number" name="salary" value="{{ $job->salary}}"></x-text-input>
                </div>
                 <div class="col-span-2">
          <x-label for="description" :required="true">Description</x-label>
          <x-text-input name="description" type="textarea" :value="$job->description" />
        </div>
                <div>
                    <label for="experience">Experience</label>
                     <x-radio-group name="experience" :options="\App\Models\Jobs::getExperienceLevels()" :all="false" :value="$job->experience" />
                </div>
                <div>
                    <label for="category">Category</label>
                     <x-radio-group name="category" :options="\App\Models\Jobs::getCategories()" :all="false" :value='$job->category'/>
                </div>
               
                <div class="col-span-2">
                    <x-button class="w-full">Update Job</x-button>
                </div>
            </div>
        </form>

    </x-card>
</x-layout>