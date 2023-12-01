<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;



class ActiveController extends Controller
{
    public function update(Request $request): RedirectResponse
    {
        $userIdToUpdate = $request->input('userId');
        $currentStatus = $request->input('currentStatus');
    
        DB::table('users')
            ->where('id', $userIdToUpdate)
            ->update([
                'active' => $currentStatus === 1 ? 0 : 1,
            ]);
    
        return back();
    }
    
    
    
    
}
