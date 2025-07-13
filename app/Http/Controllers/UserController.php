<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();

        if ($user->isAdmin()) {
            // Admin: Get all direct employee and their employee (recursively)
            $employees = $user->children()->with('children.children')->get();
            return response()->json($employees);
        }

        // Employee: Just show their direct employees
        $subEmployees = $user->children;
        return response()->json($subEmployees);
    }

}
