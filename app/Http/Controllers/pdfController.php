<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Response;




use App\Models\users;
use App\Models\customization;
use App\Models\buyer;
use App\Models\seller;

use App\Models\purchase_invoice;
use App\Models\sell_invoice;

class pdfController extends Controller
{

        public function test_pdf(Request $post)
        {
                $buyer = buyer::all();

                $data = compact('buyer');

                return view('pdf.seller')->with($data);
        }









        public function pdf_limit(Request  $post, $view)
        {

                if (!session()->exists('pdf_data')) {
                        if ($post['limit'] >= 500) {
                                $limit = 500;
                        } else {
                                $limit = $post['limit'];
                        }
                        if ($view == 'users') {

                                $pdf = users::limit($limit)->get();

                                session()->flash("pdf_data", $pdf);
                                session()->flash("pdf_title", "Users");
                        } elseif ($view == 'supplier') {

                                $pdf = seller::limit(300)->get();

                                session()->flash("pdf_data", $pdf);
                                session()->flash("pdf_title", "Suppliers");
                        }
                }

                if (session()->has('pdf_data')) {

                        $views = $view;

                        $pdf = new Dompdf();

                        $data = compact('pdf');
                        $html = view('pdf.main')->render();

                        $pdf->loadHtml($html);


                        $contentLength = strlen($html);
                        if ($contentLength > 5000) {
                                $pdf->setPaper('A3', 'landscape');
                        } else {
                                $pdf->setPaper('A4', 'landscape');
                        }
                        $pdf->render();


                        return $pdf->stream($views . '-' . rand() . '.pdf');
                }
        }







        public function pdf(Request  $post, $view)
        {

                if (!session()->has('pdf_data')) {

                        if ($view == 'users') {

                                $pdf = users::limit(300)->get();

                                session()->flash("pdf_data", $pdf);
                                session()->flash("pdf_title", "Users");
                        } elseif ($view == 'supplier') {

                                $pdf = seller::limit(300)->get();

                                session()->flash("pdf_data", $pdf);
                                session()->flash("pdf_title", "Suppliers");
                        }
                }

                if (session()->has('pdf_data')) {

                        $views = $view;

                        $pdf = new Dompdf();

                        $data = compact('pdf');
                        $html = view('pdf.main')->with($data)->render();

                        $pdf->loadHtml($html);


                        $contentLength = strlen($html);
                        if ($contentLength > 5000) {
                                $pdf->setPaper('A3', 'landscape');
                        } else {
                                $pdf->setPaper('A4', 'landscape');
                        }
                        $pdf->render();


                        return $pdf->stream($views . '-' . rand() . '.pdf');
                }
        }








        public function pdf_check(Request $request)
        {
                $pdf = users::limit(10)->get();

                return response()->json($pdf);
        }





        public function pdf_all(Request  $post)
        {


                if (session()->has('pdf_data')) {

                        $pdf = new Dompdf();

                        $html = view('pdf.main')->render();

                        $pdf->loadHtml($html);
                        $pdf->setPaper('A4', 'landscape');

                        $pdf->render();

                        return $pdf->stream("P" . '-' . rand() . '.pdf');
                        session()->forget('pdf_data');
                }
        }









        function sale_invoice_pdf(Request $post, $id)
        {


                $sell_invoice = sell_invoice::where("unique_id", $id)
                        ->leftJoin('buyer', 'sell_invoice.company', '=', 'buyer.buyer_id')
                        ->leftJoin('sales_officer', 'sell_invoice.sales_officer', '=', 'sales_officer.sales_officer_id')
                        ->leftJoin('products', 'sell_invoice.item', '=', 'products.product_id')
                        ->get();

                $s_sell_invoice = sell_invoice::where("unique_id", $id)
                        ->leftJoin('buyer', 'sell_invoice.company', '=', 'buyer.buyer_id')
                        ->leftJoin('sales_officer', 'sell_invoice.sales_officer', '=', 'sales_officer.sales_officer_id')
                        ->leftJoin('products', 'sell_invoice.item', '=', 'products.product_id')
                        ->limit(1)->get();

                session()->put("sale_invoice_pdf_data", $sell_invoice);
                session()->put("s_sale_invoice_pdf_data", $s_sell_invoice);




                $views = $id;

                $pdf = new Dompdf();

                $html = view('pdf.seller')->render();

                $pdf->loadHtml($html);

                $pdf->setPaper('A4', 'landscape');

                $pdf->render();

                return $pdf->stream(rand() . '.pdf');
        }






        //         public function pdf_limit(Request  $post, $field)
        //         {

        //                 switch ($field) {
        //                         case $field == 'users':
        //                                 $pdf = users::limit(10)->get();

        //                                 session()->flash("pdf_data", $pdf);
        //                                 bflashk;

        //                         default:
        //                                 session()->flash("pdf_data", 'unexpected try agaiflash;

        //                                 break;
        //                 }

        //                 if (session()->has('pdf_data')) {

        //                         $pdf = new Dompdf();

        //                         $html = view('pdf.main')->render();

        //                         $pdf->loadHtml($html);
        //                         $pdf->setPaper('A4', 'landscape');

        //                         $pdf->render();

        //                         return $pdf->stream($field . '-' . rand() . '.pdf');
        //                         session()->forget('pdf_data');
        //                 }
        //         }





}
