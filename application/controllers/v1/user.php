<?php
use chriskacerguis\RestServer\RestController;
use \Firebase\JWT\JWT;
class User extends RestController{
    // constructor
    public function __construct(){
        parent::__construct();
        $this->load->model('UserModel','users');
    }
    public function index_post(){
        try {
            $data = json_decode($this->input->raw_input_stream, true);
            if (!isset($data['first_name'])){throw new Exception("Firstname must be input!");}
            if (!isset($data['last_name'])){throw new Exception("Lastname must be input!");}
            if (!isset($data['gender'])){throw new Exception("Gender must be input!");}
            if (!isset($data['password'])){throw new Exception("password must be input!");}
            if (!isset($data['phone'])){throw new Exception("Phone must be input!");}
            if (!isset($data['email'])){throw new Exception("Email must be input!");}
            $emailFound = $this->users->checkEmailAvail($data['email']);
            $phoneFound = $this->users->checkPhoneAvail($data['phone']);
            if($emailFound){
                throw new Exception("Email is used");
            } elseif($phoneFound){
                throw new Exception("Phone is used");
            }
            $insert = [
                "first_name" => $data['first_name'],
                "last_name" => $data['last_name'],
                "gender" => $data['gender'],
                "password" => md5($data['password']),
                "email" => $data['email'],
                "phone" => $data['phone'],
                "user_type_code" => "01",
				'created_by'  =>'MOBILE',
				'created_date'  => date('Y-m-d H:i:s'),
				'updated_by'  => 'MOBILE',
				'updated_date'  => date('Y-m-d H:i:s')	
            ];
			$response = $this->users->add($insert);
			$generate['id'] = $response[0]->id;
			$generate['first_name'] = $data['first_name'];
			$generate['last_name'] = $data['last_name'];
			$generate['phone'] = $data['phone'];
			$generate['email'] = $data['email'];
            $token = generateToken($generate);
			$return['access_token'] = $token;
			$return['first_name'] = $data['first_name'];
			$return['last_name'] = $data['last_name'];
			$return['phone'] = $data['phone'];
			$return['email'] = $data['email'];
            $this->response(apiResult(true, $return, "Hai ".$data['first_name'].' '.$data['last_name']),self::HTTP_OK);
        } catch (\Exception $e) {
            $this->response(apiResult(false, null, $e->getMessage()),self::HTTP_BAD_REQUEST);
        }
    }
    public function index_get(){
        // testing response
        try {
            $headers = apache_request_headers();
            if (!isset($headers['Authorization'])) {
                throw new Exception("UN AUTHORIZED!");
            }
            $data['id'] = 'b69aa499-cb34-11eb-a86a-00f48dc381a4';
            $data['first_name'] = 'ssss';
            $data['last_name'] = 'zdgf';
            $data['phone'] = '32465';
            $data['email'] = '21354';
            $token = generateToken($data);
            $decodeToken = decodeToken($headers['Authorization']);
            if($decodeToken["status"] == false){
                throw new Exception($decodeToken['message']);
            }
            $response['access_token']=$token;
            $response['first_name'] = 'ssss';
            $response['last_name'] = 'zdgf';
            $response['phone'] = '32465';
            $response['email'] = $headers['Authorization'];
            $response['decode']=  $decodeToken['data'];
            //tampilkan response
            $this->response(apiResult(true, $response, "hahaah"),self::HTTP_OK);
        } catch (\Exception $e) {
            $this->response(apiResult(false, null, $e->getMessage()),self::HTTP_UNAUTHORIZED);

        }
       
    }
}
?>