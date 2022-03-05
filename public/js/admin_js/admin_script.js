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


    $('#district_id').on('change', function() {
        var district_id = $(this).val();
        var route = $(this).attr('action');
        // alert(route);
        if(district_id) {
            $.ajax({
                url: route,
                type: "GET",
                data : {"_token":"{{ csrf_token() }}",district_id:district_id},
                dataType: "json",
                success:function(data) {
                    // console.log(data);
                    if(data){
                        $('#thana_id').empty();
                        $('#thana_id').focus;
                        $('#thana_id').append('<option value="">Select</option>');
                        $.each(data, function(key, value){
                            $('select[name="thana_id"]').append('<option value="'+ value.id +'">' + value.thana_name+ '</option>');
                        });
                    }else{
                        $('#thana_id').empty();
                    }
                }
            });
        }else{
            $('#thana_id').empty();
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
        $('#case_no').empty();
        $('#case_no').append('<option value="">Select</option>');

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
                        $('#case_no').focus;
                        $.each(data, function(key, value){
                            $('select[name="case_no"]').append('<option value="'+ value.case_no +'">' + value.case_no+ '</option>');
                        });
                    }else{
                        $('#case_no').empty();
                    }
                }
            });
        }else{
            $('#case_no').empty();
        }
    });


    $('#form_data').submit(function(e){
        $('#submit').html('<i class="fas fa-search"></i> Searching');

        e.preventDefault();
        var form_data = new FormData(this);
        var action = $(this).attr('action');

        $.ajax({
            type:'post',
            beforeSend: function() {
            $(".progress-bar").animate({
                width: "100%"
            }, 800);
            $(".progress-bar").fadeIn(100);
                    },
            complete: function(data) {
                $(".progress-bar").fadeOut(800);
            },
            url: action,
            data: form_data,
            cache:false,
            contentType:false,
            processData:false,
            success:(res) =>{
                $('#submit').html('<i class="fas fa-search"></i> Search');
// console.log(res);

if (res.result == "billing") {
console.log(res.data);

    $('#search_data').empty();
    $.each(res.data, function(key, value){

        $('#search_data').append(`

        <div class="col-md-3">
            <div class="card">
                <div class="">  
                    <div class="float-right">
                                                                        
                            <a href="edit-billing/${value.id}"><button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Edit"
                            ><i class="fas fa-edit"></i></button></a>
                            <button onclick='billing_delete_after_search(${value.id})' type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i> </button>     
                        
                        </div>
                        <div class="card-body">
                            <div class="col-md-12">
                                <p class="text-muted text-sm"><b>Bill Type: </b>  ${value.bill_type_name} </p>
                                <p class="text-muted text-sm"><b>Payment Type: </b>  ${value.payment_type} </p>
                                <p class="text-muted text-sm"><b>District: </b> ${value.district_name} </p>
                                <p class="text-muted text-sm"><b>Case Type: </b> ${value.case_type} </p>
                                <p class="text-muted text-sm"><b>Case No: </b> ${value.case_no} </p>
                                <p class="text-muted text-sm"><b>Panel Lawyer: </b> ${value.first_name} ${value.middle_name} ${value.last_name} </p>
                                <p class="text-muted text-sm"><b>Bill Amount: </b> ${value.bill_amount} </p>
                                <p class="text-muted text-sm"><b>Date of Billing: </b> ${value.date_of_billing} </p>                                                        
                                <p class="text-muted text-sm"><b>Bank: </b> ${value.bank_name} </p>                                                        
                                <p class="text-muted text-sm"><b>Branch: </b> ${value.bank_branch_name} </p>                                                        
                                <p class="text-muted text-sm"><b>Cheque No: </b> ${value.cheque_no} </p>                                                        
                                <p class="text-muted text-sm"><b>Payment Amount: </b> ${value.payment_amount} </p>                                                        
                                <p class="text-muted text-sm"><b>Digital Payment Type: </b> ${value.digital_payment_type_name} </p>                                                        
                                <p class="text-muted text-sm"><b>Approval: </b> ${value.is_approved} </p>                                         
                            </div>

                        </div>

                </div>
            </div>
        </div>

        `);
    });


} else {
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
                                    <a href="add-billing-civil-cases/${value.id}"><button
                                                        class="btn btn-warning btn-sm" data-toggle="tooltip"
                                                        data-placement="top" title="Bill Entry"><i class="fas fa-money-bill"></i></button></a>
                                    <a href="edit-civil-cases/${value.id}"><button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Edit"
                                        ><i class="fas fa-edit"></i></button></a>
                                        
                                    <button onclick='delete_after_search(${value.id})' type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i> </button>     
                                        
                                </td>


                            </tr>


                    `);
                });
}

                // console.log(res);
            },
            error:function(res){
                console.log(res);
            }

        })


    })




    $("#payment_type").change(function(){
        
        var payment_type = $(this).val();

        if (payment_type == "Cash Payment") {

            $("#bank").hide();
            $("#branch").hide();
            $("#cheque").hide();
            $("#digital_payment_type").hide();

        } else if (payment_type == "Bank Payment"){

            $("#bank").show();
            $("#branch").show();
            $("#cheque").show();
            $("#digital_payment_type").hide();
            
        }else if (payment_type == "Digital Payment"){

            $("#bank").hide();
            $("#branch").hide();
            $("#cheque").hide();
            $("#digital_payment_type").show();

        }

    });


    $('#image').change(function(){
           
        let reader = new FileReader();
        reader.onload = (e) => { 
            $('#preview-image').attr('src', e.target.result); 
        }
        reader.readAsDataURL(this.files[0]); 
    
    });


    $('#seller_id').on('change', function() {
        var seller_id = $(this).val();
        var route = $(this).attr('action');
        // alert(route);
        if(seller_id) {
            $.ajax({
                url: route,
                type: "GET",
                data : {"_token":"{{ csrf_token() }}",seller_id:seller_id},
                dataType: "json",
                success:function(data) {
                    console.log(data);
                    if(data){
                        $('#seller_details').empty();
                        // $('#seller_details').focus;
                        $('#seller_details').append(`
                            
                            <div class="form-group row">
                                <label for="deed_no" class="col-sm-4 col-form-label">Seller Email</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="deed_no" name="deed_no" value="${data.email}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="deed_no" class="col-sm-4 col-form-label">Seller Work Phone</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="deed_no" name="deed_no" value="${data.work_phone}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="deed_no" class="col-sm-4 col-form-label">Seller Home Phone</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="deed_no" name="deed_no" value="${data.home_phone}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="deed_no" class="col-sm-4 col-form-label">Seller Mobile Phone</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="deed_no" name="deed_no" value="${data.mobile_phone}" disabled>
                                </div>
                            </div>
                        `);
                        
                    }else{
                        $('#seller_details').empty();
                    }
                }
            });
        }else{
            $('#seller_details').empty();
        }
    });


    $('#buyer_id').on('change', function() {
        var buyer_id = $(this).val();
        var route = $(this).attr('action');
        // alert(route);
        if(buyer_id) {
            $.ajax({
                url: route,
                type: "GET",
                data : {"_token":"{{ csrf_token() }}",buyer_id:buyer_id},
                dataType: "json",
                success:function(data) {
                    console.log(data);
                    if(data){
                        $('#buyer_details').empty();
                        // $('#buyer_details').focus;
                        $('#buyer_details').append(`
                            
                            <div class="form-group row">
                                <label for="deed_no" class="col-sm-4 col-form-label">Buyer Email</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="deed_no" name="deed_no" value="${data.email}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="deed_no" class="col-sm-4 col-form-label">Buyer Work Phone</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="deed_no" name="deed_no" value="${data.work_phone}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="deed_no" class="col-sm-4 col-form-label">Buyer Home Phone</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="deed_no" name="deed_no" value="${data.home_phone}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="deed_no" class="col-sm-4 col-form-label">Buyer Mobile Phone</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="deed_no" name="deed_no" value="${data.mobile_phone}" disabled>
                                </div>
                            </div>
                        `);
                        
                    }else{
                        $('#buyer_details').empty();
                    }
                }
            });
        }else{
            $('#buyer_details').empty();
        }
    });


    $("#land_compliance").on('click',function(){

        $("#compliance_input").toggle();

    });











});

