<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\User;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\ClientActivity;
 
class LeadController extends Controller
{
    public function index(Request $request)
{
    // Exclude lead-urile cu status "Unqualified" din interogare
    $query = Lead::with('agent')->where('status', '!=', 'Unqualified')->orderBy('created_at', 'desc');

    // Filtrare după nume (căutare)
    if ($request->has('search') && $request->input('search') !== null) {
        $query->where('name', 'like', '%' . $request->input('search') . '%');
    }

    // Filtrare după agent
    if ($request->has('agent_id') && $request->input('agent_id') !== null) {
        $query->where('agent_id', $request->input('agent_id'));
    }

    // Filtrare după interval de date
    if ($request->has('date_from') && $request->input('date_from') !== null) {
        $query->whereDate('created_at', '>=', $request->input('date_from'));
    }

    if ($request->has('date_to') && $request->input('date_to') !== null) {
        $query->whereDate('created_at', '<=', $request->input('date_to'));
    }

    // Adăugăm paginarea cu 10 rezultate per pagină
    $leads = $query->paginate(10);
    $agents = User::all();

    return view('leads.index', compact('leads', 'agents'));
}


    public function create()
    {
        $agents = User::all();
        return view('leads.create', compact('agents'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'location' => 'nullable|string',
            'agent_id' => 'required|exists:users,id',
            'source' => 'required|string',
        ]);

        Lead::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'location' => $request->location,
            'agent_id' => $request->agent_id,
            'source' => $request->source,
        ]);

        return redirect()->back()->with('success', __('messages.lead_added_successfully'));

    }

    public function show($id)
    {
        $lead = Lead::findOrFail($id);
        return view('leads.show', compact('lead'));
    }

    public function edit($id)
    {
        $lead = Lead::findOrFail($id);
        $agents = User::all();
        return view('leads.edit', compact('lead', 'agents'));
    }

    public function update(Request $request, $id)
    {
        $lead = Lead::findOrFail($id);
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'location' => 'nullable|string',
            'agent_id' => 'required|exists:users,id',
            'source' => 'required|string', // Include sursa la actualizare
        ]);

        $lead->update($validatedData);

        return redirect()->route('leads.index')->with('success', __('messages.lead_updated_successfully'));
    }

    public function destroy($id)
    {
        $lead = Lead::findOrFail($id);
        $lead->delete();
        return redirect()->route('leads.index')->with('success', __('messages.lead_deleted_successfully'));
    }

    public function updateAgent(Request $request, $id)
    {
        $lead = Lead::findOrFail($id);
        $lead->agent_id = $request->input('agent_id');
        $lead->save();

        return redirect()->back()->with('success', __('messages.agent_updated_successfully'));
    }

    public function makeClient($id)
    {
        $lead = Lead::findOrFail($id);
        
        $client = Client::create([
            'name' => $lead->name,
            'email' => $lead->email,
            'phone' => $lead->phone,
            'location' => $lead->location,
            'agent_id' => $lead->agent_id,
            'source' => $lead->source,  // Salvează sursa în client
        ]);
    
        // Log the activity
        ClientActivity::create([
            'client_id' => $client->id,
            'agent_id' => $lead->agent_id,
            'activity_type' => 'Marked as Client',
            'activity_time' => now(),
        ]);
    
        $lead->delete();
        
        return redirect()->route('leads.index')->with('success', __('messages.lead_successfully_converted'));
    }
    



    public function unqualified(Request $request, $id)
    {
        $lead = Lead::findOrFail($id);
    
        // Validăm motivul descalificării
        $request->validate([
            'unqualified_reason' => 'required|string|max:1000',
        ]);
    
        // Stocăm motivul și marcăm lead-ul ca necalificat
        $lead->status = 'Unqualified';
        $lead->unqualified_reason = $request->input('unqualified_reason');
        $lead->unqualified_at = now(); // Salvăm data la care a fost marcat ca necalificat
        $lead->save();
    
        return redirect()->route('leads.index')->with('success', __('messages.lead_marked_unqualified'));
    }
    





    public function unqualifiedLeads()
    {
        $leads = Lead::where('status', 'Unqualified')->paginate(10);
        return view('leads.unqualified', compact('leads'));
    }
    

    

}
