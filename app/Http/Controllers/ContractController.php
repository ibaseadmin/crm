<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contract;
use App\Models\Client;

class ContractController extends Controller
{
    public function create($client_id)
    {
        $client = Client::findOrFail($client_id);
        return view('contracts.create', compact('client'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $contract = new Contract();
        $contract->client_id = $request->client_id;
        $contract->title = $request->title;
        $contract->content = $request->content;
        $contract->save();

        return redirect()->route('clients.show', $request->client_id)->with('success', 'Contract created successfully!');
    }
}
