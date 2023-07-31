@include('head')
<br><br><br><br><br>
<div class="container">
<div class="row">
    <div class="col-md-12">
        <!-- DATA TABLE -->
        <h3 class="title-5 m-b-35">User table</h3>
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
                <a href="/add-user" class="au-btn au-btn-icon au-btn--green au-btn--small">
                    <i class="zmdi zmdi-plus"></i>add user</a>
                <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                    <select class="js-select2" name="type">
                        <option selected="selected">Export</option>
                        <option value="">Option 1</option>
                        <option value="">Option 2</option>
                    </select>
                    <div class="dropDownSelect2"></div>
                </div>
            </div>
        </div>
        <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>name</th>
                        <th>role</th>
                        <th>Access</th>
                        <th>no.records</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $serial = 1;
                    @endphp
                    @foreach ($users as $row )


                    <tr class="tr-shadow">
                        <td>
                            {{$serial}}
                        </td>
                        <td>{{$row->username}}</td>
                        <td>
                            <span class="status--process">{{$row->role}}</span>
                        </td>
                        @if ($row->access != 'access')
                        <td>
                            <span class="badge badge-danger">{{$row->access}}</span>
                        </td>

                        @else
                        <td>
                            <span class="badge badge-success">{{$row->access}}</span>
                        </td>
                        @endif

                        <td>{{$row->no_records}}</td>
                        <td>{{$row->created_at}}</td>

                        <td>
                            <div class="table-data-feature">

                                <a href="/edit_user{{$row->user_id}}" class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                    <i class="zmdi zmdi-edit"></i>
                                </a>
                                <a href="/user-rights{{$row->user_id}}" class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Manage rights">
                                    <i class="fa fa-universal-access"></i>
                                </a>

                                <!-- <a href="/del_user{{$row->user_id}}" class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete User">
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
        <div class="container">
            {{$users->links()}}
        </div>
        <!-- END DATA TABLE -->
    </div>
</div>
</div>
@include('foot')