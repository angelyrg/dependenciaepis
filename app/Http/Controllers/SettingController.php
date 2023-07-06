<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::latest()->first();
        $responsable = User::where('rol', 'Responsable')->latest()->first();

        return view('responsable.settings.index', compact('setting', 'responsable'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("responsable.settings.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "year_settings" => "required",
            "nombre_director" => "required"
        ]);

        $setting = new Setting();
        $setting->year = $request->year_settings;
        $setting->nombre_director = $request->nombre_director;
        $setting->save();
        return redirect()->route('settings.index')->with('success', 'Configuración creada.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        $responsable = User::where('rol', 'Responsable')->latest()->first();
        return view('responsable.settings.edit',  compact('setting', 'responsable'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        $request->validate([
            "year_settings" => "required",
            "nombre_director" => "required",
            "responsable_id" => "required",
            "nombre_responsable" => "required"
        ]);
        
        
        $setting->year = $request->year_settings;
        $setting->nombre_director = $request->nombre_director;
        $setting->save();

        $responsable = User::findOrFail($request->responsable_id);
        $responsable->name = $request->nombre_responsable;
        $responsable->save();

        return redirect()->route('settings.index')->with('success', 'Configuración actualizada.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
