@extends('template')

@section('content')
    <div class="relative px-28 py-16 mb-8 rounded-lg bg-gray-900 overflow-hidden">
        <span class="px-2 py-1 rounded-full text-xs bg-gray-700 uppercase">Programación</span>
        <h1 class="mt-4 text-3xl text-white">Blog</h1>
        <p class="mt-2 text-sm text-gray-400">Proyecto de desarrollo web para profesionales</p>

        <img src="{{ Vite::image('dev.png') }}" alt="dev" class="absolute -right-20 -top-20 rounded-full opacity-20"/>
    </div>

    <div class="px-4">
        <h1 class="mb-8 text-2xl text-gray-900">Contenido</h1>
    
            <div class="grid grid-cols-1 gap-4 mb-4">
                @foreach ($posts as $post)
                    <a href="{{ route('post', $post->slug) }}" class="px-6 py-4 rounded-lg bg-gray-100">
                        <p class="flex items-center gap-2 text-xs">
                            <span class="px-2 py-1 rounded-full text-gray-700 bg-gray-200 uppercase">Tutorial</span>
                            <span>{{ $post->created_at->format('d/m/Y') }}</span>
                        </p>

                        <h2 class="px-4 mt-2 text-lg text-gray-900">{{ $post->title }}</h2>
                    </a>
                @endforeach
            </div>

        {{ $posts->links() }}
    </div>
@endsection