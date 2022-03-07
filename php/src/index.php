<html>
<?php
    // Includes
    include_once("lib/funcs.php");

    // Make sure our DB is in place
    check_db();
?>
<link rel="stylesheet" href="styles.css">

<script src="lib/jquery.min.js"></script>
<script>
    function update_repo_db()
    {
        $.ajax({url: "lib/update_db.php", success: function(result){
            $("#db_status").html("Database updated with latest results!<BR>"+result);
        }});
    }
    $( document ).ready(function() {
        var coll = document.getElementsByClassName("expand");
        var i;

        for (i = 0; i < coll.length; i++) 
        {
            coll[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var content = this.nextElementSibling;

                if (content.style.maxHeight)
                {
                    content.style.maxHeight = null;
                    content.style.maxWidth = null;
                }
                else 
                {
                    content.style.maxHeight = content.scrollHeight + "px";
                    content.style.maxWidth = content.scrollWidth + "px";
                }
            });
        }
    });
</script>

<div id="update_db" style="text-align:right">
    <button id='db_update' onclick="update_repo_db()">Update DB</button>
    <BR>
    <div id="db_status"></div>
</div>
<BR>
<div class='tdiv'>
<table>
    <tr>
        <th>Repo ID</th>
        <th>Repo Name</th>
        <th>Stars</th>
        <th>More info</th>
<?php
    $results = get_repos();
    if($results->num_rows < 1)
    {
        echo "<script>
                update_repo_db();
            </script>
            Please wait...gathering results...
            <meta http-equiv='refresh' content='2'/>";
    }
    foreach($results as $result)
    {
        echo "<tr>";
        echo "<td>".$result['repo_id']."</td>";
        echo "<td>".$result['repo_name']."</td>";
        echo "<td>&#9734;".$result['stargazers']."</td>";
        ?>
        <td>
        <div class='expand'>Expand</div>
        <div class='xtra_info'>
            <table>
                <tr>
                    <th>Repo URL</th>
                    <th>Date Created</ht>
                    <th>Last Updated</th>
                    <th>Description</th>
                </tr>
                <td>
                <?php 
                echo "<a href='".$result['repo_url']."' target='_blank'>".$result['repo_url']."</a></td>
                <td>".$result['created_at']."</td>
                <td>".$result['updated_at']."</td>
                <td>".$result['description']."</td>";
                ?>
            </table>
        </div>
        </td>
        </tr>
        <?php
    }
?>
</table>
</div>
</html>