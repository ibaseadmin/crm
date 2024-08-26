<?php
namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User; // Pentru a obține agenții
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $query = Client::query();

        // Filtrare după nume (căutare)
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->input('search') . '%');
        }

        // Filtrare după agent
        if ($request->has('agent_id') && $request->input('agent_id') !== null) {
            $query->where('agent_id', $request->input('agent_id'));
        }

        // Filtrare după dată
        if ($request->has('date')) {
            $query->whereDate('created_at', $request->input('date'));
        }

        // Sortare după data adăugării (cele mai noi primele)
        $query->orderBy('created_at', 'desc');

        // Adăugăm paginarea cu 10 rezultate per pagină
        $clients = $query->paginate(10);

        // Obținem toți agenții pentru filtrare
        $agents = User::all(); // Aici presupunem că User este modelul pentru agenți

        return view('clients', compact('clients', 'agents'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'location' => 'nullable|string',
        ]);

        Client::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'location' => $request->location,
            'agent_id' => auth()->id(),
        ]);

        return redirect()->back()->with('success', 'Client added successfully!');
    }

    public function show($id)
    {
        $client = Client::with(['agent', 'offers', 'contracts'])->findOrFail($id);
        return view('clients.show', compact('client'));
    }


    // Alte metode (show, edit, update, destroy) rămân neschimbate.
}
