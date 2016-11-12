<html>
<head>
    <title>Gallery Settings</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.html">

    <title>ENERGY :: Premium Fitness Template</title>
    <script src="../bootstrap3/js/bootstrap.min.js"></script>
    <link href="../bootstrap3/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <div class="row">
            <h1>Gallery Management</h1>
            <div class="btn-group">
                <button type="button" class="btn" style="background-color: #f6d600;" onclick="page1();">Add New Item</button>
                <button type="button" class="btn" style="background-color: #337ab7;color: #ffffff;" onclick="page2();">Manage Items</button>
            </div>
        </div>

        <div style="padding: 6px;"></div>
        <?php if(isset($_GET['s'])){
            if ($_GET['s'] == 1){?>
                <div class="alert alert-success">
                    <strong>Success!</strong> The new gallery item added to the system.
                </div>
             <?php }else{?>

                <div class="alert alert-danger">
                    <strong>Failed!</strong> Unable to add the new gallery item added to the system.
                </div>

        <?php }} ?>
        <div class="row" id="panel_container">
            <?php
            if (isset($_GET['t'])!=1){
                include ("newgalleryitem.php");
            }else{
                include ("managegalleryitems.php");
            }
            ?>
        </div>
    </div>
    <div class="col-lg-2"></div>
</div>

<script>
    function page1() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("panel_container").innerHTML = this.responseText;
                eval(document.getElementById("ajax-lvl-1").innerHTML);
            }
        };
        xhttp.open("POST", "newgalleryitem.php", true);
        xhttp.send();
    }

    function page2() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("panel_container").innerHTML = this.responseText;
                eval(document.getElementById("ajax-lvl-1").innerHTML);
            }
        };
        xhttp.open("POST", "managegalleryitems.php", true);
        xhttp.send();
    }

    function publish(x) {
        var chk = document.getElementById("chk_"+x);
        var d = 0;
        if (chk.checked){
            d = 1;
        }
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if(this.responseText !="success"){
                    chk.checked = !chk.checked;
                    alert("Failed to set value : " +  this.responseText );
                }
            }
        };
        xhttp.open("POST", "modify_settings.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("code=publish&id="+x+"&value="+d);
    }

    function drop(x) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if(this.responseText !="success"){
                    alert("Failed to set value : "  +  this.responseText );
                }else{
                    page2();
                }
            }
        };
        xhttp.open("POST", "modify_settings.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("code=drop&id="+x);
    }


</script>

</body>
</html>