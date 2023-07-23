<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request, $person_id)
    {
        $this->validate($request, [
            'type' => 'required|in:telefone,email,whatsapp',
            'value' => 'required|string',
        ]);

        // Validando se o campo "value" contém apenas dígitos numéricos
        $this->validate($request, [
            'value' => 'numeric',
        ]);

        $person = Person::findOrFail($person_id);
        $contact = new Contact([
            'type' => $request->input('type'),
            'value' => $request->input('value'),
        ]);
        $person->contacts()->save($contact);

        return response()->json($contact, 201);
    }
    
    public function update(Request $request, $person_id, $contact_id)
    {
        $this->validate($request, [
            'type' => 'in:telefone,email,whatsapp',
            'value' => 'string',
        ]);

        $person = Person::findOrFail($person_id);
        $contact = $person->contacts()->findOrFail($contact_id);
        $contact->update($request->only(['type', 'value']));

        return response()->json($contact);
    }

    public function destroy($person_id, $contact_id)
    {
        $person = Person::findOrFail($person_id);
        $contact = $person->contacts()->findOrFail($contact_id);
        $contact->delete();

        return response()->json(['message' => 'Contact deleted successfully']);
    }
}

