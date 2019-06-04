<?php
require 'db-conn.inc.php';
 echo '<table border="2">';
 foreach($connection->query('SELECT * FROM movies') as $record){
    //  print_r($record);
    echo '<tr>';
    echo '<td>'.$record['id'].'</td>';
    echo '<td>'.$record['title'].'</td>';
    echo '<td>'.$record['length'].'</td>';
    echo '<td>'.$record['genre'].'</td>';
    echo '</tr>';
}
 echo '</table>';
?>
