<?php

namespace App\Http\Controllers;

use Squire\Models\Country;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $contacts = auth()->user()
            ->contacts()
            ->when($request->has('search') && strlen($request->search) > 0, function ($query) use ($request) {
                $query->where(function ($subquery) use ($request) {
                    $subquery->where('first_name', 'like', "%{$request->search}%")
                    ->orWhere('last_name', 'like', "%{$request->search}%");
                });
            })
            ->orderBy('first_name')
            ->paginate(12)
            ->withQueryString(['search']);

        $selectedContact = null;

        if ($request->has('contact') && $request->contact) {
            $selectedContact = auth()->user()->contacts()
                ->with('notes')
                ->find($request->contact);
        } else {
            $selectedContact = $contacts->count() > 0
                ? auth()->user()->contacts()->with('notes.user')->find($contacts->first()->id)
                : null;
        }

        return view('contacts.index', [
            'contacts' => $contacts,
            'selectedContact' => $selectedContact,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::all();

        return view('contacts.create', [
            'countries' => $countries,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:contacts,email'],
            'phone_number' => ['required', 'string', 'unique:contacts,phone_number'],
        ]);

        auth()->user()->contacts()->create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'date_of_birth' =>$request->date_of_birth,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'postal_code' => $request->postal_code,
        ]);

        return redirect()->route('contacts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $contact = auth()->user()->contacts()->findOrFail($id);
        $countries = Country::all();

        return view('contacts.edit', [
            'contact' => $contact,
            'countries' => $countries,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'phone_number' => ['required', 'string'],
          ]);

        $customer = auth()->user()->contacts()->findOrFail($id);

        $customer->update([
          'first_name' => $request->first_name,
          'last_name' => $request->last_name,
          'email' => $request->email,
          'date_of_birth' =>$request->date_of_birth,
          'phone_number' => $request->phone_number,
          'address' => $request->address,
          'city' => $request->city,
          'state' => $request->state,
          'country' => $request->country,
          'postal_code' => $request->postal_code,
        ]);

        return redirect()->route('contacts.index', [
            'contact' => $id,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = auth()->user()->contacts()->findOrFail($id);
        $customer->delete();
        return redirect()->route('contacts.index');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        // Perform the search query using the $search parameter

        // Pass the search results to the view
        return view('contacts.index', compact('search'));
    }
}
