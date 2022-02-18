<?php
function sqlConnect()
{
    $servername = "127.0.0.1";
    $username = "blog";
    $password = "alxndrtblog";
    $conn = new mysqli($servername, $username, $password);
    if ($conn->connect_error) {
        return ($conn->connect_error);
    } 
    else 
    {
        return $conn;
    }
}
function selectDatabase($conn, $dbName)
{
    $sql = 'SELECT COUNT(*) AS `exists` FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMATA.SCHEMA_NAME="'.$dbName.'"';
    $query = $conn->query($sql);
    if ($query === false) {
        return false;
    }
    $row = $query->fetch_object();
    $dbExists = (bool) $row->exists;
    if ($dbExists === false)
    {
        echo "new";
        $sql = 'CREATE DATABASE BLOG';
        $query = $conn->query($sql);
        if ($conn->query($sql) === false)
        {
            return false;
        }
    }
    $sql = 'use '.$dbName;
    $conn->query($sql);
    return true;
}
function getBlogList($conn)
{
    $sql="
    CREATE TABLE IF NOT EXISTS `ARTICLE`  (
        `id` INT UNSIGNED AUTO_INCREMENT,
        `title` VARCHAR(100) NOT NULL,
        `head` VARCHAR(500) NOT NULL,
        `author` VARCHAR(40) NOT NULL,
        `date` DATE,
        PRIMARY KEY ( `id` )
      ) ENGINE=INNODB DEFAULT CHARSET = utf8
    ";
    $query = $conn->query($sql);
    if ($query === false)
    {
        return false;
    }
    $sql = "SELECT title, head, author, date FROM Article";
    $result = $conn->query($sql);
    return $result;
}
