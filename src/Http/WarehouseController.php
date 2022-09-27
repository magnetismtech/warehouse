<?php

namespace Magnetism\Warehouse\Http;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Magnetism\Warehouse\Models\Warehouse;
use Illuminate\Http\JsonResponse;

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
            $warehouses = Warehouse::latest()->get();
            return response()->json([
                'value' => $warehouses,
                'message' => 'Warehouses retrieved Successfully.'
            ], 200);
        }
        catch (\Exception $e)
        {
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
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
            return response()->json([
                'value' => $warehouse,
                'message' => 'Warehouse added Successfully.'
            ], 201);
        }
        catch (\Exception $e)
        {
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $warehouse = Warehouse::find($id);
            return response()->json([
                'value' => $warehouse,
                'message' => 'Warehouse retrieved successfully.'
            ], 200);
        } catch (\Exception $e)
        {
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
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
            return response()->json([
                'value' => $warehouse,
                'message' => 'Warehouse updated Successfully.'
            ], 201);
        }
        catch (\Exception $e)
        {
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
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
            $warehouse = Warehouse::find($id)->delete();
            return response()->json([
                'value' => '',
                'message' => 'Warehouse deleted Successfully.'
            ], 204);
        }
        catch (\Exception $e)
        {
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
        }
    }
}
