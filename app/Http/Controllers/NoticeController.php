<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    public function index()
    {
        // Retrieve all notices from the database
        $notices = Notice::all();

        // Return the index view with the notices
        return view('admin.notices', compact('notices'));
    }

    public function create()
    {
        // Return the create view to create a new notice
        return view('admin.add_notice');
    }

    public function store(Request $request)
    {
        // Validate and store the new notice in the database
        $request->validate([
            'info' => 'nullable',
            'enabled' => 'boolean',
        ]);

        Notice::create($request->all());

        // Redirect to the index view with a success message
        return redirect()->route('notices.index')->with('success', 'Notice created successfully');
    }

    public function show(Notice $notice)
    {
        // Return the show view with the details of a specific notice
        return view('notices.show', compact('notice'));
    }

    public function edit(Notice $notice)
    {
        // Return the edit view with the form to edit a specific notice
        return view('admin.add_notice', compact('notice'));
    }

    public function update(Request $request, Notice $notice)
    {
        // Validate and update the notice in the database
        $request->validate([
            'info' => 'nullable',
            'enabled' => 'boolean',
        ]);

        $notice->update($request->all());

        // Redirect to the index view with a success message
        return redirect()->route('notices.index')->with('success', 'Notice updated successfully');
    }

    public function destroy(Notice $notice)
    {
        // Delete the notice from the database
        $notice->delete();

        // Redirect to the index view with a success message
        return redirect()->route('notices.index')->with('success', 'Notice deleted successfully');
    }
}
