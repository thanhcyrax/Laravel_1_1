@extends('admin.master')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
        <form action="{!! url('/admin/product/add') !!}" method="POST" enctype="multipart/form-data">
            <div class="col-lg-12">
                <h1 class="page-header">Product
                    <small>Add</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
               <?php include('resources/views/admin/blocks/erros.blade.php');
               //inclu file KT input nhập vào
               ?>
                    <!--1 dạng reuqest url-->
                    <input type='hidden' name='_token' value="{!! csrf_token() !!}"/><!-- tạo biến bảo mật -->
                    <div class="form-group">
                        <label>Category Parent</label>
                        <select class="form-control" name='slt_parent'>
                            <option value="0">Please Choose Category</option>
                            <?php 
                            // gọi dữ liệu từ function for phân cấp trong functions.php
                            foreach ($cate as $key => $value) {?>
                                <option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" name="txtName" placeholder="Please Enter Username" value="{!! old('txtName') !!}" />
                        <!--old('txtName') để giự giá trị khi truy xuất-->
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input class="form-control" name="txtPrice" placeholder="Please Enter Price" value="{!! old('txtPrice') !!}" />
                    </div>
                    <div class="form-group">
                        <label>Intro</label>
                        <textarea class="form-control" rows="3" id='intro' name="txtIntro">{!! old('txtIntro') !!}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea class="form-control" rows="3" id='content' name="txtContent">{!! old('txtContent') !!}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Images</label>
                        <input type="file" name="fImages" value="{!! old('fImages') !!}"/>
                    </div>
                    <div class="form-group">
                        <label>Product Keywords</label>
                        <input class="form-control" name="txtKeywords" value="{!! old('txtKeywords') !!}" placeholder="Please Enter Category Keywords" />
                    </div>
                    <div class="form-group">
                        <label>Product Description</label>
                        <textarea class="form-control" rows="3" name='txtDescription'>{!! old('txtDescription') !!}</textarea>
                    </div>
                    <button type="submit" class="btn btn-default">Product Add</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-4">
                <?php for($i=1;$i<=10;$i++){?>
                <div class="form-group">
                    <label>Image Product Detail <?php echo $i;?></label>
                    <input type='file' name='fProductDetail[]'/>
                </div>
                <?php }?>
            </div>
            </form>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>

<script>
    CKEDITOR.replace('intro');
    CKEDITOR.replace('content'); 
</script>
<!-- /#page-wrapper -->
@endsection()


    
