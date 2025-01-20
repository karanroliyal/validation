<?php
defined('BASEPATH') or exit('No direct script access allowed');

class InsertController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function insert()
    {

        // form validation from php
        $fields = [
            [
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required|trim|min_length[2]|regex_match[/^[a-zA-Z ]+$/]'
            ],
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|trim|valid_emails'
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|trim|min_length[8]|max_length[15]'
            ],
            [
                'field' => 'phone',
                'label' => 'Phone',
                'rules' => 'required|trim|exact_length[10]|numeric'
            ],
            [
                'field' => 'gender[]',
                'label' => 'Gender',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'languages[]',
                'label' => 'Languages',
                'rules' => 'required|trim'
            ],
        ];

        $keys=[];
        $values=[];

        // validation for image
        if (empty($_FILES['image']['name'])) {
            $this->form_validation->set_rules("image", "Image", 'required');
            array_push($keys , 'image');
            array_push($values , form_error('image'));
        }

        $this->form_validation->set_rules($fields);

        if($this->form_validation->run()){

            // getting form data here 
            $postData = $this->input->post();
            print_r($postData);

        }
        else{
            for($i=0 ; $i<count($fields) ; $i++){
                if(!empty(form_error($fields[$i]['field']))){
                    array_push($keys , $fields[$i]['field']);
                    array_push($values  , form_error($fields[$i]['field'])) ;
                }
            }

            echo json_encode(['errorKeys'=>$keys , 'errorValues'=>$values , 'fields'=>'fields']);
        }

    }
}
