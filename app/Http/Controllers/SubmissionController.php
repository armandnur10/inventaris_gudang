<?php

namespace App\Http\Controllers;

use App\Submission;
use App\Kategori;
use App\Ruangan;
use App\Barang;



use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    public function index()
    {
        $submission = Submission::all();
        $barang = Barang::all();
        if(auth()->user()->level == 'admin')
        {
            return view('user.submission_response', compact('submission', 'barang'));
        }
        else
        {
            return view('pic.submission', compact('submission', 'barang'));
        }
    }

    public function store(Request $request)
    {
        $input = $request->all();
        
        Submission::create($input);
        return redirect('/submission');
    }

    public function edit($id)
    {
        $submission = Submission::findOrFail($id);
        $barang = Barang::all();
        return view('pic.edit_submission', compact('submission', 'barang'));
    }
    public function update(Request $request, $id ){
        $submission = Submission::findOrFail($id);
        $input = $request->all();
        $submission->update($input);    
        return redirect('/submission');
    }

    public function destroy($id)
    {
        $submission = Submission::findOrFail($id);
        $submission->delete();
        return redirect('/submission');
    }
}
