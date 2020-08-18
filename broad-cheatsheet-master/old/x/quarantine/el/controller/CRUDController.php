<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
/**
 *
 */
$pathStatus = false;
$path = "model/CRUD.php";
if (file_exists($path) && $pathStatus === false) {
    $pathStatus = true;
    require_once $path;
}
$path = "../model/CRUD.php";
if (file_exists($path) && $pathStatus === false) {
    $pathStatus = true;
    require_once $path;
}
$path = "../../model/CRUD.php";
if (file_exists($path) && $pathStatus === false) {
    $pathStatus = true;
    require_once $path;
}
class CRUDController extends CRUD
{
    public function index($datas)
    {
        $datas['page'] = (isset($datas['page'])) ? $datas['page'] : 1;
        $datas['limit_result'] = (isset($datas['limitResult'])) ? $datas['limitResult'] : 10;
        $datas['q'] = (isset($datas['q'])) ? $datas['q'] : null;
        $datas['order'] = (isset($datas['order'])) ? $datas['order'] : 1;
        echo $this->applicants($datas);
    }

    public function store($datas)
    {
        // for ($i=0; $i < 100; $i++) {
        //     $this->createApplicant($datas);
        // }

        if ($this->createApplicant($datas)) {
            header('location:/el/view/status/200.php?success');
        } else {
            header('location:/el/view/status/error.php');
            exit;
        }
    }

    public function show($id)
    {
      echo $this->showApplicant($id);
    }

    public function edit($id)
    {
        if (!$this->editApplicant($id)) {
            header('location:/el/view/status/error.php');
        }
        return $this->editApplicant($id);
    }
    
    public function update($datas)
    {
       
        if ($this->updateApplicant($datas)) {
            header('location:index.php');
        } else {
            header('location:/el/view/status/403.php?unauthorize');
            exit;
        }
    }

    public function destroy($id)
    {
        if ($this->deleteApplicant($id)) {
            header('location:/el/view/status/200.php?sucess');
        } else {
            header('location:/el/view/status/403.php?unauthorize');
            exit;
        }
    }
}
