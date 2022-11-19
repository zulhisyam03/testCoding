<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Calon;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Storage;


class CalonController extends Controller
{
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
     *     path="/api/candidate",
     *     summary="All",
     *      description="All",
     *     tags={"Candidate"},
     *     @OA\Response(response="default", description="All Data")
     * )
     */
    public function index()
    {
        $post   =   Calon::all();
        return new PostResource(true, 'List Calon Kandidat', $post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /** 
     * @OA\POST(
     *     path="/api/candidate",
     *     summary="Add",
     *      description="Add",
     *     tags={"Candidate"},
     *       @OA\Parameter(
     *      name="name",
     *      in="query",
     *      required=true,
     *      description= "Full Name",
     *      example="Julle",
     *      @OA\Schema(
     *              format="date",
     *           type="string"
     *      )
     *      ),
     *       @OA\Parameter(
     *      name="education",
     *      in="query",
     *      required=true,
     *      description= "Education",
     *      example="AMIKOM",
     *      @OA\Schema(
     *           type="string"
     *      )
     *      ),
     *       @OA\Parameter(
     *      name="birthday",
     *      in="query",
     *      required=true,
     *      description= "Birthday",
     *      example="1995-05-03",
     *      @OA\Schema(
     *           type="string"
     *      )
     *      ),
     *       @OA\Parameter(
     *      name="experience",
     *      in="query",
     *      required=true,
     *      description= "Experience",
     *      example="6",
     *      @OA\Schema(
     *           type="string"
     *      )
     *      ),
     *       @OA\Parameter(
     *      name="lastPosition",
     *      in="query",
     *      required=true,
     *      description= "Last Position",
     *      example="Freelance",
     *      @OA\Schema(
     *           type="string"
     *      )
     *      ),
     *       @OA\Parameter(
     *      name="appliedPosition",
     *      in="query",
     *      required=true,
     *      description= "Applied Position",
     *      example="PHP Fullstack",
     *      @OA\Schema(
     *           type="string"
     *      )
     *      ),
     *       @OA\Parameter(
     *      name="top5",
     *      in="query",
     *      required=true,
     *      description= "Top 5 Skill",
     *      example="PHP,Laravel",
     *      @OA\Schema(
     *           type="string"
     *      )
     *      ),
     *       @OA\Parameter(
     *      name="email",
     *      in="query",
     *      required=true,
     *      description= "Email",
     *      example="zul0342@gmail.com",
     *      @OA\Schema(
     *           type="string"
     *      )
     *      ),
     *       @OA\Parameter(
     *      name="phone",
     *      in="query",
     *      required=true,
     *      description= "Phone Number",
     *      example="082292299152",
     *      @OA\Schema(
     *           type="string"
     *      )
     *      ),
     *      @OA\RequestBody(
     *         required=true,     
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(                 
     *                 @OA\Property(
     *                     description="file to upload",
     *                     property="resume",
     *                     type="file",
     *                     format="binary",
     *                 ),     
     *                 required={"resume"}
     *             )
     *         )
     *     ),
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

        // $input['resume']    =   "uploaded-resume/".$input['phone']."-".$input['name'].".".$input['resume']->getClientOriginalExtention();
        $candidate   =   Calon::create($input);
        return new PostResource(true, 'Add Kandidat', $candidate);
    }

    /** 
     * @OA\Get(
     *     path="/api/candidate/{id}",
     *     summary="Show",
     *      description="Show",
     *     tags={"Candidate"},
     *       @OA\Parameter(
     *      name="id",
     *      in="path",
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
        $candidate  = Calon::where('id', $id)->get();
        return new PostResource(true, 'Show Kandidat', $candidate);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /** 
     * @OA\Delete(
     *     path="/api/candidate/{id}",
     *     summary="Delete",
     *      description="Delete",
     *     tags={"Candidate"},
     *       @OA\Parameter(
     *      name="id",
     *      in="path",
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
    public function destroy($id)
    {
        $candidate = Calon::find($id);
        $candidate->delete();

        return new PostResource(true, 'Delete Kandidat', $candidate);
    }
}
