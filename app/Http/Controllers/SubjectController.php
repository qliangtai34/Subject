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
            'content' => $add->input('property1'),
            'published_at' =>  now(),
        ]);
        return redirect('/subjects');
    }

    public function renewal(Request $change, $id)
    {
        Subject::findOrFail($id)->update([
            'content' => $change->input('property1'),
        ]);
        return redirect('/subjects');
    }

    public function break($id)
    {
        Subject::findOrFail($id)->delete();
        return redirect('/subjects');
    }
}