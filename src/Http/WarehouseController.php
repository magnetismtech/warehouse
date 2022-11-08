<?php

namespace Magnetism\Warehouse\Http;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Magnetism\Warehouse\Models\Warehouse;

class WarehouseController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = [ 'warehouses' => Warehouse::latest()->get() ];

            return response()->json([
                'success' => true,
                'message' => 'Warehouses retrieved Successfully.',
                'data' =>  $data
            ], 200);
        }
        catch (\Exception $e)
        {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $warehouse = Warehouse::create($request->all());
            $data = [ 'warehouse' => $warehouse ];

            return response()->json([
                'success' => true,
                'message' => 'Warehouse updated Successfully.',
                'data' =>  $data
            ], 200);

        }
        catch (\Exception $e)
        {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $data = [ 'warehouse' => Warehouse::find($id) ];

            return response()->json([
                'success' => true,
                'message' => 'Warehouse retrieved Successfully.',
                'data' =>  $data
            ], 200);
                        
        } catch (\Exception $e){
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $warehouse = Warehouse::find($id);
            $warehouse->update($request->all());
            $data = [ 'warehouses' => $warehouse ];            

            return response()->json([
                'success' => true,
                'message' => 'Warehouses updated Successfully.',
                'data' =>  $data
            ], 200);

        }
        catch (\Exception $e)
        {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Warehouse::find($id)->delete();

            return response()->json([
                'success' => true,
                'message' => 'Warehouses deleted Successfully.',
                'data' =>  null
            ], 200);
        }catch (\Exception $e){
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
