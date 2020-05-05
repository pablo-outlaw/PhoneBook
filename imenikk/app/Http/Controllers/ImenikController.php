<?php

namespace App\Http\Controllers;

use App\Kontakt;
use Illuminate\Http\Request;
use DB;
use App\User;
use Auth;
use Validator;


class ImenikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::id();
        $kontakti = DB::table('kontakt')->orderBy('ime')->paginate(50);

        return view('index', compact('user'))->with('kontakti', $kontakti);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



        $attributes = request()->validate([
            'user_id' => ['required'],

            'ime'     => ['required', 'min:3'],
            'prezime' => ['required', 'min:3'],
            'broj'    => ['required', 'min:3'],
        ]);

        $file = $request->avatar;


        $imagedata = file_get_contents($file->getRealPath());
        $extension = $file->getClientOriginalExtension();

        $name = hash('md5', $file);
        $attributes['avatar'] = "$name" . "$extension";
        $path = public_path('/slike');
        $file->move($path, $name . $extension);

        // = 
        Kontakt::create($attributes);

        return redirect('/imenikk');
    }

    /**
     * Display the specified resource.
     *  
     * @param  \App\Kontakt  $kontakt
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Kontakt $imenikk)
    {


        return view('show', compact('imenikk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kontakt  $kontakt
     * @return \Illuminate\Http\Response
     */
    public function edit(Kontakt $imenikk)
    {
        return view('edit', compact('imenikk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kontakt  $kontakt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kontakt $imenikk)
    {

        $file = $request->avatar;

        $imagedata = file_get_contents($file->getRealPath());;
        $base64 = base64_encode($imagedata);
        $imenikk['avatar'] = $base64;
        $imenikk->update(request(['ime', 'prezime', 'broj']));





        return redirect('/imenikk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kontakt  $kontakt
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kontakt $imenikk)
    {
        $imenikk->delete();

        return redirect('/imenikk');
    }

    public function search(Request $request)
    {
        $user = Auth::id();
        $search = $request->get('search');
        $kontakti = DB::table('kontakt')->where('ime', 'like', '%' . $search . '%')->orWhere('prezime', 'LIKE', '%' . $search . '%')->paginate(5);
        return view('index', compact('user'))->with('kontakti', $kontakti);
    }
}
