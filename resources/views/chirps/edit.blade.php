<x-layout>
    <x-slot:title>
        Edit Chirp
    </x-slot:title>

    <div class="max-w-2xl mx-auto mt-10 px-4">
        <h1 class="text-3xl font-bold text-black mb-6">Edit Chirp</h1>

        <div class="card bg-white border-2 border-black shadow-lg rounded-lg">
            <div class="card-body">
                <form method="POST" action="/chirps/{{ $chirp->id }}">
                    @csrf
                    @method('PUT')

                    <div class="form-control w-full">
                        <textarea
                            name="message"
                            class="textarea textarea-bordered w-full resize-none bg-white text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary @error('message') textarea-error @enderror"
                            rows="4"
                            maxlength="255"
                            required
                        >{{ old('message', $chirp->message) }}</textarea>

                        @error('message')
                            <div class="label mt-2">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="card-actions justify-between mt-4">
                        <!-- Cancel button: ghost style -->
                        <a href="/" class="btn btn-ghost btn-sm border border-black text-black hover:bg-black hover:text-white">
                            Cancel
                        </a>

                        <!-- Update button: black background, white text -->
                        <button type="submit" class="btn btn-sm bg-black text-white border-black hover:bg-gray-800">
                            Update Chirp
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
