<?php
require_once("Base_ControllerApi.php");
class History extends Base_ControllerApi {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('eventBookModel', 'event_book', TRUE);
    }
	public function index_get()
	{
		try {
            $event = $this->event_book->getByUser($this->decode_token()["data"]->id);
            $event_list=[];
            if (isset($event)) {
                foreach ($event as $value) {
                    $value['banner_image'] = base_url($value['banner_image']);
                   array_push($event_list,$value);
                }
            }
            $data['event']=$event_list;
            $this->response(apiResult(true, $data, "Display all history"),self::HTTP_OK);
        } catch (\Exception $e) {
            $this->response(apiResult(false, null, $e->getMessage()),self::HTTP_NOT_FOUND);
        }
	}
   
}
