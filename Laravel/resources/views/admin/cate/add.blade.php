@extends('admin.master')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category
                            <small>Add</small>
                        </h1>
                    </div>
<div class="col-lg-7" style="padding-bottom:120px">
    <?php 
        // xuất lỗi đã thiết lập ở request (CateRequest)
        if(count($errors) > 0){?>
            <div class='alert alert-danger'>
                <ul>
                    <?php foreach($errors->all() as $gt){?>
                    <li><?php echo $gt;?></li>
                    <?php }?>
                </ul>
            </div>
    <?php }?>
    <form action="{!! route('admin.cate.getAdd') !!}" method="POST">
    <!-- điều hướng về controller đã thiết lập ở route -->
        <input type='hidden' name='_token' value="{!! csrf_token() !!}"/><!-- tạo biến bảo mật -->
        <div class="form-group">
            <label>Category Parent</label>
            <select class="form-control" name='slt_parent'>
                <option value="0">Please Choose Category</option>
                <?php 
                // gọi dữ liệu từ function for phân cấp trong functions.php
                cate_parent($parent);?>
            </select>
        </div>
        <div class="form-group">
            <label>Category Name</label>
            <input class="form-control" name="txtCateName" placeholder="Please Enter Category Name" />
        </div>
        <div class="form-group">
            <label>Category Order</label>
            <input class="form-control" name="txtOrder" placeholder="Please Enter Category Order" />
        </div>
        <div class="form-group">
            <label>Category Keywords</label>
            <input class="form-control" name="txtKeywords" placeholder="Please Enter Category Keywords" />
        </div>
        <div class="form-group">
            <label>Category Description</label>
            <textarea class="form-control" name='txtDescription' rows="3"></textarea>
        </div>
        <div class="form-group">
            <label>Category Status</label>
            <label class="radio-inline">
                <input name="rdoStatus" value="1" checked="" type="radio">Visible
            </label>
            <label class="radio-inline">
                <input name="rdoStatus" value="2" type="radio">Invisible
            </label>
        </div>
        <button type="submit" class="btn btn-default">Category Add</button>
        <button type="reset" class="btn btn-default">Reset</button>
    <form>
</div>
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
@endsection()
                