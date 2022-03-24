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

function billing_delete_after_search(id){
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
                url: 'delete-billing/'+id,
                success:function(res){
                    // console.log(res);
                location.reload();

                }
            });

        }
    })

}


function land_information_delete_after_search(id){
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
                url: 'delete-land-information/'+id,
                success:function(res){
                    // console.log(res);
                location.reload();

                }
            });

        }
    })

}

function regulatory_compliance_delete_after_search(id){
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
                url: 'delete-regulatory-compliance/'+id,
                success:function(res){
                    // console.log(res);
                location.reload();

                }
            });

        }
    })

}

function flat_information_delete_after_search(id){
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
                url: 'delete-flat-information/'+id,
                success:function(res){
                    // console.log(res);
                location.reload();

                }
            });

        }
    })

}

function social_compliance_delete_after_search(id){

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
                url: 'delete-social-compliance/'+id,
                success:function(res){
                    // console.log(res);
                location.reload();

                }
            });

        }
    })

}
function criminal_cases_delete_after_search(id){

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
                url: 'delete-criminal-cases/'+id,
                success:function(res){
                    // console.log(res);
                location.reload();

                }
            });

        }
    })

}
function labour_cases_delete_after_search(id){

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
                url: 'delete-labour-cases/'+id,
                success:function(res){
                    // console.log(res);
                location.reload();

                }
            });

        }
    })

}
function quassi_judicial_cases_delete_after_search(id){

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
                url: 'delete-quassi-judicial-cases/'+id,
                success:function(res){
                    // console.log(res);
                    location.reload();

                }
            });

        }
    })

}

function high_court_cases_delete_after_search(id){

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
                url: 'delete-high-court-cases/'+id,
                success:function(res){
                    // console.log(res);
                    location.reload();

                }
            });

        }
    })

}

function appellate_court_cases_delete_after_search(id){

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
                url: 'delete-appellate-court-cases/'+id,
                success:function(res){
                    // console.log(res);
                    location.reload();

                }
            });

        }
    })

}

function retrive_after_search(id){
    // alert(id);
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



