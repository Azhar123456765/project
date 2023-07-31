@include('head')


<br><br><br>
<div class="container" style="width: 39%; margin-top:5%;">
    <h3>Manage Right</h3>
    <div class="card-body card-block">
        <form action="user_right_form" method="post">
            @csrf

            @foreach ($user as $row)
                
            

            <div class="form-group" required>
                <label for="">Permissions</label>
                <select class="custom-select" name="permission" id="">
                <option  <?php  if($row->permission == 'medician'){ echo 'selected'; }    ?>  value="medician">medician</option>
                <option  <?php  if($row->permission == 'poultry'){ echo 'selected'; }    ?>  value="poultry">poultry</option>
                <option  <?php  if($row->permission == 'feed'){ echo 'selected'; }    ?>  value="feed">feed</option>
                <option  <?php  if($row->permission == 'all'){ echo 'selected'; }    ?>  value="all">all</option>

                </select>
            </div>



            <input type="hidden" name="user_id"  value="{{$row->user_id}}">



            <div class="form-group" required>
                <label for="">Manage Access</label>
                <select class="custom-select" name="access" id="">
                    <option  <?php  if($row->access == 'access'){ echo 'selected'; }    ?>  value="access">Access</option>
                    <option  <?php  if($row->access == 'denied'){ echo 'selected'; }    ?>  value="denied">Denied</option>

                </select>
            </div>

            <div class="form-group" required>
                <label for="">Select Role</label>
                <select class="custom-select" name="role" id="">
                    <option  <?php  if($row->role == 'admin'){ echo 'selected'; }    ?>  value="admin">admin</option>
                    <option  <?php  if($row->role == 'user'){ echo 'selected'; }    ?>  value="user">user</option>

                </select>
            </div>

            @error('username')

            <div class="alert alert-danger" role="alert">
                {{$message}}



            </div>
            @enderror

            @error('email')

            <div class="alert alert-danger" role="alert">
                {{$message}}



            </div>
            @enderror


            @error('phone_number')

            <div class="alert alert-danger" role="alert">
                {{$message}}



            </div>
            @enderror

            @endforeach

            <div class="form-actions form-group">
                <button type="submit" class="btn btn-secondary btn-sm">Submit</button>
            </div>
        </form>
    </div>

</div>
@include('foot')