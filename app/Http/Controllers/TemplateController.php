<?php

use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TemplateController extends Controller
{
    public function store(Request $request)
    {
        // Validarea formularului
        $validated = $request->validate([
            'template_title' => 'required|string|max:255',
            'template_file' => 'required|file|mimes:docx',
        ]);

        // Salvarea fișierului DOCX încărcat
        $path = $request->file('template_file')->store('templates');

        // Citirea și manipularea documentului
        $templateProcessor = new TemplateProcessor(Storage::path($path));

        // Exemplu de placeholderi dinamici
        // În funcție de necesitate, poți folosi aceste locuri pentru a înlocui cu date din baza de date
        $templateProcessor->setValue('ClientName', '{{ClientName}}');
        $templateProcessor->setValue('Location', '{{Location}}');

        // Salvarea documentului prelucrat
        $newFileName = 'processed_' . basename($path);
        $newPath = 'templates/' . $newFileName;
        $templateProcessor->saveAs(Storage::path($newPath));

        // Salvarea template-ului în baza de date
        $template = new Template();
        $template->title = $validated['template_title'];
        $template->file_path = $newPath;
        $template->save();

        return redirect()->route('templates.index')->with('success', 'Template created successfully!');
    }
}
