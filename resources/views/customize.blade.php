@include('head')


<br><br><br><br><br>
<div class="container" style="   width:27%;">

    <form action="customize-form" method="POST">
        @csrf
        @foreach ($customization as $row)
            
        
        <div class="form-group">
            <label for="">Company Name</label>
            <input type="text" name="company" id="company" class="form-control" placeholder="" aria-describedby="helpId" value="{{$row->company_name}}" required>

        </div>

        <div class="form-group">
            <label for="">Choose text color</label>
            <input type="color" name="theme_color" id="text_color" class="form-control" placeholder="" aria-describedby="helpId" style="width: 25%;" value="{{$row->theme_color}}" required>

        </div>


        <button type="submit" class="btn btn-primary btn-sm">
            <i class="fa fa-dot-circle-o"></i> Submit
        </button>

        @endforeach
    </form>

</div>




<script>
//     $('#text_color').on('change',function(){
        

//         $.ajax({
//     url: '/customize-form',
//     type: 'POST',
//     data: {
//         theme_color: $("#text_color").val()
//     },  
//     success: function(response) {
    


//     },
//     error: function(xhr, status, error) {
//       console.log(error);
//     }
//   });


//     })
</script>
@include('foot')