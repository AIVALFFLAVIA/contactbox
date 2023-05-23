<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    public function store(Contact $contact, Request $request)
    {
        $contact->notes()->create([
            'user_id' => auth()->id(),
            'note' => $request->note,
        ]);

        return redirect()->back();
    }
}
