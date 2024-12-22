<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\currenciesResources;
use App\Models\Currency;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class CurrenciesController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        $data = Currency::all();
        return $this->successResponse(currenciesResources::collection($data), 'data return successfully');
    }


    public function show()
    {

    }


}
