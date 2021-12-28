<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RentResource;
use App\Models\Rent;
use Illuminate\Http\Request;

class RentController extends Controller
{
    public function getUserLibrary( $user ) {
        return RentResource::collection(
            Rent::join('libraries', 'libraries.id', '=', 'rents.library_id')->where('user_id', $user)->get()
        );
    }

    public function rentLibrary( Request $request ) {
        $rent = Rent::create($request->all());
        return new RentResource($rent); 
    }

}
