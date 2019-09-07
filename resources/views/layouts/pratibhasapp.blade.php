<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
 
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
 
    <title>Laravel AJAX CRUD</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <!-- Bootstrap CSS -->

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">  
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  

    

 
    <!-- Custom styles for this template -->
   
</head>
 
<body style="margin-top: 60px" class="container">
 
@yield('content')
 
<script>

jQuery(document).ready(function($){
    ////--- Open the model to for new entry---///
    jQuery('#btn-add').click(function(){
          jQuery('#btn-save').val("add");
          jQuery('#modalFormData').trigger("reset"); 
          jQuery('#linkEditorModal').modal('show');
    });
    ////---open the modaL to UPDATE a Link---
    jQuery('body').on('click','.open-modal', function(){
        var prdata = $(this).val();
        $.get('prdata/' + prdata, function(data){
          jQuery('#prdata').val(data.id);
          jQuery('#name').val(data.name);
          jQuery('#designation').val(data.designation);
          jQuery('#githublink').val(data.githublink);
          jQuery('#btn-save').val("update");
          jQuery('#linkEditorModal').modal('show');
        });
    });
   //--- clicking the save button modal for both Create and Update---//
   $("#btn-save").click(function (e){
    $.ajaxSetup({
        headers:{
         'X-CSRF-TOKEN':jQuery('meta[name="csrf-token"]').attr('content')

        } 
    });
    e.preventDefault();
    var formData = {
       name:jQuery('#name').val(),
       designation:jQuery('#designation').val(),
       githublink:jQuery('#githublink').val(),
    };
    var state =jQuery('#btn-save').val();
    var type ="POST";
    var prdata = jQuery('#prdata').val();
    var ajaxurl = 'prdata';
    if(state == "update")
    {
     type= "PUT";
     ajaxurl = 'prdata/'+ prdata;
    }
    $.ajax({
   type: type,
   url :  ajaxurl,
   data: formData,
   dataType: 'json',
            success: function (data) {
                var link = '<tr id="link' + data.id + '"><td>' + data.id + '</td><td>' + data.name + '</td><td>' + data.designation + '</td><td>' + data.githublink + '</td>';
                link += '<td><button class="btn btn-info open-modal" value="' + data.id + '">Edit</button>&nbsp;';
                link += '<button class="btn btn-danger delete-link" value="' + data.id + '">Delete</button></td></tr>';
                if (state == "add") {
                    jQuery('#links-list').append(link);
                } else {
                    $("#link" + prdata).replaceWith(link);
                }
                jQuery('#modalFormData').trigger("reset");
                jQuery('#linkEditorModal').modal('hide')
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
 

});
 
  
    ////----- DELETE a link and remove from the page -----////
    jQuery('.delete-link').click(function () {
        var prdata = $(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "DELETE",
            url: 'prdata/' + prdata,
            success: function (data) {
                console.log(data);
                $("#link" + prdata).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

</script>

</body>
</html>