<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\Template;
use App\Models\Client;

class OfferController extends Controller
{
    // Afișarea tuturor ofertelor
    public function index()
    {
        $offers = Offer::with('client')->get(); // Asigură-te că ai relația 'client' definită în modelul Offer
        return view('offers.index', compact('offers'));
    }
    

    // Crearea unei oferte noi
    public function create($client_id)
    {
        $client = Client::findOrFail($client_id);
        $templates = Template::all();
        return view('offers.create', compact('client', 'templates'));
    }
    

    // Salvarea unei oferte noi
    public function store(Request $request)
    {
        // Validarea datelor de intrare
        $validated = $request->validate([
            'offer_title' => 'required|string|max:255',
            'offer_content' => 'required|string',
            'client_id' => 'required|integer|exists:clients,id',
            'template_id' => 'nullable|integer|exists:templates,id',
        ]);
    
        // Preluarea datelor clientului
        $client = Client::find($validated['client_id']);
        
        // Preluarea template-ului selectat
        $template = Template::find($validated['template_id']);
    
        // Înlocuirea câmpurilor dinamice cu datele clientului
        $content = $template->content;
        $content = str_replace('<ClientName>', $client->name, $content);
        $content = str_replace('<Location>', $client->location, $content);
        // Adaugă alte câmpuri dinamice după necesitate
    
        // Crearea și salvarea ofertei
        $offer = new Offer();
        $offer->title = $validated['offer_title'];
        $offer->content = $content; // Utilizarea conținutului cu câmpuri înlocuite
        $offer->client_id = $validated['client_id'];
        $offer->template_id = $validated['template_id'];
        $offer->file_path = ''; // Setează un default value sau ajustează conform nevoilor
        $offer->save();
    
        return redirect()->route('offers.index')->with('success', 'Offer created successfully!');
    }
    


    // Afișarea detaliilor unei oferte
    public function show($id)
    {
        $offer = Offer::findOrFail($id);
        return view('offers.show', compact('offer'));
    }

    // Descărcarea unei oferte ca PDF
    public function download($id)
    {
        $offer = Offer::findOrFail($id);
        $pdf = \PDF::loadView('offers.pdf', compact('offer'));
        return $pdf->download('offer_' . $offer->id . '.pdf');
    }



private function replaceDynamicFields($content, $clientId)
{
    $client = Client::find($clientId);

    $data = [
        '{CLIENT_NAME}' => $client->name,
        '{OFFER_DATE}' => now()->format('Y-m-d'),
        '{COMPANY_NAME}' => 'ABC Corp',
        // Alte variabile...
    ];

    foreach ($data as $key => $value) {
        $content = str_replace($key, $value, $content);
    }

    return $content;
}
}
