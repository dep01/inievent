<?php
use chriskacerguis\RestServer\RestController;
use \Firebase\JWT\JWT;
class Signin extends RestController {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('userModel', 'users', TRUE);
    }
	public function index_post()
	{
		try {
            $data = json_decode($this->input->raw_input_stream, true);
            if (!isset($data['email'])){throw new Exception("Email must be input!");}
            if (!isset($data['password'])){throw new Exception("password must be input!");}
            $check = [
                "username"=>$data['email'],
                "password"=>md5($data['password'])
            ];
            $logindata = $this->users->CheckLogin($check);
            if(!$logindata){
                throw new Exception("Account not found!");
            }
			$generate['id'] = $logindata[0]->id;
			$generate['first_name'] = $logindata[0]->first_name;
			$generate['last_name'] = $logindata[0]->last_name;
			$generate['phone'] = $logindata[0]->phone;
			$generate['email'] = $logindata[0]->email;
            $token = generateToken($generate);
			$return['access_token'] = $token;
			$return['first_name'] = $logindata[0]->first_name;
			$return['last_name'] = $logindata[0]->last_name;
			$return['phone'] = $logindata[0]->phone;
			$return['email'] = $logindata[0]->email;
            $this->response(apiResult(true, $return, "Login success"),self::HTTP_OK);
        } catch (\Exception $e) {
            $this->response(apiResult(false, null, $e->getMessage()),self::HTTP_NOT_FOUND);
        }
	}
   
}
