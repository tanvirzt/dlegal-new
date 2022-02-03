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

});
