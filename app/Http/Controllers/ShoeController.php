<?php

namespace App\Http\Controllers;

use App\Models\Shoe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ShoeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  public function index(Request $request)
    {
        $shoes = Shoe::paginate(10);
         if($request->has('term')){
            $term = $request->get('term');
            $shoes = Shoe::where('marca', 'LIKE', "%$term%")
            ->orWhere('modello', 'LIKE', "%$term%")
            ->orWhere('colore', 'LIKE', "%$term%")
            ->orWhere('taglia', 'LIKE', "%$term%")

            ->paginate(10)->withQueryString();
            
        } else {
            $shoes = Shoe::paginate(10);
        }
        return view('shoes.index', compact('shoes'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shoe = new Shoe;
        return view('shoes.create', compact('shoe'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validation($request->all());
        
        $shoe = new Shoe;

        $shoe->fill($data);
        $shoe->save();
        return redirect()->route('shoes.show', $shoe);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shoe  $shoe
     * @return \Illuminate\Http\Response
     */
    public function show(Shoe $shoe)
    {
        return view('shoes.show', compact('shoe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shoe  $shoe
     * @return \Illuminate\Http\Response
     */
    public function edit(Shoe $shoe)
    {
         return view('shoes.edit', compact('shoe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shoe  $shoe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shoe $shoe)
    {
        $data = $this->validation($request->all());
        $shoe->update($data);
        return redirect()->route('shoes.show', $shoe);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shoe  $shoe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shoe $shoe)
    {
        $shoe->delete();
        return redirect()->route('shoes.index'); 
    }

    private function validation($data) 
    {
        $validator = Validator::make(
            $data,
            [
            'marca' => 'required|string|max:50',
            'modello' => 'required|string',
            'image' => 'nullable|string',
            'colore' => 'required|string',
            'taglia' => 'nullable|decimal:2',
            'prezzo' => 'required|decimal:2',  
        ],
        [
            'marca.required' => 'la marca è obbligatoria',
            'marca.string' => 'la marca deve essere una stringa',
            'marca.max' => 'la marca deve avere al massimo 50 catteri',

            'modello.required' => 'il modello è obbligatorio',
            'modello.string' => 'il modello deve essere una stringa',

            'image.string' => 'l\' immagine deve essere una stringa',

            'colore.required' => 'il colore è obbligatorio',
            'colore.string' => 'il colore deve essere una stringa',

            'taglia.decimal' => 'la taglia deve essere un numero con 2 decimali dopo la virgola',

            'prezzo.required' => 'il prezzo è obbligatorio',
            'prezzo.decimal' => 'il prezzo deve essere un numero con 2 decimali dopo la virgola',


        ])->validate();

        return $validator;
    }   
}