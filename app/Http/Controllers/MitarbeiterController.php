<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use App\Models\Mitarbeiter;
use App\Models\Firma;

class MitarbeiterController extends Controller
{
    /**
     * Gebe alle Mitarbeiter aus!
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json(Mitarbeiter::all());
    }

    /**
     * Store neuen Mitarbeiter nach Validierung der Parameter
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            "firmen_id" => "required",
            "vorname" => "required",
            "nachname" => "required",
            "email" => "email",
        ]);

        // $mitarbeiter = $request->mitarbeiter;
        $mitarbeiter = Mitarbeiter::create($validateData);
        return response()->json($validateData);
        //return response()-> json($validate);
        //return back()->with('success', 'Mitarbeiter created successfully.');
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
     * Loesche den angebebenen Mitarbeiter
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mitarbeiter::destroy($id);
        return \response([]);
    }
    /**
     * Gib die Firma des Mitarbeiters aus
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getFirma($id)
    {
        return \response()->json(Mitarbeiter::find($id)->firma);
    }
}
