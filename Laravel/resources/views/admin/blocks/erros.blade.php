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