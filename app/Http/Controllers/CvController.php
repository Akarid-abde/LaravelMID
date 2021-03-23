<?php

namespace App\Http\Controllers;

use App\Cv;
use Illuminate\Http\Request;
use App\Http\Requests\cvRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Auth;

class CvController extends Controller
{

    public function __construct(){
     $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       if(Auth::user()->is_admin){
            $list = Cv::all();
       }else{
        $list = Auth::user()->cvs;
       }   
       /* $list = Cv::all();*/ //afficher tous les cvs

      /* $list = Cv::where('user_id',Auth::user()->id)->get();*/ //replace par Relationships  
        return view('cv.index',['cvs' => $list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cv.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CvRequest $request)
    {
          $cv = new Cv();
          $cv->titre = $request->input('titre');
          $cv->presentation = $request->input('presentation');
          $cv->user_id = Auth::user()->id;

        if($request->hasFile('photo'))
        {
        $cv->photo = $request->photo->store('public');
       /* $path = $request->file('avatar')->store('avatars');*/
        }

          $cv->save();
          session()->flash('success','le cv est bien enregistrer !!');

          return redirect('cvs');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cv  $cv
     * @return \Illuminate\Http\Response
     */
    public function show(Cv $cv)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cv  $cv
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cv = Cv::find($id);

        // Policy
        $this->authorize('update', $cv);

        return view('cv.edite',['cv' => $cv]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cv  $cv
     * @return \Illuminate\Http\Response
     */
    public function update(CvRequest $request,$id)
    {
          $cv = Cv::find($id);
          $cv->titre = $request->input('titre');
          $cv->presentation = $request->input('presentation');
          $cv->save();
        session()->flash('update','la modification est bien fait ');
          return redirect('cvs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cv  $cv
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cv = Cv::find($id);
     /*    unlink(public_path('storage\'.$cv->photo));*/
        Storage::delete($cv->photo);
        $cv->delete();
        session()->flash('delete','la supprission est bien fait ');
        return redirect('cvs');
    }
}
