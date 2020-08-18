<?php
$query = $db->query("SELECT id FROM users ORDER BY id DESC LIMIT 1");

if ($result->rowCount() === 1) {
    $id = $result->fetch(PDO::FETCH_NUM);
    $hold = explode('-', $row[0]);
    $id = $hold[1] + 1;
    return 'Acc-'.$id;

} else {
    return 'Acc-10000';
}