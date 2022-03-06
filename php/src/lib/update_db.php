<?php
    include_once("funcs.php");

    $conn = new mysqli($host, $username, $password, $dbname);

    if ($conn->connect_error) 
        die("Connection failed: " . $conn->connect_error);

    
    $url = "https://api.github.com/search/repositories?q=language:php&sort=stars";

    $results = api_request($url);

    //echo var_dump($results);

    $sql = "delete from repos";

    if ($conn->query($sql) !== TRUE)
        echo "Error: " . $sql . "<br>" . $conn->error;

    foreach($results["items"] as $result)
    {
        $sql = $conn->prepare("INSERT INTO repos 
                    (repo_id, 
                    repo_name, 
                    repo_url, 
                    created_at, 
                    updated_at, 
                    description, 
                    stargazers) 
                VALUES 
                    (?, ?, ?, ?, ?, ?, ?) ");

        $sql->bind_param("isssssi",
                        $result['id'],
                        $result['name'],
                        $result['html_url'],
                        explode('T',$result['created_at'])[0],
                        explode('T',$result['updated_at'])[0],
                        $result['description'],
                        $result['stargazers_count']
                        );
        if ($sql->execute() !== TRUE)
            echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>