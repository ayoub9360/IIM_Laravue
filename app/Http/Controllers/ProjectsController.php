<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Projects;
use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectsController extends Controller
{
    public function index()
    {
        return Inertia::render('Projects/Index', [
            'projects' => Projects::orderBy("id", "Desc")->get(),
            'Customer' => Customers::all(),
        ]);
    }

    public function add()
    {
        $client = Customers::all();
        return Inertia::render('Projects/add', [
            'customers' => $client
        ]);
    }


    public function create(Request $request)
    {
        $request->validate([
            "title" => ['required'],
            "description" => ['required'],
            "start_date" => ['required'],
            "end_date" => ['required'],
            "finished" => ['required'],
            "day_sold" => ['required'],
            "customers_id" => ['required'],
            "responsable_name" => ['required'],
            "responsable_surname" => ['required'],
            "responsable_number" => ['required'],
        ]);

        Projects::create($request->only('title', 'description', 'start_date', 'end_date', "finished", "day_sold", "customers_id", "responsable_name", "responsable_surname", "responsable_number"));
        return redirect('projects');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Projects $projects
     * @return \Illuminate\Http\Response
     */
    public function show(Projects $projects)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Projects $projects
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $client = Customers::all();
        $project = Projects::findOrFail($id);
        return Inertia::render('Projects/edit', [
            'project' => $project,
            'customers' => $client
        ]);
    }

    public function save($id, Request $request)
    {
        $project = Projects::findOrFail($id);

        $request->validate([
            "title" => ['required'],
            "description" => ['required'],
            "start_date" => ['required'],
            "end_date" => ['required'],
            "finished" => ['required'],
            "day_sold" => ['required','min:0'],
            "customers_id" => ['required'],
            "responsable_name" => ['required'],
            "responsable_surname" => ['required'],
            "responsable_number" => ['required'],
        ]);

        $project->update($request->only('title', 'description', 'start_date', 'end_date', "finished", "day_sold", "customers_id", "responsable_name", "responsable_surname", "responsable_number"));
        return redirect('projects');
    }

    public function delete($id)
    {
        $project = Projects::findOrFail($id);
        $project->delete();
        return redirect('projects');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Projects $projects
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Projects $projects)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Projects $projects
     * @return \Illuminate\Http\Response
     */
    public function destroy(Projects $projects)
    {
        //
    }
}
