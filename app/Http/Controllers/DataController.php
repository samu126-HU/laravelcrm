<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function edit(Request $request, $table, $id, $view)
    {
        // Fetch the record from the specified table
        $record = DB::table($table)->where('id', $id)->first();

        if (!$record) {
            return redirect()->back()->with('error', 'Record not found.');
        }

        // Render a view for editing the record
        return view('components.data', [
            'table' => $table,
            'record' => $record,
            'view' => $view,
        ]);
    }

    public function update(Request $request, $table, $id, $view)
    {
        // Fetch the record from the specified table
        $record = DB::table($table)->where('id', $id)->first();

        if (!$record) {
            return redirect()->back()->with('error', 'Record not found.');
        }

        // Exclude non-editable fields
        $data = $request->except(['_token', '_method', 'id', 'created_at', 'updated_at']);

        // Update the record
        DB::table($table)->where('id', $id)->update($data);

        return redirect()->route($view)->with('success', 'Record updated successfully.');
    }

    public function delete(Request $request, $table, $id)
    {
        // Delete the record from the specified table
        $deleted = DB::table($table)->where('id', $id)->delete();

        if ($deleted) {
            return redirect()->back()->with('success', 'Record deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to delete record.');
        }
    }
}
