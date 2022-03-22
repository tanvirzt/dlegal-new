$(document).ready(function () {
    // check admin current password is match or not

    $('#current_password').keyup(function () {
        var current_password = $('#current_password').val();
        $.ajax({
            type: 'post',
            url: '/admin/admin_update_password',
            data: {current_password: current_password},
            success: function (resp) {
                // alert(resp);
                if (resp == "false") {
                    $("#chkcurrent_password").html("<font color=red>Current password is incorrect!</font>")
                } else if (resp == "true") {
                    $("#chkcurrent_password").html("<font color=green>Current password is correct!")
                }
            }, error: function () {
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

    $('.retrive-user').click(function (e) {
        e.preventDefault() // Don't post the form, unless confirmed


        Swal.fire({
            title: 'Are you sure?',
            text: "You want to retrive this data!",
            icon: 'success',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, retrive it!'
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
    $("#division").change(function () {
        var division = $(this).val();
        // alert(division);
        $.ajax({
            type: 'post',
            url: 'append-district',
            data: {division: division},
            success: function (resp) {
                $("#district_id").html(resp);
            }, error: function () {
                alert("Error");
            }
        });
    });

    $(".btn-success").click(function () {
        var lsthmtl = $(".clone").html();
        $(".increment").after(lsthmtl);
    });
    $("body").on("click", ".btn-danger", function () {
        $(this).parents(".hdtuto").remove();
    });


    $('#division_id').on('change', function () {
        var div_id = $(this).val();
        var route = $(this).attr('action');
        // alert(route);
        if (div_id) {
            $.ajax({
                url: route,
                type: "GET",
                data: {"_token": "{{ csrf_token() }}", div_id: div_id},
                dataType: "json",
                success: function (data) {
                    // console.log(data);
                    if (data) {
                        $('#district_id').empty();
                        $('#district_id').focus;
                        $('#district_id').append('<option value="">Select</option>');
                        $.each(data, function (key, value) {
                            $('select[name="district_id"]').append('<option value="' + value.id + '">' + value.district_name + '</option>');
                        });
                    } else {
                        $('#district_id').empty();
                    }
                }
            });
        } else {
            $('#district_id').empty();
            $('#district_id').append('<option value="">Select</option>');
        }
    });


    $('#district_id').on('change', function () {
        var district_id = $(this).val();
        var route = $(this).attr('action');
        // alert(route);
        if (district_id) {
            $.ajax({
                url: route,
                type: "GET",
                data: {"_token": "{{ csrf_token() }}", district_id: district_id},
                dataType: "json",
                success: function (data) {
                    // console.log(data);
                    if (data) {
                        $('#thana_id').empty();
                        $('#thana_id').focus;
                        $('#thana_id').append('<option value="">Select</option>');
                        $.each(data, function (key, value) {
                            $('select[name="thana_id"]').append('<option value="' + value.id + '">' + value.thana_name + '</option>');
                        });
                    } else {
                        $('#thana_id').empty();
                    }
                }
            });
        } else {
            $('#thana_id').empty();
            $('#thana_id').append('<option value="">Select</option>');

        }
    });


    $('#external_council_name_id').on('change', function () {
        var external_council_name_id = $(this).val();
        var route = $(this).attr('action');
        // alert(route);
        if (external_council_name_id) {
            $.ajax({
                url: route,
                type: "GET",
                data: {"_token": "{{ csrf_token() }}", external_council_name_id: external_council_name_id},
                dataType: "json",
                success: function (data) {
                    // console.log(data);
                    if (data) {
                        $('#external_council_associates_id').empty();
                        $('#external_council_associates_id').focus;
                        $('#external_council_associates_id').append('<option value="">Select</option>');
                        $.each(data, function (key, value) {
                            $('select[name="external_council_associates_id"]').append('<option value="' + value.id + '">' + value.first_name + ' ' + value.middle_name + ' ' + value.middle_name + '</option>');
                        });
                    } else {
                        $('#external_council_associates_id').empty();
                    }
                }
            });
        } else {
            $('#external_council_associates_id').empty();
            $('#external_council_associates_id').append('<option value="">Select</option>');

        }
    });

    $('#bank_id').on('change', function () {
        var bank_id = $(this).val();
        var route = $(this).attr('action');
        // alert(bank_id);
        if (bank_id) {
            $.ajax({
                url: route,
                type: "GET",
                data: {"_token": "{{ csrf_token() }}", bank_id: bank_id},
                dataType: "json",
                success: function (data) {
                    // console.log(data);
                    if (data) {
                        $('#branch_id').empty();
                        $('#branch_id').focus;
                        $('#branch_id').append('<option value="">Select</option>');
                        $.each(data, function (key, value) {
                            $('select[name="branch_id"]').append('<option value="' + value.id + '">' + value.bank_branch_name + '</option>');
                        });
                    } else {
                        $('#branch_id').empty();
                    }
                }
            });
        } else {
            $('#branch_id').empty();
            $('#branch_id').append('<option value="">Select</option>');
        }
    });

    $('#case_type').on('change', function () {
        var case_type = $(this).val();
        var route = $(this).attr('action');
        // alert(route);
        // $('#case_no').append('<option value="">Select</option>');
        if (case_type) {
            $.ajax({
                url: route,
                type: "GET",
                data: {"_token": "{{ csrf_token() }}", case_type: case_type},
                dataType: "json",
                success: function (data) {
                    // console.log(data);
                    if (data) {
                        $('#case_no').empty();
                        $('#case_no').append('<option value="">Select</option>');
                        $('#case_no').focus;
                        $.each(data, function (key, value) {
                            $('select[name="case_no"]').append('<option value="' + value.case_no + '">' + value.case_no + '</option>');
                        });
                    } else {
                        $('#case_no').empty();
                    }
                }
            });
        } else {
            $('#case_no').empty();
            $('#case_no').append('<option value="">Select</option>');

        }
    });


    $('#form_data').submit(function (e) {
        $('#submit').html('<i class="fas fa-search"></i> Searching');

        e.preventDefault();
        var form_data = new FormData(this);
        var action = $(this).attr('action');

        $.ajax({
            type: 'post',
            beforeSend: function () {
                $(".progress-bar").animate({
                    width: "100%"
                }, 800);
                $(".progress-bar").fadeIn(100);
            },
            complete: function (data) {
                $(".progress-bar").fadeOut(800);
            },
            url: action,
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
            success: (res) => {
                $('#submit').html('<i class="fas fa-search"></i> Search');

// console.log(res.data);

                if (res.result == "billing") {
// console.log(res.data);

                    $('#search_data').empty();
                    $.each(res.data, function (key, value) {

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
                                <p class="text-muted text-sm"><b>Bill Type: </b>  ${value.bill_type_name === null ? '' : value.bill_type_name} </p>
                                <p class="text-muted text-sm"><b>Payment Type: </b>  ${value.payment_type === null ? '' : value.payment_type} </p>
                                <p class="text-muted text-sm"><b>District: </b> ${value.district_name === null ? '' : value.district_name} </p>
                                <p class="text-muted text-sm"><b>Case Type: </b> ${value.case_type === null ? '' : value.case_type} </p>
                                <p class="text-muted text-sm"><b>Case No: </b> ${value.case_no === null ? '' : value.case_no} </p>
                                <p class="text-muted text-sm"><b>Panel Lawyer: </b> ${value.first_name === null ? '' : value.first_name} ${value.middle_name === null ? '' : value.middle_name} ${value.last_name === null ? '' : value.last_name} </p>
                                <p class="text-muted text-sm"><b>Bill Amount: </b> ${value.bill_amount === null ? '' : value.bill_amount} </p>
                                <p class="text-muted text-sm"><b>Date of Billing: </b> ${value.date_of_billing === null ? '' : value.date_of_billing} </p>
                                <p class="text-muted text-sm"><b>Bank: </b> ${value.bank_name === null ? '' : value.bank_name} </p>
                                <p class="text-muted text-sm"><b>Branch: </b> ${value.bank_branch_name === null ? '' : value.bank_branch_name} </p>
                                <p class="text-muted text-sm"><b>Cheque No: </b> ${value.cheque_no === null ? '' : value.cheque_no} </p>
                                <p class="text-muted text-sm"><b>Payment Amount: </b> ${value.payment_amount === null ? '' : value.payment_amount} </p>
                                <p class="text-muted text-sm"><b>Digital Payment Type: </b> ${value.digital_payment_type_name === null ? '' : value.digital_payment_type_name} </p>
                                <p class="text-muted text-sm"><b>Approval: </b> ${value.is_approved === null ? '' : value.is_approved} </p>
                            </div>

                        </div>

                </div>
            </div>
        </div>

        `);
                    });


                } else if (res.result == "land_information") {
                    // console.log(res.data);

                    $('#search_data').empty();
                    $.each(res.data, function (key, value) {

                        $('#search_data').append(`

                        <tr>
                            <td> ${value.property_type_name === null ? '' : value.property_type_name} </td>
                            <td> ${value.district_name === null ? '' : value.district_name} </td>
                            <td> ${value.thana_name === null ? '' : value.thana_name} </td>
                            <td> ${value.seller_name === null ? '' : value.seller_name} </td>
                            <td> ${value.buyer_name === null ? '' : value.buyer_name} </td>
                            <td> ${value.cs_khatian === null ? '' : value.cs_khatian} </td>
                            <td> ${value.cs_dag === null ? '' : value.cs_dag} </td>
                            <td> ${value.sa_khatian === null ? '' : value.sa_khatian} </td>
                            <td> ${value.sa_dag === null ? '' : value.sa_dag} </td>
                            <td> ${value.delete_status === 0 ? '<button type="button" class="btn-custom btn-success-custom text-uppercase">Active</button>' : '<button type="button" class="btn-custom btn-warning-custom text-uppercase">Inactive</button>'}</td>
                            <td>
                                <a href="view-land-information/${value.id}"><button class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Details"
                                    ><i class="fas fa-eye"></i></button></a>

                                <a href="edit-land-information/${value.id}"><button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Edit"
                                    ><i class="fas fa-edit"></i></button></a>

                                <button onclick='land_information_delete_after_search(${value.id})' type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i> </button>

                            </td>
                        </tr>


        `);
                    });


                } else if (res.result == "flat_information") {
                    // console.log(res.result);

                    $('#search_data').empty();
                    $.each(res.data, function (key, value) {

                        $('#search_data').append(`

                            <tr>
                                <td> ${value.property_type_name === null ? '' : value.property_type_name} </td>
                                <td> ${value.district_name === null ? '' : value.district_name} </td>
                                <td> ${value.thana_name === null ? '' : value.thana_name} </td>
                                <td> ${value.seller_name === null ? '' : value.seller_name} </td>
                                <td> ${value.buyer_name === null ? '' : value.buyer_name} </td>
                                <td> ${value.cs_khatian === null ? '' : value.cs_khatian} </td>
                                <td> ${value.cs_dag === null ? '' : value.cs_dag} </td>
                                <td> ${value.sa_khatian === null ? '' : value.sa_khatian} </td>
                                <td> ${value.sa_dag === null ? '' : value.sa_dag} </td>
                                <td> ${value.delete_status === 0 ? '<button type="button" class="btn-custom btn-success-custom text-uppercase">Active</button>' : '<button type="button" class="btn-custom btn-warning-custom text-uppercase">Inactive</button>'}</td>
                                <td>
                                    <a href="view-flat-information/${value.id}"><button class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Details"
                                        ><i class="fas fa-eye"></i></button></a>

                                    <a href="edit-flat-information/${value.id}"><button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Edit"
                                        ><i class="fas fa-edit"></i></button></a>

                                    <button onclick='flat_information_delete_after_search(${value.id})' type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i> </button>

                                </td>
                            </tr>


            `);
                    });


                } else if (res.result == "regulatory_compliance") {
                    // console.log(res.data);

                    $('#search_data').empty();
                    $.each(res.data, function (key, value) {

                        $('#search_data').append(`

                                <tr>
                                    <td> ${value.certificates_name === null ? '' : value.certificates_name} </td>
                                    <td> ${value.compliance_category_name === null ? '' : value.compliance_category_name} </td>
                                    <td> ${value.certificates_authority === null ? '' : value.certificates_authority} </td>
                                    <td> ${value.certificates_ministry === null ? '' : value.certificates_ministry} </td>
                                    <td> ${value.certificates_getting_cl_first_date === null ? '' : value.certificates_getting_cl_first_date} </td>
                                    <td> ${value.certificates_expires === null ? '' : value.certificates_expires} </td>
                                    <td> ${value.certificates_renew === null ? '' : value.certificates_renew} </td>
                                    <td> ${value.certificates_special_provision === null ? '' : value.certificates_special_provision} </td>
                                    <td> ${value.certificates_special_remarks === null ? '' : value.certificates_special_remarks} </td>
                                    <td> ${value.delete_status === 0 ? '<button type="button" class="btn-custom btn-success-custom text-uppercase">Active</button>' : '<button type="button" class="btn-custom btn-warning-custom text-uppercase">Inactive</button>'}</td>
                                    <td>
                                        <a href="view-regulatory-compliance/${value.id}"><button class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Details"
                                            ><i class="fas fa-eye"></i></button></a>

                                        <a href="edit-regulatory-compliance/${value.id}"><button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Edit"
                                            ><i class="fas fa-edit"></i></button></a>

                                        <button onclick='regulatory_compliance_delete_after_search(${value.id})' type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i> </button>

                                    </td>
                                </tr>

                `);
                    });


                } else if (res.result == "social_compliance") {

                    console.log(res.data);

                    $('#search_data').empty();
                    $.each(res.data, function (key, value) {

                        $('#search_data').append(`

                                <tr>
                                    <td> ${value.employment_condition === null ? '' : value.employment_condition} </td>
                                    <td> ${value.working_hour_leave === null ? '' : value.working_hour_leave} </td>
                                    <td> ${value.compensation_benefit === null ? '' : value.compensation_benefit} </td>
                                    <td> ${value.hygine_safety === null ? '' : value.hygine_safety} </td>
                                    <td> ${value.welfare_security === null ? '' : value.welfare_security} </td>
                                    <td> ${value.industrial_relation === null ? '' : value.industrial_relation} </td>
                                    <td> ${value.labour_law_safety === null ? '' : value.labour_law_safety} </td>
                                    <td> ${value.bnbc_safety === null ? '' : value.bnbc_safety} </td>
                                    <td> ${value.delete_status === 0 ? '<button type="button" class="btn-custom btn-success-custom text-uppercase">Active</button>' : '<button type="button" class="btn-custom btn-warning-custom text-uppercase">Inactive</button>'}</td>
                                    <td>
                                        <a href="view-social-compliance/${value.id}"><button class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Details"
                                            ><i class="fas fa-eye"></i></button></a>

                                        <a href="edit-social-compliance/${value.id}"><button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Edit"
                                            ><i class="fas fa-edit"></i></button></a>

                                        <button onclick='social_compliance_delete_after_search(${value.id})' type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i> </button>

                                    </td>
                                </tr>

                `);
                    });


                } else if (res.result == "criminal_cases") {

                    // console.log(res);

                    $('#search_data').empty();
                    $.each(res.data, function (key, value) {

                        $('#search_data').append(`

                                <tr>
                                    <td><a href="view-criminal-cases/${value.id}"> ${value.case_no} </a></td>
                                    <td> ${value.subsequent_case_no === null ? '' : value.subsequent_case_no} </td>
                                    <td> ${value.division_name === null ? '' : value.division_name} </td>
                                    <td> ${value.court_name === null ? '' : value.court_name} </td>
                                    <td> ${value.district_name === null ? '' : value.district_name} </td>
                                    <td> ${value.company_name === null ? '' : value.company_name} </td>
                                    <td> ${value.delete_status === 0 ? '<button type="button" class="btn-custom btn-success-custom text-uppercase">Active</button>' : '<button type="button" class="btn-custom btn-warning-custom text-uppercase">Inactive</button>'}</td>
                                    <td>
                                        <a href="view-criminal-cases/${value.id}"><button class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Details"
                                            ><i class="fas fa-eye"></i></button></a>
                                        <a href="add-billing-criminal-cases/${value.id}"><button
                                            class="btn btn-warning btn-sm" data-toggle="tooltip"
                                            data-placement="top" title="Bill Entry"><i class="fas fa-money-bill"></i></button></a>
                                        <a href="edit-criminal-cases/${value.id}"><button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Edit"
                                            ><i class="fas fa-edit"></i></button></a>

                                        <button onclick='criminal_cases_delete_after_search(${value.id})' type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i> </button>

                                    </td>
                                </tr>

                `);
                    });


                } else if (res.result == "labour_cases") {

                    // console.log(res);

                    $('#search_data').empty();
                    $.each(res.data, function (key, value) {

                        $('#search_data').append(`

                                <tr>
                                    <td><a href="view-criminal-cases/${value.id}"> ${value.case_no} </a></td>
                                    <td> ${value.subsequent_case_no === null ? '' : value.subsequent_case_no} </td>
                                    <td> ${value.division_name === null ? '' : value.division_name} </td>
                                    <td> ${value.court_name === null ? '' : value.court_name} </td>
                                    <td> ${value.district_name === null ? '' : value.district_name} </td>
                                    <td> ${value.company_name === null ? '' : value.company_name} </td>
                                    <td> ${value.plaintiff_name === null ? '' : value.plaintiff_name} </td>
                                    <td> ${value.delete_status === 0 ? '<button type="button" class="btn-custom btn-success-custom text-uppercase">Active</button>' : '<button type="button" class="btn-custom btn-warning-custom text-uppercase">Inactive</button>'}</td>
                                    <td>
                                        <a href="view-labour-cases/${value.id}"><button class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Details"
                                            ><i class="fas fa-eye"></i></button></a>
                                        <a href="add-billing-labour-cases/${value.id}"><button
                                            class="btn btn-warning btn-sm" data-toggle="tooltip"
                                            data-placement="top" title="Bill Entry"><i class="fas fa-money-bill"></i></button></a>
                                        <a href="edit-labour-cases/${value.id}"><button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Edit"
                                            ><i class="fas fa-edit"></i></button></a>

                                        <button onclick='labour_cases_delete_after_search(${value.id})' type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i> </button>

                                    </td>
                                </tr>

                `);
                    });


                }else if (res.result == "quassi_judicial_cases") {

                    console.log(res.data);

                    $('#search_data').empty();
                    $.each(res.data, function (key, value) {

                        $('#search_data').append(`

                                <tr>
                                    <td><a href="view-quassi-judicial-cases/${value.id}"> ${value.case_no} </a></td>
                                    <td> ${value.subsequent_case_no === null ? '' : value.subsequent_case_no} </td>
                                    <td> ${value.division_name === null ? '' : value.division_name} </td>
                                    <td> ${value.court_name === null ? '' : value.court_name} </td>
                                    <td> ${value.district_name === null ? '' : value.district_name} </td>
                                    <td> ${value.company_name === null ? '' : value.company_name} </td>
                                    <td> ${value.plaintiff_name === null ? '' : value.plaintiff_name} </td>
                                    <td> ${value.delete_status === 0 ? '<button type="button" class="btn-custom btn-success-custom text-uppercase">Active</button>' : '<button type="button" class="btn-custom btn-warning-custom text-uppercase">Inactive</button>'}</td>
                                    <td>
                                        <a href="view-quassi-judicial-cases/${value.id}"><button class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Details"
                                            ><i class="fas fa-eye"></i></button></a>
                                        <a href="add-billing-quassi-judicial-cases/${value.id}"><button
                                            class="btn btn-warning btn-sm" data-toggle="tooltip"
                                            data-placement="top" title="Bill Entry"><i class="fas fa-money-bill"></i></button></a>
                                        <a href="edit-quassi-judicial-cases/${value.id}"><button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Edit"
                                            ><i class="fas fa-edit"></i></button></a>

                                        <button onclick='quassi_judicial_cases_delete_after_search(${value.id})' type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i> </button>

                                    </td>
                                </tr>

                `);
                    });


                }else if (res.result == "high_court_cases") {

                    // console.log(res.data);

                    $('#search_data').empty();
                    $.each(res.data, function (key, value) {

                        $('#search_data').append(`

                                <tr>

                                    <td><a href="view-high-court-cases/${value.id}"> ${value.case_no_hcd} </a></td>
                                    <td> ${value.tender_no === null ? '' : value.tender_no} </td>
                                    <td> ${value.tender_no_date === null ? '' : value.tender_no_date} </td>
                                    <td> ${value.supreme_court_category === null ? '' : value.supreme_court_category} </td>
                                    <td> ${value.supreme_court_subcategory === null ? '' : value.supreme_court_subcategory} </td>
                                    <td> ${value.date_of_filing_hcd === null ? '' : value.date_of_filing_hcd} </td>
                                    <td> ${value.order === null ? '' : value.order} </td>
                                    <td> ${value.delete_status === 0 ? '<button type="button" class="btn-custom btn-success-custom text-uppercase">Active</button>' : '<button type="button" class="btn-custom btn-warning-custom text-uppercase">Inactive</button>'}</td>
                                    <td>
                                        <a href="view-high-court-cases/${value.id}"><button class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Details"
                                            ><i class="fas fa-eye"></i></button></a>
                                        <a href="add-billing-high-court-cases/${value.id}"><button
                                            class="btn btn-warning btn-sm" data-toggle="tooltip"
                                            data-placement="top" title="Bill Entry"><i class="fas fa-money-bill"></i></button></a>
                                        <a href="edit-high-court-cases/${value.id}"><button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Edit"
                                            ><i class="fas fa-edit"></i></button></a>

                                        <button onclick='high_court_cases_delete_after_search(${value.id})' type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i> </button>

                                    </td>
                                </tr>

                `);
                    });


                } else {
                    $('#search_data').empty();
                    $.each(res, function (key, value) {

                        $('#search_data').append(`

                            <tr>
                                <td>
                                     <a href="view-civil-cases/${value.id}"> ${value.case_no} </a>
                                </td>
                                <td>
                                    ${value.name_of_suit === null ? '' : value.name_of_suit}
                                </td>
                                <td>
                                    ${value.division_name === null ? '' : value.division_name}

                                </td>
                                <td>
                                    ${value.court_name === null ? '' : value.court_name}
                                </td>
                                <td>
                                    ${value.district_name === null ? '' : value.district_name}

                                </td>

                                <td>
                                    ${value.company_name === null ? '' : value.company_name}

                                </td>

                                <td>
                                    ${value.plaintiff_name === null ? '' : value.plaintiff_name}

                                </td>
                                <td>
                                    ${value.defendent_name === null ? '' : value.defendent_name}

                                </td>
                                <td>
                                   ${value.delete_status === 0 ? '<button type="button" class="btn-custom btn-success-custom text-uppercase">Active</button>' : '<button type="button" class="btn-custom btn-warning-custom text-uppercase">Inactive</button>'}
                                </td>

                                <td>
                                    ${value.delete_status === 0 ? `
                                    <a href="view-civil-cases/${value.id}"><button class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Details"
                                        ><i class="fas fa-eye"></i></button></a>
                                    <a href="add-billing-civil-cases/${value.id}"><button
                                                        class="btn btn-warning btn-sm" data-toggle="tooltip"
                                                        data-placement="top" title="Bill Entry"><i class="fas fa-money-bill"></i></button></a>
                                    <a href="edit-civil-cases/${value.id}"><button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Edit"
                                        ><i class="fas fa-edit"></i></button></a>

                                    <button onclick='delete_after_search(${value.id})' type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i> </button>` : `<button onclick='retrive_after_search(${value.id})' type="submit" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Retrive"><i class="fas fa-recycle"></i></button>` }

                                </td>


                            </tr>


                    `);
                    });
                }

                // console.log(res);
            },
            error: function (res) {
                console.log(res);
            }

        })


    })


    $("#payment_type").change(function () {

        var payment_type = $(this).val();

        if (payment_type == "Cash Payment") {

            $("#bank").hide();
            $("#branch").hide();
            $("#cheque").hide();
            $("#digital_payment_type").hide();

        } else if (payment_type == "Bank Payment") {

            $("#bank").show();
            $("#branch").show();
            $("#cheque").show();
            $("#digital_payment_type").hide();

        } else if (payment_type == "Digital Payment") {

            $("#bank").hide();
            $("#branch").hide();
            $("#cheque").hide();
            $("#digital_payment_type").show();

        }

    });


    $('#image').change(function () {

        let reader = new FileReader();
        reader.onload = (e) => {
            $('#preview-image').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);

    });


    $('#seller_id').on('change', function () {
        var seller_id = $(this).val();
        var route = $(this).attr('action');
        // alert(route);
        if (seller_id) {
            $.ajax({
                url: route,
                type: "GET",
                data: {"_token": "{{ csrf_token() }}", seller_id: seller_id},
                dataType: "json",
                success: function (data) {
                    console.log(data);
                    if (data) {
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

                    } else {
                        $('#seller_details').empty();
                    }
                }
            });
        } else {
            $('#seller_details').empty();
        }
    });


    $('#buyer_id').on('change', function () {
        var buyer_id = $(this).val();
        var route = $(this).attr('action');
        // alert(route);
        if (buyer_id) {
            $.ajax({
                url: route,
                type: "GET",
                data: {"_token": "{{ csrf_token() }}", buyer_id: buyer_id},
                dataType: "json",
                success: function (data) {
                    console.log(data);
                    if (data) {
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

                    } else {
                        $('#buyer_details').empty();
                    }
                }
            });
        } else {
            $('#buyer_details').empty();
        }
    });


    $("#land_compliance").on('click', function () {

        $("#compliance_input").toggle();

    });


    $('#floor_id').on('change', function () {
        var floor_id = $(this).val();
        var route = $(this).attr('action');
        // alert(route);
        if (floor_id) {
            $.ajax({
                url: route,
                type: "GET",
                data: {"_token": "{{ csrf_token() }}", floor_id: floor_id},
                dataType: "json",
                success: function (data) {
                    // console.log(data);
                    if (data) {
                        $('#flat_number_id').empty();
                        $('#flat_number_id').focus;
                        $('#flat_number_id').append('<option value="">Select</option>');
                        $.each(data, function (key, value) {
                            $('select[name="flat_number_id"]').append('<option value="' + value.id + '">' + value.flat_number + '</option>');
                        });
                    } else {
                        $('#flat_number_id').empty();
                    }
                }
            });
        } else {
            $('#flat_number_id').empty();
            $('#flat_number_id').append('<option value="">Select</option>');

        }
    });

    $('#document_type').on('change', function () {

        var document_type = $(this).val();

        if (document_type == "Internal Files") {
            // alert('asdfasdfa');
            $('.module').show();
            $('.external_file_name').hide();
        } else {
            // alert('files');
            $('.module').hide();
            $('.external_file_name').show();

        }

    });

    $('#module').on('change', function () {
        // alert('asdfasdf');

        var module = $(this).val();
        // alert(module);
        if (module == "Admin Setup") {
            $('.setup').show();
            $('.cases').hide();
            $('.property_management').hide();

        } else if (module == "Litigation Mangement") {

            $('.setup').hide();
            $('.cases').show();
            $('.property_management').hide();

        } else {
            $('.setup').hide();
            $('.cases').hide();
            $('.property_management').show();
        }
    });

    $('#admin_setup').on('change', function () {

        var admin_setup = $(this).val();
        var route = $(this).attr('action');

        $('.p_management_d').hide();
        $('.litigation_management_d').hide();
        $('.admin_setup_d').show();

        if (admin_setup) {
            // alert('ic')
            if (admin_setup) {
                $.ajax({
                    url: route,
                    type: "GET",
                    data: {"_token": "{{ csrf_token() }}", admin_setup: admin_setup},
                    dataType: "json",
                    success: function (data) {
                        console.log(data);
                        if (data) {
                            $('#admin_setup_data').empty();
                            $('#admin_setup_data').focus;
                            $('#admin_setup_data').append('<option value="">Select</option>');
                            $.each(data, function (key, value) {
                                $('select[name="admin_setup_data"]').append('<option value="' + value.id + '">' + value.first_name + ' ' + value.middle_name + ' ' + value.last_name + '</option>');
                            });
                        } else {
                            $('#admin_setup_data').empty();
                        }
                    }
                });
            } else {
                $('#admin_setup_data').empty();
                $('#admin_setup_data').append('<option value="">Select</option>');
            }
        }
    });

    $('#litigation_m').on('change', function () {

        var litigation_cases = $(this).val();
        var route = $(this).attr('action');

        $('.p_management_d').hide();
        $('.litigation_management_d').show();
        $('.admin_setup_d').hide();

        if (litigation_cases) {
            // alert('ic')
            if (litigation_cases) {
                $.ajax({
                    url: route,
                    type: "GET",
                    data: {"_token": "{{ csrf_token() }}", litigation_cases: litigation_cases},
                    dataType: "json",
                    success: function (data) {
                        console.log(data);
                        if (data) {
                            $('#litagation_cases').empty();
                            $('#litagation_cases').focus;
                            $('#litagation_cases').append('<option value="">Select</option>');
                            $.each(data, function (key, value) {
                                $('select[name="litagation_cases"]').append('<option value="' + value.id + '">' + value.case_no + '</option>');
                            });
                        } else {
                            $('#litagation_cases').empty();
                        }
                    }
                });
            } else {
                $('#litagation_cases').empty();
                $('#litagation_cases').append('<option value="">Select</option>');
            }
        }
    });

    $('#property_management').on('change', function () {

        var property_management = $(this).val();
        var route = $(this).attr('action');

        $('.p_management_d').show();
        $('.litigation_management_d').hide();
        $('.admin_setup_d').hide();

        if (property_management) {
            // alert('ic')
            if (property_management) {
                $.ajax({
                    url: route,
                    type: "GET",
                    data: {"_token": "{{ csrf_token() }}", property_management: property_management},
                    dataType: "json",
                    success: function (data) {
                        console.log(data);
                        if (data) {
                            $('#p_management').empty();
                            $('#p_management').focus;
                            $('#p_management').append('<option value="">Select</option>');
                            $.each(data, function (key, value) {
                                $('select[name="p_management"]').append('<option value="' + value.id + '">' + value.id + ' ' + value.cs_khatian + ' ' + value.cs_dag + '</option>');
                            });
                        } else {
                            $('#p_management').empty();
                        }
                    }
                });
            } else {
                $('#p_management').empty();
                $('#p_management').append('<option value="">Select</option>');
            }
        }
    });

    $("#supreme_court_type").on('change', function () {
        // alert('adsf asdf');
        var route = $(this).val();
        // alert(route);


    })


    $('#supreme_court_type').on('change', function () {
        var supreme_court_type = $(this).val();
        var route = $(this).attr('action');
        // alert(supreme_court_type);
        if (supreme_court_type) {
            $.ajax({
                url: route,
                type: "GET",
                data: {"_token": "{{ csrf_token() }}", supreme_court_type: supreme_court_type},
                dataType: "json",
                success: function (data) {
                    // console.log(data);
                    if (data) {
                        $('#supreme_court_category_id').empty();
                        $('#supreme_court_category_id').focus;
                        $('#supreme_court_category_id').append('<option value="">Select</option>');
                        $.each(data, function (key, value) {
                            $('select[name="supreme_court_category_id"]').append('<option value="' + value.id + '">' + value.supreme_court_category + '</option>');
                        });
                    } else {
                        $('#supreme_court_category_id').empty();
                    }
                }
            });
        } else {
            $('#supreme_court_category_id').empty();
            $('#supreme_court_category_id').append('<option value="">Select</option>');
        }
    });

    $("#lower_court").on('click', function () {
        // alert('asdfw wer asdf');

        $("#lower_court_info").toggle();

    });


    $('#supreme_court_category_id').on('change', function () {
        var supreme_court_category_id = $(this).val();
        var route = $(this).attr('action');
        // alert(supreme_court_category_id);
        if (supreme_court_category_id) {
            $.ajax({
                url: route,
                type: "GET",
                data: {"_token": "{{ csrf_token() }}", supreme_court_category_id: supreme_court_category_id},
                dataType: "json",
                success: function (data) {
                    // console.log(data);
                    if (data) {
                        $('#supreme_court_subcategory_id').empty();
                        $('#supreme_court_subcategory_id').focus;
                        $('#supreme_court_subcategory_id').append('<option value="">Select</option>');
                        $.each(data, function (key, value) {
                            $('select[name="supreme_court_subcategory_id"]').append('<option value="' + value.id + '">' + value.supreme_court_subcategory + '</option>');
                        });
                    } else {
                        $('#supreme_court_subcategory_id').empty();
                    }
                }
            });
        } else {
            $('#supreme_court_subcategory_id').empty();
            $('#supreme_court_subcategory_id').append('<option value="">Select</option>');
        }
    });


});

