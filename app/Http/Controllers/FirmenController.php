<?php

namespace App\Http\Controllers;

use App\Models\Firma;
use App\Models\Mitarbeiter;
use App\Models\User;
use Illuminate\Http\Request;

class FirmenController extends Controller
{
    /**
     * Gib alle Firmen aus
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Firma::all();
    }

    /**
     * Speichere eine neue Firma
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $firma = Firma::create($request->firma);
        return response()->json($firma);
    }

    /**
     * Update die angegebene Firma
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Firma  $firma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $firma = Firma::findOrFail($id);
        $firma->update($request->firma);
        return response()->json($firma);
    }

    /**
     * Lösche die Firma
     *
     * @param  \App\Models\Firma  $firma
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Firma::find($id)->delete();
        return response()->json(null, 204);
    }
    /**
     * Gebe alle Mitarbeiter der angebeben Firma aus
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getWorkers($id)
    {
        $firma = Firma::find($id);
        $mitarbeiter = $firma->workers;
        return response()->json($mitarbeiter);
    }
}
