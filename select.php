<?php
$conn = mysqli_connect(
    'localhost',
    'root',
    '1234',
    'opentutorials');

echo "<h1>Single Row</h1>";
$sql = "SELECT * FROM topic where id = 1";
$result = mysqli_query($conn, $sql);
$row = (mysqli_fetch_array($result));
echo '<h2>'.$row['title']. '</h2>';
echo $row['description'];

echo "<h1>Multi Row</h1>";
$sql = "SELECT * FROM topic";
$result = mysqli_query($conn, $sql);

$row = (mysqli_fetch_array($result));
echo '<h2>'.$row['title']. '</h2>';
echo $row['description'];

$row = (mysqli_fetch_array($result));
echo '<h2>'.$row['title']. '</h2>';
echo $row['description']; 

$row = (mysqli_fetch_array($result));
echo '<h2>'.$row['title']. '</h2>';
echo $row['description']; 

while($row = mysqli_fetch_array($result)){
    echo '<h2>'.$row['title']. '</h2>';
    echo $row['description']; 
}
