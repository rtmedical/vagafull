<?php

namespace App\Http\Controllers;

use App\Models\Spreadsheet;
use App\Models\IndiceTPR2010;
use App\Models\IndiceR50;
use Illuminate\Http\Request;
use App\Http\Requests\DataValidationFormRequest;

class SpreadsheetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spreadsheets = Spreadsheet::all();
        return view('spreadsheets.index',compact('spreadsheets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mode = 'create';
        $mvs = IndiceTPR2010::getMVs();
        $mevs = IndiceR50::getMeVs();
        return view('spreadsheets.create', compact('mode', 'mvs', 'mevs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DataValidationFormRequest $request, Spreadsheet $spreadsheet)
    {
        $result = $spreadsheet->saveData($request->all());
        if ($result['success'])
            return redirect()->route('spreadsheets.show', [$result['data']]);
        else
        {
            return back()
                ->withErrors([$result['message']]);    
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Spreadsheet  $spreadsheet
     * @return \Illuminate\Http\Response
     */
    public function show(Spreadsheet $spreadsheet)
    {
        $mode = 'show';
        $mvs = IndiceTPR2010::getMVs();
        $mevs = IndiceR50::getMeVs();
        return view('spreadsheets.show', compact('mode', 'mvs', 'mevs', 'spreadsheet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Spreadsheet  $spreadsheet
     * @return \Illuminate\Http\Response
     */
    public function edit(Spreadsheet $spreadsheet)
    {
        $mode = 'edit';
        $mvs = IndiceTPR2010::getMVs();
        $mevs = IndiceR50::getMeVs();
        return view('spreadsheets.edit', compact('mode', 'mvs', 'mevs', 'spreadsheet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Spreadsheet  $spreadsheet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Spreadsheet $spreadsheet)
    {
        $result = $spreadsheet->updateData($request->all(), $spreadsheet);
        if ($result['success'])
        {
            return redirect()
                ->route('spreadsheets.show', [$result['data']])
                ->with('message', 'Successfully modified the spreadsheet!');
        }
        else
        {
            return back()
                ->withErrors([$result['message']]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Spreadsheet  $spreadsheet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Spreadsheet $spreadsheet)
    {
        //
    }
}
