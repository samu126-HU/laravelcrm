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
            return redirect()->back()->with('error', __('Record not found.'));
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
        // Check if table exists
        if (!DB::getSchemaBuilder()->hasTable($table)) {
            return redirect()->back()->with('error', __('Table does not exist.'));
        }
        // Check if record exists
        $record = DB::table($table)->where('id', $id)->first();
        if (!$record) {
            return redirect()->back()->with('error', __('Record not found.'));
        }
        // Exclude non-editable fields
        $data = $request->except(['_token', '_method', 'id', 'created_at', 'updated_at']);
        // Update the record
        DB::table($table)->where('id', $id)->update($data);
        return redirect()->route($view)->with('success', __('Record updated successfully.'));
    }

    public function delete(Request $request, $table, $id)
    {
        // Check if table exists
        if (!DB::getSchemaBuilder()->hasTable($table)) {
            return redirect()->back()->with('error', __('Table does not exist.'));
        }
        // Check if record exists
        $record = DB::table($table)->where('id', $id)->first();
        if (!$record) {
            return redirect()->back()->with('error', __('Record not found.'));
        }
        // Get all table names using SHOW TABLES (MySQL compatible)
        $allTables = collect(DB::select('SHOW TABLES'))->map(function($row) {
            return array_values((array)$row)[0];
        })->toArray();
        $referenced = false;
        foreach ($allTables as $otherTable) {
            if ($otherTable === $table) continue;
            $columns = DB::getSchemaBuilder()->getColumnListing($otherTable);
            foreach ($columns as $col) {
                // Only check columns that look like foreign keys
                if (str_ends_with($col, '_id')) {
                    $count = DB::table($otherTable)->where($col, $id)->count();
                    if ($count > 0) {
                        $referenced = true;
                        break 2;
                    }
                }
            }
        }
        if ($referenced) {
            return redirect()->back()->with('error', __('This record is referenced by a foreign key in another table.'));
        }
        // Delete the record from the specified table
        $deleted = DB::table($table)->where('id', $id)->delete();
        if ($deleted) {
            return redirect()->back()->with('success', __('Record deleted successfully.'));
        } else {
            return redirect()->back()->with('error', __('Failed to delete record.'));
        }
    }
}
