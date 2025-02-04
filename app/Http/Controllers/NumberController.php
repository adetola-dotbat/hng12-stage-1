<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NumberController extends Controller
{
    public function classify(Request $request)
    {
        $number = $request->query('number');

        if (!is_numeric($number)) {
            return response()->json([
                'number' => 'alphabet',
                'error' => true
            ], 400);
        }

        $number = (int)$number;

        $isPrime = $this->isPrime($number);
        $isPerfect = $this->isPerfect($number);
        $properties = $this->getProperties($number);
        $digitSum = $this->getDigitSum($number);
        $funFact = $this->getFunFact($number);

        return response()->json([
            'number' => $number,
            'is_prime' => $isPrime,
            'is_perfect' => $isPerfect,
            'properties' => $properties,
            'digit_sum' => $digitSum,
            'fun_fact' => $funFact
        ]);
    }

    private function isPrime($number)
    {
        if ($number < 2) {
            return false;
        }
        for ($i = 2; $i <= sqrt($number); $i++) {
            if ($number % $i === 0) {
                return false;
            }
        }
        return true;
    }

    private function isPerfect($number)
    {
        if ($number < 2) {
            return false;
        }
        $sum = 1;
        for ($i = 2; $i <= sqrt($number); $i++) {
            if ($number % $i === 0) {
                $sum += $i;
                if ($i !== $number / $i) {
                    $sum += $number / $i;
                }
            }
        }
        return $sum === $number;
    }

    private function getProperties($number)
    {
        $properties = [];
        if ($number % 2 === 0) {
            $properties[] = 'even';
        } else {
            $properties[] = 'odd';
        }
        if ($this->isArmstrong($number)) {
            $properties[] = 'armstrong';
        }
        return $properties;
    }

    private function isArmstrong($number)
    {
        $digits = str_split((string)$number);
        $length = count($digits);
        $sum = 0;
        foreach ($digits as $digit) {
            $sum += pow((int)$digit, $length);
        }
        return $sum === $number;
    }

    private function getDigitSum($number)
    {
        return array_sum(str_split((string)$number));
    }

    private function getFunFact($number)
    {
        $response = Http::get("http://numbersapi.com/{$number}");
        return $response->ok() ? $response->body() : 'No fun fact available.';
    }
}
