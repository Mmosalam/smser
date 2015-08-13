<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
  * This is the Client controller
  *
  * The Client controller responsible for all client area functions
  *
  * @author Ebrahim Elsawy <elsawy_2020@hotmail.com>
  * @copyright 2015 Eng. Mahmoud Mosalam
  * @version 1.0
  */
  
class Client extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->global_model->config();
        $this->load->model('login_model');
        $this->load->library('form_validation');
        $this->load->model('global_model');
        $this->load->model('groups_model');
        $this->load->model('campaign_model');
    }

    /**
     * Check if the user logged on or not if not will display the login form
	 * else it will redirect to the client summry page
     */

    public function index() {

        $session = $this->session->all_userdata();
        if (isset($session['is_logged_in']) && $session['is_logged_in'] == true) {
            redirect('client/summary');
        }
        //Check if is set login error counter and > 3 times and load captcha for security reasons
        if (isset($session['error_login']) && $session['error_login'] > 3) {
            //create capatcha
            $vals = array(
                'img_path' => './captcha/',
                'img_url' => base_url() . 'captcha/',
                'img_width' => 120,
                'expiration' => 3600,
                'border' => 0,
                'img_height' => 30
            );
            $cap = create_captcha($vals);
            $dataa = array(
                'captcha_time' => $cap['time'],
                'ip_address' => $this->input->ip_address(),
                'word' => $cap['word']
            );
            $query = $this->db->insert_string('captcha', $dataa);
            $this->db->query($query);
            $data['cap'] = $cap;
            //load login view with capatcha
            $data['main_content'] = 'login/login_cap';
        } else {
            //load login view without capatcha
            $data['main_content'] = 'login/login';
        }
        //set page title
        $data['pageTitle'] = 'تسجيل الدخول';
        //initialize the validation class
        $this->form_validation->set_rules('user_uname', 'رقم الجوال', 'required|numeric|strip_tags');
        $this->form_validation->set_rules('user_pwd', 'كلمة المرور', 'required|strip_tags');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('includes/template-login', $data);
        } else {
            if (isset($session['error_login']) && $session['error_login'] > 3) {
                $check = $this->login_model->validate_cap();
                if ($check) {
                    redirect('client/summary');
                } else {
                    $this->load->view('includes/template-client', $data);
                }
            } else {
                $check = $this->login_model->validate();
                if ($check) {
                    redirect('client/summary');
                } else {
                    $this->load->view('includes/template-client', $data);
                }
            }
        }
    }

    /**
     * Logout from client area and destroy the session the redirect to login form
     */

    function logout() {
        $this->session->sess_destroy();
        redirect('client');
    }

    /**
     * display the register form to allow the client to create new account
     */

    function register() {
		// to do
    }
	
    /**
     * display the summary view about the user after login
     */
	
    function summary() {
        $this->global_model->have_permission('client');
        $data['main_content'] = 'client/summary_view';
        $data['pageTitle'] = 'نظرة عامة على حسابك';
        $this->load->view('includes/template', $data);
    }
	
    /**
     * add a group of numbers and filter them according to the operators and insert into db
     */

    function addGroup() {
        $data['main_content'] = 'client/groups_add_view';
        $data['pageTitle'] = "إنشاء قائمة أرسال جديدة";

        $this->form_validation->set_rules('group_name', 'أسم القائمة', 'required|strip_tags');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('includes/template', $data);
        } else {
            $this->groups_model->add_action();
            redirect('client/groups');
        }
    }
	
    /**
     * display all user groups and show option to controll this groups
     */
	 
    function groups() {
        $this->global_model->have_permission('client');
        //start pagination
        $this->load->library('pagination');
        $config['base_url'] = site_url('client/groups');
        $config['total_rows'] = $this->db->get_where('users_groups', array('user_uid' => $this->session->userdata('user_uid')))->num_rows();
        $config['per_page'] = 10;
        $config['num_links'] = 5;
        $config['uri_segment'] = 3;
        $config['use_page_numbers'] = false;
        $config['full_tag_open'] = '<ul class="pagination pagination-sm">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_link'] = '>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '<';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['first_link'] = 'الأول';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'الأخير';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        //end pagination
        $data['rows'] = $this->groups_model->getAll($config['per_page'], $this->uri->segment(3));
        $data['main_content'] = 'client/groups_view';
        $data['pageTitle'] = 'قوائم الأرسال';
        $this->load->view('includes/template', $data);
    }
	
    /**
     * display a specific group by ID 
	 * The group ID
     */

    function groupView() {
        $this->global_model->have_permission('client');
        $is_his = $this->global_model->is_his('group', $this->uri->segment(3));
        if (!$is_his) {
            $this->messages->add("الصفحة المطلوبة غير موجودة.", "error");
            redirect('client/groups');
        }

        //start pagination
        $this->load->library('pagination');
        $config['base_url'] = site_url('client/groupView/' . $this->uri->segment(3));
        $config['total_rows'] = $this->db->get_where('users_groups_contacts', array('users_groups_uid' => $this->uri->segment(3)))->num_rows();
        $config['per_page'] = 20;
        $config['num_links'] = 5;
        $config['uri_segment'] = 4;
        $config['use_page_numbers'] = false;
        $config['full_tag_open'] = '<ul class="pagination pagination-sm">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_link'] = '>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '<';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['first_link'] = 'الأول';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'الأخير';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        //end pagination
        $data['rows'] = $this->groups_model->getGroupContactNumbers($this->uri->segment(3), $config['per_page'], $this->uri->segment(4));
        $data['main_content'] = 'client/group_view';
        $data['pageTitle'] = 'عرض جهات أتصال القائمة ' . $this->groups_model->getUserGroupName($this->uri->segment(3));
        $this->load->view('includes/template', $data);
    }

    /**
     * Export a specific group by ID to Excel file 
     * @param integar $id
	 * The group ID
     */

    function groupExport($id) {
        $query = $this->db->query("SELECT users_groups_contacts_number,prov_uid FROM users_groups_contacts WHERE users_groups_uid = $id");

        $this->load->library('excel');

        $this->excel->getActiveSheet()->setTitle('Group number '.$id);

        $count = $query->num_rows()+1;

        $this->excel->getActiveSheet()
                ->getColumnDimension('A')
                ->setWidth(15);
        $this->excel->getActiveSheet()->getStyle('A')->getNumberFormat()->setFormatCode('0000000');
        foreach ($query->result() as $row => $res) {
            switch ($res->prov_uid) {
                case(5):
                    $res->prov_uid = "Viva";
                    break;
                case(6):
                    $res->prov_uid = "Ooredoo-Wataniya";
                    break;

                case(9):
                    $res->prov_uid = "Zain";
                    break;
            }
            //$row=0;
            $this->excel->getActiveSheet()->setCellValue('A' . $row, $res->users_groups_contacts_number);
            $this->excel->getActiveSheet()->setCellValue('B' . $row, $res->prov_uid);


        }
        $row++;
        $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $filename = 'Group number '.$id. '.xlsx'; //save our workbook as this file name
        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache
        //if you want to save it as .XLSX Excel 2007 format
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');
        //force user to download the Excel file without writing it to server's HD
        $objWriter->save('php://output');
    }
	
    /**
     * Delete a specific group by ID and all contacts related to this group 
     * @param integar $id
	 * The group ID
     */

    function users_groups_del($id) {
        $result = $this->global_model->delete_selected_items("users_groups", "group_uid", $id, 'users_groups_contacts', 'users_groups_uid');
        if ($result == true) {
            $this->messages->add("تم حذف القائمة وجهات الأتصال بنجاح.", "success");
        } else {
            $this->messages->add("حدث خطأ أثناء الحذف.", "error");
        }
        redirect("client/groups");
    }

    /**
     * Delete a specific contact from a group by it's ID
     * @param integar $id
	 * The contact ID
     */

    function users_groups_contacts_del($id) {
        $result = $this->global_model->delete_selected_items("users_groups_contacts", "users_groups_contacts_uid", $id, false, false);
        if ($result == true) {
            $this->messages->add("تم حذف جهة الأتصال بنجاح.", "success");
        } else {
            $this->messages->add("حدث خطأ أثناء الحذف.", "error");
        }
        redirect("client/groups/");
    }
	
    /**
     * Update a specific group by adding new contacts
     * @param integar $id
	 * The group ID
     */

    function groupUpdate($id = '') {
        $this->global_model->have_permission('client');
        $data['main_content'] = 'client/groups_contacts_add_view';
        $data['pageTitle'] = "أضافة جهات أتصال للقائمة";
        $data['id'] = $id;

        $this->form_validation->set_rules('type', 'طريقة الأضافة', 'required|strip_tags');

        if ($this->input->post('type') == 'editor') {
            $this->form_validation->set_rules('editor', 'الأرقام', 'required|strip_tags');
        } elseif ($this->input->post('type') == 'csv') {
            if (empty($_FILES['userfile']['name'])) {
                $this->form_validation->set_rules('userfile', 'ملف CSV', 'required|strip_tags');
            }
        }

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('includes/template', $data);
        } else {
            $id = $this->groups_model->add_contacts_action();
            redirect('client/groups');
        }
    }

    /**
     * insert new campaign into db 
     */

    function send() {
        $this->global_model->have_permission('client');
        $data['main_content'] = 'client/send_view';
        $data['pageTitle'] = "ارسال رسالة جماعية";

        $this->form_validation->set_rules('message', 'محتوى الرسالة', 'required|strip_tags');
        $this->form_validation->set_rules('group_uid', 'أسم القائمة', 'required|strip_tags');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('includes/template', $data);
        } else {
            $this->campaign_model->add_action();
            redirect('client/send');
        }
    }
	

}

