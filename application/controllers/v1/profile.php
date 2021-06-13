<?php
require_once("Base_ControllerApi.php");
class Profile extends Base_ControllerApi {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('userModel', 'users', TRUE);
    }
	public function index_get()
	{
		try {
            $user = $this->users->getById($this->decode_token()["data"]->id);
            $user[0]->image = base_url($user[0]->image);
            $user[0]->gender = $user[0]->gender == 'M'?'Male':'Female';
            $data['profile']=$user[0];
            $this->response(apiResult(true, $data, "Display profile"),self::HTTP_OK);
        } catch (\Exception $e) {
            $this->response(apiResult(false, null, $e->getMessage()),self::HTTP_NOT_FOUND);
        }
	}
   
}
