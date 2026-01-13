<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Services\Operations;
use Illuminate\Http\Request;

class MainController extends Controller {
    public function index() {
        $id = session('user.id');
        $notes = Note::where('user_id', $id)
            ->whereNull('deleted_at')
            ->get()
            ->toArray();

        return view('home', [
            'notes' => $notes,
        ]);
    }

    public function newNote() {
        return view('new_note');
    }

    public function newNoteSubmit(Request $request) {
        $request->validate([
            'text_title' => ['required', 'string', 'min:3', 'max:200'],
            'text_note' => ['required', 'string', 'min:3', 'max:3000'],
        ], [
            'text_title.required' => 'O título da nota é obrigatório',
            'text_note.required' => 'O texto da nota é obrigatório',
            'text_title.string' => 'O título da nota deve ser uma string válida',
            'text_note.string' => 'O texto da nota deve ser uma string válida',
            'text_title.min' => 'O título da nota deve ter pelo menos :min caracteres',
            'text_note.min' => 'O texto da nota deve ter pelo menos :min caracteres',
            'text_title.max' => 'O título da nota não deve exceder :max caracteres',
            'text_note.max' => 'O texto da nota não deve exceder :max caracteres',
        ]);

        $note = new Note();
        $note->user_id = session('user.id');
        $note->title = $request->input('text_title');
        $note->text = $request->input('text_note');
        $note->save();

        return redirect()->route('home');
    }

    public function editNote($id) {
        $id = Operations::decryptId($id);
        if ($id === null) {
            return redirect()->route('home');
        }

        $note = Note::find($id);

        return view('edit_note', [
            'note' => $note,
        ]);
    }

    public function editNoteSubmit(Request $request) {
        if (!$request->input('note_id')) {
            return redirect()->route('home');
        }

        $request->validate([
            'text_title' => ['required', 'string', 'min:3', 'max:200'],
            'text_note' => ['required', 'string', 'min:3', 'max:3000'],
        ], [
            'text_title.required' => 'O título da nota é obrigatório',
            'text_note.required' => 'O texto da nota é obrigatório',
            'text_title.string' => 'O título da nota deve ser uma string válida',
            'text_note.string' => 'O texto da nota deve ser uma string válida',
            'text_title.min' => 'O título da nota deve ter pelo menos :min caracteres',
            'text_note.min' => 'O texto da nota deve ter pelo menos :min caracteres',
            'text_title.max' => 'O título da nota não deve exceder :max caracteres',
            'text_note.max' => 'O texto da nota não deve exceder :max caracteres',
        ]);

        $id = Operations::decryptId($request->input('note_id'));
        if ($id === null) {
            return redirect()->route('home');
        }

        $note = Note::find($id);
        $note->title = $request->input('text_title');
        $note->text = $request->input('text_note');
        $note->save();

        return redirect()->route('home');
    }

    public function deleteNote($id) {
        $id = Operations::decryptId($id);
        if ($id === null) {
            return redirect()->route('home');
        }

        $note = Note::find($id);

        return view('delete_note', [
            'note' => $note,
        ]);
    }

    public function deleteConfirm($id) {
        $id = Operations::decryptId($id);
        if ($id === null) {
            return redirect()->route('home');
        }

        $note = Note::find($id);
        $note->delete();

        return redirect()->route('home');
    }
}
