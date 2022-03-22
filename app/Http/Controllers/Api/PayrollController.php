<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PayrollController extends Controller
{
    public function index(Request $request)
    {
        $response = Http::get(
            '/api/payrolls',
            [
                'page' => ceil(
                    ((int) $request->get('start') - 1) / (int) $request->get('length') + 1
                ),
                'search' => $request->get('search')['value'],
            ]
        );

        return response()->json([
            'draw' => (int) $request->get('draw'),
            'data' => $response->json('result.data'),
            'recordsTotal' => $response->json('result.total'),
            'recordsFiltered' => $response->json('result.total'),
        ]);
    }
}
