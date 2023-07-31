<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Response;
use Carbon\Carbon;




use App\Models\users;
use App\Models\customization;
use App\Models\buyer;
use App\Models\seller;

use App\Models\warehouse;
use App\Models\zone;
use App\Models\sales_officer;



use App\Models\accounts;






use Illuminate\Validation\Rule;

class maincontroller extends Controller
{




    function account(Request $request, $id)
    {

        $users = accounts::where(["account_category" => $id])->get();
        $data = compact('users', 'id');
        return view('accounts')->with($data);
    }
    function add_account(Request $request)
    {


        $add = new accounts();
        $add->account_name = $request['account_name'];
        $add->account_category = $request['account_category'];
        $add->account_qty = $request['account_qty'];
        $add->account_debit = $request['account_debit'];
        $add->account_credit = $request['account_credit'];


        $add->save();


        session()->flash('message', 'account has been added successfully');


        return redirect()->back();
    }

    function edit_account(Request $request, $id)
    {

        $query = accounts::where('account_id', $id)->update([

            'account_name' => $request['account_name'],
            'account_qty' => $request['account_qty'],
            'account_debit' => $request['account_debit'],
            'account_credit' => $request['account_credit'],



        ]);

        session()->flash('message', 'account has been updated successfully');


        return redirect()->back();
    }

    function account_delete(Request $request, $id)
    {

        $query = accounts::where('account_id', $id)->delete();

        session()->flash('message', 'account has been deleted successfully');


        return redirect()->back();
    }




























































    function warehouse(Request $request)
    {

        $users = warehouse::leftJoin('zone', 'zone', '=', 'zone.zone_id')->get();
        $category = zone::all();
        $data = compact('users', 'category');
        return view('warehouse')->with($data);
    }
    function add_warehouse(Request $request)
    {


        $add = new warehouse();
        $add->warehouse_name = $request['warehouse_name'];
        $add->zone = $request['zone'];

        $add->save();


        session()->flash('message', 'Warehouse has been added successfully');


        return redirect()->back();
    }

    function edit_warehouse(Request $request, $id)
    {

        $query = warehouse::where('warehouse_id', $id)->update([

            'warehouse_name' => $request['warehouse_name'],
            'zone' => $request['zone'],


        ]);

        session()->flash('message', 'Warehouse has been updated successfully');


        return redirect()->back();
    }

    function warehouse_delete(Request $request, $id)
    {

        $query = warehouse::where('warehouse_id', $id)->delete();

        session()->flash('message', 'Warehouse has been deleted successfully');


        return redirect()->back();
    }















    function zone(Request $request)
    {

        $users = zone::all();
        $data = compact('users');
        return view('zone')->with($data);
    }
    function add_zone(Request $request)
    {


        $add = new zone();
        $add->zone_name = $request['zone_name'];
        $add->save();


        session()->flash('message', 'Zone has been added successfully');


        return redirect()->back();
    }

    function edit_zone(Request $request, $id)
    {

        $query = zone::where('zone_id', $id)->update([

            'zone_name' => $request['zone_name'],


        ]);

        session()->flash('message', 'Zone has been updated successfully');


        return redirect()->back();
    }

    function zone_delete(Request $request, $id)
    {

        $query = zone::where('zone_id', $id)->delete();

        session()->flash('message', 'Zone has been deleted successfully');


        return redirect()->back();
    }






















    function sales_officer(Request $request)
    {

        $users = sales_officer::all();
        $data = compact('users');
        return view('sales_officer')->with($data);
    }
    function add_sales_officer(Request $request)
    {


        $add = new sales_officer();
        $add->sales_officer_name = $request['sales_officer_name'];
        $add->phone_number = $request['phone_number'];
        $add->email = $request['email'];

        $add->save();


        session()->flash('message', 'Sales Officer has been added successfully');


        return redirect()->back();
    }

    function edit_sales_officer(Request $request, $id)
    {

        $query = sales_officer::where('sales_officer_id', $id)->update([

            'sales_officer_name' => $request['sales_officer_name'],
            'phone_number' => $request['phone_number'],
            'email' => $request['email'],



        ]);

        session()->flash('message', 'Sales Officer has been updated successfully');


        return redirect()->back();
    }

    function sales_officer_delete(Request $request, $id)
    {

        $query = sales_officer::where('sales_officer_id', $id)->delete();

        session()->flash('message', 'Sales Officer has been deleted successfully');


        return redirect()->back();
    }

















    public function get_week_data(Request  $post)
    {



        // Get the current date
        $currentDate = Carbon::now();

        // Calculate the start and end dates of the week
        $startOfWeek = $currentDate->startOfWeek();
        $endOfWeek = $currentDate->endOfWeek();

        $classcheck =  $post->input('data');
        if ($classcheck == 'buyer') {

            $weekData = buyer::simplepaginate(15);
        }

        // Query the database to fetch data for the week



        // Return the data as a JSON response
        return response()->json($weekData);
    }



















































    // public function pdf()
    // {

    //         // Create a new Dompdf instance
    //         $pdf = new Dompdf();

    //         // Render the static content of the specific div as HTML
    //         $html = '<div class="table-responsive table-responsive-data2">
    //                     <table class="table table-data2">
    //                         <thead>
    //                             <tr>
    //                                 <th>
    //                                     <label class="au-checkbox">
    //                                         <input type="checkbox">
    //                                         <span class="au-checkmark"></span>
    //                                     </label>
    //                                 </th>
    //                                 <th>Company name</th>
    //                                 <th>Contact Person</th>
    //                                 <th>Debit</th>
    //                                 <th>Credit</th>
    //                                 <th>no.records</th>
    //                                 <th>buyer Type</th>
    //                             </tr>
    //                         </thead>
    //                         <tbody>
    //                             <tr class="tr-shadow">
    //                                 <td>
    //                                     <label class="au-checkbox">
    //                                         <input type="checkbox">
    //                                         <span class="au-checkmark"></span>
    //                                     </label>
    //                                 </td>
    //                                 <td>Company A</td>
    //                                 <td>Contact Person A</td>
    //                                 <td>1000</td>
    //                                 <td>500</td>
    //                                 <td>10</td>
    //                                 <td>Buyer Type A</td>
    //                             </tr>
    //                             <tr class="tr-shadow">
    //                                 <td>
    //                                     <label class="au-checkbox">
    //                                         <input type="checkbox">
    //                                         <span class="au-checkmark"></span>
    //                                     </label>
    //                                 </td>
    //                                 <td>Company B</td>
    //                                 <td>Contact Person B</td>
    //                                 <td>2000</td>
    //                                 <td>1000</td>
    //                                 <td>20</td>
    //                                 <td>Buyer Type B</td>
    //                             </tr>
    //                         </tbody>
    //                     </table>
    //                 </div>';

    //         // Load the HTML content into Dompdf
    //         $pdf->loadHtml($html);

    //         // (Optional) Set any additional configuration options, such as page size or orientation
    //         $pdf->setPaper('A4', 'portrait');

    //         // Render the PDF
    //         $pdf->render();

    //         // Generate a response with the PDF content
    //         $response = new Response($pdf->output(), 200);

    //         // Set the appropriate headers for downloading the PDF
    //         $response->header('Content-Type', 'application/pdf');
    //         $response->header('Content-Disposition', 'attachment; filename="buyer_table.pdf"');

    //         return $response;




    // }









    public function back_page()
    {
        return redirect();
    }

    public function viewhome()
    {

        if (session()->has('user_id')) {


            return view('dashboard');
        } else {
            return view('login');
        }
    }


    public function logincheck(Request $post)
    {
        $username = $post->input('username');
        $password = $post->input('password');

        $user = users::where([
            'username' => $username,
            'password' => $password,
        ])->first();

        if ($user && $user->access != 'denied') {
            $post->session()->put('user_id', $user);
            return redirect('/');
        } elseif ($user && $user->access == 'denied') {
            $post->session()->flash('error', 'User access denied');
            return redirect('/');
        } else {
            $post->session()->flash('error', 'Please enter valid username or password');
            return redirect('/');
        }
    }




    public function logout()
    {
        session()->forget('user_id');
        return redirect('/');
    }



















    public function purchase_invoice()
    {
        return view('purchase_invoice');
    }



















    public function view_add_user()
    {
        return view('add_user');
    }


    public function viewusers()
    {
        $users = users::orderBy('user_id', 'desc')->simplepaginate();
        $data = compact('users');
        return view('users')->with($data);
    }


    public function add_user_form(Request $post)
    {

        $post->validate([

            'email' => 'required|unique:users,email,' .  $post['user_id'] . ',user_id',

            'username' => 'required|unique:users,username,' .  $post['user_id'] . ',user_id',

            'phone_number' => 'required|unique:users,phone_number,' .  $post['user_id'] . ',user_id',

        ]);

        $user = new users();

        $user->username = $post['username'];
        $user->email = $post['email'];
        $user->phone_number = $post['phone_number'];
        $user->password = $post['password'];
        $user->role = $post['role'];
        $user->save();

        session()->flash('message', 'User has been added successfully');
        return redirect('/users');
        // session()->flash('message','user is added');



    }

    public function view_edit_user(Request $post, $id)
    {
        $user = users::where([

            'user_id' => $id

        ])->get();

        $data = compact('user');

        return view('edit_user')->with($data);
    }



    public function user_rights(Request $post, $id)
    {
        $user = users::where([

            'user_id' => $id

        ])->get();

        $data = compact('user');

        return view('user_right')->with($data);
    }






    public function user_right_form(Request $post)
    {



        $query = users::where('user_id', $post['user_id'])->update([

            'access' => $post['access'],
            'permission' => $post['permission'],
            'role' => $post['role'],
        ]);


        if (!isset($query)) {

            session()->flash('something_error', 'Some thing went wrong please try again later.');
        } else {
            if ($post['access'] == 'denied') {

                if ($post['user_id'] == session('user_id')['user_id']) {
                    session()->forget('user_id');
                }
            }
            session()->flash('message', 'User rights has been updated successfully');
            return redirect('/users');
        }
    }



    public function edit_user_form(Request $post)
    {
        // $exist = users::where([
        //     'user_id' => $post['user_id'],
        //     'email' => $post['email'],
        //     'username' => $post['username'],
        //     'phone_number' => $post['phone_number'],
        //     'password' => $post['password'],
        //     'role' => $post['role'],
        // ])->get();

        // if (!$exist) {
        // $check = users::where('email', $post['email'])->exists()->ignore($post['user_id']);
        // $check2 = users::where('username', $post['username'])->exists()->ignore($post['user_id']);
        // $check3 = users::where('phone_number', $post['phone_number'])->exists()->ignore($post['user_id']);
        // // $check4 = users::where('password', $post['password'])->exists();
        // // $check5 = users::where('role', $post['role'])->exists();

        // if (!$check || !$check2 || !$check3) {

        $post->validate([

            'email' => 'required|unique:users,email,' .  $post['user_id'] . ',user_id',

            'username' => 'required|unique:users,username,' .  $post['user_id'] . ',user_id',

            'phone_number' => 'required|unique:users,phone_number,' .  $post['user_id'] . ',user_id',

        ]);

        users::where('user_id', $post['user_id'])->update([
            'username' => $post['username'],
            'email' => $post['email'],
            'phone_number' => $post['phone_number'],
            'password' => $post['password'],
            'role' => $post['role'],
        ]);

        session()->flash('message', 'User has been updated successfully');
        return redirect('/users');
    }





    public function user_delete(Request $post, $id)
    {
        users::where([
            'user_id' => $id
        ])->delete();

        session()->flash('message', 'User has been deleted successfully');
        return redirect()->back();
    }


























    public function viewcustomize()
    {

        $customization = customization::all();

        $data = compact('customization');
        return view('customize')->with($data);
    }

    public function customize_form(Request $post)
    {

        $customize = customization::query()->update([
            'company_name' => $post["company"],
            'theme_color' =>  $post["theme_color"]
        ]);

        $organization = customization::all();

        session()->put('organization', $organization['0']);

        return redirect()->back();
        // $customize->company_name = $post['company'];
        // $customize->theme_color = $post['theme_color'];
        // $customize->save();

    }

    static function theme_color()
    {

        return  $theme_color = customization::all();
    }






    public function pdf(Request  $post, $view)
    {

        if (session()->has('pdf_data')) {

            $views = $view;

            $pdf = new Dompdf();

            $html = view('pdf.' . $views)->render();

            $pdf->loadHtml($html);
            $pdf->setPaper('A4', 'landscape');

            $pdf->render();

            return $pdf->stream($views . '-' . rand() . '.pdf');
            session()->forget('pdf_data');
        }
    }






























    public function view_sellers(Request $post)
    {
        $search = $post->input('search');

        $pdf = buyer::limit(100)->get();

        if ($search != '') {
            $seller = seller::where('company_name', 'LIKE', "%$search%")->simplepaginate(15);
            $pdf = seller::where('company_name', 'LIKE', "%$search%")->limit(100)->get();


            $data = compact('seller', 'search', 'pdf');
            return view('sellers')->with($data);
        }

        $seller = seller::simplepaginate(15);

        $data = compact('seller', 'search', 'pdf');

        return view('sellers')->with($data);
    }


    public function view_add_seller()
    {
        return view('add_seller');
    }







    public function add_seller_form(Request $post)
    {

        $post->validate([

            'company_name' => 'required|unique:seller,company_name,' .  $post['user_id'] . ',seller_id',

        ]);

        $user = new seller();

        $user->company_name = $post['company_name'];
        $user->company_email = $post['company_email'];
        $user->seller_type = $post['seller_type'];
        $user->address = $post['address'];
        $user->city = $post['city'];
        $user->contact_person_number = $post['contact_person_number'];
        $user->contact_person = $post['bilty_number'];

        $user->debit = $post['debit'];
        $user->credit = $post['credit'];

        $user->save();


        session()->flash('message', 'seller has been added successfully');
        return redirect('/sellers');
        // session()->flash('message','user is added');



    }





    public function edit_seller_form(Request $post)
    {

        $post->validate([

            'company_name' => 'required|unique:seller,company_name,' .  $post['user_id'] . ',seller_id',

        ]);

        seller::where('seller_id', $post['user_id'])->update([
            'company_name' => $post['company_name'],
            'company_email' => $post['company_email'],
            'seller_type' => $post['seller_type'],
            'address' => $post['address'],
            'city' => $post['city'],


            'contact_person_number' => $post['contact_person_number'],
            'contact_person' => $post['contact_person'],
            'debit' => $post['debit'],
            'credit' => $post['credit'],



        ]);


        // $user->company_name = $post['company_name'];
        // $user->company_email = $post['company_email'];
        // $user->seller_type = $post['seller_type'];
        // $user->address = $post['address'];
        // $user->city = $post['city'];
        // $user->contact_person_number = $post['contact_person_number'];
        // $user->contact_person = $post['bilty_number'];

        // $user->debit = $post['debit'];
        // $user->credit = $post['credit'];

        session()->flash('message', 'seller has been updated successfully');
        return redirect('/sellers');










        //$user = seller::where([
        //     'seller_id' => $post['seller_id']
        //    ]);

        //     $user->company_name = $post['company_name'];
        //     $user->company_email = $post['company_email'];
        //     $user->salesman = $post['salesman'];
        //     $user->address = $post['address'];
        //     $user->transporter = $post['transporter'];
        //     $user->reference_number	 = $post['reference_number'];
        //     $user->bilty_number = $post['bilty_number'];
        //     $user->payment_due_date = $post['payment_due_date'];

        //     $user->save();
    }



    public function view_edit_seller(Request $post, $id)
    {
        $seller = seller::where([

            'seller_id' => $id

        ])->get();

        $data = compact('seller');

        return view('edit_seller')->with($data);
    }





    public function view_single_seller(Request $post, $id)
    {
        $seller = seller::where([

            'seller_id' => $id

        ])->get();

        $data = compact('seller');

        return view('view_single_seller')->with($data);
    }
















































    public function view_buyers(Request $post)
    {
        $search = $post->input('search');

        $pdf = buyer::limit(100)->get();

        if ($search != '') {
            $buyer = buyer::where('company_name', 'LIKE', "%$search%")->simplepaginate(15);
            $pdf = buyer::where('company_name', 'LIKE', "%$search%")->limit(100)->get();

            $data = compact('buyer', 'search', 'pdf');
            return view('buyers')->with($data);
        }

        $buyer = buyer::simplepaginate(15);
        $data = compact('buyer', 'search', 'pdf');
        return view('buyers')->with($data);
    }




    public function view_add_buyer()
    {
        return view('add_buyer');
    }







    public function add_buyer_form(Request $post)
    {

        $post->validate([

            'company_name' => 'required|unique:buyer,company_name,' .  $post['user_id'] . ',buyer_id',

        ]);

        $user = new buyer();

        $user->company_name = $post['company_name'];
        $user->company_email = $post['company_email'];
        $user->buyer_type = $post['buyer_type'];
        $user->address = $post['address'];
        $user->city = $post['city'];
        $user->contact_person_number = $post['contact_person_number'];
        $user->contact_person = $post['bilty_number'];

        $user->debit = $post['debit'];
        $user->credit = $post['credit'];

        $user->save();


        session()->flash('message', 'buyer has been added successfully');
        return redirect('/buyers');
        // session()->flash('message','user is added');



    }





    public function edit_buyer_form(Request $post)
    {

        $post->validate([

            'company_name' => 'required|unique:buyer,company_name,' .  $post['user_id'] . ',buyer_id',

        ]);

        buyer::where('buyer_id', $post['user_id'])->update([
            'company_name' => $post['company_name'],
            'company_email' => $post['company_email'],
            'buyer_type' => $post['buyer_type'],
            'address' => $post['address'],
            'city' => $post['city'],


            'contact_person_number' => $post['contact_person_number'],
            'contact_person' => $post['contact_person'],
            'debit' => $post['debit'],
            'credit' => $post['credit'],



        ]);


        // $user->company_name = $post['company_name'];
        // $user->company_email = $post['company_email'];
        // $user->buyer_type = $post['buyer_type'];
        // $user->address = $post['address'];
        // $user->city = $post['city'];
        // $user->contact_person_number = $post['contact_person_number'];
        // $user->contact_person = $post['bilty_number'];

        // $user->debit = $post['debit'];
        // $user->credit = $post['credit'];

        session()->flash('message', 'buyer has been updated successfully');
        return redirect('/buyers');










        //$user = buyer::where([
        //     'buyer_id' => $post['buyer_id']
        //    ]);

        //     $user->company_name = $post['company_name'];
        //     $user->company_email = $post['company_email'];
        //     $user->salesman = $post['salesman'];
        //     $user->address = $post['address'];
        //     $user->transporter = $post['transporter'];
        //     $user->reference_number	 = $post['reference_number'];
        //     $user->bilty_number = $post['bilty_number'];
        //     $user->payment_due_date = $post['payment_due_date'];

        //     $user->save();
    }



    public function view_edit_buyer(Request $post, $id)
    {
        $buyer = buyer::where([

            'buyer_id' => $id

        ])->get();

        $data = compact('buyer');

        return view('edit_buyer')->with($data);
    }





    public function view_single_buyer(Request $post, $id)
    {
        $buyer = buyer::where([

            'buyer_id' => $id

        ])->get();

        $data = compact('buyer');

        return view('view_single_buyer')->with($data);
    }
}
