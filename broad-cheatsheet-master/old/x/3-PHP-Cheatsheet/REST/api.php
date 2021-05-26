<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
// header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
// header("Access-Control-Allow-Methods: POST");
// header("Access-Control-Max-Age: 3600");
// header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 

if(isset($_GET['age']))
{
    if(empty($_GET['age']))
	{
		response(404,"Data Not Found",NULL);
	}
	else
	{
        if ($_GET['age'] < 12) {
            $data = "kid";
        }elseif ($_GET['age'] < 20) {
            $data = "teen";
        }elseif ($_GET['age'] < 50) {
            $data = "man";
        }else {
            $data = "old";
        }
		response(200,"Data Found",$data);
	}
}elseif (isset($_GET['option'])) {
    if(empty($_GET['option']))
	{
		response(404,"Data Not Found",NULL);
	}
	else
	{
        switch ($_GET['option']) {
            case 'sub':
                $data = $_GET['num1'] - $_GET['num2'];
                break;
            case 'add':
                $data = $_GET['num1'] + $_GET['num2'];
                break;
            case 'mul':
                $data = $_GET['num1'] * $_GET['num2'];
                break;
            case 'div':
                $data = $_GET['num1'] / $_GET['num2'];
                break;
            
            default:
            response(404,"Data Not Found",NULL);
                break;
        }
		response(200,"Data Found",$data);
	}
}
else
{
	response(400,"Invalid Request",NULL);
}

function response($status,$status_message,$data)
{
	header("HTTP/1.1 ".$status);
	
	$response['status']=$status;
	$response['status_message']=$status_message;
	$response['data']=$data;
	
	$json_response = json_encode($response);
	echo $json_response;
}