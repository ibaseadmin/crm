<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Illuminate\Http\Request;
use App\Models\Client;


class OfferTemplateController extends Controller
{
    public function selectTemplate()
    {
        $templates = Template::all();
        return 
        
        view('offers.select_template', compact('templates'));
    }


    public function createOffer(Request $request)
    {
        $template = Template::find($request->input('template_id'));
        $client = Client::find($request->input('client_id'));
    
        if (!$client || !$template) {
            return redirect()->back()->withErrors(['error' => 'Client or template not found']);
        }
    
        return view('offers.create', compact('template', 'client'));
    }


}
