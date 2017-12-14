<!-- Page Content -->
@extends('admin.master')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product
                    <small>List</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach ($product as $key => $value){?>
                    <tr class="odd gradeX" align="center">
                        <td><?php echo $value['id'];?></td>
                        <td><?php echo $value['name'];?></td>
                        <td><?php echo $value['price'];?></td>
                        <td><?php 
                        $cate = DB::table('cate')->where('id',$value['cate_id'])->first();
                        echo $cate->name?$cate->name:"";
                        ?></td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
                    </tr>
                <?php }?>    
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection()    

   
