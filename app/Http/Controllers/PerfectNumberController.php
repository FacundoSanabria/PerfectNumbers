<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller;

class PerfectNumberController extends Controller
{
    public function find(Request $request)
    {
        $start = $request->range[0];
        $end = $request->range[1];

        $perfectNumbers = collect([]);
        for ($i = $start; $i < $end; $i++){
            if($this->isPerfect($i)){
                $perfectNumbers->push($i);
            }
        }

        return response()->json([
            'data' => $perfectNumbers->all(),
            'message' => 'OK',
            'code' => '200'
        ]);
    }

    //calcula si $number es perfecto
    private function isPerfect($number)
    {
        $sum = 1;
    
        //Calcular la suma de los divisores
        for ($i = 2; $i * $i <= $number; $i++)
        {
            if ($number % $i == 0)
            {
                if($i * $i != $number)
                    $sum = $sum + $i + (int)($number / $i);
                else
                    $sum = $sum + $i;
            }
        }

        // Si la suma de todos los divisores es igual al numero, el numero es perfecto
        if ($sum == $number && $number != 1){
            return true;
        }
           
        return false;
    }
}