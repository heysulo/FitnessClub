<div class="panel panel-primary" style="border-color: #f6d600;">
    <div class="panel-heading" style="background-color: #f6d600;border-color: #f6d600;color: #323232;">Add New Gallery Items</div>
    <div class="panel-body" >
        <form id="frmnewitem" method="post" action="submitgalleryitem.php" enctype="multipart/form-data">
        <div class="row">
            <div class="col-lg-4">
                <div style="position: absolute;top: 10px;left: 30px;color: red">
                    Select image to upload:
                    <input type="file" name="fileToUpload" id="fileToUpload" required>
                </div>
                <img class="img-thumbnail" src="http://www.w3schools.com/bootstrap/paris.jpg" style="background-color: #c3c3c3;width: 100%;height: 250px;">
            </div>
            <div class="col-lg-8">
                <div class="form-group">
                    <label for="usr">Title:</label>
                    <input type="text" class="form-control" name="title" required>
                </div>
                <div class="form-group">
                    <label for="pwd">Description:</label>
                    <textarea class="form-control" maxlength="140" name="description" required></textarea>
                </div>
                <div class="form-group">
                    <label class="checkbox-inline">
                        <input type="checkbox" name="publish" checked >Publish
                    </label>
                </div>
                    <button type="submit" class="btn btn-success btn-md">Add New Item</button>
                    
            </div>
        </div>
        </form>
    </div>
</div>


<script id="ajax-lvl-1">
    //alert("GG");

</script>