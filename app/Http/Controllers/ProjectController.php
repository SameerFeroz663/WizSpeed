<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\project;


class ProjectController extends Controller
{
    public function create()
    {

        $projects = project::all();

       return view('project', compact('projects'));

    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'project_name' => 'required|string|max:255',
            'client_name' => 'required|string|max:255',
            'assign_to' => 'required|string|max:255',
            'price' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        Project::create($request->all());

        if ($request->hasFile('document_name')) {

            $file = $request->file('document_name');

            $filename = time() . '_' . $file->getClientOriginalName();

            $file->move(public_path('projectAssets'), $filename);

            Document::create([
                'document_name' => 'projectAssets/' . $filename,
                'project_id'    => $project->id,
            ]);
        }


        

        document::create(
            [
                'document_name' => $request->input('document_name'),
                'project_id' => $request->id,
            ]
        );

        return redirect()->route('project.create')->with('success', 'Project created successfully.');
    }

    public function view_edit($id)
    {

        $projects = project::findorFail($id);

       return view('edit-project', compact('projects'));

    }

    public function edit(Request $request)
    {
        $validated = $request->validate([
            'project_name' => 'required|string|max:255',
            'client_name' => 'required|string|max:255',
            'assign_to' => 'required|string|max:255',
            'price' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $project = project::find($request->id);
        $project->update($request->all());

        return redirect()->route('project.create')->with('success', 'Project updated successfully.');
    }



    public function delete($id)
    {
        $project = project::find($id);
        $project->delete();

        return redirect()->route('project.create')->with('success', 'Project deleted successfully.');
    }
}
