<?php

namespace App\Http\Controllers;
use App\Models\{Reservation,FoodPackage,Food,User,Business,Link,GCashInfo,Admin};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AdminPageController extends Controller
{
    public function dashboardPage()
    {
        $countPending = Reservation::where('status','pending')->count();
        $countApproved = Reservation::where('status','approved')->count();
        $countComplete = Reservation::where('status','complete')->count();
        $approved = Reservation::with('reservation_package')->where('status', 'approved')->get();
        $approved->map(function ($item){
            $user_name = User::findorfail($item->user_id);
            $item->first_name = $user_name->first_name;
            $item->middle_name = $user_name->middle_name;
            $item->last_name = $user_name->last_name;
        });
        return view('admin-dashboard',
            compact('countPending','countApproved','countComplete','approved'),
            ['metaTitle'=>'Admin Dashboard',
            'metaHeader'=>'Dashboard']);
    }

    public function foodPage(Request $request)
    {
        $foods = Food::get();
        return view('admin-add-food',compact('foods'),
        ['metaTitle'=>'Food Page | Admin Panel',
        'metaHeader'=>'Food Menu']);
    }

    public function foodPackagePage()
    {
        $foods = Food::get();
        $package = FoodPackage::get();
        $package->map(function ($item){
            $assign_food_package = $item->assign_food_package;
            $assign_food_package->map(function ($listFood){
                $item_food_name = Food::findorfail($listFood->food_id);
                $listFood->food_title = $item_food_name->food_title;
            });
        });
        
        return view('admin-add-food-package',compact('package','foods'),
        ['metaTitle'=>'Food Package Page | Admin Panel',
        'metaHeader'=>'Food Package Setting']);
    }

    public function pendingList()
    {
        $pending_list = Reservation::with('reservation_package')->where('status', 'pending')->get();
        $pending_list->map(function ($item){
            $user_name = User::findorfail($item->user_id);
            $item->first_name = $user_name->first_name;
            $item->middle_name = $user_name->middle_name;
            $item->last_name = $user_name->last_name;
        });
        return view('admin-pending-transaction',compact('pending_list'),
        ['metaTitle'=>'Transaction Pending Page | Admin Panel',
        'metaHeader'=>'Transaction Pending']);
    }

    public function cancelList()
    {
        $canceled = Reservation::with('reservation_package')->where('status', 'canceled')->get();
        $canceled->map(function ($item){
            $user_name = User::findorfail($item->user_id);
            $item->first_name = $user_name->first_name;
            $item->middle_name = $user_name->middle_name;
            $item->last_name = $user_name->last_name;
        });
        return view('admin-cancel-transaction',compact('canceled'),
        ['metaTitle'=>'Transaction Canceled History | Admin Panel',
        'metaHeader'=>'Transaction Canceled']);
    }

    public function approvedList()
    {
        $approved = Reservation::with('reservation_package')->where('status', 'approved')->get();
        $approved->map(function ($item){
            $user_name = User::findorfail($item->user_id);
            $item->first_name = $user_name->first_name;
            $item->middle_name = $user_name->middle_name;
            $item->last_name = $user_name->last_name;
        });
        return view('admin-inprocess-transaction',compact('approved'),
        ['metaTitle'=>'Transaction Processing Page | Admin Panel',
        'metaHeader'=>'Transaction Processing']);
    }

    public function completedList() 
    {
        $completed = Reservation::with('reservation_package')->where('status', 'complete')->get();
        $completed->map(function ($item){
            $user_name = User::findorfail($item->user_id);
            $item->first_name = $user_name->first_name;
            $item->middle_name = $user_name->middle_name;
            $item->last_name = $user_name->last_name;
        });
        return view('admin-completed-transaction',compact('completed'),
        ['metaTitle'=>'Transaction Complete Page | Admin Panel',
        'metaHeader'=>'Transaction Completed']);
    }

    public function adminSetting()
    {
        $business = Business::first();
        $link = Link::first();
        $gcash = GCashInfo::first();

        return view('admin-business-setting',compact('business','link','gcash'),
        ['metaTitle'=>'Business Setting Page | Admin Panel',
        'metaHeader'=>'Business Setting']);
    }

    public function listUsers()
    {
        $admin = Admin::get();
        return view('admin-manage-user',compact('admin'),
        ['metaTitle'=>'User Management Page | Admin Panel',
        'metaHeader'=>'User Management']);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    protected function createAdmin(Request $request)
    {
        $this->validator($request->all())->validate();
        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return back()->with('message', 'Successfully Created User!');
    }

    protected function updateAdmin(Request $request)
    {
        $user = Admin::find($request->user_id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->update();
        return back()->with('message', 'Successfully Updated User!');
    }

    public function delAdmin($id)
    {
        $user = Admin::findorfail($id);
        $user->delete();
        return back()->with('message', 'Successfully Deleted User!');
    }
    
}
