<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContatoController extends Controller
{

    public function index()
    {
        $contatos = Contact::all();
        return view('contacts.index', compact('contatos'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:250',
            'contact' => 'required|max:9',
            'email' => 'required|email|unique:contacts,email|max:250',
        ]);

        Contact::create($request->all());

        return redirect()->route('contatos.index')->with('success', 'Contato criado com sucesso.');
    }

    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return view('contacts.show', compact('contact'));
    }

    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('contacts.edit', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:250',
            'contact' => 'required|max:9',
            'email' => 'required|email|unique:contacts,email,' . $id . '|max:250',
        ]);

        $contact = Contact::findOrFail($id);
        $contact->update($request->all());

        return redirect()->route('contatos.index')->with('success', 'Contato atualizado com sucesso.');
    }

    public function destroy($id)
    {
        $contato = Contact::find($id);
        $contato->delete();

        return redirect()->route('contatos.index')->with('success', 'Contato excluído com sucesso.');
    }
}
