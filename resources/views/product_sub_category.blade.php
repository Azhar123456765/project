@include('head')

<br><br><br><br><br>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- DATA TABLE -->
            <h3 class="title-5 m-b-35">Product sub Category</h3>
            <div class="table-data__tool">
                <div class="table-data__tool-left">
                    <div class="rs-select2--light rs-select2--md">
                        <select class="js-select2" name="property">
                            <option selected="selected">All Properties</option>
                            <option value="">Option 1</option>
                            <option value="">Option 2</option>
                        </select>
                        <div class="dropDownSelect2"></div>
                    </div>
                    <div class="rs-select2--light rs-select2--sm">
                        <select class="js-select2" name="time">
                            <option selected="selected">Today</option>
                            <option value="">3 Days</option>
                            <option value="">1 Week</option>
                        </select>
                        <div class="dropDownSelect2"></div>
                    </div>
                </div>
                <div class="table-data__tool-right">
                    <a href="" data-toggle="modal" data-target="#login-modal" class="au-btn au-btn-icon au-btn--green au-btn--small">
                        <i class="zmdi zmdi-plus"></i>add sub category</a>
                    <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                        <button href="" data-toggle="modal" data-target="#p-seller" class="btn btn-primary" role="button" style="background-color: black;">Export</button>


                    </div>
                </div>
            </div>
            <div class="table-responsive table-responsive-data2">
                <table class="table table-data2">
                    <thead>
                        <tr>
                            <th>S.NO</th>
                            <th>Category Name</th>
                            <th>Main Category</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $serial = 1;
                        @endphp
                        @foreach ($users as $row)
                        <tr class="tr-shadow">
                            <td>{{ $serial }}</td>
                            <td>{{ $row->sub_category_name }}</td>
                            <td>{{ $row->category_name }}</td>
                            <td>{{ $row->created_at }}</td>
                            <td>{{ $row->updated_at }}</td>
                            <td>
                                <div class="table-data-feature">
                                    <a href="#" data-toggle="modal" data-target="#edit_modal{{$row->product_sub_category_id}}" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <i class="zmdi zmdi-edit"></i>
                                    </a>
                                    <a href="/product_sub_category_delete{{ $row->product_sub_category_id }}" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <!-- <a href="/del_user/{{ $row->user_id }}" class="item" data-toggle="tooltip" data-placement="top" title="Delete User">
                                            <i class="fa fa-trash"></i>
                                        </a> -->
                                </div>
                            </td>
                        </tr>
                        <!-- <tr class="spacer"></tr> -->
                        @php
                        $serial++;
                        @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- END DATA TABLE -->
        </div>
    </div>
</div>



<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Add Sub Category</h4>
                <div class="modal-body">
                    <form method="POST" action="/add_product_sub_category">
                        @csrf
                        <div class="form-group">
                            <label for="username">Category Name</label>
                            <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Category" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Main Category</label>
                            <select name="main_category" id="">
                                @foreach ($category as $row)


                                <option value="{{$row->product_category_id}}">{{$row->category_name}}</option>

                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary" id="btn">Submit</button>

                    </form>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
@foreach ($users as $row)


<div class="modal fade" id="edit_modal{{$row->product_sub_category_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Edit Sub Category</h4>
                <div class="modal-body">
                    <form method="POST" action="/edit_product_sub_category{{$row->product_sub_category_id}}">
                        @csrf
                        <div class="form-group">
                            <label for="username">Category Name</label>
                            <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Category" required value="{{$row->sub_category_name}}">
                        </div>
                        <div class="form-group">
                            <label for="username">Main Category</label>
                            <select name="main_category" id="">
                                @foreach ($category as $row2)
                                <option value="{{$row2->product_category_id}}" {{$row->product_category_id === $row2->product_category_id ? 'selected' : ''}}>{{$row2->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary" id="btn">Submit</button>
                    </form>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>


@endforeach









<!-- <script>

$("#btn").click(function(){


        var categoryName = document.getElementById("category-name").value;
        var data = { category: categoryName };

        fetch("/add_product_sub_category", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(data)
        })
        .then(response => {
            // Handle response here
        })
        .catch(error => {
            console.error("Error:", error);
        });

    })
</script> -->





@include('foot')