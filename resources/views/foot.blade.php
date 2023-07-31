@if (session('message') != '')

<div class="flex justify-center items-center">
    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show text-center custom-alert" style="position: fixed; top: 85%; left: 50%; transform: translate(-50%, -50%); width: 32%; opacity: 0.75;">
        {{ session('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
</div>

@endif

@if (session('something_error') != '')

<div class="flex justify-center items-center">
    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show text-center custom-alert" style="position: fixed; top: 85%; left: 50%; transform: translate(-50%, -50%); width: 32%; opacity: 0.75;">
        {{ session('something_error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
</div>

@endif

<br><br><br><br><br><br>
<div class="row" style="align-items: center;">
    <div class="col-md-12">
        <div class="copyright">
            <p>Copyright © 2023 Psoft All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
        </div>
    </div>
</div>




<!-- href="" data-toggle="modal" data-target="#login-modal" -->




<div class="modal fade" id="p-user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Export</h4>
                <div class="modal-body">
                    <form method="GET" action="/pdf_limitusers">
                        @csrf
                        <div class="form-group">
                            <label for="username">No. Records</label>
                            <input type="number" min="0" class="form-control" id="type" name="limit" required value="">
                        </div>

                        <button type="submit" class="btn btn-primary" id="btn">Submit</button>
                        <a type="button" class="btn btn-primary" style="background-color:black;" id="btn" href="/pdf_field=users">PDF All</a>

                    </form>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>





<div class="modal fade" id="p-supplier" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Export</h4>
                <div class="modal-body">
                    <form method="GET" action="/pdf_limitsupplier">
                        @csrf
                        <div class="form-group">
                            <label for="username">No. Records</label>
                            <input type="number" min="0" class="form-control" id="type" name="limit" required value="">
                        </div>

                        <button type="submit" class="btn btn-primary" id="btn">Submit</button>
                        <a type="button" class="btn btn-primary" style="background-color:black;" id="btn" href="/pdf_field=supplier">PDF All</a>

                    </form>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>





<div class="modal fade" id="p-customer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Edit type</h4>
                <div class="modal-body">
                    <form method="POST" action="/">
                        @csrf
                        <div class="form-group">
                            <label for="username">type Name</label>
                            <input type="text" class="form-control" id="type" name="type" placeholder="type" required value="">
                        </div>

                        <button type="submit" class="btn btn-primary" id="btn">Submit</button>

                    </form>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>




<div class="modal fade" id="p-product_category" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Edit type</h4>
                <div class="modal-body">
                    <form method="POST" action="/">
                        @csrf
                        <div class="form-group">
                            <label for="username">type Name</label>
                            <input type="text" class="form-control" id="type" name="type" placeholder="type" required value="">
                        </div>

                        <button type="submit" class="btn btn-primary" id="btn">Submit</button>

                    </form>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>




<div class="modal fade" id="p-product_sub_category" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Edit type</h4>
                <div class="modal-body">
                    <form method="POST" action="/">
                        @csrf
                        <div class="form-group">
                            <label for="username">type Name</label>
                            <input type="text" class="form-control" id="type" name="type" placeholder="type" required value="">
                        </div>

                        <button type="submit" class="btn btn-primary" id="btn">Submit</button>

                    </form>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>







<div class="modal fade" id="p-product_type" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Edit type</h4>
                <div class="modal-body">
                    <form method="POST" action="/">
                        @csrf
                        <div class="form-group">
                            <label for="username">type Name</label>
                            <input type="text" class="form-control" id="type" name="type" placeholder="type" required value="">
                        </div>

                        <button type="submit" class="btn btn-primary" id="btn">Submit</button>

                    </form>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>







<div class="modal fade" id="p-product_company" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Edit type</h4>
                <div class="modal-body">
                    <form method="POST" action="/">
                        @csrf
                        <div class="form-group">
                            <label for="username">type Name</label>
                            <input type="text" class="form-control" id="type" name="type" placeholder="type" required value="">
                        </div>

                        <button type="submit" class="btn btn-primary" id="btn">Submit</button>

                    </form>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>










<script>
    function pdf(field) {

        var href = field;
window.location.href="/pdf"+href
    }



</script>
<!-- Jquery JS-->
<script src="vendor/jquery-3.2.1.min.js"></script>
<!-- Bootstrap JS-->
<script src="vendor/bootstrap-4.1/popper.min.js"></script>
<script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
<!-- Vendor JS       -->
<script src="vendor/slick/slick.min.js">
</script>
<script src="vendor/wow/wow.min.js"></script>
<script src="vendor/animsition/animsition.min.js"></script>
<script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
</script>
<script src="vendor/counter-up/jquery.waypoints.min.js"></script>
<script src="vendor/counter-up/jquery.counterup.min.js">
</script>
<script src="vendor/circle-progress/circle-progress.min.js"></script>
<script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="vendor/chartjs/Chart.bundle.min.js"></script>
<script src="vendor/select2/select2.min.js">
</script>

<!-- Main JS-->
<script src="js/main.js"></script>

<!-- Latest compiled and minified CSS -->

<!-- Latest compiled and minified JavaScript -->