<?php
    // Credentials just for demonstrative purposes:
    $username = "MYSQL_USER";
    $password = "MYSQL_PASSWORD";
    $host = "db";
    $dbname = "MY_DATABASE";

    function api_request($url)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT,'display_repos');
    
        $results = curl_exec($ch);
    
        curl_close($ch);
    
        return json_decode($results, true);
    }
    
    function get_repos()
    {
        global $host, $username, $password, $dbname;
        $conn = new mysqli($host, $username, $password, $dbname);

        if ($conn->connect_error) 
            die("Connection failed: " . $conn->connect_error);

        $sql = "SELECT * FROM repos WHERE repo_id != ''";
        $result = $conn->query($sql);

        $conn->close();

        return $result;
    }
    function check_db()
    {
        global $host, $username, $password, $dbname;
        $conn = new mysqli($host, $username, $password, $dbname);

        if ($conn->connect_error) 
            die("Connection failed: " . $conn->connect_error);

        $sql = "CREATE TABLE IF NOT EXISTS 
            `MY_DATABASE`.`repos` 
            ( `repo_id` INT NOT NULL , 
            `repo_name` TINYTEXT NOT NULL , 
            `repo_url` TINYTEXT NOT NULL , 
            `created_at` DATE NOT NULL , 
            `updated_at` DATE NOT NULL , 
            `description` TEXT NOT NULL , 
            `stargazers` INT NOT NULL ) ENGINE = InnoDB;";
        $result = $conn->query($sql);

        $conn->close();
    }

?>