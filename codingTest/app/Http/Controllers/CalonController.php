<?php

namespace App\Http\Controllers;

use App\Models\Calon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;

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
     *     description="Dashboard View",
     *     tags={"Candidate"},
     *     @OA\Response(response="default", description="Welcome page")
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
        }
        else {
            # code...
            $level  = 'user';
        }
        return view('dashboard',[
            'dataCalon' => Calon::all(),
            'level'    => $level
        ]);

        // $post   = Calon::all();

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * @OA\Get(
     *      path="/candidate/{candidate_id}",
     *      operationId="getCandidate",
     *      tags={"Candidate"},
     *      summary="Get Candidate",
     *      description="Get Candidate",
     *      @OA\Parameter(
     *      name="candidate_id",
     *      in="path",
     *      required=true,
     *      description= "candidate id",
     *      example="10",
     *      @OA\Schema(
     *           type="integer"
     *      )
     *      ),
     *       @OA\Response(
     *      response=200,
     *      description="Success response",
     *      @OA\JsonContent(
     *      @OA\Property(property="status", type="number", example="200"),
     *      @OA\Property(property="candidate", type="string", example="{'name':'Chetan','education':'UGM','created_at':'2022-05-27T07:16:57.000000Z','updated_at':'2022-05-27T07:16:57.000000Z'}"),
     *        )
     *     ),
     *        @OA\Response(
     *      response=400,
     *      description="Bad Request",
     *      @OA\JsonContent(
     *      @OA\Property(property="status", type="number", example="400"),
     *      @OA\Property(property="message", type="string", example="Error in processing request")
     *        )
     *     )
     * )
     *      
     * )
     */
    
    public function show($candidate_id)
    {
        //
        try {
	    	$calon = Calon::where('id', $candidate_id)->get();

	    	if($calon){
	    		return view('showCandidate',[
                    'candidate' => $calon
                ]);
                // return response()->json(['status' => 200, 'candidate' => $calon], 200);

	    	}
    	}catch (\Exception $e) {
            return response()->json(['status' => 400, 'message' => 'Error in processing request'], 400);
        }
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
        return view('update',[
            'candidate' => Calon::where('id',$calon)->get()
        ]) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Calon  $calon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Calon $calon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Calon  $calon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Calon $calon)
    {
        //
    }
}
