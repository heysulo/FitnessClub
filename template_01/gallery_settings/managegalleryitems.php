<div class="panel panel-primary">
    <div class="panel-heading" >Manage Gallery Items</div>
    <div class="panel-body" >
        <?php
        $i = 0;
        for($i=0;$i<10;$i++){
        ?>
        <div style="height: 100px;width: 100%;margin-bottom: 5px;border: 1px solid #d3d3d3;">
            <div class="col-lg-2" style="padding-left: 0">
                <img src="http://www.w3schools.com/bootstrap/paris.jpg" style="width: 100%;height: 100px;">
            </div>
            <div class="col-lg-8">
                <div style="font-size: 16px;font-weight: bold;padding-top: 5px;"> Smaple Title</div>
                <div style="font-size: 10px;max-height: 70px;overflow: hidden"> Each member of team need to submit a short (Max 5 page) report on the progress made with the implementation of the group assignment. The report should include the scope assigned to the student and the progress with evidence of implementation(use max five 360x480 pix images in the progress report. A reflection of technical challenges faced and how they were tackled need to be mentioned. ***File Name IndexNumber_GroupAssignmentProgress1.pdf</div>
            </div>
            <div class="col-lg-2">
                <div style="margin: 5px;"></div>
                <button type="button" style="width: 100%" class="btn btn-xs btn-warning">Modify</button>
                <div style="margin: 5px;"></div>
                <button type="button" style="width: 100%" class="btn btn-xs btn-danger">Delete</button>
                <div style="margin: 5px;"></div>
                <div class="form-group">
                    <label class="checkbox-inline">
                        <input type="checkbox" value="">Publish
                    </label>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
