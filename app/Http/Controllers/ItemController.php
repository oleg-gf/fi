<?php

namespace App\Http\Controllers;

use App\Models\Violet;
use App\Models\Image;
use App\Models\Selectioner;
use App\Http\Requests\StoreitemRequest;
use App\Http\Requests\UpdateitemRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    protected $table = 'violets';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Violet::all();

        return view('items.index', ['items' => $items]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = $request->only([
            "name", "price",  "selectioner_id"
            ]);
        $item['name'] = Str::of($item['name'])->trim()->ucfirst();

        $image = $request->file('image');
        $path = $image->store('photos', 'public');
        $imageUrl = Storage::url($path);



        $violet = Violet::firstOrCreate(
        ['name' => $item['name']], 
        $item
        );
        $image = Image::firstOrCreate(
        ['url' => $imageUrl], 
        ['violet_id' => $violet->id]
        );
        

        return $violet;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(item $item)
    {
        
        $violet = Violet::find($item->id);
        return view('items.show', ['item' => $violet]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(item $item)
    {
        //
    }


    
    public function fialform(Request $request)
    {
        $item = [];
        $selectioners = Selectioner::all();
        
    
        if($request->has('name')){
            $violet = $this->store($request);
            $selectioner = $selectioners->find($violet->selectioner_id);
            $images = Image::all()->where('violet_id', $violet->id);
           
            return view('items.fialform', [
                'item' => $violet,
                'selectioners' => $selectioners,
                'selectioner' => $selectioner,
                'images' => $images
            ]);
        }
        return view('items.fialform', [
            'item' => $item, 
            'selectioners' => $selectioners
        ]);
    }
    public function selform(Request $request)
    {
        $item = '';
        if($request->has('name')){
            $item = $request->all();
            $selectioner = new Selectioner;
            $selectioner->name = $item['name'];
            $selectioner->surname = $item['surname'];
            $selectioner->abbreviation = $item['abbreviation'];


            $selectioner->save();
            return view('items.selform', [
            'item' => $selectioner
        ]);
        }
        return view('items.selform', [
            'item' => $item
        ]);
    }    
}
