@csrf

<div class="flex flex-col">
    <label class="text-gray-700 text-xs uppercase">Titulo</label>
    @error('title') <span class="text-xs text-red-600">{{$message}}</span> @enderror
</div>
<input name="title" type="text" value="{{ old('title', $post->title) }}" class="rounded border-gray-200 w-full mb-4"/>

<div class="flex flex-col">
    <label class="text-gray-700 text-xs uppercase">Contenido</label>
    @error('body') <span class="text-xs text-red-600">{{$message}}</span> @enderror
</div>
<textarea name="body" rows="5" class="rounded border-gray-200 w-full mb-4">{{ old('body',$post->body) }}</textarea>

<div class="flex justify-between items-center">
    <a href="{{ route('posts.index') }}">Volver</a>

    <input type="submit" value="Enviar" class="px-4 py-2 bg-gray-800 text-white rounded"/>
</div>