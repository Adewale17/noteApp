<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = Note::query()->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('Note.index', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Note.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
        $data['user_id'] = Auth::id();

        $note = Note::create($data);

        return to_route('note.index', $note)->with('message', 'Note created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $note = Note::findOrfail($id);
        if ($note->user_id !== Auth::id()) {
            Abort(403);
        }
        return view('Note.show', compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $note = Note::findOrFail($id);
        if ($note->user_id !== Auth::id()) {
            Abort(403);
        }
        return view('note.edit', compact('note'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        $data = $request->validate([
            'title' => ['required', 'max:200'],
            'content' => ['required'],
        ]);
        $note->Update($data);
        return to_route('note.show', $note)->with('message', 'Note updated successfuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        if ($note->user_id !== Auth::id()) {
            Abort(403);
        }
        $note->delete();
        return to_route('note.index')->with('message', 'Note deleted successfully');
    }
}
