<?php

namespace App\Http\Controllers;

use App\Models\accounts;
use Illuminate\Http\Request;


use App\Models\users;
use App\Models\customization;
use App\Models\buyer;
use App\Models\purchase_invoice;
use App\Models\sell_invoice;
use App\Models\seller;
use App\Models\sales_officer;


use App\Models\product_sub_category;
use App\Models\product_category;
use App\Models\product_company;
use App\Models\product_type;
use App\Models\products;
use App\Models\warehouse;



class invoicecontroller extends Controller
{





    function view_sale_invoice()
    {


        return view('view_sale_invoice');
    }








































    public function view_p_med_invoice()
    {

        $product = products::limit(1000)->get();
        $seller = buyer::limit(1000)->get();
        $warehouse = warehouse::limit(1000)->get();

        $sales_officer  = sales_officer::limit(1000)->get();

        $sell_invoice  = sell_invoice::all();

        $account = accounts::where('account_category', 1)->orWhere('account_category', 2)->get();

        $data = compact('seller', 'sales_officer', 'product', 'warehouse', 'sell_invoice', 'account');
        return view('p_med_invoice')->with($data);
    }



    public function p_med_invoice_form(Request $request)
    {
        $invoiceData = $request->all();

        // Assuming all array fields have the same lengthbdnbbh

        $amount = $request['balance_amount'];

        if ($amount >= 1) {
            buyer::where("buyer_id", $request['company'])->update([
                'debit' => $amount,
                'credit' => 0.00,
            ]);
        } elseif ($amount <= -1) {
            buyer::where("buyer_id", $request['company'])->update([
                'credit' => abs($amount),
                'debit' => 0.00,
            ]);
        } else { // The value of $amount is 0
            buyer::where("buyer_id", $request['company'])->update([
                'credit' => 0.00,
                'debit' => 0.00,
            ]);
        }


        $arrayLength = count(array_filter($invoiceData['item']));

        for ($i = 0; $i < $arrayLength; $i++) {

            $invoice = new sell_invoice;

            $invoice->sales_officer = $invoiceData['sales_officer'] ?? null;
            $invoice->company = $invoiceData['company'] ?? null;
            $invoice->remark = $invoiceData['remark'] ?? null;
            $invoice->pkr_amount = $invoiceData['pkr_amount'] ?? null;
            $invoice->date = $invoiceData['date'] ?? null;
            $invoice->bilty_no = $invoiceData['bilty_no'] ?? null;
            $invoice->warehouse = $invoiceData['warehouse'] ?? null;


            $invoice->book = $invoiceData['book'] ?? null;
            $invoice->due_date = $invoiceData['due_date'] ?? null;
            $invoice->transporter = $invoiceData['transporter'] ?? null;
            $invoice->unique_id = $invoiceData['unique_id'] ?? null;

            $invoice->previous_balance = $invoiceData['previous_balance'] ?? null;
            $invoice->cartage = $invoiceData['cartage'] ?? null;
            $invoice->grand_total = $invoiceData['grand_total'] ?? null;
            $invoice->amount_paid = $invoiceData['amount_paid'] ?? null;
            $invoice->balance_amount = $invoiceData['balance_amount'] ?? null;

            $invoice->qty_total = $invoiceData['qty_total'] ?? null;
            $invoice->dis_total = $invoiceData['dis_total'] ?? null;
            $invoice->amount_total = $invoiceData['amount_total'] ?? null;

            $invoice->account = $invoiceData['account'] ?? null;






            $invoice->dis_amount = $invoiceData['dis_amount']["$i"] ?? null;
            $invoice->type = $invoiceData['type']["$i"] ?? null;
            $invoice->item = $invoiceData['item']["$i"] ?? 'error';
            $invoice->unit = $invoiceData['unit']["$i"] ?? null;
            $invoice->batch_no = $invoiceData['batch_no']["$i"] ?? null;
            $invoice->expiry = $invoiceData['expiry']["$i"] ?? null;
            $invoice->pur_qty = $invoiceData['pur_qty']["$i"] ?? null;
            $invoice->price = $invoiceData['price']["$i"] ?? null;
            $invoice->amount = $invoiceData['amount']["$i"] ?? null;
            $invoice->discount = $invoiceData['dis_per']["$i"] ?? null;
            $invoice->exp_unit = $invoiceData['exp_unit']["$i"] ?? null;
            $invoice->mor_cut = $invoiceData['mor_cut']["$i"] ?? null;
            $invoice->crate_cut = $invoiceData['crate_cut']["$i"] ?? null;
            $invoice->avg = $invoiceData['avg']["$i"] ?? null;
            $invoice->n_weight = $invoiceData['n_weight']["$i"] ?? null;
            $invoice->rate_diff = $invoiceData['rate_diff']["$i"] ?? null;
            $invoice->rate = $invoiceData['rate']["$i"] ?? null;
            $invoice->pur_price = $invoiceData['pur_price']["$i"] ?? null;
            $invoice->sale_price = $invoiceData['sale_price']["$i"] ?? null;
            $invoice->sale_qty = $invoiceData['sale_qty']["$i"] ?? null;
            $invoice->bonus_qty = $invoiceData['bonus_qty']["$i"] ?? null;


            $invoice->save();
        }

        $data = 'Invoices added successfully!';
        return response()->json($data);
    }



























    public function view_p_chick_invoice()
    {

        $product = products::where([
            'type' => 'chick'
        ])->limit(1000)->get();

        $seller = seller::limit(1000)->get();
        $warehouse = warehouse::limit(1000)->get();

        $sales_officer  = sales_officer::limit(1000)->get();

        $data = compact('seller', 'sales_officer', 'product', 'warehouse');
        return view('p_chick_invoice')->with($data);
    }



    public function p_chick_invoice_form(Request $request)
    {


        // Create a new Invoice instance
        $invoice = new purchase_invoice;

        // Assign form field values to the Invoice instance
        $invoice->sales_officer = $request['sales_officer'] ?? null;
        $invoice->company = $request['company'] ?? null;
        $invoice->remark = $request['remark'] ?? null;
        $invoice->pkr_amount = $request['pkr_amount'] ?? null;
        $invoice->date = $request['date'] ?? null;
        $invoice->bilty_no = $request['bilty_no'] ?? null;
        $invoice->warehouse = $request['warehouse'] ?? null;



        $invoice->type = $request['type'] ?? null;




        $invoice->item = $request['item'] ?? null;
        $invoice->rate_type = $request['rateType'] ?? null;
        $invoice->vehicle_No = $request['vehicleNo'] ?? null;
        $invoice->crate_type = $request['crateType'] ?? null;
        $invoice->crate_qty = $request['crateQty'] ?? null;
        $invoice->hen_qty = $request['henQty'] ?? null;
        $invoice->gross_weight     = $request['grossWeight'] ?? null;
        $invoice->actual_rate = $request['actualRate'] ?? null;
        $invoice->feed_cut = $request['feedCut'] ?? null;
        $invoice->mor_cut = $request['morCut'] ?? null;
        $invoice->crate_cut = $request['crateCut'] ?? null;
        $invoice->avg = $request['avg'] ?? null;
        $invoice->n_weight = $request['nWeight'] ?? null;
        $invoice->rate_diff = $request['rateDiff'] ?? null;
        $invoice->rate = $request['rate'] ?? null;
        $invoice->amount = $request['amount'] ?? null;

        // Save the Invoice instance
        $invoice->save();

        // Redirect or return a response
        $data = 'Invoice added successfully!';
        return response()->json($data);
    }



























    public function view_s_med_invoice()
    {

        $product = products::limit(1000)->get();
        $seller = buyer::limit(1000)->get();
        $warehouse = warehouse::limit(1000)->get();

        $sales_officer  = sales_officer::limit(1000)->get();

        $sell_invoice  = sell_invoice::all();

        $account = accounts::where('account_category', 1)->orWhere('account_category', 2)->get();

        $data = compact('seller', 'sales_officer', 'product', 'warehouse', 'sell_invoice', 'account');
        return view('s_med_invoice')->with($data);
    }



    public function s_med_invoice_form(Request $request)
    {
        $invoiceData = $request->all();

        // Assuming all array fields have the same lengthbdnbbh

        $amount = $request['balance_amount'];

        if ($amount >= 1) {
            buyer::where("buyer_id", $request['company'])->update([
                'debit' => $amount,
                'credit' => 0.00,
            ]);
        } elseif ($amount <= -1) {
            buyer::where("buyer_id", $request['company'])->update([
                'credit' => abs($amount),
                'debit' => 0.00,
            ]);
        } else { // The value of $amount is 0
            buyer::where("buyer_id", $request['company'])->update([
                'credit' => 0.00,
                'debit' => 0.00,
            ]);
        }


        $arrayLength = count(array_filter($invoiceData['item']));

        for ($i = 0; $i < $arrayLength; $i++) {

            $invoice = new sell_invoice;

            $invoice->sales_officer = $invoiceData['sales_officer'] ?? null;
            $invoice->company = $invoiceData['company'] ?? null;
            $invoice->remark = $invoiceData['remark'] ?? null;
            $invoice->pkr_amount = $invoiceData['pkr_amount'] ?? null;
            $invoice->date = $invoiceData['date'] ?? null;
            $invoice->bilty_no = $invoiceData['bilty_no'] ?? null;
            $invoice->warehouse = $invoiceData['warehouse'] ?? null;


            $invoice->book = $invoiceData['book'] ?? null;
            $invoice->due_date = $invoiceData['due_date'] ?? null;
            $invoice->transporter = $invoiceData['transporter'] ?? null;
            $invoice->unique_id = $invoiceData['unique_id'] ?? null;

            $invoice->previous_balance = $invoiceData['previous_balance'] ?? null;
            $invoice->cartage = $invoiceData['cartage'] ?? null;
            $invoice->grand_total = $invoiceData['grand_total'] ?? null;
            $invoice->amount_paid = $invoiceData['amount_paid'] ?? null;
            $invoice->balance_amount = $invoiceData['balance_amount'] ?? null;

            $invoice->qty_total = $invoiceData['qty_total'] ?? null;
            $invoice->dis_total = $invoiceData['dis_total'] ?? null;
            $invoice->amount_total = $invoiceData['amount_total'] ?? null;

            $invoice->account = $invoiceData['account'] ?? null;






            $invoice->dis_amount = $invoiceData['dis_amount']["$i"] ?? null;
            $invoice->type = $invoiceData['type']["$i"] ?? null;
            $invoice->item = $invoiceData['item']["$i"] ?? 'error';
            $invoice->unit = $invoiceData['unit']["$i"] ?? null;
            $invoice->batch_no = $invoiceData['batch_no']["$i"] ?? null;
            $invoice->expiry = $invoiceData['expiry']["$i"] ?? null;
            $invoice->pur_qty = $invoiceData['pur_qty']["$i"] ?? null;
            $invoice->price = $invoiceData['price']["$i"] ?? null;
            $invoice->amount = $invoiceData['amount']["$i"] ?? null;
            $invoice->discount = $invoiceData['dis_per']["$i"] ?? null;
            $invoice->exp_unit = $invoiceData['exp_unit']["$i"] ?? null;
            $invoice->mor_cut = $invoiceData['mor_cut']["$i"] ?? null;
            $invoice->crate_cut = $invoiceData['crate_cut']["$i"] ?? null;
            $invoice->avg = $invoiceData['avg']["$i"] ?? null;
            $invoice->n_weight = $invoiceData['n_weight']["$i"] ?? null;
            $invoice->rate_diff = $invoiceData['rate_diff']["$i"] ?? null;
            $invoice->rate = $invoiceData['rate']["$i"] ?? null;
            $invoice->pur_price = $invoiceData['pur_price']["$i"] ?? null;
            $invoice->sale_price = $invoiceData['sale_price']["$i"] ?? null;
            $invoice->sale_qty = $invoiceData['sale_qty']["$i"] ?? null;
            $invoice->bonus_qty = $invoiceData['bonus_qty']["$i"] ?? null;


            $invoice->save();
        }

        $data = 'Invoices added successfully!';
        return response()->json($data);
    }




    // {
    //     print_r($request['unit']);
    //     print_r($request['item']);

    // }




    function s_med_invoice_d(Request $request, $id)
    {

        sell_invoice::where('unique_id', $id)->delete();

        return redirect("/s_med_invoice");
    }







    public function view_es_med_invoice(Request $post, $id)
    {

        $product = products::limit(1000)->get();
        $seller = buyer::limit(1000)->get();
        $warehouse = warehouse::limit(1000)->get();

        $sales_officer  = sales_officer::limit(1000)->get();

        $sell_invoice = sell_invoice::where("unique_id", $id)
            ->leftJoin('buyer', 'sell_invoice.company', '=', 'buyer.buyer_id')

            ->leftJoin('warehouse', 'sell_invoice.warehouse', '=', 'warehouse.warehouse_id')
            ->leftJoin('sales_officer', 'sell_invoice.sales_officer', '=', 'sales_officer.sales_officer_id')
            ->get();


        $single_invoice  = sell_invoice::where([

            "unique_id" => $id
        ])->limit(1)->get();



        $account = accounts::where('account_category', 1)->orWhere('account_category', 2)->get();

        $data = compact('seller', 'sales_officer', 'product', 'warehouse', 'sell_invoice', 'single_invoice', 'account');
        return view('es_med_invoice')->with($data);
    }



    public function es_med_invoice_form(Request $request, $id)
    {


        sell_invoice::where('unique_id', $id)->delete();



        $amount = $request['balance_amount'];

        if ($amount >= 1) {
            buyer::where("buyer_id", $request['company'])->update([
                'debit' => $amount,
                'credit' => 0.00,
            ]);
        } elseif ($amount <= -1) {
            buyer::where("buyer_id", $request['company'])->update([
                'credit' => abs($amount),
                'debit' => 0.00,
            ]);
        } else { // The value of $amount is 0
            buyer::where("buyer_id", $request['company'])->update([
                'credit' => 0.00,
                'debit' => 0.00,
            ]);
        }





        $invoiceData = $request->all();

        // Assuming all array fields have the same length
        $arrayLength = count(array_filter($invoiceData['item']));

        for ($i = 0; $i < $arrayLength; $i++) {

            $invoice = new sell_invoice;

            $invoice->sales_officer = $invoiceData['sales_officer'] ?? null;
            $invoice->company = $invoiceData['company'] ?? null;
            $invoice->remark = $invoiceData['remark'] ?? null;
            $invoice->pkr_amount = $invoiceData['pkr_amount'] ?? null;
            $invoice->date = $invoiceData['date'] ?? null;
            $invoice->bilty_no = $invoiceData['bilty_no'] ?? null;
            $invoice->warehouse = $invoiceData['warehouse'] ?? null;


            $invoice->book = $invoiceData['book'] ?? null;
            $invoice->due_date = $invoiceData['due_date'] ?? null;
            $invoice->transporter = $invoiceData['transporter'] ?? null;
            $invoice->unique_id = $invoiceData['unique_id'] ?? null;

            $invoice->previous_balance = $invoiceData['previous_balance'] ?? null;
            $invoice->cartage = $invoiceData['cartage'] ?? null;
            $invoice->grand_total = $invoiceData['grand_total'] ?? null;
            $invoice->amount_paid = $invoiceData['amount_paid'] ?? null;
            $invoice->balance_amount = $invoiceData['balance_amount'] ?? null;

            $invoice->qty_total = $invoiceData['qty_total'] ?? null;
            $invoice->dis_total = $invoiceData['dis_total'] ?? null;
            $invoice->amount_total = $invoiceData['amount_total'] ?? null;

            $invoice->account = $invoiceData['account'] ?? null;




            $invoice->dis_amount = $invoiceData['dis_amount']["$i"] ?? null;
            $invoice->type = $invoiceData['type']["$i"] ?? null;
            $invoice->item = $invoiceData['item']["$i"] ?? 'error';
            $invoice->unit = $invoiceData['unit']["$i"] ?? null;
            $invoice->batch_no = $invoiceData['batch_no']["$i"] ?? null;
            $invoice->expiry = $invoiceData['expiry']["$i"] ?? null;
            $invoice->pur_qty = $invoiceData['pur_qty']["$i"] ?? null;
            $invoice->price = $invoiceData['price']["$i"] ?? null;
            $invoice->amount = $invoiceData['amount']["$i"] ?? null;
            $invoice->discount = $invoiceData['dis_per']["$i"] ?? null;
            $invoice->exp_unit = $invoiceData['exp_unit']["$i"] ?? null;
            $invoice->mor_cut = $invoiceData['mor_cut']["$i"] ?? null;
            $invoice->crate_cut = $invoiceData['crate_cut']["$i"] ?? null;
            $invoice->avg = $invoiceData['avg']["$i"] ?? null;
            $invoice->n_weight = $invoiceData['n_weight']["$i"] ?? null;
            $invoice->rate_diff = $invoiceData['rate_diff']["$i"] ?? null;
            $invoice->rate = $invoiceData['rate']["$i"] ?? null;
            $invoice->pur_price = $invoiceData['pur_price']["$i"] ?? null;
            $invoice->sale_price = $invoiceData['sale_price']["$i"] ?? null;
            $invoice->sale_qty = $invoiceData['sale_qty']["$i"] ?? null;
            $invoice->bonus_qty = $invoiceData['bonus_qty']["$i"] ?? null;


            $invoice->save();
        }

        $data = 'Invoices added successfully!';
        return response()->json($data);
    }
























    public function view_s_chick_invoice()
    {

        $product = products::where([
            'type' => 'chick'
        ])->limit(1000)->get();

        $seller = seller::limit(1000)->get();
        $warehouse = warehouse::limit(1000)->get();

        $sales_officer  = sales_officer::limit(1000)->get();

        $data = compact('seller', 'sales_officer', 'product', 'warehouse');
        return view('s_chick_invoice')->with($data);
    }



    public function s_chick_invoice_form(Request $request)
    {



        // Create a new Invoice instance
        $invoice = new purchase_invoice;

        // Assign form field values to the Invoice instance
        $invoice->sales_officer = $request['sales_officer'] ?? null;
        $invoice->company = $request['company'] ?? null;
        $invoice->remark = $request['remark'] ?? null;
        $invoice->pkr_amount = $request['pkr_amount'] ?? null;
        $invoice->date = $request['date'] ?? null;
        $invoice->bilty_no = $request['bilty_no'] ?? null;
        $invoice->warehouse = $request['warehouse'] ?? null;



        $invoice->type = $request['type'] ?? null;




        $invoice->item = $request['item'] ?? null;
        $invoice->rate_type = $request['rateType'] ?? null;
        $invoice->vehicle_No = $request['vehicleNo'] ?? null;
        $invoice->crate_type = $request['crateType'] ?? null;
        $invoice->crate_qty = $request['crateQty'] ?? null;
        $invoice->hen_qty = $request['henQty'] ?? null;
        $invoice->gross_weight     = $request['grossWeight'] ?? null;
        $invoice->actual_rate = $request['actualRate'] ?? null;
        $invoice->feed_cut = $request['feedCut'] ?? null;
        $invoice->mor_cut = $request['morCut'] ?? null;
        $invoice->crate_cut = $request['crateCut'] ?? null;
        $invoice->avg = $request['avg'] ?? null;
        $invoice->n_weight = $request['nWeight'] ?? null;
        $invoice->rate_diff = $request['rateDiff'] ?? null;
        $invoice->rate = $request['rate'] ?? null;
        $invoice->amount = $request['amount'] ?? null;

        // Save the Invoice instance
        $invoice->save();

        // Redirect or return a response
        $data = 'Invoice added successfully!';
        return response()->json($data);
    }
}
