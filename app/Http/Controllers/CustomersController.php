<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\Projects;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CustomersController extends Controller
{
    public function index()
    {
        return Inertia::render('Customers/Index', [
            'customerList' => Customers::with(['projects'])->orderBy("id", "Desc")->get()
        ]);
    }

    public function add()
    {
        return Inertia::render('Customers/add', [
        ]);
    }

    public function create(Request $request)
    {
        $request->validate([
            "description" => ['required', 'min:5'],
            "social_reason" => ['required'],
            "legal_status" => ['required'],
            "capital" => ['required', 'integer'],
            "siret_number" => ['required', 'unique:customers', 'min:14'],
            "naf_code" => ['required', 'min:4'],
            "country" => ['required'],
            "adress" => ['required', 'min:4'],
            "zip_code" => ['required', 'min:5', 'max:5'],
            "city" => ['required', 'min:3'],
        ]);

        Customers::create($request->only('description', 'social_reason', 'legal_status', 'capital', "capital", "siret_number", "naf_code", "country", "adress", "zip_code", "city"));
        return redirect('customers');
    }

    public function edit($id, Request $request)
    {
        $client = Customers::findOrFail($id);
        return Inertia::render('Customers/edit', [
            'customer' => $client
        ]);
    }

    public function save($id, Request $request)
    {
        $client = Customers::findOrFail($id);

        $request->validate([
            "description" => ['required', 'min:5'],
            "social_reason" => ['required'],
            "legal_status" => ['required'],
            "capital" => ['required', 'integer'],
            "siret_number" => ['required', 'min:14', 'unique:customers,id,' . $client->id],
            "naf_code" => ['required', 'min:4'],
            "country" => ['required'],
            "adress" => ['required', 'min:4'],
            "zip_code" => ['required', 'min:5', 'max:5'],
            "city" => ['required', 'min:3'],
        ]);

        $client->update($request->only('description', 'social_reason', 'legal_status', 'capital', "capital", "siret_number", "naf_code", "country", "adress", "zip_code", "city"));
        return redirect('customers');
    }

    public function delete($id)
    {
        $client = Customers::findOrFail($id);
        $client->delete();
        return redirect('customers');
    }
}
