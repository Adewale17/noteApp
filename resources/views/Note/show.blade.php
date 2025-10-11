<x-app-layout>
    <div class="max-w-3xl mx-auto px-6 py-10">
  <!-- Header -->
  <div class="flex items-center justify-between mb-8">
    <h1 class="text-3xl font-bold text-gray-800">View Note</h1>
    <a href="{{ route('note.index') }}" class="text-green-600 font-medium hover:underline">← Back to Notes</a>
  </div>

  <!-- Note Card -->
  <div class="bg-white shadow-md rounded-2xl p-6">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">{{ $note->title }}</h2>
    <p class="text-gray-700 leading-relaxed mb-6">
      {{$note->content}}
    </p>

    <div class="flex items-center justify-between border-t border-gray-200 pt-4 text-sm font-medium">
      <div class="text-gray-500">{{ $note->updated_at }}</div>
      <div class="space-x-4">
        <a href="{{ route('note.edit', $note) }}" class="text-yellow-600 hover:underline">Edit</a>
<form method="POST" action="{{ route('note.destroy', $note) }}" class="inline">
    @csrf
    @method('DELETE')
    <button type="submit" class="text-red-600 hover:underline">Delete</button>
</form>
    </div>
    </div>
  </div>
</div>
</x-app-layout>
