<?php
    include_once("funcs.php");

    //$servername = "127.0.0.1";
    $username = "MYSQL_USER";
    $password = "MYSQL_PASSWORD";
    $host = "db";

    $conn = new mysqli($host, $username, $password);

    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO repos (repo_id, repo_name, repo_url, created_at, updated_at, description, stargazers) VALUES (12345, 'test_repo', 'http://fakeurl.github.com/', '2022-03-05', '2022-03-05', 'This is not a real repo', 0), ";

    if ($conn->query($sql) === TRUE)
    {
        echo "New record created successfully";
    } 
    else 
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
      
    $conn->close();
    // $url = "https://api.github.com/search/repositories?q=language:php&sort=stars";

    // $results = api_request($url);

    // //echo var_dump($results);

    // foreach($results["items"] as $result)
    // {
    //     echo "ID: ".$result["id"]."<BR>";
    //     echo "Name: ".$result["name"]."<BR>";
    //     echo "Owner: ".$result["owner"]["login"]."<BR>";
    //     echo "URL: ".$result["html_url"]."<BR>";
    //     echo "Created: ".$result["created_at"]."<BR>";
    //     echo "Last Update: ".$result["updated_at"]."<BR>";
    //     echo "Description: ".$result["description"]."<BR>";
    //     echo "Stars: ".$result["stargazers_count"]."<BR><BR>";
    // }

?>