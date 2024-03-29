<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Violet;
use App\Models\Image;
use App\Models\Selectioner;
use App\Http\Requests\StoreVioletRequest;
use App\Http\Requests\UpdateVioletRequest;
use App\Http\Requests\IndexVioletRequest;


class VioletController extends Controller
{
    protected $violets;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(IndexVioletRequest $request)
    {

        //dd($request->selectioner_id);

        $violets = Violet::filter($request->all())->paginate(10);
        return view('violet.index', [
            'violets' => $violets,
            'selectioners' => Selectioner::all(),
            'get_selectioner_id' => $request->selectioner_id,
        ]);
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
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVioletRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVioletRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Violet  $violet
     * @return \Illuminate\Http\Response
     */
    public function show(Violet $violet, $id)
    {
        $violet = $violet->findOrFail($id);
        if($violet){
            return view('violet.show', ['violet' => $violet,
                                    'images' => Image::where('violet_id', $violet->id),
                                    'selectioner' => Selectioner::find($violet->selectioner_id)
                                    ]);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Violet  $violet
     * @return \Illuminate\Http\Response
     */
    public function edit(Violet $violet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVioletRequest  $request
     * @param  \App\Models\Violet  $violet
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVioletRequest $request, Violet $violet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Violet  $violet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Violet $violet)
    {
        //
    }
}
