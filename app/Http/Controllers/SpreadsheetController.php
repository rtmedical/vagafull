<?php

namespace App\Http\Controllers;

use App\Models\Spreadsheet;
use Illuminate\Http\Request;

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
        return view('spreadsheets.index',compact('spreadsheets',$spreadsheets));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Spreadsheet  $spreadsheet
     * @return \Illuminate\Http\Response
     */
    public function show(Spreadsheet $spreadsheet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Spreadsheet  $spreadsheet
     * @return \Illuminate\Http\Response
     */
    public function edit(Spreadsheet $spreadsheet)
    {
        //
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
        //
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
