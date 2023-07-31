@include('head')
<br><br><br><br><br>

<div class="container">
    <div class="row">

        <div class="col-md-12">
            <!-- DATA TABLE -->
            <h3 class="title-5 m-b-35">sale-invoice table</h3>
            <div class="table-data__tool">
                <div class="table-data__tool-left">

                    <form class="form-inline d-flex justify-content-center md-form form-sm mt-0">
                        <button type="submit"><i class="fas fa-search" aria-hidden="true"></i></button>
                        <input class="form-control form-control-sm ml-3 w-75" type="search" name="search" id="search" placeholder="Search" aria-label="Search" value="{{$search}}">
                    </form>

                </div>
                <div class="table-data__tool-right">
                    <a href="/add-sale-invoice" class="au-btn au-btn-icon au-btn--green au-btn--small">
                        <i class="zmdi zmdi-plus"></i>add sale-invoice</a>
                    <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                        <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                            <button id="generate_pdf" class="btn btn-primary" role="button" style="background-color: black;">PDF ALL</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive table-responsive-data2 ">
                <table class="table table-data2">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Company name</th>
                            <th>Contact Person</th>
                            <th>Debit</th>
                            <th>Credit</th>
                            <th>no.records</th>
                            <th>sale-invoice Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $serial = ($sale-invoice->currentPage() - 1) * $sale-invoice->perPage() + 1;
                        @endphp
                        @foreach ($sale-invoice as $row)
                        <tr class="tr-shadow table">
                            <td>{{$serial}}</td>
                            <td><a href="/view_single_sale-invoice{{$row->sale-invoice_id}}"><span class="block-email">{{$row->company_name}}</span></a></td>
                            <td><span class="role member">{{$row->contact_person}}</span></td>
                            <td><span class="status--process">{{$row->debit}}</span></td>
                            <td><span class="status--process">{{$row->credit}}</span></td>
                            <td>{{$row->total_records}}</td>
                            <td>{{$row->sale-invoice_type}}</td>
                            <td>
                                <div class="table-data-feature">
                                    <a href="/edit_sale-invoice{{$row->sale-invoice_id}}" class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                        <i class="zmdi zmdi-edit"></i>
                                    </a>
                                    <a href="/view_single_sale-invoice{{$row->sale-invoice_id}}" class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="View">
                                        <i class="fa fa-light fa-eye"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @php
                        $serial++;
                        @endphp
                        @endforeach
                    </tbody>
                </table>

            </div>
            <br>
            <div class="container">
                {{$sale-invoice->appends(['search' => $search])->links()}}
            </div>

            <!-- END DATA TABLE -->

        </div>
    </div>
</div>
@include('foot')


<script>
    document.getElementById('generate_pdf').addEventListener('click', function() {


        var data2 = <?php echo session()->put('pdf_data', $pdf);  ?>

        window.location.href = '/pdfsale-invoice'
    })
</script>