<?php

class Login_model extends CI_Model {

    function validate() {
        $user_uname = $this->input->post('user_uname');
        $user_pwd = md5($this->input->post('user_pwd'));

        $this->db->where('user_uname', $user_uname);
        $this->db->where('user_pwd', $user_pwd);
        $query = $this->db->get('dx_users');

        if ($query->num_rows == 1) {
            $row = $query->row();
            if ($row->user_banned == 1) {
                $this->messages->add("لقد تم حظرك، بسبب : ' " . $row->user_ban_reason . " '", "error");
                return false;
            }
            if ($row->user_actived == 0) {
                $this->messages->add("حسابك غير مفعل برجاء التواصل مع الأدارة.", "error");
                return false;
            }
            $user_ip = $_SERVER['REMOTE_ADDR'];
            $q = $this->db->query("UPDATE `dx_users` SET  
						`user_last_login` =  CURRENT_TIMESTAMP,
						`user_last_ip` =  '$user_ip'
						 WHERE `user_uname` = '$user_uname'");
       
	        $data = array(
                'user_username' => $row->user_uname,
                'user_uid' => $row->user_uid,
                'user_email' => $row->user_email,
                'user_full_name' => $row->user_full_name,
                'user_group' => $row->group_uid,
                'user_last_login' => $row->user_last_login,
                'user_last_ip' => $row->user_last_ip,
                'is_logged_in' => true
            );
            $this->session->set_userdata($data);
            return true;
        } else {
            $session = $this->session->all_userdata();
            if (isset($session['error_login'])) {
                $data = array(
                    'error_login' => $session['error_login'] + 1
                );
            } else {

                $data = array(
                    'error_login' => 1
                );
            }
            $this->session->set_userdata($data);

            $this->messages->add("رقم الجوال أو كلمة المرور غير صحيحة.", "error");

            return false;
        }
    }

}

?>