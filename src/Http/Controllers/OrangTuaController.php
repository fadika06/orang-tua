<?php

namespace Bantenprov\OrangTua\Http\Controllers;

/* Require */
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Bantenprov\OrangTua\Facades\OrangTuaFacade;

/* Models */
use Bantenprov\OrangTua\Models\Bantenprov\OrangTua\OrangTua;

/* Etc */
use Validator;

/**
 * The OrangTuaController class.
 *
 * @package Bantenprov\OrangTua
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class OrangTuaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(OrangTua $orang_tua)
    {
        $this->orang_tua = $orang_tua;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('sort')) {
            list($sortCol, $sortDir) = explode('|', $request->sort);

            $query = $this->orang_tua->orderBy($sortCol, $sortDir);
        } else {
            $query = $this->orang_tua->orderBy('id', 'asc');
        }

        if ($request->exists('filter')) {
            $query->where(function($q) use($request) {
                $value = "%{$request->filter}%";
                $q->where('label', 'like', $value)
                    ->orWhere('description', 'like', $value);
            });
        }

        $perPage = $request->has('per_page') ? (int) $request->per_page : null;
        $response = $query->paginate($perPage);

        return response()->json($response)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orang_tua              = $this->orang_tua;
        $orang_tua->id          = null;
        $orang_tua->label       = null;
        $orang_tua->description = null;

        $response['orang_tua'] = $orang_tua;
        $response['loaded'] = true;

        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OrangTua  $orang_tua
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $orang_tua = $this->orang_tua;

        $validator = Validator::make($request->all(), [
            'label'         => 'required|max:16|unique:orang_tuas,label,NULL,id,deleted_at,NULL',
            'description'   => 'required|max:255',
        ]);

        if($validator->fails()){
            $response['error']  = true;
            $response['message'] = $validator->errors()->first();
        } else {
            $orang_tua->label       = $request->label;
            $orang_tua->description = $request->description;
            $orang_tua->save();

            $response['error'] = false;
            $response['message'] = 'Success';
        }

        $response['loaded'] = true;

        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orang_tua = $this->orang_tua->findOrFail($id);

        $response['orang_tua'] = $orang_tua;
        $response['loaded'] = true;

        return response()->json($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OrangTua  $orang_tua
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orang_tua = $this->orang_tua->findOrFail($id);

        $response['orang_tua'] = $orang_tua;
        $response['loaded'] = true;

        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrangTua  $orang_tua
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $orang_tua = $this->orang_tua->findOrFail($id);

        $validator = Validator::make($request->all(), [
            'label'         => 'required|max:16|unique:orang_tuas,label,'.$id.',id,deleted_at,NULL',
            'description'   => 'required|max:255',
        ]);

        if($validator->fails()){
            $response['error']  = true;
            $response['message'] = $validator->errors()->first();
        } else {
            $orang_tua->label       = $request->label;
            $orang_tua->description = $request->description;
            $orang_tua->save();

            $response['error'] = false;
            $response['message'] = 'Success';
        }

        $response['loaded'] = true;

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrangTua  $orang_tua
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $orang_tua = $this->orang_tua->findOrFail($id);

        if ($orang_tua->delete()) {
            $response['loaded'] = true;
        } else {
            $response['loaded'] = false;
        }

        return json_encode($response);
    }
}
