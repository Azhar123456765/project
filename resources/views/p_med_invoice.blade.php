@include('head')

<head>

    <head>
        <!-- Include other necessary scripts and stylesheets -->
        <!-- Include Select2 CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

        <!-- Include jQuery library -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <!-- Include Select2 JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    </head>
</head>
<style>
    .container {
        transform: scale(0.75);
    }

    * input {
        border: 1px solid gray !important;
        width: 71px;
    }

    label {
        margin: 3px;
        font-weight: bolder;
    }

    .top label {
        margin: 5px;
    }

    .dup_invoice label {
        width: 71px;
        text-align: center;
        height: 55px;
        padding: 15px auto 15px 15px;
        border: 1px solid none;
        display: flex;
    }


    .dup_invoice input {
        border: 1px solid;
        width: 71px;
    }

    .dup input {
        border: 1px solid;
        width: 71px;
    }

    .total input {
        border: 1px solid;
        width: 71px;
    }

    .dup_invoice {
        /* margin-top: 39px; */
        margin: 6px;
        display: flex;
        width: 100%;
        justify-content: center;
    }

    .dup {
        /* margin-top: 39px; */
        display: flex;
        justify-content: center;
    }

    .invoice input {
        border: 1px solid;
        width: 71px;
    }

    .invoice label {
        text-align: center;
    }

    .invoice {

        height: 167.5px;
        overflow-y: scroll;
        overflow-x: hidden;

    }

    .total input {
        border: 1px solid;
        width: 71px;
    }

    .top {
        /* margin-top: 5%; */
        display: flex;
        flex-direction: row;
        width: 100%;
        justify-content: space-around !important;
    }

    input {
        width: 131px !important;
        height: 27px !important;
    }

    select {
        width: 131px !important;
        height: 27px !important;
    }

    #form {
        width: 140%;
        margin-left: -22%;
    }

    .select2-container .select2-selection--single .select2-selection__arrow {
        width: 91 !important;
        height: 27px !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        width: 131px;
        height: 27px !important;

        line-height: 25px !important;
        height: 25px !important;
        padding-top: 2px;
    }

   .items .select2-container--default .select2-selection--single .select2-selection__rendered {
        width: 191px !important;
        height: 27px !important;

        line-height: 25px !important;
        height: 25px !important;
        padding-top: 2px;
    }

    .select2-container .select2-selection--single .select2-selection__arrow {
        margin-right: -3%;
    }

    .select2-container--default .select2-search--dropdown .select2-search__field {
        margin: 3px;
        width: 91% !important;
    }




    .fields {
        width: 19%;
        justify-content: space-around;
        flex-direction: column;
    }

    .one {
        display: flex;
        justify-content: space-between;
        margin-top: 5px;
    }

    .flex {
        display: flex;
        justify-content: end;
    }
  input:focus {
    border: 3px solid;
    background-color: lightgray; /* Change this to your desired dark background color */
    color: black; /* Change this to your desired text color */
    outline: none; /* Remove the default focus outline */
}



.remark .select2-container--default .select2-selection--single .select2-selection__rendered {
        width: 219px !important;
        height: 27px !important;

        line-height: 25px !important;
        height: 25px !important;
        padding-top: 2px;
    }

    /* .fields input{
    padding-left: 25%;
  }
  .one select{
    padding-left: 25%;
      } */
</style>
<div class="container" style="margin-top: -73px; padding-top: 5px;        overflow-x: visible;
">
    <form id="form">
        <h3 style="text-align: center;">Purchase Invoice</h3>

        <h5 style="text-align: end;">Medician</h5>
        <div class="top">
            <div class="fields">
              <div class="one">
                <label for="date">Date</label>
                <input onkeydown="handleKeyPress(event)" style="border: none !important;" type="date" id="date" name="date" value="<?php
                                                                                                    $currentDate = date('Y-m-d');
                                                                                                    echo $currentDate;?>"  readonly/>
            </div>
                <div class="one">
                    <label for="Invoice">GSN#</label>
                    <input onkeydown="handleKeyPress(event)" style="border: none !important;" type="text" id="invoice#" name="unique_id" readonly value="<?php echo $rand = random_int(1, 999999); ?>" />
                </div>
                
                
            </div>

            <div class="fields">
                <div class="one">
                    <label for="date">Date</label>
                    <input onkeydown="handleKeyPress(event)" type="date" id="date" name="date" value="<?php
                                                                                                        $currentDate = date('Y-m-d');
                                                                                                        echo $currentDate;
                                                                                                        ?>" />
                </div>
                <div class="one">
                    <label for="due_date">Due Date</label>
                    <input onkeydown="handleKeyPress(event)" type="date" id="due_date" name="due_date" />
                </div>
                <div class="one">
                    <label for="bilty_no">Bilty No.</label>
                    <input onkeydown="handleKeyPress(event)" type="text" id="bilty_no" name="bilty_no" />
                </div>
            </div>

            <div class="fields">
                <div class="one  remark">
                    <label for="seller">Company</label>
                    <select name="company" id="seller" class="company" onchange="seller123()">
                        <option></option>
                        @foreach ($seller as $row)
                        <option value="{{ $row->buyer_id }}" data-debit="{{ $row->debit }}" data-credit="{{ $row->credit }}">
                            {{ $row->company_name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="one  remark">
                    <label for="sales_officer">Sales Officer</label>
                    <select name="sales_officer" id="sales_officer" data-live-search="true">
                        <option></option>
                        @foreach ($sales_officer as $row)
                        <option value="{{ $row->sales_officer_id }}">{{ $row->sales_officer_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="one  remark">
                    <label for="remark">Remarks</label>
                    <input style="width: 219px !important;" onkeydown="handleKeyPress(event)" type="text" id="remark" name="remark" />
                </div>

                <input  onkeydown="handleKeyPress(event)" type="hidden" name="unique_id" value="<?php echo $rand; ?>">


                <div class="one  remark">
                    <label for="warehouse">WRH</label>
                    <select name="warehouse" id="warehouse">
                        <option></option>
                        @foreach ($warehouse as $row)
                        <option value="{{ $row->warehouse_id }}">
                            {{ $row->warehouse_name }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <br />

        <div class="invoice">
            @csrf
            <div class="dup_invoice">
                <div class="div   items">
                    <label for="item">Item</label>
                    <select name="item[]" id="item" style="height: 28px" onchange="addInvoice()" required class="item0  ">
                        <option></option>
                        @foreach ($product as $row)
                        <option value="{{ $row->product_id }}" data-unit="{{$row->unit}}" data-img="{{$row->image}}" data-pur_price="{{$row->purchase_price}}">{{ $row->product_name }}</option>
                        @endforeach
                    </select>
                </div>
                <script>

                </script>

                <div class="div">
                    <label for="unit">Unit</label>
                    <input onkeydown="handleKeyPress(event)" type="text" id="unit" name="unit[]" />
                </div>

                <div class="div">
                    <label for="batch_no">Batch No</label>
                    <input onkeydown="handleKeyPress(event)" type="text" id="batch_no" name="batch_no[]" />
                </div>

                <div class="div">
                    <label for="expiry">Expire Date</label>
                    <input onkeydown="handleKeyPress(event)" type="date" id="expiry" name="expiry[]" />
                </div>

                <div class="div">
                    <label for="price">Pur Price</label>
                    <input onkeydown="handleKeyPress(event)" type="number" min="0.00" style="text-align: right;" step="any" value="0.00" id="pur_price" name="pur_price[]" />
                </div>

                <div class="div">
                    <label for="price">Sale Price</label>
                    <input onkeydown="handleKeyPress(event)" type="number" min="0.00" style="text-align: right;" step="any" placeholder="0.00" id="sale_price" name="sale_price[]" required onchange="count();  total_amount();" />
                </div>

                <div class="div">
                    <label for="pur_qty">Sale Qty</label>
                    <input onkeydown="handleKeyPress(event)" type="number" min="0.00" style="text-align: right;" step="any" value="0.00" id="sale_qty" name="sale_qty[]" onchange='qty(); per_unit();' />
                </div>

                <div class="div">
                    <label for="pur_qty">Bonus Qty</label>
                    <input onkeydown="handleKeyPress(event)" type="number" min="0.00" style="text-align: right;" step="any" value="0.00" id="bonus_qty" name="bonus_qty[]" />
                </div>

                <div class="div">
                    <label for="dis">Dis(%)</label>
                    <input onkeydown="handleKeyPress(event)" type="number" min="0.00" style="text-align: right;" step="any" value="0.00" id="dis_per" name="dis_amount[]" onchange='discount();  total_amount();' />
                </div>
                <div class="div">
                    <label for="dis">Dis Amount</label>
                    <input onkeydown="handleKeyPress(event)" type="number" min="0.00" style="text-align: right;" step="any" value="0.00" id="dis_amount" name="dis_per[]" onchange='discount();  total_amount();' />
                </div>
                <div class="div">
                    <label for="exp_unit">Exp/Unit</label>
                    <input onkeydown="handleKeyPress(event)" type="number" min="0.00" style="text-align: right;" step="any" value="0.00" id="exp_unit" name="exp_unit[]" />
                </div>

                <div class="div">
                    <label for="amount">Amount</label>
                    <input onkeydown="handleKeyPress(event)" type="number" min="0.00" style="text-align: right;" step="any" value="0.00" onchange='count()' id="amount" readonly name="amount[]" />
                </div>
            </div>
        </div>


        <style>
            .total {
                justify-content: center;
                /* width: 50%; */
                /* align-items: flex-end; */
                display: flex;
            }

            .total .last input {
                margin-top: 9px !important;

            }

            .one {
                display: flex;
                justify-content: space-between;
                margin-top: 5px;
                flex-direction: row;
            }

            .last {
                display: flex;

                flex-direction: column;
            }

            .last .one input {
                margin-top: 5px;
            }

            .options {
                display: flex;
                justify-content: center;
                margin-top: -7%;
            }
        </style>

        <div class="total" style="margin-top: 2.25%;">
            <div class="first">
                <div class="one" style="
            margin-left: 0%;
        ">
                    <label for="exp_unit">Total</label>
                    <input onkeydown="handleKeyPress(event)" type="number"   step="any" name="qty_total" id="qty_total" style="
                        margin-left: 37%;
        " readonly>
                    <input onkeydown="handleKeyPress(event)" type="number"  step="any" name="dis_total" id="dis_total" style="
            margin-left: 58%;
        " readonly>
                    <input onkeydown="handleKeyPress(event)" type="number"  step="any" name="amount_total" id="amount_total" style="
            margin-left: 30%;
        " readonly>


                </div>

                <br>
                <div class="one">
                    <label for="item">Previous balance</label>
                </div>





                <div class="one">
                    <label for="item">Cartage</label>

                </div>


                <div class="one">
                    <label for="item">Grand Total</label>

                </div>

                <div class="one  Amount">
                    <label for="item">Amount Paid</label>

                    <select style="    margin-left: 14% !important;" name="account" style="height: 28px">
                        <option></option>
                        <option>Cash Recieve</option>
                        <option>cheque Recieve</option>
                        <option>Online Recieve</option>

                    </select>
                    <select name="account" style="height: 28px">
                        <option></option>

                        @foreach ($account as $row)
                        <option value="{{ $row->account_id }}">{{ $row->account_name }}</option>
                        @endforeach

                    </select>
                </div>


                <div class="one">
                    <label for="item">Balance Amount</label>

                </div>







                <div class="last">

                    <div class="one" style="            flex-direction: column;
        position: fixed;
        bottom: 0.2% !important;
        right: 2%;
    ">
                        <input onkeydown="handleKeyPress(event)" type="number" min="0.00" style="text-align: right;" step="any" name="previous_balance" value="0.00" id="debit" readonly>
                        <input onkeydown="handleKeyPress(event)" type="number" min="0.00" style="text-align: right;" step="any" name="cartage" value="0.00" id="cartage">
                        <input onkeydown="handleKeyPress(event)" type="number" min="0.00" style="text-align: right;" step="any" name="grand_total" value="0.00" id="grand_total" readonly>
                        <input onkeydown="handleKeyPress(event)" type="number" min="0.00" style="text-align: right;" step="any" name="amount_paid" value="0.00" id="credit" readonly>
                        <input onkeydown="handleKeyPress(event)" type="number" min="0.00" style="text-align: right;" step="any" name="balance_amount" value="0.00" id="balance_amount" readonly>

                    </div>



                </div>


            </div>
        </div>

</div>
<style>
    .options a {
        margin-top: 5px;
    }

    .options button {
        margin-top: 5px;
    }
</style>
<div class="options" style="
display: flex;
    /* justify-content: center; */
    margin-top: -21.5%;
    flex-direction: column;
    position:absolute;
    width: 8%;
    margin-right: 85%;
    ">
    <button type="submit" class="btn btn-secondary btn-sm  submit" style="padding: 2px; margin-left: 19px;">
        submit
    </button>

    <a href="/es_med_invoice_id={{ $rand }}" class="edit  btn btn-secondary btn-sm" style="margin-left: 19px; display:none;">
        Edit
    </a>


    <a href="/s_med_invoice_d_id={{ $rand }}" class="edit  btn btn-secondary btn-sm" style="margin-left: 19px; display:none;">
        Delete
    </a>


    <a href="/s_med_invoice" class="edit  btn btn-secondary btn-sm" style="margin-left: 19px; display:none;">
        Add More
    </a>

    <a href="/sale_invoice_pdf_{{$rand}}" class="edit  btn btn-secondary btn-sm" style="margin-left: 19px; display:none;">
        PDF
    </a>


    <button type="submit" class="btn btn-secondary btn-sm  submit" style="padding: 2px; margin-left: 19px;" onclick="
    
    window.location.reload()
    ">
        Revert
    </button>

</div>


</form>
</div>

<div class="img" style="
    position: absolute;
    top: 70%;
    left: 19.5%;
    width: 217px;
    height: 191px;">
    <a href="" target="_blank" class="p-img">
        <img src="images/icon/avatar-01.jpeg" alt="Product  does not have any img or an error occur" style="
    width: 100%;
    height:100%;
    display:none;
" id="p-img">

    </a>
</div>


<div class="flex justify-center items-center" style="display: none">
    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show text-center custom-alert" style="
            position: fixed;
            top: 79%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 32%;
            opacity: 0.75;
        ">
        <span class="show1"></span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
</div>

<script>
    $(document).change(function() {
        count();
        count2();
        per_unit();
        discount();
        discount2();
        total_amount();
        qty();
        per_unit2();
    })












    function seller123() {

        $(document).ready(function() {

            var selectedOption = $("#seller").find('option:selected');
            var debit = $('#debit');
            var credit = $('#credit');

            debit.val(selectedOption.data('debit')); // Set the value of the unit input field to the data-unit value of the selected option
            credit.val(selectedOption.data('credit')); // Set the value of the unit input field to the data-unit value of the selected option



            count();
            count2();
            per_unit();
            discount();
            discount2();
            total_amount();
            qty();
            per_unit2();
        })

    }








    function handleKeyPress(event) {
        if (event.key === "Enter") {
            event.preventDefault(); // Prevent the default behavior (e.g., form submission)
            const currentElement = event.target;
            const focusableElements = getFocusableElements();
            const currentIndex = focusableElements.indexOf(currentElement);
            const nextIndex = (currentIndex + 1) % focusableElements.length;
            focusableElements[nextIndex].focus();
        }
    }




    var counter = 1
    var countera = 0


    function addInvoice(one = 0) {

        for (let i = 1; i <= counter; i++) {


            var clonedFields = `
        <div class="dup_invoice">

        <div class="div  items">
                    <select name="item[]" id="item" style="height: 28px" onchange="addInvoice(` + counter + `)"  class='clone_item` + counter + `'>
                    <option></option>
                    <option></option>
                        @foreach ($product as $row) 
                        <option value="{{ $row->product_id }}" data-unit="{{$row->unit}}" data-img="{{$row->image}}" data-pur_price="{{$row->purchase_price}}">{{ $row->product_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="div">
                    <input  onkeydown="handleKeyPress(event)"  type="text" id="unit` + counter + `" name="unit[]" />
                </div>

                <div class="div">
                    <input  onkeydown="handleKeyPress(event)"  type="text" id="batch_no" name="batch_no[]" />
                </div>

                <div class="div">
                    <input  onkeydown="handleKeyPress(event)"  type="date" id="expiry" name="expiry[]" />
                </div>

                <div class="div">
                    <input  onkeydown="handleKeyPress(event)"  type="number" min="0.00" style="text-align: right;" step="any"  value='0.00' id="pur_price` + counter + `" name="pur_price[]" />
                </div>

                <div class="div">
                    <input  onkeydown="handleKeyPress(event)"  type="number" min="0.00" style="text-align: right;" step="any"  value='0.00' id="sale_price` + counter + `" name="sale_price[]" required onchange='count2();  total_amount();'/>
                </div>

                <div class="div">
                    <input  onkeydown="handleKeyPress(event)"  type="number" min="0.00" style="text-align: right;" step="any"  value='0.00' id="sale_qty` + counter + `" name="sale_qty[]" onchange='qty(); per_unit();' />
                </div>

                <div class="div">
                    <input  onkeydown="handleKeyPress(event)"  type="number" min="0.00" style="text-align: right;" step="any"  value='0.00' id="bonus_qty" name="bonus_qty[]" />
                </div>

                <div class="div">
                    <input  onkeydown="handleKeyPress(event)"  type="number" min="0.00" style="text-align: right;" step="any"  value='0.00' id="dis_per` + counter + `" name="dis_per[]" onchange='discount2();  total_amount();'  />
                </div>

                <div class="div">
                    <input onkeydown="handleKeyPress(event)" type="number" min="0.00" style="text-align: right;" step="any"  value="0.00" id="dis_amount` + counter + `"name="dis_amount[]" onchange='discount();  total_amount();' />
                </div>

                <div class="div">
                    <input  onkeydown="handleKeyPress(event)"  type="number" min="0.00" style="text-align: right;" step="any"  value='0.00' id="exp_unit` + counter + `" name="exp_unit[]" />
                </div>

                <div class="div">
                    <input  onkeydown="handleKeyPress(event)"  type="number" min="0.00" style="text-align: right;" step="any"  value='0.00' onchange='count();  total_amount();' id="amount` + counter + `" name="amount[]"/>
                </div>
    </div>

  `;


        }



        counter++
        countera++


        $(".invoice").append(clonedFields);


        $(document).ready(function() {
            // Initialize Select2 for the desired select elements
            $("select").select2({});

            var selectedOption = $("#item").find('option:selected');
            var unitInput = $('#unit');
            unitInput.val(selectedOption.data('unit')); // Set the value of the unit input field to the data-unit value of the selected option


            var pInput = $('#pur_price');
            pInput.val(selectedOption.data('pur_price'));


            $('#p-img').css("display", "block")
            var imgInput = $('#p-img');
            var imgSrc = selectedOption.data('img');
            imgInput.attr('src', imgSrc);

            $(".p-img").attr('href', imgSrc)
            // Initialize other select elements if necessary








            for (let index = 1; index <= countera; index++) {
                var selectedOption2 = $(".clone_item" + index).find('option:selected');


                var unitInput = $('#unit' + index);
                unitInput.val(selectedOption2.data('unit')); // Set the value of the unit input field to the data-unit value of the selected option


                var pInput = $('#pur_price' + index);
                pInput.val(selectedOption2.data('pur_price')); // Set the value of the unit input field to the data-unit value of the selected option


                imgSrc = selectedOption2.data('img');
                imgInput.attr('src', imgSrc);
                $(".p-img").attr('href', imgSrc)


            }
        });

    }










    function per_unit() {

        let amount = $("#sale_qty").val();

        let sale = $("#sale_price").val();

        $("#exp_unit").val(sale / amount);
    }


    function per_unit2() {
        for (let i = 1; i <= countera; i++) {

            let amount = $("#sale_qty" + i).val();

            let sale = $("#sale_price" + i).val();

            $("#exp_unit" + i).val(sale / amount);
        }
    }






    function count() {

        let amount = $("#sale_price").val();
        $("#amount").val(amount);




        let amount1 = parseFloat($("#dis_per").val());
        let amount2 = parseFloat($("#sale_price").val());


        let discountPercentage = amount1;
        let amount3 = amount2 - (amount2 * discountPercentage / 100);

        $("#amount").val(amount3);
    }



    function count2() {

        for (let i = 1; i <= countera; i++) {



            let amount = $("#sale_price" + i).val();
            $("#amount" + countera).val(amount);

        }



        for (let i = 1; i <= countera; i++) {



            let amount1 = $("#dis_per" + i).val();
            let amount2 = $("#sale_price" + i).val();

            let discountPercentage = amount1;
            let amount = amount2 - (amount2 * discountPercentage / 100);

            $("#amount" + i).val(amount);

        }








    }






    function discount() {
        let amount1 = parseFloat($("#dis_per").val());
        let amount2 = parseFloat($("#sale_price").val());


        let discountPercentage = amount1;
        let amount = amount2 - (amount2 * discountPercentage / 100);


        $("#dis_amount").val(amount2 - amount);
        $("#amount").val(amount);





        var total = parseInt($("#dis_amount").val())

        for (let i = 1; i <= countera; i++) {
            let amount1 = parseInt($("#dis_per" + i).val());
            total += amount1;
        }

        $("#dis_total").val(total);

    }



    function discount2() {

        for (let i = 1; i <= countera; i++) {



            let amount1 = parseFloat($("#dis_per" + i).val());
            let amount2 = parseFloat($("#sale_price" + i).val());

            let discountPercentage = amount1;
            let amount = amount2 - (amount2 * discountPercentage / 100);

            let total = amount2 - amount
            $("#dis_amount" + i).val(amount2 - amount);
            $("#amount" + i).val(amount);

            console.log(amount2 - amount + '   ' + i);

        }

        var total = parseInt($("#dis_amount").val())

        for (let i = 1; i <= countera; i++) {
            let amount1 = parseInt($("#dis_amount" + i).val());
            total += amount1;
        }

        $("#dis_total").val(total);


    }






    function total_amount() {

        var atotal = parseFloat($("#amount").val());

        for (let i = 1; i <= countera; i++) {
            let amount1 = parseFloat($("#amount" + i).val());
            atotal += amount1;
        }

        $("#amount_total").val(atotal);

        let p = parseFloat($("#debit").val())
        $("#grand_total").val(p + atotal);

        let g = $("#grand_total").val()


        let credit = parseFloat($("#credit").val())
        $("#balance_amount").val(parseFloat(g - credit));

    }

    $("#cartage").change(function() {

        $(document).ready(function() {


            var atotal = parseFloat($("#amount").val());

            for (let i = 1; i <= countera; i++) {
                let amount1 = parseFloat($("#amount" + i).val());
                atotal += amount1;
            }

            $("#amount_total").val(atotal);

            let p = parseFloat($("#debit").val())
            let credit = parseFloat($("#credit").val())

            let c = parseFloat($("#cartage").val())

            $("#grand_total").val(parseFloat(p + atotal + c));

            let g = $("#grand_total").val()

            $("#balance_amount").val(parseFloat(g - credit));

        })

    })



    $(document).ready(function() {

        $('.item').change(function() {
            // Set the value of the unit input field to the data-unit value of the selected option

        });
        $('.clone_item').change(function() {

            for (let index = 1; index <= countera; index++) {
                var selectedOption = $(".clone_item" + index).find('option:selected');


                var unitInput = $('#unit' + index);
                unitInput.val(selectedOption.data('unit')); // Set the value of the unit input field to the data-unit value of the selected option


                var pInput = $('#pur_price' + index);
                pInput.val(selectedOption.data('pur_price')); // Set the value of the unit input field to the data-unit value of the selected option

            }
        })
    });





    function qty() {
        var total = parseInt($("#sale_qty").val())

        var sale = parseInt($("#sale_price").val())


        for (let i = 1; i <= countera; i++) {
            let amount1 = parseInt($("#sale_qty" + i).val());

            total += amount1;

        }


        $("#qty_total").val(total);
    }
</script>
<script>
    $("#item option").click(function() {
        // Initialize Select2 for the desired select elements
        $("select").select2();

        // Initialize other select elements if necessary
    });

    $(document).ready(function() {
        // Initialize Select2 for the desired select elements
        $("select").select2({
            maximumSelectionLength: 100,
        });


        // Initialize other select elements if necessary
    });

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });



    $('#form').submit(function(event) {
        event.preventDefault();

        // Get the form data
        var formData = $("#form").serialize();

        // Send an AJAX request
        $.ajax({
            url: '/s_med_invoice_form', // Replace with your Laravel route or endpoint
            method: 'POST',
            data: formData,
            success: function(response) {
                // Handle the response

                $(".items-center").css("display", "block");
                $(".show1").text(response);
                $(".submit").css("display", "none")
                $(".edit").css("display", "block")



            },
            error: function(error) {
                // Handle the error
            },
        });
    })
</script>

@include('foot')