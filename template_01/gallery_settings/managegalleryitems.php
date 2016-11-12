<?php
$conn = null;
try{
    $conn = mysqli_connect("localhost","root","mysqler","fitnessclub");
}catch (mysqli_sql_exception $e){
    echo "Error occured";
    die();
}

if ($conn == null) {
    echo "Error occured";
    die();
}
?>
<div class="panel panel-primary">
    <div class="panel-heading" >Manage Gallery Items</div>
    <div class="panel-body" >
        <?php

        $sql = "SELECT * FROM gallery_items;";
        $res = mysqli_query($conn,$sql);
        while ($row_qt =  mysqli_fetch_assoc($res)){
        ?>
        <div style="height: 100px;width: 100%;margin-bottom: 5px;border: 1px solid #d3d3d3;">
            <div class="col-lg-2" style="padding-left: 0">
                <img src="<?php echo "img/".$row_qt['image'];?>" style="width: 100%;height: 100px;">
            </div>
            <div class="col-lg-8">
                <div style="font-size: 16px;font-weight: bold;padding-top: 5px;"><?php echo $row_qt['title'];?></div>
                <div style="font-size: 10px;max-height: 70px;overflow: hidden"><?php echo $row_qt['description'];?></div>
            </div>
            <div class="col-lg-2">
                <div style="margin: 5px;"></div>
                <div style="margin: 25px;"></div>
                <button type="button" style="width: 100%" class="btn btn-xs btn-danger" onclick="drop(<?php echo $row_qt['gallery_item_id']; ?>);">Delete</button>
                <div style="margin: 5px;"></div>
                <div class="form-group">
                    <label class="checkbox-inline">
                        <input type="checkbox" <?php if($row_qt['publish']==1){echo "checked";}?> id="chk_<?php echo $row_qt['gallery_item_id']; ?>" onclick="publish(<?php echo $row_qt['gallery_item_id']; ?>);">Publish
                    </label>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<script id="ajax-lvl-1" type="text/javascript">

    

</script>