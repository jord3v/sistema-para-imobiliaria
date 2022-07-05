<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Customer;
use App\Models\Property;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    private $contract, $customer, $property, $carbon;

    public function __construct(Contract $contract, Customer $customer, Property $property, Carbon $carbon)
    {
        $this->contract = $contract;    
        $this->customer = $customer;    
        $this->property = $property;
        $this->carbon = $carbon;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contracts = $this->contract->with('customers')->paginate(10);
        return view('dashboard.contracts.index', compact('contracts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = $this->customer->get();
        $properties = $this->property->get();
        return view('dashboard.contracts.create', compact('customers', 'properties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contract = auth()->user()->contracts()->create($request->all());   
        foreach ($request->payments as $key => $value) {
            $contract->payments()->create([
                'description'   => 'aluguel',
                'price'         => $request->rental_price,
                'due_date'      => $value['date'],
                'payment_date'  => null,
                'flow'          => 'inflow'
            ]);

            if($request->condominium_price){
                $contract->payments()->create([
                    'description'   => 'condomínio',
                    'price'         => $request->condominium_price,
                    'due_date'      => $value['date'],
                    'payment_date'  => null,
                    'flow'          => 'inflow'
                ]);
            }

            $contract->payments()->create([
                'description'   => 'repasse',
                'price'         => $value['transfer'],
                'due_date'      => $value['date'],
                'payment_date'  => null,
                'flow'          => 'outflow'
            ]);
        }
        foreach ($request->customers as $key => $customer) {
            foreach ($customer as $value) {
                $contract->customers()->attach([$value], ['link' => $key]);
            }
        }
        return redirect()->route('contracts.index')->with('toast_success', 'Contrato criado com sucesso');
    }

    /**
     * Store a newly preview resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function preview(Request $request)
    {
        
        $start = $this->carbon->parse($request->start_period);
        $date  = $this->carbon->createFromDate($start->year, $start->month, $request->payment);


        for ($i=1; $i <= $request->period ; $i++) { 
            
            $dateList[] = [
                'id'    => $i,
                'date'  => $i == 1 ? $date->format('Y-m-d') : $date->addMonth()->format('Y-m-d'),
                'receipt' => $receipt =  $request->rental_price +  $request->condominium_price,
                'transfer' => $receipt - (($request->administration_fee) / 100) * $receipt,
            ];
        }
        return response()->json([
            'dates' => $dateList
        ]);
        //return $request->all();
    }


    public function formatPrice($input)
    {
        $input = str_replace(".", "", $input);
        $input = str_replace(",", ".", $input);
        return $input;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $contract)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $contract)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contract $contract)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contract $contract)
    {
        //
    }
}
