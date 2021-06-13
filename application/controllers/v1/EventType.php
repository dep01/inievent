<?php
use \Firebase\JWT\JWT;
require_once("Base_ControllerApi.php");
class EventType extends Base_ControllerApi{
// constructor
  public function __construct(){
    parent::__construct();
    $this->load->model('EventTypeModel','type');
  }
public function index_get(){
// testing response
    // $data=$this->type->getData();
    $key = $_ENV["JWT_KEY"];
    // print_r($key);die;
    // if($data){
    $token = array(
      "id"=>"oduvhg923782",
      "name"=>"diaz",
    );
    $jwt = JWT::encode($token,$key);
    $jwt_d = JWT::decode($jwt,$key, array('HS256'));
    $data['token']=$jwt;
    $data['data']=$jwt_d;
      $this->response(apiResult(true, $data, "display all data"),self::HTTP_OK);
    // }else{
    //   $this->response(apiResult(false, null, "no data"),self::HTTP_NOT_FOUND);
    // }
  }
  public function user_get(){
    // testing response
    $response['status']=200;
    $response['error']=false;
    $response['message']='Hai from response';
    $response['user']['username']='erthru';
    $response['user']['email']='ersaka96@gmail.com';
    $response['user']['detail']['full_name']='Suprianto D';
    $response['user']['detail']['position']='Developer';
    $response['user']['detail']['specialize']='Android,IOS,WEB,Desktop';
//tampilkan response
    $this->response($response,self::HTTP_OK);
}
}
?>