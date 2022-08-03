<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Selectioner;
use App\Models\Violet;
use App\Http\Requests\StoreSelectionerRequest;
use App\Http\Requests\UpdateSelectionerRequest;
use Illuminate\Http\Request;

class SelectionerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.selectioners.index', [
            'violets' => Violet::all(),
            'selectioners' => Selectioner::paginate(10),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.selectioners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Requests\StoreSelectionerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSelectionerRequest $request)
    {
        $selectioner = Selectioner::create($request->validated());
        return view('admin.selectioners.index', [
            'violets' => Violet::all(),
            'selectioners' => Selectioner::paginate(10),

        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Selectioner  $selectioner
     * @return \Illuminate\Http\Response
     */
    public function show(Selectioner $selectioner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Selectioner  $selectioner
     * @return \Illuminate\Http\Response
     */
    public function edit(Selectioner $selectioner)
    {
        return view('admin.selectioners.edit', ['selectioner' => $selectioner]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Requests\UpdateSelectionerRequest  $request
     * @param  \App\Models\Selectioner  $selectioner
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSelectionerRequest $request, Selectioner $selectioner)
    {
        $selectioner->fill($request->validated());

        if($selectioner->save())
        {
            return redirect()->route('admin.selectioners.index')
                   ->with("success", "Запись обновлена");
        }
        return back()->with("error", "Не удалось обновить запись");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Selectioner  $selectioner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Selectioner $selectioner)
    {
        //
    }
}
