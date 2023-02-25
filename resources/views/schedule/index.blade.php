@extends('layouts.admin_layouts.admin_layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->

<style type="text/css">
    .card-title{
        color: #0CA2A3 !important;
        font-weight: bold;
        font-size: 18px;
    }
    .colorColl .col-sm-3 {
      float: left;
    }
</style>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> Schedule </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>

                            <li class="breadcrumb-item active"> Schedule </li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        @if (Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                                {{ Session::get('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> Schedule List </h3>
                                <div class="float-right">
                                    <a href="{{ route('schedule.create') }}"><button
                                            class="btn btn-sm
                                    btn-success add_btn"><i
                                                class="fas fa-plus"></i> Add New </button></a>
                                    <a href="{{ route('schedule.category.index') }}"><button
                                            class="btn btn-sm
                                    btn-success add_btn"><i
                                                class="fas fa-plus"></i> Add Category </button></a>
                                </div>

                            </div>


<!-- /.card-header -->
                            <div class="card-body colorColl">
                                <div class="col-sm-3"><span style="color: grey; font-weight: bold; font-size: 16px;">To Do</span></div>
                                <div class="col-sm-3"><span style="color: yellow; font-weight: bold; font-size: 16px">In Progress</span></div>
                                <div class="col-sm-3"><span style="color: red; font-weight: bold; font-size: 16px">Due</span></div>
                                <div class="col-sm-3"><span style="color: green; font-weight: bold; font-size: 16px">Completed</span></div>
                            </div>
 <hr style="height:1px; background: 1px solid rgba(0,0,0,.125);">
                            @php

                                $greenArray = array();
                                $redArray=array();
                                $yellowArray=array();
                                $greyArray=array();

                                foreach ($data as $datum){

                                    //echo $datum->title;

                                            if ($datum->current_status == 'To Do')  
                                                $greyArray[] = array($datum->current_status, $datum->title, $datum->date, $datum->priority);
                                            else if ($datum->current_status == 'In Progress')
                                                  $yellowArray[] = array($datum->current_status, $datum->title, $datum->date, $datum->priority);    
                                            else if ($datum->current_status == 'Due')
                                                  $redArray[] = array($datum->current_status, $datum->title,  $datum->date, $datum->priority);  
                                            else
                                                  $greenArray[] = array($datum->current_status, $datum->title, $datum->date, $datum->priority);  

                                }   

                                
                                    $arrayCountMax = 0;

                                    if (count($greenArray) > $arrayCountMax){
                                        $arrayCountMax = count($greenArray);
                                    }if (count($redArray) > $arrayCountMax){
                                        $arrayCountMax = count($redArray);
                                    }if (count($yellowArray) > $arrayCountMax){
                                        $arrayCountMax = count($yellowArray);
                                    }if (count($greyArray) > $arrayCountMax){
                                        $arrayCountMax = count($greyArray);
                                    }
                                    //echo $arrayCountMax;
//print_r($redArray);

                    echo '<div class="card-body colorColl">';            

                        echo '<div class="col-sm-3"><table width="100%"><thead>';
                            for ($i=0; $i<$arrayCountMax;$i++){
                                if (count($greyArray)>0 && $greyArray[$i][1]!=''){    
                                    echo '<tr class="nobackground"><td><p style="width:100%; margin-bottom: 40px;"><span class="todoName">'.$greyArray[$i][1].'</span><span class="todoDate">'.date("d-m-Y", strtotime($greyArray[$i][2])).'</span></p><p style="text-align: right;">
                                        <a href="{{ route(\'task.show\', $greenArray[$i][0]) }}"><button
                                                            class="btn btn-primary btn-sm" data-toggle="tooltip"
                                                            data-placement="top" title="Edit"><i
                                                                class="fas fa-eye"></i></button></a>

                                        <a href="{{ route(\'task.edit\', $greenArray[$i][0]) }}"><button
                                                            class="btn btn-info btn-sm" data-toggle="tooltip"
                                                            data-placement="top" title="Edit"><i
                                                                class="fas fa-edit"></i></button></a>';

                                    echo '</p><p style="width: 100%; background: grey; height: 6px;"></p></td></tr>';
                                }else{
                                    echo '<tr class="nobackground"><td><p style="width:100%; margin-bottom: 40px;"><span class="todoName"></span><span class="todoDate"></span></p><p style="width: 100%; height: 6px;"></p></td></tr>';
                                }
                            }        
                        echo '</thead></table></div>';
                        echo '<div class="col-sm-3"><table width="100%"><thead>';
                            for ($j=0; $j<$arrayCountMax;$j++){
                                if (count($yellowArray)>0 && $yellowArray[$j][1]!=''){
                                    echo '<tr class="nobackground"><td><p style="width:100%; margin-bottom: 40px;"><span class="todoName">'.$yellowArray[$j][1].'</span><span class="todoDate">'.date("d-m-Y", strtotime($yellowArray[$j][2])).'</span></p><p style="text-align: right;">
                                        <a href="{{ route(\'task.show\', $greenArray[$j][0]) }}"><button
                                                            class="btn btn-primary btn-sm" data-toggle="tooltip"
                                                            data-placement="top" title="Edit"><i
                                                                class="fas fa-eye"></i></button></a>

                                        <a href="{{ route(\'task.edit\', $greenArray[$j][0]) }}"><button
                                                            class="btn btn-info btn-sm" data-toggle="tooltip"
                                                            data-placement="top" title="Edit"><i
                                                                class="fas fa-edit"></i></button></a>';

                                                   

                                    echo '</p><p style="width: 100%; background: yellow; height: 6px;"></p></td></tr>';
                                }else{
                                    echo '<tr class="nobackground"><td><p style="width:100%; margin-bottom: 40px;"><span class="todoName"></span><span class="todoDate"></span></p><p style="width: 100%; height: 6px;"></p></td></tr>';
                                }
                            }        
                        echo '</thead></table></div>';
                        echo '<div class="col-sm-3"><table width="100%"><thead>';
                            for ($k=0; $k<$arrayCountMax;$k++){
                                if (count($redArray)>0 && $redArray[$k][1]!=''){
                                    echo '<tr class="nobackground"><td><p style="width:100%; margin-bottom: 40px;"><span class="todoName">'.$redArray[$k][1].'</span><span class="todoDate">'.date("d-m-Y", strtotime($redArray[$k][2])).'</span></p>
                                        <p style="text-align: right;">

                                        <a href="{{ route(\'task.show\', $greenArray[$k][0]) }}"><button
                                                            class="btn btn-primary btn-sm" data-toggle="tooltip"
                                                            data-placement="top" title="Edit"><i
                                                                class="fas fa-eye"></i></button></a>

                                        <a href="{{ route(\'task.edit\', $greenArray[$k][0]) }}"><button
                                                            class="btn btn-info btn-sm" data-toggle="tooltip"
                                                            data-placement="top" title="Edit"><i
                                                                class="fas fa-edit"></i></button></a>';

                                                 

                                    echo '</p><p style="width: 100%; background: red; height: 6px;"></p></td></tr>';
                                }else{
                                    echo '<tr class="nobackground"><td><p style="width:100%; margin-bottom: 40px;"><span class="todoName"></span><span class="todoDate"></span></p><p style="width: 100%; height: 6px;"></p></td></tr>';
                                }
                            }        
                        echo '</thead></table></div>';
                        echo '<div class="col-sm-3"><table width="100%"><thead>';
                            for ($l=0; $l<$arrayCountMax;$l++){
                                if (count($greenArray)>0 && $greenArray[$l][1]!=''){
                                    echo '<tr class="nobackground"><td><p style="width:100%; margin-bottom: 40px;"><span class="todoName">'.$greenArray[$l][1].'</span><span class="todoDate">'.date("d-m-Y", strtotime($greenArray[$l][2])).'</span></p><p style="text-align: right;">

                                        <a href="{{ route(\'task.show\', $greenArray[$l][0]) }}"><button
                                                            class="btn btn-primary btn-sm" data-toggle="tooltip"
                                                            data-placement="top" title="Edit"><i
                                                                class="fas fa-eye"></i></button></a>

                                        <a href="{{ route(\'task.edit\', $greenArray[$l][0]) }}"><button
                                                            class="btn btn-info btn-sm" data-toggle="tooltip"
                                                            data-placement="top" title="Edit"><i
                                                                class="fas fa-edit"></i></button></a>';

                                              
                                    echo '</p><p style="width: 100%; background: green; height: 6px;"></p></td></tr>';
                                }else{
                                    echo '<tr class="nobackground"><td><p style="width:100%; margin-bottom: 40px;"><span class="todoName"></span><span class="todoDate"></span></p><p style="width: 100%; height: 6px;"></p></td></tr>';
                                }
                            }        
                        echo '</thead></table></div>';




                    echo '</div>';


 @endphp

<style>

    .nobackground{
        background: #fff !important;
        padding: 0 10px !important;
    }

    .todoName{
        text-align: left;
        display: block;
        width: 50%;
        float: left;
        font-size: 12px;
    }
    .todoDate{
        text-align: right;
        display: block;
        width: 50%;
        float:left;
        font-size: 12px;
    }

</style>













                            <!-- /.card-header -->
                     <!--       <div class="card-body">
                                <table id="" class="all-cases-dt    table dataTable no-footer dtr-inline">
                                    <thead>
                                        <tr>
                                            <th class=" text-nowrap">Current Status</th>
                                            <th class="text-center text-nowrap">Title</th>
                                            <th class="text-center text-nowrap">Date</th>
                                            <th class="text-center text-nowrap"> Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $datum)
                                            <tr>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-1">
                                                            <i class="fa fa-circle" style="color:

                                                            {{$datum->current_status == 'To Do' ? 'grey' : ''}}
                                                            {{$datum->current_status == 'In Progress' ? 'yellow' : ''}}
                                                            {{$datum->current_status == 'Due' ? 'red' : ''}}
                                                            {{$datum->current_status == 'Complete' ? 'green' : ''}}

                                                            "></i>
                                                        </div>
                                                        <div class="col-11">
                                                            <form action="{{ route('schedule.change.status', $datum->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('PUT')
                                                                <select class="select2 form-control-sm"
                                                                    name="current_status" onchange="this.form.submit()">
                                                                    <option value="In Progress"
                                                                        {{ $datum->current_status == 'In Progress' ? 'selected' : false }}>
                                                                        In Progress</option>
                                                                    <option value="To Do"
                                                                        {{ $datum->current_status == 'To Do' ? 'selected' : false }}>
                                                                        To Do</option>
                                                                    <option value="Due"
                                                                        {{ $datum->current_status == 'Due' ? 'selected' : false }}>
                                                                        Due</option>
                                                                    <option value="Complete"
                                                                        {{ $datum->current_status == 'Complete' ? 'selected' : false }}>
                                                                        Complete</option>
                                                                </select>
                                                            </form>
                                                        </div>
                                                    </div>



                                                </td>
                                                <td class="text-center">
                                                    {{ $datum->title }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $datum->date }}
                                                </td>

                                                <td class="text-center">
                                                    <a href="{{ route('schedule.show', $datum->id) }}"><button
                                                            class="btn btn-primary btn-sm" data-toggle="tooltip"
                                                            data-placement="top" title="Edit"><i
                                                                class="fas fa-eye"></i></button></a>

                                                    <a href="{{ route('schedule.edit', $datum->id) }}"><button
                                                            class="btn btn-info btn-sm" data-toggle="tooltip"
                                                            data-placement="top" title="Edit"><i
                                                                class="fas fa-edit"></i></button></a>

                                                    <form method="POST" action="{{ route('schedule.destroy', $datum->id) }}"
                                                        class="delete-user btn btn-danger btn-xs">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            data-toggle="tooltip" data-placement="top" title="Delete"><i
                                                                class="fas fa-trash"></i> </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>-->
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
