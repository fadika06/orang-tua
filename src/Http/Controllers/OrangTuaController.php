<?php

namespace Bantenprov\OrangTua\Http\Controllers;

/* Require */
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Bantenprov\OrangTua\Facades\OrangTuaFacade;

/* Models */
use Bantenprov\OrangTua\Models\Bantenprov\OrangTua\OrangTua;
use App\User;

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

     protected $orang_tua;
     protected $user;

    public function __construct(OrangTua $orang_tua, User $user)
    {
        $this->orang_tua = $orang_tua;
        $this->user = $user;
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
                $q->where('nomor_un', 'like', $value)
                  ->orWhere('no_kk', 'like', $value);
            });
        }

        $perPage = request()->has('per_page') ? (int) request()->per_page : null;
        $response = $query->paginate($perPage);

        foreach($response as $user){
            array_set($response->data, 'user', $user->user->name);
        }

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
        $users = $this->user->all();

        foreach($users as $user){
            array_set($user, 'label', $user->name);
        }

        $response['user'] = $users;
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
            'user_id' => 'required',
            'nomor_un'   => 'required|max:255',
            'no_kk'   => 'required|max:255',
            'no_telp'   => 'required|max:255',
            'nama_ayah'   => 'required|max:255',
            'nama_ibu'   => 'required|max:255',
            'pendidikan_ayah'   => 'required|max:255',
            'kerja_ayah'   => 'required|max:255',
            'pendidikan_ibu'   => 'required|max:255',
            'kerja_ibu'   => 'required|max:255',
            'alamat_ortu'   => 'required|max:255',
        ]);

        if($validator->fails()){
            $check = $orang_tua->where('label',$request->label)->whereNull('deleted_at')->count();

            if ($check > 0) {
                $response['message'] = 'Failed, label ' . $request->label . ' already exists';
            } else {
            $orang_tua->user_id = $request->input('user_id');
            $orang_tua->nomor_un = $request->input('nomor_un');
            $orang_tua->no_kk = $request->input('no_kk');
            $orang_tua->no_telp = $request->input('no_telp');
            $orang_tua->nama_ayah = $request->input('nama_ayah');
            $orang_tua->nama_ibu = $request->input('nama_ibu');
            $orang_tua->pendidikan_ayah = $request->input('pendidikan_ayah');
            $orang_tua->kerja_ayah = $request->input('kerja_ayah');
            $orang_tua->pendidikan_ibu = $request->input('pendidikan_ibu');
            $orang_tua->kerja_ibu = $request->input('kerja_ibu');
            $orang_tua->alamat_ortu = $request->input('alamat_ortu');
            $orang_tua->save();

            $response['message'] = 'success';
            }

            } else {
            $orang_tua->user_id = $request->input('user_id');
            $orang_tua->nomor_un = $request->input('nomor_un');
            $orang_tua->no_kk = $request->input('no_kk');
            $orang_tua->no_telp = $request->input('no_telp');
            $orang_tua->nama_ayah = $request->input('nama_ayah');
            $orang_tua->nama_ibu = $request->input('nama_ibu');
            $orang_tua->pendidikan_ayah = $request->input('pendidikan_ayah');
            $orang_tua->kerja_ayah = $request->input('kerja_ayah');
            $orang_tua->pendidikan_ibu = $request->input('pendidikan_ibu');
            $orang_tua->kerja_ibu = $request->input('kerja_ibu');
            $orang_tua->alamat_ortu = $request->input('alamat_ortu');
            $orang_tua->save();
            $response['message'] = 'success';
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
        
        $response['user'] = $orang_tua->user;
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
            'nomor_un'   => 'required|max:255',
            'no_kk'   => 'required|max:255',
            'no_telp'   => 'required|max:255',
            'nama_ayah'   => 'required|max:255',
            'nama_ibu'   => 'required|max:255',
            'pendidikan_ayah'   => 'required|max:255',
            'kerja_ayah'   => 'required|max:255',
            'pendidikan_ibu'   => 'required|max:255',
            'kerja_ibu'   => 'required|max:255',
            'alamat_ortu'   => 'required|max:255',
        ]);

        if($validator->fails()){
            $response['error']  = true;
            $response['message'] = $validator->errors()->first();
        } else {
            $orang_tua->user_id    = $request->user_id;
            $orang_tua->nomor_un = $request->nomor_un;
            $orang_tua->no_kk = $request->no_kk;
            $orang_tua->no_telp = $request->no_telp;
            $orang_tua->nama_ayah = $request->nama_ayah;
            $orang_tua->nama_ibu = $request->nama_ibu;
            $orang_tua->pendidikan_ayah = $request->pendidikan_ayah;
            $orang_tua->kerja_ayah = $request->kerja_ayah;
            $orang_tua->pendidikan_ibu = $request->pendidikan_ibu;
            $orang_tua->kerja_ibu = $request->kerja_ibu;
            $orang_tua->alamat_ortu = $request->alamat_ortu;
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
            $response['status'] = true;
        } else {
            $response['status'] = false;
        }

        return json_encode($response);
    }
}
