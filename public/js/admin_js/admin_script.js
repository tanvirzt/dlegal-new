$(document).ready(function(){
    // check admin current password is match or not

    $('#current_password').keyup(function(){
        var current_password = $('#current_password').val();
        $.ajax({
            type:'post',
            url:'/admin/admin_update_password',
            data:{current_password:current_password},
            success:function(resp){
                // alert(resp);
                if (resp=="false") {
                    $("#chkcurrent_password").html("<font color=red>Current password is incorrect!</font>")
                }else if (resp=="true") {
                    $("#chkcurrent_password").html("<font color=green>Current password is correct!")
                }
            },error:function(){
                alert("Error");
            }
        });
    });

    $('.delete-user').click(function (e) {
        e.preventDefault() // Don't post the form, unless confirmed


        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $(e.target).closest('form').submit()
                // Swal.fire(
                //     'Deleted!',
                //     'Your file has been deleted.',
                //     'success'
                // )
            }
        })

        // if (confirm('Are you sure you want to delete?')) {
        //
        // }
    });

    $(function () {
        var url = window.location;
        // for single sidebar menu
        $('ul.nav-sidebar a').filter(function () {
            return this.href == url;
        }).addClass('active');

        // for sidebar menu and treeview
        $('ul.nav-treeview a').filter(function () {
            return this.href == url;
        }).parentsUntil(".nav-sidebar > .nav-treeview")
            .css({'display': 'block'})
            .addClass('menu-open').prev('a')
            .addClass('active');
    });

    // image show

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#profile-img-tag').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#profile-img").change(function () {
        readURL(this);
    });

    // append
    $("#division").change(function(){
        var division = $(this).val();
        // alert(division);
        $.ajax({
            type:'post',
            url:'append-district',
            data:{division:division},
            success:function(resp){
                $("#district_id").html(resp);
            },error:function(){
                alert("Error");
            }
        });
    });

    $(".hide").hide();
    $(".btn-success").click(function(){
        var lsthmtl = $(".clone").html();
        $(".increment").after(lsthmtl);
    });
    $("body").on("click",".btn-danger",function(){
        $(this).parents(".hdtuto").remove();
    });


    $('#division_id').on('change', function() {
        var div_id = $(this).val();
        var route = $(this).attr('action');
        // alert(route);
        if(div_id) {
            $.ajax({
                url: route,
                type: "GET",
                data : {"_token":"{{ csrf_token() }}",div_id:div_id},
                dataType: "json",
                success:function(data) {
                    // console.log(data);
                    if(data){
                        $('#district_id').empty();
                        $('#district_id').focus;
                        $('#district_id').append('<option value="">Select</option>');
                        $.each(data, function(key, value){
                            $('select[name="district_id"]').append('<option value="'+ value.id +'">' + value.district_name+ '</option>');
                        });
                    }else{
                        $('#district_id').empty();
                    }
                }
            });
        }else{
            $('#district_id').empty();
        }
    });



    $('#external_council_name_id').on('change', function() {
        var external_council_name_id = $(this).val();
        var route = $(this).attr('action');
        // alert(route);
        if(external_council_name_id) {
            $.ajax({
                url: route,
                type: "GET",
                data : {"_token":"{{ csrf_token() }}",external_council_name_id:external_council_name_id},
                dataType: "json",
                success:function(data) {
                    // console.log(data);
                    if(data){
                        $('#external_council_associates_id').empty();
                        $('#external_council_associates_id').focus;
                        $('#external_council_associates_id').append('<option value="">Select</option>');
                        $.each(data, function(key, value){
                            $('select[name="external_council_associates_id"]').append('<option value="'+ value.id +'">' + value.first_name +' '+ value.middle_name +' '+value.middle_name + '</option>');
                        });
                    }else{
                        $('#external_council_associates_id').empty();
                    }
                }
            });
        }else{
            $('#external_council_associates_id').empty();
        }
    });

    $('#bank_id').on('change', function() {
        var bank_id = $(this).val();
        var route = $(this).attr('action');
        // alert(bank_id);
        if(bank_id) {
            $.ajax({
                url: route,
                type: "GET",
                data : {"_token":"{{ csrf_token() }}",bank_id:bank_id},
                dataType: "json",
                success:function(data) {
                    // console.log(data);
                    if(data){
                        $('#branch_id').empty();
                        $('#branch_id').focus;
                        $('#branch_id').append('<option value="">Select</option>');
                        $.each(data, function(key, value){
                            $('select[name="branch_id"]').append('<option value="'+ value.id +'">' + value.bank_branch_name+ '</option>');
                        });
                    }else{
                        $('#branch_id').empty();
                    }
                }
            });
        }else{
            $('#branch_id').empty();
        }
    });

    $('#case_type').on('change', function() {
        var case_type = $(this).val();
        var route = $(this).attr('action');
        $('#case_id').empty();
        $('#case_id').append('<option value="">Select</option>');

        // alert(route);
        if(case_type) {
            $.ajax({
                url: route,
                type: "GET",
                data : {"_token":"{{ csrf_token() }}",case_type:case_type},
                dataType: "json",
                success:function(data) {
                    // console.log(data);
                    if(data){
                        $('#case_id').focus;
                        $.each(data, function(key, value){
                            $('select[name="case_id"]').append('<option value="'+ value.id +'">' + value.case_no+ '</option>');
                        });
                    }else{
                        $('#case_id').empty();
                    }
                }
            });
        }else{
            $('#case_id').empty();
        }
    });


    $('#form-data').submit(function(e){
        // alert('hello');
        $('#submit').html('<i class="fas fa-search"></i> Searching');

        // $(".progress-bar").animate({
        //     width: "100%"
        // }, 800);

        e.preventDefault();
        var form_data = new FormData(this);
        var action = $(this).attr('action');
        var view_case = $(this).attr('view_case');

// var progress = $('.progress');
    // var bar = $(".progress > .progress-bar");

        // alert(form_data);
        $.ajax({
            type:'post',
            beforeSend: function() {
                        // progress.show();
                        // bar.css("width", "0%");
            $(".progress-bar").animate({
                width: "100%"
            }, 800);
                        //$('body').addClass("blur");
            $(".progress-bar").fadeIn(100);

                    },
            complete: function(data) {

                $(".progress-bar").fadeOut(800);
                //$('body').removeClass("blur");

            },
            url: action,
            data: form_data,
            cache:false,
            contentType:false,
            processData:false,
            success:(res) =>{
                $('#submit').html('<i class="fas fa-search"></i> Search');
// console.log(res);
                // $(".progress-bar").hide();
                $('#search_data').empty();
                $.each(res, function(key, value){

                    $('#search_data').append(`

                            <tr>
                                <td>
                                     <a href="view-civil-cases/${value.id}"> ${value.case_no} </a>
                                </td>
                                <td>
                                    ${value.name_of_suit}
                                </td>
                                <td>
                                    ${value.division_name}
                                    
                                </td>
                                <td>
                                    ${value.court_name}
                                </td>
                                <td>
                                    ${value.district_name}

                                </td>
                                <td>
                                    ${value.case_status_name}

                                </td>
                                <td>
                                    ${value.company_name}

                                </td>
                                <td>
                                    ${value.case_category_name}

                                </td>
                                <td>
                                    ${value.plaintiff_name}

                                </td>
                                <td>
                                    ${value.defendent_name}

                                </td>
                                <td> 
                                   ${value.delete_status===0 ? 'Active': 'Inactive'}
                                </td>
                                
                                <td>
                                    <a href="view-civil-cases/${value.id}"><button class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Details"
                                        ><i class="fas fa-eye"></i></button></a>
                                    <a href="edit-civil-cases/${value.id}"><button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Edit"
                                        ><i class="fas fa-edit"></i></button></a>
                                        
                                    <button onclick='delete_after_search(${value.id})' type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i> </button>     
                                        
                                </td>


                            </tr>


                    `);
                });
                // console.log(res);
            },
            error:function(res){
                console.log(res);
            }

        })


    })








});




  function delete_after_search(id){
// alert(id);
        Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type:'post',
                    url: 'delete-civil-cases/'+id,
                    success:function(res){
                        // console.log(res);
                    location.reload();

                    }
                });

            }
        })

  }