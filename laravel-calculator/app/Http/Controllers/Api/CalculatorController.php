<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Calculator;

class CalculatorController extends Controller
{
    public function calculate(Request $request)
    {
        // Validasi input
        $request->validate([
            'num1' => 'required|numeric',
            'num2' => 'required|numeric',
            'operation' => 'required|string'
        ]);

        // Ambil input dari request
        $num1 = $request->num1;
        $num2 = $request->num2;
        $operation = strtolower($request->operation); // Pastikan lowercase

        // Hitung hasil
        $result = Calculator::calculate($num1, $num2, $operation);

        return response()->json([
            'num1' => $num1,
            'num2' => $num2,
            'operation' => $operation,
            'result' => $result
        ]);
    }
}