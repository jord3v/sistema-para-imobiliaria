<?php

namespace App\Http\Controllers;

use App\Models\{
    Property,
    Purpose,
    Type
};

use Illuminate\Http\Request;

class PropertyController extends Controller
{
     /**
     * Property Implementation.
     * 
     * @var Property
     */
    private $property, $purpose, $type;

    /**
     * Constructor of the controller.
     * 
     * @param \App\Services\Property $property
     * @return void
     */
    public function __construct(Property $property, Purpose $purpose, Type $type)
    {
        $this->property = $property;
        $this->purpose = $purpose;
        $this->type = $type;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $properties = $this->property->filter($request->all())->paginateFilter();
        $filters = $this->property::with(['type', 'purpose', 'user'])->filter($request->all())->get(); 
        
        if (count($filters) == 0)
        return view('dashboard.properties.no-results');

        foreach ($filters->unique('purpose_id')->sortBy('purpose_id') as $property){
            $purposes[] = $property->purpose;
        }
    
        foreach ($filters->unique('location.city')->sortBy('location.city') as $property){
            $cities[] = $property->location;
        }
    
        foreach ($filters->unique('location.neighborhood')->sortBy('location.neighborhood') as $property){
            $neighborhoods[] = $property->location;
        }
    
        foreach ($filters->unique('bedroom')->sortBy('bedroom') as $property){
            $bedrooms[] = $property->bedroom;
        }
    
        foreach ($filters->unique('bathroom')->sortBy('bathroom') as $property){
            $bathrooms[] = $property->bathroom;
        }
        
        return view('dashboard.properties.index', compact('properties', 'purposes', 'cities', 'neighborhoods', 'bedrooms', 'bathrooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.properties.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $property = auth()->user()->properties()->create($request->all());   
        $property->location()->create($request->all());
        return redirect('dashboard/properties/'.$property->id.'/edit#list-details');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $property = $this->property->with('location')->findOrFail($id);
        return view('dashboard.properties.edit', compact('property'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $property = $this->property->findOrFail($id);
        $property->update($request->all());
        $property->location->update($request->all());
        return redirect()->back()->with('toast_success', 'Atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $property = $this->property->find($id);
        $property->delete();
        return redirect()->route('properties.index')->with('toast_success', 'Imóvel excluido.');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function categories()
    {
        $types = $this->purpose->with('types')->get();
        return response()->json(['types' => $types]);
    }

}
