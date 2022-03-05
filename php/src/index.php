<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function update_repo_db()
    {
        $.ajax({url: "lib/update_db.php", success: function(result){
            $("#db_status").html("Database updated with latest results!<BR>"+result);
            //alert(result);
        }});
    }
</script>

<?php

    echo "something";

?>
<div id="update_db" style="text-align:right">
    <button onclick="update_repo_db()">Update DB</button>
    <BR>
    <div id="db_status"></div>
</div>