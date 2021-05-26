<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="POST">
    <label>Enter Age:</label>
    <input type="text" name="age">
    <button type="submit">Submit</button>
    </form>
    
    <form action="index.php" method="POST">
    <label>Calculator:</label>
    <input type="text" name="num1">
    <select name="option">
    <option value="sub">-</option>
    <option value="add">+</option>
    <option value="mul">*</option>
    <option value="div">/</option>
    </select>
    <input type="text" name="num2">
    <button type="submit">Submit</button>
    </form>

    <?php
    // $url = "http://localhost/learn_rest/api.php?age=".$_POST['age'];
    $url = "http://localhost/learn_rest/api.php?num1=".$_POST['num1']."&num2=".$_POST['num2']."&option=".$_POST['option'];
    $client = curl_init($url);
    curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
    $response = curl_exec($client);
    
    $result = json_decode($response);
    echo '<h2>'.$result->data.'</h2>';
?>
</body>
</html>