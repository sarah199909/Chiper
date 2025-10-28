@props(['chirp'])

<div class="card bg-white border-2 border-black shadow-lg rounded-lg">
    <div class="card-body">
        <div class="flex space-x-3">
            <div class="avatar">
                <div class="size-10 rounded-full border border-black">
                    @if ($chirp->user)
                        @php
                            $hash = md5(strtolower(trim($chirp->user->email)));
                            $avatarUrl = "https://www.gravatar.com/avatar/{$hash}?s=80&d=mp";
                        @endphp
                        <img src="{{ $avatarUrl }}" alt="{{ $chirp->user->name }}'s avatar" class="rounded-full">
                    @else
                        <img src="https://avatars.laravel.cloud/f61123d5-0b27-434c-a4ae-c653c7fc9ed6?vibe=stealth" alt="Anonymous" class="rounded-full">
                    @endif
                </div>
            </div>

            <div class="min-w-0 flex-1">
                <div class="flex justify-between w-full">
                    <div class="flex items-center gap-1">
                        <span class="text-sm font-semibold text-black">
                            {{ $chirp->user ? $chirp->user->name : 'Anonymous' }}
                        </span>
                        <span class="text-gray-500">·</span>
                        <span class="text-sm text-gray-500">{{ $chirp->created_at->diffForHumans() }}</span>
                        @if ($chirp->updated_at->gt($chirp->created_at->addSeconds(5)))
                            <span class="text-gray-500">·</span>
                            <span class="text-sm italic text-gray-500">edited</span>
                        @endif
                    </div>

                    @can('update', $chirp)
                        <div class="flex gap-1">
                            <a href="/chirps/{{ $chirp->id }}/edit" class="btn btn-ghost btn-xs text-black border border-black hover:bg-green-500 hover:text-white">
                                Edit
                            </a>
                            <form method="POST" action="/chirps/{{ $chirp->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-ghost btn-xs text-black border border-black hover:bg-red-600 hover:text-white">
                                    Delete
                                </button>
                            </form>
                        </div>
                    @endcan
                </div>

                <p class="mt-2 text-gray-800">{{ $chirp->message }}</p>
            </div>
        </div>
    </div>
</div>
