<?php
 
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use App\Http\Requests\PerfectNumberRequest; 

class PerfectNumberController extends Controller
{
    public function find(PerfectNumberRequest $request)
    {
        $perfectNumbers = collect([]);
        for ($i = $request->range['start']; $i <= $request->range['end']; $i++)
        {
            if($this->isPerfect($i))
            {
                $perfectNumbers->push($i);
            }
        }

        return response()->json([
            'data' => $perfectNumbers->all(),
            'message' => 'OK',
            'code' => '200'
        ]);
    }

    //calculates if the number is perfect
    private function isPerfect($number)
    {
        $sum = 1;
        //Calculates the sum of it divisors
        for ($i = 2; $i * $i <= $number; $i++)
        {
            if ($number % $i == 0)
            {
                if($i * $i != $number){
                    $sum = $sum + $i + (int)($number / $i);
                }           
                else{
                    $sum = $sum + $i;
                }    
            }
        }

        // If the sum of all its divisors is equal to the number, the number is perfect
        if ($sum == $number && $number != 1)
        {
            return true;
        }
           
        return false;
    }
}