<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        $subEmp = $this->getSubEmployees($user->id);
        return response()->json($subEmp['children']);
    }

    protected function getSubEmployees($userId)
    {
        $user = User::find($userId);
        $children = User::where('parent_id', $userId)->get();

        $result = [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'children' => []
        ];

        foreach ($children as $child) {
            $result['children'][] = $this->getSubEmployees($child->id);
        }

        return $result;
    }

}
