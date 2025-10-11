<x-app-layout>

  <div class="min-h-screen bg-gray-50 py-20 px-10">
    <div class="mx-auto w-full max-w-7xl bg-white shadow-xl rounded-3xl p-12 border border-gray-100">

      <!-- Header -->
      <div class="flex items-center justify-between mb-12">
        <h1 class="text-4xl font-bold text-gray-800 tracking-tight"> Edit Note</h1>
        <a href="{{ route('note.index') }}" class="text-green-600 hover:text-green-700 hover:underline font-semibold text-lg">
          ← Back to Notes
        </a>
      </div>

      <!-- Form -->
      <form class="space-y-10" method="POST" action="{{ route('note.update', $note) }}">
        @csrf
        @method("PUT")
        <div>
  <label for="title" class="block text-gray-700 font-semibold mb-3 text-lg">Title</label>
  <input
    type="text"
    id="title"
    name="title"
    placeholder="Enter note title"
    value="{{ $note->title }}"
    class="w-full border @error('title') border-red-500 @else border-gray-300 @enderror rounded-xl p-5 text-gray-800 text-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 shadow-sm"
  />

  @error('title')
    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
  @enderror
</div>


        <!-- Note -->
        <div>
          <label for="content" class="block text-gray-700 font-semibold mb-3 text-lg">Note</label>
          <textarea
            id="content"
            name="content"
            rows="10"
            value="Write your note here..."
            class="w-full border @error('content') border-red-500 @else border-gray-300 @enderror
            rounded-xl p-5 text-gray-800 text-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 shadow-sm resize-none"
          >{{ $note->content }}</textarea>
          @error('content')
            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
          @enderror
        </div>

        <!-- Actions -->
        <div class="flex items-center justify-between pt-8 border-t border-gray-200">
          <a href="{{ route('note.update', $note) }}" class="text-gray-500 hover:text-gray-700 hover:underline text-base font-medium">
            Cancel
          </a>
         <button
                    type="submit"
                    class="px-6 py-2.5 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg shadow-md transition duration-200"
                >
                    Update Note
                </button>
        </div>
      </form>
    </div>
  </div>

</x-app-layout>
