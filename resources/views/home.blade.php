<x-layout>
    <x-slot:title>
        Home Feed
    </x-slot:title>

    <div class="max-w-2xl mx-auto mt-10 px-4">
        <!-- Page Heading -->
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-bold text-black tracking-tight">Latest Chirps</h1>
            <div class="badge badge-primary p-3 text-white font-semibold">
                {{ $chirps->count() }} Chirps
            </div>
        </div>

        <!-- Chirp Form -->
        <div class="card bg-white border-2 border-black shadow-lg rounded-lg">

            <div class="card-body">
                <form method="POST" action="/chirps">
                    @csrf
                    <label class="label mb-2">
                        <span class="label-text text-black font-semibold">What's on your mind?</span>
                    </label>

                    <textarea
                        name="message"
                        placeholder="Share your thoughts..."
                        class="textarea textarea-bordered w-full resize-none bg-white text-gray-800 placeholder-black focus:outline-none focus:ring-2 focus:ring-primary border-2 border-black"
                        rows="4"
                        maxlength="255"
                    >{{ old('message') }}</textarea>

                    @error('message')
                        <span class="text-error text-sm mt-2 block">{{ $message }}</span>
                    @enderror

                    <div class="mt-4 flex justify-end">
                        <button type="submit" class="btn btn-primary btn-sm px-6">Chirp</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Feed -->
        <div class="space-y-4 mt-10">
            @forelse ($chirps as $chirp)
                <x-chirp :chirp="$chirp" />
            @empty
                <div class="hero py-16 bg-white rounded-xl border border-black shadow-sm">
                    <div class="hero-content text-center">
                        <div>
                            <svg class="mx-auto h-12 w-12 opacity-40 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                            <p class="mt-4 text-gray-600 text-sm">No chirps yet. Be the first to chirp!</p>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</x-layout>
