<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\MedicineName;
use App\Http\Controllers\Controller;

class MedicineNameController extends Controller
{
    public function search(Request $request)
    {
        $term = $request->term;
//        $names = MedicineName::where('medicine_name', 'LIKE', '%' . $term . '%')->take(5)->get();
        $names = MedicineName::where('medicine_name', 'LIKE', $term . '%')->take(5)->get();
        if (count($names) == 0) {
            $searchResult[] = 'No item found';
        } else {
            foreach ($names as $key => $value) {
                $searchResult[] = $value->medicine_name;
            }
        }
        return $searchResult;
    }
}
