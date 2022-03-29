<x-layout>
    <section class="py-6 px-8">
        <main class="max-w-lg mx-auto mt-6 lg:mt-20 space-y-6 rounded-xl bg-gray-200 border border-gray-300 p-6">
            <h1 class='text-xl font-bold'>Log In</h1>
            <form method="POST" action="/login">
                @csrf
                <div class="mb-6">
                    <label class="uppercase block text-xs mb-2" for="email">
                        Email
                    </label>
                    <input type="email" class="border border-gray-200 p-2 w-full" name='email'>
                    @error('email')
                    <p class='text-red-500 text-xs mb-2'>{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="uppercase block text-xs mb-2" for="password">
                        Password
                    </label>
                    <input type="password" class="border border-gray-200 p-2 w-full" name='password'>
                    @error('password')
                    <p class='text-red-500 text-xs mb-2'>{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <input type="submit" class="border border-gray-200 py-2 px-8 bg-blue-500 text-white rounded-xl" name='submit' value='Submit'>
                </div>
            </form>
        </main>
    </section>
</x-layout>
