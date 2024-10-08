<x-app-layout>
    <x-slot name="header">
        <h2 class="flex justify-between align-middle font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Posts') }}

            <a href="{{ route('posts.create') }}" class="px-2 py-1 bg-gray-800 text-white text-xs rounded">Crear</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="w-full mb-5">
                        @forelse($posts as $post)
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td><a href="{{ route('posts.edit', $post) }}" class="text-indigo-600">Editar</a></td>
                                <td>
                                    <form action="{{ route('posts.destroy', $post) }}" method="post">
                                        @csrf
                                        @method('DELETE')

                                        <input type="submit" class="px-4 py-2 bg-gray-800 text-white rounded" onclick="return confirm('¿Realmente desea eliminar el post?')" value="Eliminar"/>
                                    </form>    
                                </td>
                            </tr>
                        @empty
                            <h2>No tenemos posts para mostrar, crea el primero</h2>
                        @endforelse
                    </table>
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
