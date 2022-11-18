<?php

namespace App\Http\Controllers;

use App\Models\Calon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\Return_;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="L5 OpenApi",
 *      description="L5 Swagger OpenApi description",
 *      @OA\Contact(
 *          email="darius@matulionis.lt"
 *      ),
 *     @OA\License(
 *         name="Apache 2.0",
 *         url="https://www.apache.org/licenses/LICENSE-2.0.html"
 *     )
 * )
 * 
 * @OA\Get(
 *     path="/",
 *     summary="All",
 *      description="All",
 *     tags={"Candidate"},
 *     @OA\Response(response="default", description="All Data")
 * )
 */

class CalonController extends Controller
{

    /** 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // //
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
        // return new PostResource(true, 'List Calon Kandidat',$post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('add');
    }

    /** 
    * @OA\POST(
    *     path="/candidate",
    *     summary="Add",
    *      description="Add",
    *     tags={"Candidate"},
    *       @OA\Parameter(
        *      name="name",
        *      in="query",
        *      required=true,
        *      description= "Add Candidate",
        *      example="Julle",
        *      @OA\Schema(
        *           type="string"
        *      )
     *      ),
    *     @OA\Response(response="default", description="Show page")
    * )
    */
    public function store(Request $request)
    {
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
            }
            Calon::create($input);
            return redirect('/');
        // return new PostResource(true, 'Update Calon Kandidat',$candidate);
    }
    /** 
    * @OA\Get(
    *     path="/candidate/{id}",
    *     summary="Show",
    *      description="Show",
    *     tags={"Candidate"},
    *       @OA\Parameter(
        *      name="id",
        *      in="query",
        *      required=true,
        *      description= "candidate id",
        *      example="1",
        *      @OA\Schema(
        *           type="integer"
        *      )
     *      ),
    *     @OA\Response(response="default", description="Show page")
    * )
    */
    public function show($id)
    {
        $candidate  = Calon::where('id',$id)->get();

        return view('showCandidate',[
            'candidate' =>   $candidate
        ]);
        // return new PostResource(true, 'Show Calon Kandidat',$candidate);
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
        return view('update', [
            'candidate' => Calon::where('id', $calon)->get()
        ]);
    }

     
    public function update(Request $request, $id)
    {
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

        return new PostResource(true, 'Update Calon Kandidat',$candidate);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Calon  $calon
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $candidate  = Calon::find($id);
        if ($candidate != '') {
            Storage::delete($candidate->resume);
        }
        $candidate->delete();
        return redirect('/');
    }
}
