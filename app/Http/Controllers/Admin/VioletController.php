<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Violet;
use App\Models\Image;
use App\Http\Requests\StoreVioletRequest;
use App\Http\Requests\UpdateVioletRequest;
use App\Models\Selectioner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class VioletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.violets.index', [
            'violets' => Violet::paginate(10),
            'selectioners' => Selectioner::all(),
            'images' => Image::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.violets.create', [
            'selectioners' => Selectioner::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = $request->only([
            "id", "name", "price",  "selectioner_id"
            ]);
        $item['name'] = Str::of($item['name'])->trim()->ucfirst();

        $violet = Violet::firstOrCreate(
                ['name' => $item['name']], 
                $item
        );

        
        $images = $request->file('images');
        foreach ($images as $image) {
            $path = $image->store('photos', 'public');
            $imageUrl = Storage::url($path);
            Image::firstOrCreate(
                    ['url' => $imageUrl], 
                    ['violet_id' => $violet->id]
            );            
        }
        
        if ($violet) {
            return redirect()->route('admin.violets.index')
            ->with('success', 'Фиалка добавлена');
        }

        return back()->with('error', 'Не удалось добавить фиалку');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Violet  $violet
     * @return \Illuminate\Http\Response
     */
    public function show(Violet $violet)
    {
        if($violet){
            return view('admin.violets.show', ['violet' => $violet,
                                    'images' => Image::all()->where('violet_id', $violet->id),
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
        return view('admin.violets.edit', [
            'violet' => $violet,
            'selectioners' => Selectioner::all(),
            'images' => $violet->image->all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests  $request
     * @param  \App\Models\Violet  $violet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Violet $violet)
    {
        $violet->fill($request->only([
            "name", "price",  "selectioner_id", "description"
            ])
        );
        
        $image = $request->file('image');
        if($image){
            $path = $image->store('photos', 'public');
            $imageUrl = Storage::url($path);
            $violet->image->first()->update(['url' => $imageUrl]);
        }
        

        if($violet->save()){
            return redirect()->route('admin.violets.index')
                   ->with("success", "Запись обновлена"); 
        }
        return back()->with("error", "Не удалось обновить запись");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Violet  $violet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Violet $violet)
    {
        
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
