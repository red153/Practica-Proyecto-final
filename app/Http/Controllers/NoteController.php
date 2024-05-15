<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\Note;
use App\Models\Logs;


class NoteController extends Controller
{

    public function show($id)
    {
        return Note::find($id);
    }

    public function index()
    {
        $userId = auth()->id();
        $isAdmin = ($userId == 154);

        if ($isAdmin) {
            $notes = Note::all();
        } else {
            $notes = Note::where('user_id', $userId)->get();
        }

        return Inertia::render('Notes/Index', ['notes' => $notes]);
    }


    public function create()
    {
        return Inertia::render('Notes/Create');
    }

    public function edit(Note $note)
    {
        if ($note->user_id !== auth()->id() && auth()->id() !== 154) {
            return response()->json(['error' => 'No tienes permiso para actualizar esta nota'], 403);
        }
        return Inertia::render('Notes/Update', [
            'note' => $note
        ]);
    }

    public function store(Request $request){
        $validate = $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string',
            'importancia' => 'nullable|integer|min:1|max:5',
            'isPublic' => 'boolean'
        ]);

        $validate['user_id'] =  auth()->id();
        if (is_null($validate['importancia'])) {
            $validate['importancia'] = 1;
        }

        Note::create($validate);

        Logs::create([
            'user_id' => Auth::id(),
            'action' => 'created',
        ]);

        return redirect()->route('notes.index');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string',
            'importancia' => 'nullable|integer|min:1|max:5',
            'isPublic' => 'boolean'
        ]);

        $note = Note::findOrFail($id);
        if ($note->user_id !== auth()->id() && auth()->id() !== 154) {
            return response()->json(['error' => 'No tienes permiso para actualizar esta nota'], 403);
        }
        $note->update($request->all());

        return redirect()->route('notes.index');
    }


    public function destroy(Note $note)
    {
        if ($note->user_id !== auth()->id() && auth()->id() !== 154) {
            return response()->json(['error' => 'No tienes permiso para eliminar esta nota'], 403);
        }
        $note->delete();
        return redirect()->route('notes.index');
    }

    public function indexOrdenado(Request $request)
    {
        $order = $request->input('order', 'asc');
        $userId = auth()->id();
        $isAdmin = ($userId == 154);

        if ($isAdmin) {
            $notes = Note::orderBy('importancia', $order)->get();
        } else {
            $notes = Note::where('user_id', $userId)->orderBy('importancia', $order)->get();
        }

        return Inertia::render('Notes/ordenImportancia', ['notes' => $notes]);
    }


    public function publicNotes()
    {
        $notes = Note::where('isPublic', true)->get();
        return Inertia::render('Notes/Public', ['notes' => $notes]);
    }



}
