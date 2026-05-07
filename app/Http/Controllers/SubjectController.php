<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::with('contents')->get();
        return view('subjects.index', ['subjects' => $subjects]);
    }

    public function search(Request $request)
    {
        $subjects = Subject::where('content', $request->input('target'))->get();
        return view('subjects.index', ['subjects' => $subjects]);
    }

    public function create(Request $add)
    {
        Subject::create([
            'name' => $add->input('property1'),
            'content' => $add->input('property2'),
            'published_at' =>  now(),
        ]);
        return redirect('/subjects');
    }

    public function update(Request $change, $id)
    {
        Subject::findOrFail($id)->update([
            'name' => $change->input('property1'),
            'content' => $change->input('property2'),
        ]);
        return redirect('/subjects');
    }

    public function break($id)
    {
        Subject::findOrFail($id)->delete();
        return redirect('/subjects');
    }
}