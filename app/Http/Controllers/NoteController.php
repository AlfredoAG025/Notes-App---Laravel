<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveNoteRequest;
use App\Models\Note;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = Note::all();
        return view('notes.index', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('notes.create', ['note' => new Note]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveNoteRequest $request)
    {
        $validated = $request->validated();

        if (isset($validated['image'])) {
            $imageURL = $this->upload($request);
            $validated['image'] = $imageURL;
        }

        $note = new Note($validated);

        $note->save();

        return to_route('notes.index')->with('status', 'Note Created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        return view('notes.show', ['note' => $note]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        return view('notes.edit', ['note' => $note]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaveNoteRequest $request, Note $note)
    {
        $validated = $request->validated();

        if (isset($validated['image'])) {
            $imageURL = $this->upload($request);
            $validated['image'] = $imageURL;
        }

        $note->update($validated);

        return to_route('notes.index')->with('status', 'Note updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        $note->delete();
        return to_route('notes.index')->with('status', 'Note deleted!');
    }

    public function upload($request)
    {
        $client = new Client();
        $response = $client->post('https://api.imgbb.com/1/upload', [
            'multipart' => [
                [
                    'name' => 'image',
                    'contents' => fopen($request->file('image')->path(), 'r'),
                ],
                [
                    'name' => 'key',
                    'contents' => 'a8940700c3edba5f2c004580269ef033',
                ],
            ],
        ]);

        $body = $response->getBody();
        $json = json_decode($body);

        // Do something with the response, e.g., return the image URL
        return $json->data->url;
    }
}
