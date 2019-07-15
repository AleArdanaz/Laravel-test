<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserSubscription;

class UserSubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \Response::json(['status' => 'ok', 'data' => UserSubscription::all()], 200);
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
        $rules = [
            'nro_cliente' => 'required',
            'servicio_id' => 'required'

            ];
    
            try {
                // Ejecutamos el validador y en caso de que falle devolvemos la respuesta
                // con los errores
                $validator = \Validator::make($request->all(), $rules);
    
                if ($validator->fails()) {
                    return \Response::json(['code' => 400, 'status' => 'error', 'message' => 'Missing necessary data'], 400);
                }
    
                $user = new UserSubscription;
                $user->status = 'active';
                $user->fecha = date('Y-m-d');
                $user->nro_cliente = $request->nro_cliente;
                $user->servicio_id = $request->servicio_id;
                $user->save();
    
                return \Response::json(['code' => 200, 'status' => 'ok', 'message' => 'Subscription created OK'], 200);
            } catch (\Exception $e) {
                // Si algo sale mal devolvemos un error.
                return \Response::json(['code' => 500, 'status' => 'error', 'message' => $e], 500);
            }
    }


    public function cancel($id){


        $subscription = UserSubscription::find($id);

        if (!$subscription) {
            // Se devuelve un array errors con los errores encontrados y cabecera HTTP 404.
            return \Response::json(['errors' => [['code' => 404, 'message' => 'Subscription does not exist']]], 404);
        }

        $subscription->status = 'cancel';
        $subscription->save();


        return \Response::json(['code' => 200, 'status' => 'ok', 'message' => 'Subscription canceled OK'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
