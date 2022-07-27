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
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
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

    $(".btn_success_court_name").click(function () {
        var lsthmtl_court_name = $(".clone_court_name").html();
        $(".increment_court_name").after(lsthmtl_court_name);
    });
    $("body").on("click", ".btn_danger_court_name", function () {
        $(this).parents(".hdtuto_court_name").remove();
    });

    $(".btn_success_law").click(function () {
        var lsthmtl_law = $(".clone_law").html();
        $(".increment_law").after(lsthmtl_law);
    });
    $("body").on("click", ".btn_danger_law", function () {
        $(this).parents(".hdtuto_law").remove();
    });

    $(".btn_success_files").click(function () {
        var lsthmtl_files = $(".clone_files").html();
        $(".increment_files").after(lsthmtl_files);
    });
    $("body").on("click", ".btn_danger_files", function () {
        $(this).parents(".hdtuto_files").remove();
    });

    $(".btn_success_section").click(function () {
        var lsthmtl_section = $(".clone_section").html();
        $(".increment_section").after(lsthmtl_section);
    });
    $("body").on("click", ".btn_danger_section", function () {
        $(this).parents(".hdtuto_section").remove();
    });

    $(".btn_success_complainant").click(function () {
        var lsthmtl_complainant = $(".clone_complainant").html();
        $(".increment_complainant").after(lsthmtl_complainant);
    });
    $("body").on("click", ".btn_danger_complainant", function () {
        $(this).parents(".hdtuto_complainant").remove();
    });

    $(".btn_success_complainant_representative").click(function () {
        var lsthmtl_complainant_representative = $(".clone_complainant_representative").html();
        $(".increment_complainant_representative").after(lsthmtl_complainant_representative);
    });
    $("body").on("click", ".btn_danger_complainant_representative", function () {
        $(this).parents(".hdtuto_complainant_representative").remove();
    });

    $(".btn_success_accused").click(function () {
        var lsthmtl_accused = $(".clone_accused").html();
        $(".increment_accused").after(lsthmtl_accused);
    });
    $("body").on("click", ".btn_danger_accused", function () {
        $(this).parents(".hdtuto_accused").remove();
    });

    $(".btn_success_accused_representative").click(function () {
        var lsthmtl_accused_representative = $(".clone_accused_representative").html();
        $(".increment_accused_representative").after(lsthmtl_accused_representative);
    });
    $("body").on("click", ".btn_danger_accused_representative", function () {
        $(this).parents(".hdtuto_accused_representative").remove();
    });

    $(".btn_success_case_infos_case_no").click(function () {
        var lsthmtl_case_infos_case_no = $(".clone_case_infos_case_no").html();
        $(".increment_case_infos_case_no").after(lsthmtl_case_infos_case_no);
    });
    $("body").on("click", ".btn_danger_case_infos_case_no", function () {
        $(this).parents(".hdtuto_case_infos_case_no").remove();
    });

    $(".btn_success_assigned_lawyer").click(function () {
        var lsthmtl_assigned_lawyer = $(".clone_assigned_lawyer").html();
        $(".increment_assigned_lawyer").after(lsthmtl_assigned_lawyer);
    });
    $("body").on("click", ".btn_danger_assigned_lawyer", function () {
        $(this).parents(".hdtuto_assigned_lawyer").remove();
    });

    $(".btn_success_client").click(function () {
        var lsthmtl_client = $(".clone_client").html();
        $(".increment_client").after(lsthmtl_client);
    });
    $("body").on("click", ".btn_danger_client", function () {
        $(this).parents(".hdtuto_client").remove();
    });

    $(".btn_success_opposition").click(function () {
        var lsthmtl_opposition = $(".clone_opposition").html();
        $(".increment_opposition").after(lsthmtl_opposition);
    });
    $("body").on("click", ".btn_danger_opposition", function () {
        $(this).parents(".hdtuto_opposition").remove();
    });

    $(".btn_success_case_infos_sub_seq_case_no").click(function () {
        var lsthmtl_case_infos_sub_seq_case_no = $(".clone_case_infos_sub_seq_case_no").html();
        $(".increment_case_infos_sub_seq_case_no").after(lsthmtl_case_infos_sub_seq_case_no);
    });
    $("body").on("click", ".btn_danger_case_infos_sub_seq_case_no", function () {
        $(this).parents(".hdtuto_case_infos_sub_seq_case_no").remove();
    });

    $(".btn_success_received_documents").click(function () {
        var lsthmtl_received_documents = $(".clone_received_documents").html();
        $(".increment_received_documents").after(lsthmtl_received_documents);
    });
    $("body").on("click", ".btn_danger_received_documents", function () {
        $(this).parents(".hdtuto_received_documents").remove();
    });

    $(".btn_success_letter_notice").click(function () {
        var lsthmtl_letter_notice = $(".clone_letter_notice").html();
        $(".increment_letter_notice").after(lsthmtl_letter_notice);
    });
    $("body").on("click", ".btn_danger_letter_notice", function () {
        $(this).parents(".hdtuto_letter_notice").remove();
    });


    $(".btn_success_required_wanting_documents").click(function () {
        var lsthmtl_required_wanting_documents = $(".clone_required_wanting_documents").html();
        $(".increment_required_wanting_documents").after(lsthmtl_required_wanting_documents);
    });
    $("body").on("click", ".btn_danger_required_wanting_documents", function () {
        $(this).parents(".hdtuto_required_wanting_documents").remove();
    });

    $(".btn_success_court_short").click(function () {
        var lsthmtl_court_short = $(".clone_court_short").html();
        $(".increment_court_short").after(lsthmtl_court_short);
    });
    $("body").on("click", ".btn_danger_court_short", function () {
        $(this).parents(".hdtuto_court_short").remove();
    });

    $(".btn_success_sub_seq_court_short").click(function () {
        var lsthmtl_sub_seq_court_short = $(".clone_sub_seq_court_short").html();
        $(".increment_sub_seq_court_short").after(lsthmtl_sub_seq_court_short);
    });
    $("body").on("click", ".btn_danger_sub_seq_court_short", function () {
        $(this).parents(".hdtuto_sub_seq_court_short").remove();
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
                                   <td> ${value.id === null ? '' : value.id} </td>
                                   <td> ${value.case_status_name === null ? '' : value.case_status_name} </td>
                                   <td> ${value.next_date_reason_name === null ? '' : value.next_date_reason_name} </td>
                                   <td> <a href="view-criminal-cases/${value.id}"> ${value.case_no} </a> </td>
                                    <td> ${value.court_name === null ? '' : value.court_name}</td>
                                    <td> ${value.district_name === null ? '' : value.district_name} </td>
                                    <td> ${value.complainant_informant_name ? '' : value.complainant_informant_name} </td>
                                    <td> ${value.accused_name === null ? '' : value.accused_name} </td>
                                    <td> ${value.case_types_name === null ? '' : value.case_types_name} </td>
                                    <td> ${value.allegation_name === null ? '' : value.allegation_name} ${value.case_infos_allegation_claim_write === null ? '' : value.case_infos_allegation_claim_write} </td>
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
                                    <td><a href="view-labour-cases/${value.id}"> ${value.case_no} </a></td>
                                    <td> ${value.case_year === null ? '' : value.case_year} </td>
                                    <td> ${value.alligation === null ? '' : value.alligation} </td>
                                    <td> ${value.amount === null ? '' : value.amount} </td>
                                    <td> ${value.name_of_the_first_party === null ? '' : value.name_of_the_first_party} </td>
                                    <td> ${value.second_party_name === null ? '' : value.second_party_name} </td>
                                    <td> ${value.case_notes === null ? '' : value.case_notes} </td>
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


                } else if (res.result == "quassi_judicial_cases") {

                    // console.log(res.data);

                    $('#search_data').empty();
                    $.each(res.data, function (key, value) {

                        $('#search_data').append(`

                                <tr>
                                    <td><a href="view-quassi-judicial-cases/${value.id}"> ${value.case_no} </a></td>
                                    <td> ${value.case_year === null ? '' : value.case_year} </td>
                                    <td> ${value.alligation === null ? '' : value.alligation} </td>
                                    <td> ${value.amount === null ? '' : value.amount} </td>
                                    <td> ${value.name_of_the_complainant === null ? '' : value.name_of_the_complainant} </td>
                                    <td> ${value.opposite_party_name === null ? '' : value.opposite_party_name} </td>
                                    <td> ${value.case_notes === null ? '' : value.case_notes} </td>
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


                } else if (res.result == "high_court_cases") {

                    // console.log(res.data);

                    $('#search_data').empty();
                    $.each(res.data, function (key, value) {

                        $('#search_data').append(`

                                <tr>

                                    <td><a href="view-high-court-cases/${value.id}"> ${value.case_no_hcd === null ? '' : value.case_no_hcd} </a></td>
                                    <td> ${value.tender_no === null ? '' : value.tender_no} </td>
                                    <td> ${value.tender_no_date === null ? '' : value.tender_no_date} </td>
                                    <td> ${value.case_category === null ? '' : value.case_category} </td>
                                    <td> ${value.case_subcategory === null ? '' : value.case_subcategory} </td>
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


                } else if (res.result == "appellate_court_cases") {

                    console.log(res.data);

                    $('#search_data').empty();
                    $.each(res.data, function (key, value) {

                        $('#search_data').append(`

                                <tr>

                                    <td><a href="view-appellate-court-cases/${value.id}"> ${value.case_no_acd === null ? '' : value.case_no_acd} </a></td>
                                    <td> ${value.tender_no === null ? '' : value.tender_no} </td>
                                    <td> ${value.tender_no_date === null ? '' : value.tender_no_date} </td>
                                    <td> ${value.case_category === null ? '' : value.case_category} </td>
                                    <td> ${value.case_subcategory === null ? '' : value.case_subcategory} </td>
                                    <td> ${value.order === null ? '' : value.order} </td>
                                    <td> ${value.delete_status === 0 ? '<button type="button" class="btn-custom btn-success-custom text-uppercase">Active</button>' : '<button type="button" class="btn-custom btn-warning-custom text-uppercase">Inactive</button>'}</td>
                                    <td>
                                        <a href="view-appellate-court-cases/${value.id}"><button class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Details"
                                            ><i class="fas fa-eye"></i></button></a>
                                        <a href="add-billing-appellate-court-cases/${value.id}"><button
                                            class="btn btn-warning btn-sm" data-toggle="tooltip"
                                            data-placement="top" title="Bill Entry"><i class="fas fa-money-bill"></i></button></a>
                                        <a href="edit-appellate-court-cases/${value.id}"><button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Edit"
                                            ><i class="fas fa-edit"></i></button></a>

                                        <button onclick='appellate_court_cases_delete_after_search(${value.id})' type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i> </button>

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
                                    ${value.case_year === null ? '' : value.case_year}
                                </td>
                                <td>
                                    ${value.ref_no === null ? '' : value.ref_no}
                                </td>
                                <td>
                                    ${value.amount === null ? '' : value.amount}
                                </td>
                                <td>
                                    ${value.location === null ? '' : value.location}
                                </td>
                                <td>
                                    ${value.plaintiff_name === null ? '' : value.plaintiff_name}
                                </td>
                                <td>
                                    ${value.defendant_name === null ? '' : value.defendant_name}
                                </td>
                                <td>
                                   ${value.delete_status === 0 ? '<button type="button" class="btn-custom btn-success-custom text-uppercase">Active</button>' : '<button type="button" class="btn-custom btn-warning-custom text-uppercase">Inactive</button>'}
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


    $('#case_class_id').on('change', function () {
        var case_class_id = $(this).val();
        var route = $(this).attr('action');
        // alert(case_class_id);
        if (case_class_id) {
            $.ajax({
                url: route,
                type: "GET",
                data: {"_token": "{{ csrf_token() }}", case_class_id: case_class_id},
                dataType: "json",
                success: function (data) {
                    // console.log(data);
                    if (data) {
                        $('#case_category_id').empty();
                        $('#case_category_id').focus;
                        $('#case_category_id').append('<option value="">Select</option>');
                        $.each(data, function (key, value) {
                            $('select[name="case_category_id"]').append('<option value="' + value.id + '">' + value.case_category + '</option>');
                        });
                    } else {
                        $('#case_category_id').empty();
                    }
                }
            });
        } else {
            $('#case_category_id').empty();
            $('#case_category_id').append('<option value="">Select</option>');
        }
    });

    $("#lower_court").on('click', function () {
        // alert('asdfw wer asdf');

        $(".lower_court_info").toggle();

    });


    $('#case_category_id').on('change', function () {
        var case_category_id = $(this).val();
        var route = $(this).attr('action');
        // alert(case_category_id);
        if (case_category_id) {
            $.ajax({
                url: route,
                type: "GET",
                data: {"_token": "{{ csrf_token() }}", case_category_id: case_category_id},
                dataType: "json",
                success: function (data) {
                    // console.log(data);
                    if (data.case_types) {
                        $('#case_type_id').empty();
                        $('#case_type_id').focus;
                        $('#case_type_id').append('<option value="">Select</option>');
                        $.each(data.case_types, function (key, value) {
                            $('select[name="case_type_id"]').append('<option value="' + value.id + '">' + value.case_types_name + '</option>');
                        });
                    } else {
                        $('#case_type_id').empty();
                    }

                    if (data.case_matter) {
                        $('#matter_id').empty();
                        $('#matter_id').focus;
                        $('#matter_id').append('<option value="">Select</option>');
                        $.each(data.case_matter, function (key, value) {
                            $('select[name="matter_id"]').append('<option value="' + value.id + '">' + value.matter_name + '</option>');
                        });
                    } else {
                        $('#matter_id').empty();
                    }

                }
            });
        } else {
            $('#case_type_id').empty();
            $('#case_type_id').append('<option value="">Select</option>');

            $('#matter_id').empty();
            $('#matter_id').append('<option value="">Select</option>');

        }
    });

    $('#client_category_id').on('change', function () {
        var client_category_id = $(this).val();
        var route = $(this).attr('action');
        // alert(route);
        if (client_category_id) {
            $.ajax({
                url: route,
                type: "GET",
                data: {"_token": "{{ csrf_token() }}", client_category_id: client_category_id},
                dataType: "json",
                success: function (data) {
                    // console.log(data);
                    if (data) {
                        $('#client_subcategory_id').empty();
                        $('#client_subcategory_id').focus;
                        $('#client_subcategory_id').append('<option value="">Select</option>');
                        $.each(data, function (key, value) {
                            $('select[name="client_subcategory_id"]').append('<option value="' + value.id + '">' + value.client_subcategory_name + '</option>');
                        });
                    } else {
                        $('#client_subcategory_id').empty();
                    }
                }
            });
        } else {
            $('#client_subcategory_id').empty();
            $('#client_subcategory_id').append('<option value="">Select</option>');
        }
    });


    $("#appeal_case").on('click', function () {

        $(".appeal_case_info").toggle();
        $(".original_case").hide();

    });

    $("#revision_case").on('click', function () {

        $(".revision_case_info").toggle();
        $(".original_case").hide();

    });

    $("#original_case").on('click', function () {
        $(".original_case").show();
        $(".appeal_case_info").hide();
        $(".revision_case_info").hide();

    });


    $('#client_division_id').on('change', function () {
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
                        $('#client_district_id').empty();
                        $('#client_district_id').focus;
                        $('#client_district_id').append('<option value="">Select</option>');
                        $.each(data, function (key, value) {
                            $('select[name="client_district_id"]').append('<option value="' + value.id + '">' + value.district_name + '</option>');
                        });
                    } else {
                        $('#client_district_id').empty();
                    }
                }
            });
        } else {
            $('#client_district_id').empty();
            $('#client_district_id').append('<option value="">Select</option>');
        }
    });

    $('#client_district_id').on('change', function () {
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
                        $('#client_thana_id').empty();
                        $('#client_thana_id').focus;
                        $('#client_thana_id').append('<option value="">Select</option>');
                        $.each(data, function (key, value) {
                            $('select[name="client_thana_id"]').append('<option value="' + value.id + '">' + value.thana_name + '</option>');
                        });
                    } else {
                        $('#client_thana_id').empty();
                    }
                }
            });
        } else {
            $('#client_thana_id').empty();
            $('#client_thana_id').append('<option value="">Select</option>');

        }
    });


    $('#case_infos_division_id').on('change', function () {
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
                        $('#case_infos_district_id').empty();
                        $('#case_infos_district_id').focus;
                        $('#case_infos_district_id').append('<option value="">Select</option>');
                        $.each(data, function (key, value) {
                            $('select[name="case_infos_district_id"]').append('<option value="' + value.id + '">' + value.district_name + '</option>');
                        });
                    } else {
                        $('#case_infos_district_id').empty();
                    }
                }
            });
        } else {
            $('#case_infos_district_id').empty();
            $('#case_infos_district_id').append('<option value="">Select</option>');
        }
    });

    $('#case_infos_district_id').on('change', function () {
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
                    if (data.thana) {
                        $('#case_infos_thana_id').empty();
                        $('#case_infos_thana_id').focus;
                        $('#case_infos_thana_id').append('<option value="">Select</option>');
                        $.each(data.thana, function (key, value) {
                            $('select[name="case_infos_thana_id"]').append('<option value="' + value.id + '">' + value.thana_name + '</option>');
                        });
                    } else {
                        $('#case_infos_thana_id').empty();
                    }

                    if (data.court) {
                        $('#case_infos_court_id').empty();
                        $('#case_infos_court_short_id').empty();
                        $('#case_infos_sub_seq_court_id').empty();
                        $('#case_infos_sub_seq_court_short_id').empty();
                        
                        
                        $('#case_infos_court_id').focus;
                        $('#case_infos_court_short_id').focus;
                        $('#case_infos_sub_seq_court_id').focus;
                        $('#case_infos_sub_seq_court_short_id').focus;

                        $('#case_infos_court_id').append('<option value="">Select</option>');
                        $('#case_infos_court_short_id').append('<option value="">Select</option>');
                        $('#case_infos_sub_seq_court_id').append('<option value="">Select</option>');
                        $('#case_infos_sub_seq_court_short_id').append('<option value="">Select</option>');

                        $.each(data.court, function (key, value) {
                            $('select[name="case_infos_court_id[]"]').append('<option value="' + value.court_name + '">' + value.court_name + '</option>');
                            $('select[name="case_infos_court_short_id[]"]').append('<option value="' + value.court_short_name + '">' + value.court_short_name + '</option>');
                            $('select[name="case_infos_sub_seq_court_id[]"]').append('<option value="' + value.court_name + '">' + value.court_name + '</option>');
                            $('select[name="case_infos_sub_seq_court_short_id[]"]').append('<option value="' + value.court_short_name + '">' + value.court_short_name + '</option>');
                        });
                    } else {
                        $('#case_infos_court_id').empty();
                        $('#case_infos_court_short_id').empty();
                        $('#case_infos_sub_seq_court_id').empty();
                        $('#case_infos_sub_seq_court_short_id').empty();
                    }
                    
                }
            });
        } else {
            $('#case_infos_thana_id').empty();
            $('#case_infos_thana_id').append('<option value="">Select</option>');

            $('#case_infos_court_id').empty();
            $('#case_infos_court_id').append('<option value="">Select</option>');

            $('#case_infos_court_short_id').empty();
            $('#case_infos_court_short_id').append('<option value="">Select</option>');

            $('#case_infos_sub_seq_court_id').empty();
            $('#case_infos_sub_seq_court_id').append('<option value="">Select</option>');

            $('#case_infos_sub_seq_court_short_id').empty();
            $('#case_infos_sub_seq_court_short_id').append('<option value="">Select</option>');

        }
    });


    $('#appeal_case_category_id').on('change', function () {
        var case_category_id = $(this).val();
        var route = $(this).attr('action');
        // alert(case_category_id);
        if (case_category_id) {
            $.ajax({
                url: route,
                type: "GET",
                data: {"_token": "{{ csrf_token() }}", case_category_id: case_category_id},
                dataType: "json",
                success: function (data) {
                    // console.log(data);
                    if (data) {
                        $('#appeal_case_subcategory_id').empty();
                        $('#appeal_case_subcategory_id').focus;
                        $('#appeal_case_subcategory_id').append('<option value="">Select</option>');
                        $.each(data, function (key, value) {
                            $('select[name="appeal_case_subcategory_id"]').append('<option value="' + value.id + '">' + value.case_subcategory + '</option>');
                        });
                    } else {
                        $('#appeal_case_subcategory_id').empty();
                    }
                }
            });
        } else {
            $('#appeal_case_subcategory_id').empty();
            $('#appeal_case_subcategory_id').append('<option value="">Select</option>');
        }
    });


    $('#revision_appeal_case_category_id').on('change', function () {
        var case_category_id = $(this).val();
        var route = $(this).attr('action');
        // alert(case_category_id);
        if (case_category_id) {
            $.ajax({
                url: route,
                type: "GET",
                data: {"_token": "{{ csrf_token() }}", case_category_id: case_category_id},
                dataType: "json",
                success: function (data) {
                    // console.log(data);
                    if (data) {
                        $('#revision_case_subcategory_id').empty();
                        $('#revision_case_subcategory_id').focus;
                        $('#revision_case_subcategory_id').append('<option value="">Select</option>');
                        $.each(data, function (key, value) {
                            $('select[name="revision_case_subcategory_id"]').append('<option value="' + value.id + '">' + value.case_subcategory + '</option>');
                        });
                    } else {
                        $('#revision_case_subcategory_id').empty();
                    }
                }
            });
        } else {
            $('#revision_case_subcategory_id').empty();
            $('#revision_case_subcategory_id').append('<option value="">Select</option>');
        }
    });



    $('#opposition_division_id').on('change', function () {
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
                        $('#opposition_district_id').empty();
                        $('#opposition_district_id').focus;
                        $('#opposition_district_id').append('<option value="">Select</option>');
                        $.each(data, function (key, value) {
                            $('select[name="opposition_district_id"]').append('<option value="' + value.id + '">' + value.district_name + '</option>');
                        });
                    } else {
                        $('#opposition_district_id').empty();
                    }
                }
            });
        } else {
            $('#opposition_district_id').empty();
            $('#opposition_district_id').append('<option value="">Select</option>');
        }
    });

    $('#opposition_district_id').on('change', function () {
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
                        $('#opposition_thana_id').empty();
                        $('#opposition_thana_id').focus;
                        $('#opposition_thana_id').append('<option value="">Select</option>');
                        $.each(data, function (key, value) {
                            $('select[name="opposition_thana_id"]').append('<option value="' + value.id + '">' + value.thana_name + '</option>');
                        });
                    } else {
                        $('#opposition_thana_id').empty();
                    }
                }
            });
        } else {
            $('#opposition_thana_id').empty();
            $('#opposition_thana_id').append('<option value="">Select</option>');

        }
    });




    $('#opposition_category_id').on('change', function () {
        var client_category_id = $(this).val();
        var route = $(this).attr('action');
        // alert(route);
        if (client_category_id) {
            $.ajax({
                url: route,
                type: "GET",
                data: {"_token": "{{ csrf_token() }}", client_category_id: client_category_id},
                dataType: "json",
                success: function (data) {
                    // console.log(data);
                    if (data) {
                        $('#opposition_subcategory_id').empty();
                        $('#opposition_subcategory_id').focus;
                        $('#opposition_subcategory_id').append('<option value="">Select</option>');
                        $.each(data, function (key, value) {
                            $('select[name="opposition_subcategory_id"]').append('<option value="' + value.id + '">' + value.client_subcategory_name + '</option>');
                        });
                    } else {
                        $('#opposition_subcategory_id').empty();
                    }
                }
            });
        } else {
            $('#opposition_subcategory_id').empty();
            $('#opposition_subcategory_id').append('<option value="">Select</option>');
        }
    });


    $('#lawyer_advocate_id').on('change', function () {
        var external_council_name_id = $(this).val();
        var route = $(this).attr('action');
        // alert(external_council_name_id);
        if (external_council_name_id) {
            $.ajax({
                url: route,
                type: "GET",
                data: {"_token": "{{ csrf_token() }}", external_council_name_id: external_council_name_id},
                dataType: "json",
                success: function (data) {
                    // console.log(data);
                    if (data) {
                        $('#assigned_lawyer_id').empty();
                        $('#assigned_lawyer_id').focus;
                        $('#assigned_lawyer_id').append('<option value="">Select</option>');
                        $.each(data, function (key, value) {
                            $('select[name="assigned_lawyer_id[]"]').append('<option value="'+value.first_name+' '+value.last_name+'">' + value.first_name + ' ' + value.last_name + '</option>');
                        });
                    } else {
                        $('#assigned_lawyer_id').empty();
                    }
                }
            });
        } else {
            $('#assigned_lawyer_id').empty();
            $('#assigned_lawyer_id').append('<option value="">Select</option>');

        }
    });

    $('#start_time,#end_time').on('change',function() {
        var start_time = $('#start_time').val();
        var end_time = $('#end_time').val();

        var diff = new Date(end_time) - new Date(start_time);
        diff_time = diff/(60*60*1000);
// alert(diff_time);
        if (diff_time > 24) {
            var total_days_full = diff_time/24;
            var total_day = total_days_full.toFixed(2);

            var minutes = total_day * 24 * 60;

            var hour = minutes/60;

            var day = 0;
            var minute = parseInt((hour % 1)*60);
            if (hour>24){
                day = parseInt(hour / 24);
                hour = parseInt(hour % 24);
            }else{
                hour = parseInt(hour);
            }

            var total_days = day+' days '+hour+' hours '+minute+' minutes';
            // alert(total_days);

        }else{
            var total_days = diff_time.toFixed(2)+' Hrs';
        }
        if (start_time && end_time){
            $('#setup_hours').val(total_days);
        }
    });

    $('.xDateContainer').on('change',function() {
        var xTime4 = $('#xTime4').val();
            $('#case_steps_filing').val(xTime4);
    });


    $('body').on('click', '#editCompany', function (event) {

        event.preventDefault();
        var id = $(this).data('id');
        console.log(id);

        $.get('/dlegal-software/public/admin/edit_criminal_cases_status/' + id, function (data) {
            //  $('#userCrudModal').html("Edit category");
            //  $('#submit').val("Edit category");

             $('#practice_modal').modal('show');

            //  $('#updated_case_status_id_update').val(data.data.updated_case_status_id);

             $.each(data.case_status, function (key, value) {
                $('select[id="updated_case_status_id_update"]').append('<option value="'+value.id+'" '+data.data.updated_case_status_id == value.id ? 'selected' : ''+'>' + value.case_status_name + '</option>');
            });

             $('#updated_case_status_write_update').val(data.data.updated_case_status_write);
             $('#updated_order_date_update').val(data.data.updated_order_date);
             $('#updated_fixed_for_id_update').val(data.data.updated_fixed_for_id);
             $('#updated_fixed_for_write_update').val(data.data.updated_fixed_for_write);
             $('#court_proceedings_id_update').val(data.data.court_proceedings_id);
             $('#court_proceedings_write_update').val(data.data.court_proceedings_write);
             $('#updated_court_order_id_update').val(data.data.updated_court_order_id);
             $('#updated_court_order_write_update').val(data.data.updated_court_order_write);
             $('#updated_next_date_update').val(data.data.updated_next_date);
             $('#updated_index_fixed_for_id_update').val(data.data.updated_index_fixed_for_id);
             $('#updated_day_notes_id_update').val(data.data.updated_day_notes_id);
             $('#updated_day_notes_write_update').val(data.data.updated_day_notes_write);
             $('#updated_engaged_advocate_id_update').val(data.data.updated_engaged_advocate_id);
             $('#updated_engaged_advocate_write_update').val(data.data.updated_engaged_advocate_write);
             $('#updated_next_day_presence_id_update').val(data.data.updated_next_day_presence_id);
             $('#updated_remarks_update').val(data.data.updated_remarks);
         })
    });


    $(window).scroll(function() {
        if ($(this).scrollTop() > 20) {
          $('#toTopBtn').fadeIn();
        } else {
          $('#toTopBtn').fadeOut();
        }
      });

      $('#toTopBtn').click(function() {
        $("html, body").animate({
          scrollTop: 0
        }, 1000);
        return false;
      });




      // Select all »a« elements with a parent class »links« and add a function that is executed on click
$( '.links a' ).on( 'click', function(e){

    // Define variable of the clicked »a« element (»this«) and get its href value.
    var href = $(this).attr( 'href' );

    // Run a scroll animation to the position of the element which has the same id like the href value.
    $( 'html, body' ).animate({
          scrollTop: $( href ).offset().top
    }, '300' );

    // Prevent the browser from showing the attribute name of the clicked link in the address bar
    e.preventDefault();

  });

  $('.file_edit_modals').on('click', function () {
    // var client_category_id = $(this).val();
    var route = $(this).attr('action');

    // $(".files_id").val(route);
    // alert(route);
        $('#files_id').append('<input type="hidden" class="files_id" name="files_id" value="'+route+'">');

  });

  $('#is_associate').on('click', function(){
    $('#external_counsel').toggle();
  });
  

      // Cache selectors for faster performance.
    var $window = $(window),
    $mainMenuBar = $('#mainMenuBar'),
    $mainMenuBarAnchor = $('#mainMenuBarAnchor');

  // Run this on scroll events.
  $window.scroll(function() {
      var window_top = $window.scrollTop();
      var div_top = $mainMenuBarAnchor.offset().top;
      if (window_top > div_top) {
          // Make the div sticky.
          $mainMenuBar.addClass('stick');
          $mainMenuBarAnchor.height($mainMenuBar.height());
      }
      else {
          // Unstick the div.
          $mainMenuBar.removeClass('stick');
          $mainMenuBarAnchor.height(0);
      }
  });


  $('#send_sms').on('click', function(){
    $('#mobile').toggle();
  });

  $('#send_mail').on('click', function(){
    $('#mail').toggle();
  });
  

});

