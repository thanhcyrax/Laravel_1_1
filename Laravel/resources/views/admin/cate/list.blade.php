@extends('admin.master')
@section('content')
 <!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Category
                    <small>List</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->

            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Category Parent</th>
    
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $stt = 1;
                foreach($data as $gt){?>
                    <tr class="odd gradeX" align="center">
                        <td><?php echo $stt++;//$gt['id'];?></td>
                        <td><?php echo $gt['name'];?></td>
                        <td>
                        <?php 
                        $parent = DB::table('cate')->where('id',$gt['parent_id'])->first();
                        //tìm giá trị tương ứng với parent_id và lấy giá trị đầu tiên
                        echo count($parent)>0?$parent->name:NULL;
                        ?></td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="xacnhanxoa('Bạn có muốn xóa !!!');" href="{!! URL::route('admin.cate.getDelete', $gt['id']) !!}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i><a href="{!! URL::route('admin.cate.getEdit', $gt['id']) !!}">Edit</a></td>
                        <!-- truyền biến để xóa sửa về route -->
                    </tr>
                <?php }?>
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

@endsection()
