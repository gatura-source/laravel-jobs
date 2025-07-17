<x-layout>
    <h1 class="my-16 text-center text-4xl font-medium text-slate-500">Sign in to your account</h1>
    <x-card class="py-8 py-16">
       <form action="{{route('auth.store')}}" method="POST">

       @csrf
       <div class="mb-8">
        <label for="email" class="mb-2 block text-sm font-medium text-slate-900">Email</label>
        <x-text-input name="email" type="email"/>
       </div>
       <div class="mb-8">
        <label for="password" class="mb-2 block text-sm font-medium text-slate-900">Password</label>
        <x-text-input name="password" type="password"/>
       </div>
       <div class="mb-8 flex justify-between space-x-2">
        <div class="flex justify-right space-x-2">
            <div>
                <input type="checkbox" class="rounded-sm" name="remember">
            </div>
            <label for="remember">
                Remember Me
            </label>
        </div>
        <div>
            <a href="#" class="hover:underline text-indigo-600">Forgot your Password?</a>
        </div>
       </div>
       <x-button class="w-full bg-green-50">Login </x-button>
       </form>
    </x-card>
</x-layout>