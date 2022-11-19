<?php

namespace App\Http\Controllers;

use App\Models\Calon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\Return_;

class CalonController extends Controller
{

    /** 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posisi =   auth()->user()->posisi;

        if ($posisi == 'Senior HRD') {
            # code...
            $level  =   'admin';
        } else {
            # code...
            $level  = 'user';
        }        

        $post   = Calon::all();
        
        return view('dashboard', [
            'dataCalon' => $post,
            'level'    => $level
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posisi =   auth()->user()->posisi;

        if ($posisi != 'Senior HRD') {
            # code...
            return redirect('/');
        }    
        return view('add');
    }

    public function store(Request $request)
    {
        $posisi =   auth()->user()->posisi;

        if ($posisi != 'Senior HRD') {
            # code...
            return redirect('/');
        }    
            $input  =   $request->validate([
                'name'      =>  'required',
                'education'      =>  'required',
                'birthday'      =>  'required',
                'experience'      =>  'required',
                'lastPosition'      =>  'required',
                'appliedPosition'      =>  'required',
                'top5'      =>  'required',
                'email'      =>  'required',
                'phone'      =>  'required',
                'resume'      =>  'mimes:pdf|file|max:2048|nullable'
            ]);
            // dd($input);
            if ($request->file('resume')) {
                # code...
                $input['resume']    =   $request->file('resume')->store('uploaded-resume');
                // $input['resume']    = $request->resume->storeAs("uploaded-resume", date('dmYHis')."-".$request->name.".".$request->resume->extension());

            }
            Calon::create($input);
            return redirect('/home')->with('succes','Data Has Been Created');
        }
    
    public function show($id)
    {
        $candidate  = Calon::where('id',$id)->get();

        return view('showCandidate',[
            'candidate' =>   $candidate
        ]);
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Calon  $calon
     * @return \Illuminate\Http\Response
     */
    public function edit($calon)
    {
        //
        $posisi =   auth()->user()->posisi;

        if ($posisi != 'Senior HRD') {
            # code...
            return redirect('/');
        }      
        return view('update', [
            'candidate' => Calon::where('id', $calon)->get()
        ]);
    }

     
    public function update(Request $request, $id)
    {
        $posisi =   auth()->user()->posisi;

        if ($posisi != 'Senior HRD') {
            # code...
            return redirect('/');
        }    
        $validasi  =   $request->validate([
            'name'      =>  'required',
            'education'      =>  'required',
            'birthday'      =>  'required',
            'experience'      =>  'required',
            'lastPosition'      =>  'required',
            'appliedPosition'      =>  'required',
            'top5'      =>  'required',
            'email'      =>  'required',
            'phone'      =>  'required',
            'resume'      =>  'mimes:pdf|file|max:2048|nullable'
        ]);

        if ($request->file('resume')) {
            if ($request->oldResume) {
                Storage::delete($request->oldResume);
            }
            $validasi['resume'] = $request->file('resume')->store('uploaded-resume');
        }

        $candidate=Calon::find($id);
        $candidate->update($validasi);

        return redirect('/home')->with('succes','Data Has Been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Calon  $calon
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posisi =   auth()->user()->posisi;

        if ($posisi != 'Senior HRD') {
            # code...
            return redirect('/');
        }   
        $candidate  = Calon::find($id);
        if ($candidate->resume != '') {
            Storage::delete($candidate->resume);
        }
        $candidate->delete();
        return redirect('/home')->with('succes','Data Has Been Deleted');
    }
}
