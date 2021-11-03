<?php

namespace App\Http\Controllers;
use App\Models\{Food,FoodPackage,AssignFoodPackage};
use Illuminate\Http\Request;

class FoodPackageController extends Controller
{

    public function store(Request $request)
    {
        $validated = $request->all();
        $package = FoodPackage::create([
            'package_name'=>$request->package_name,
            'price'=>$request->price,
        ]);

        if(count($validated['food'])>0){
            foreach($validated['food'] as $food_id){
                $food_data = Food::findOrFail($food_id);
                $assignedFood = AssignFoodPackage::create([
                    'food_package_id' => $package->id,
                    'food_id'=>$food_data->id,
                ]);
            }
        }
        return back()->with('message', 'Successfully Added!');
    }

    public function update(Request $request)
    {
        $validated = $request->all();

        $del_pkg = AssignFoodPackage::where("food_package_id",$request->packageID)->delete();
        
        $packages = FoodPackage::findorFail($request->packageID);
        $packages->package_name = $request->package_name;
        $packages->price = $request->price;
        
        $packages->update();

        if(count($validated['food'])>0){
            foreach($validated['food'] as $food_id){
                $food_data = Food::findOrFail($food_id);
                $assignedFood = AssignFoodPackage::create([
                    'food_package_id' => $packages->id,
                    'food_id'=>$food_data->id,
                ]);
            }
        }
        return back()->with('message', 'Successfully Updated!');
    }

    public function destroy($id)
    {
        $packages = FoodPackage::findorfail($id);
        $packages->delete();
        return back()->with('message', 'Successfully deleted!');
    }
}
