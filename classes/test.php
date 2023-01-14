<?php
require('DBConnection.php');

    extract($_POST);


    //$data = ("form_code = '$form_code' ") ;
    $data = 5848669107;

    $rl_insert = $this->conn->query("INSERT INTO response_list SET $data ");
    if($rl_insert){
        $response_list_id = $this->conn->insert_id;
    }else{
        $resp['status'] = 'failed';
        $resp['error'] = $this->conn->error;
        return json_encode($resp);
        exit;
    }
    $data = "";
    if(isset($_POST['q'])){
        foreach($_POST['q'] as $k => $v){
            if(!empty($data)) $data .= ",";
            if(!is_array($_POST['q'][$k])){
                $data .= " ('$response_list_id','$k','$v') ";
            }else{
                $ans = implode(", ",$_POST['q'][$k]);
                $data .= " ('$response_list_id','$k','$ans') ";
            }
        }
    }

    
    if(isset($_FILES['q']['tmp_name'])){
        foreach($_FILES['q']['tmp_name'] as $k => $v){
            if(!empty($data)) $data .= ",";
            if(!empty($_FILES['q']['tmp_name'][$k])){
                $fname = time()."_".$_FILES['q']['name'][$k];
                $move = move_uploaded_file($_FILES['q']['tmp_name'][$k],"../uploads/".$fname);
                if($move){
                    $data .= " ('$response_list_id','$k','$fname') ";
                }
            }
        }
    }

    $save_resp = $this->conn->query("INSERT INTO `responses` (response_list_id,meta_field,meta_value) VALUES $data");
    if($save_resp){
        $resp['status'] = 'success';
    }else{
        $resp['status'] = 'failed';
        $resp['error'] = $this->conn->error;
    }
    return json_encode($resp);
?>