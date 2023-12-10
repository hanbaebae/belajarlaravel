<?php

namespace App\Http\Controllers;

use App\Models\MPendidikanTerakhirModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MPendidikanTerakhirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $mpendidikanterakhir = MPendidikanTerakhirModel::query();
        if ($request->has('name')) {
            $mpendidikanterakhir->where('name', 'ilike', "%$request->name%");
        }

        $mpendidikanterakhir = $mpendidikanterakhir->orderBy('id', 'ASC')->paginate();
        return response()->json($mpendidikanterakhir);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required",
            "long_name" => "required",
        ]);
        if ($validator->fails()) return response()->json([
            'message' => $validator->errors()->first(),
            'code' => 400,
        ]);
        $data = [
            "name" => $request->name,
            "long_name" => $request->long_name,
        ];
        $mpendidikanterakhir = MPendidikanTerakhirModel::create($data);
        return response()->json([
            'message' => 'Data berhasil disimpan',
            'code' => 200,
            'data' => $mpendidikanterakhir,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mpendidikanterakhir = MPendidikanTerakhirModel::find($id);
        if (!$mpendidikanterakhir) {
            return response()->json([
                'message' => 'Data tidak ditemukan',
                'code' => 404
            ]);
        }
        return response()->json($mpendidikanterakhir);
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
        $validator = Validator::make($request->all(), [
            "name" => "required",
            "long_name" => "required",
        ]);
        if ($validator->fails()) return response()->json([
            'message' => $validator->errors()->first(),
            'code' => 400,
        ]);
        $mpendidikanterakhir = MPendidikanTerakhirModel::find($id);
        if (!$mpendidikanterakhir) {
            return response()->json([
                'message' => 'Data tidak ditemukan',
                'code' => 404
            ]);
        }
        $data = [
            "name" => $request->name,
            "long_name" => $request->long_name,
        ];
        $mpendidikanterakhir->update($data);
        return response()->json([
            'message' => 'Data berhasil diubah',
            'code' => 200,
            'data' => $mpendidikanterakhir,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mpendidikanterakhir = MPendidikanTerakhirModel::find($id);
        if (!$mpendidikanterakhir) {
            return response()->json([
                'message' => 'Data tidak ditemukan',
                'code' => 404
            ]);
        }
        $mpendidikanterakhir->delete();
        return response()->json([
            'message' => 'Data terhapus',
            'code' => 200
        ]);
    }
}
