<?php
use chriskacerguis\RestServer\RestController;
class Base_ControllerApi extends RestController {
    public function __construct()
    {
        parent::__construct();
        $headers = apache_request_headers();
        if (!isset($headers['authorization'])) {
            if(!isset($headers['Authorization'])){
                $this->response(apiResult(false, null, "Un Authorized!"),self::HTTP_UNAUTHORIZED);
                die;
            }else{
                $decodeToken = decodeToken($headers['Authorization']);
                if($decodeToken["status"] == false){
                    $this->response(apiResult(false, null, $decodeToken['message']),self::HTTP_UNAUTHORIZED);
                    die;
                } 
            }
        }else{
            $decodeToken = decodeToken($headers['authorization']);
            if($decodeToken["status"] == false){
                $this->response(apiResult(false, null, $decodeToken['message']),self::HTTP_UNAUTHORIZED);
                die;
            } 
        }
    }
    public function decode_token (){
        $headers = apache_request_headers();
        if(!isset($headers['authorization'])){
            if(isset($headers['Authorization'])){
                return decodeToken($headers['Authorization']);
            }else{
                $this->response(apiResult(false, null, "Un Autorized!"),self::HTTP_UNAUTHORIZED);
                die;
            }
        }else{
            return decodeToken($headers['authorization']);
        }
    }
}
