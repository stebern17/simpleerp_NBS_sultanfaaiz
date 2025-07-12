<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('client.index', compact('clients'));
    }

    public function create()
    {
        return view('client.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'beginning_contract_date' => 'nullable|date',
            'end_contract_date' => 'nullable|date|after_or_equal:beginning_contract_date',
        ]);

        Client::create($validated);

        return redirect()->route('client.index')->with('success', 'Client created successfully');
    }

    public function show(Client $client)
    {
        return view('client.show', compact('client'));
    }

    public function edit(Client $client)
    {
        return view('client.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'beginning_contract_date' => 'nullable|date',
            'end_contract_date' => 'nullable|date|after_or_equal:beginning_contract_date',
        ]);

        $client->update($validated);

        return redirect()->route('client.index')->with('success', 'Client updated successfully');
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('client.index')->with('success', 'Client deleted successfully');
    }
}
