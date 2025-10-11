<x-app-layout>
<div class="max-w-5xl mx-auto px-6 py-10">
  <!-- Header Section -->
  <div class="flex items-center justify-between mb-8">
    <h1 class="text-3xl font-bold text-gray-800">My Notes</h1>
    <a cursor="pointer" href="{{ route('note.create') }}"
      class="bg-green-600 text-white px-4 py-2 rounded-lg shadow hover:bg-green-700 transition">
      + New Note
    </a>
  </div>

  <!-- Notes List -->
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($notes as $note)
    <div
      class="bg-white rounded-2xl shadow-md p-5 flex flex-col justify-between hover:shadow-lg transition">
      <div>
        <h2 class="text-xl font-semibold text-gray-800 mb-2 truncate">{{ $note->title }}</h2>
        <p class="text-gray-600 text-sm line-clamp-3">
            {{ Str::words($note->content, 20) }}
        </p>
      </div>
      <div class="mt-4 flex items-center justify-between text-sm font-medium">
        <a href="{{ route('note.show', $note) }}" class="text-blue-600 hover:underline">View</a>
        <div class="space-x-2">
          <a href="{{ route('note.edit', $note) }}" class="text-yellow-600 hover:underline">Edit</a>
            <form method="POST" action="{{ route('note.destroy', $note) }}" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-600 hover:underline">Delete</button>
            </form>
        </div>
      </div>
    </div>
    @endforeach

  </div>

</div>
{{ $notes->links() }}
@if($notes->count() <= 0)
<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 border-b border-gray-200 text-center">
                    No Notes to display
                </div>
            </div>
        </div>
    </div>
@endif

</x-app-layout>
