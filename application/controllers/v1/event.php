<?php
require_once("Base_ControllerApi.php");
class Event extends Base_ControllerApi {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('userModel', 'users', TRUE);
        $this->load->model('eventModel', 'event', TRUE);
        $this->load->model('eventBookModel', 'event_book', TRUE);
    }
	public function index_get()
	{
		try {
            $event = $this->event->getAll();
            $event_list=[];
            if (isset($event)) {
                foreach ($event as $value) {
                   $value['banner_image'] = base_url($value['banner_image']);
                   array_push($event_list,$value);
                }
            }
            $data['event']=$event_list;
            $this->response(apiResult(true, $data, "Display all event!"),self::HTTP_OK);
        } catch (\Exception $e) {
            $this->response(apiResult(false, null, $e->getMessage()),self::HTTP_NOT_FOUND);
        }
	}

    public function index_post(){
        $body = json_decode($this->input->raw_input_stream, true);
        try {
            if (!isset($body['first_name'])){throw new Exception("Firstname must be input!");}
            if (!isset($body['last_name'])){throw new Exception("Lastname must be input!");}
            if (!isset($body['phone'])){throw new Exception("Phone must be input!");}
            if (!isset($body['email'])){throw new Exception("Email must be input!");}
            if (!isset($body['event_id'])){throw new Exception("Please pick your event!");}
            if (!isset($body['qty'])){throw new Exception("Qty must be input!");}
            if (!isset($body['date'])){throw new Exception("Date must be input!");}
            $event = $this->event->getById($body['event_id']);
            if(!isset($event)){throw new Exception("No Data Found");}
            $input = [
                "event_id"=>$body['event_id'],
                "user_id"=>$this->decode_token()["data"]->id,
                "first_name"=>$body['first_name'],
                "last_name"=>$body['last_name'],
                "phone"=>$body['phone'],
                "email"=>$body['email'],
                "booking_date"=>$body['date'],
                "booking_qty"=>$body['qty'],
                "booking_price"=>$body['qty'] * $event[0]->price,
            ];
            $this->event_book->add($input);
            $this->response(apiResult(true, $input, "Event Success Book"),self::HTTP_OK);
        } catch (\Exception $e) {
            $this->response(apiResult(false, null, $e->getMessage()),self::HTTP_BAD_REQUEST);
        }
    }
   
}
