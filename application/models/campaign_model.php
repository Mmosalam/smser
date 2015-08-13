<?php

class Campaign_model extends CI_Model {


    function add_action() {
		$group_uid = $this->input->post('group_uid');
        $message = $this->input->post('message');

		$all_group_contacts = $this->groups_model->getAllContactsForGroup($group_uid);

        if (!$all_group_contacts) {
            $this->messages->add("لم تقوم بأختيار جهات أتصال لأيصال الحملة اليهم.", "error");
            return;
        }
        // check credit
        $creditToDiscount = count($all_group_contacts);
        $user_credit = $this->getUserCredit($this->session->userdata('user_uid'));
        if ($user_credit < $creditToDiscount) {
            $this->messages->add("رصيدك الحالى لا يكفى لأنشاء الحملة.", "error");
            return;
        } else {
			$this->discountCreditPointsFromUser($this->session->userdata('user_uid'), $creditToDiscount);
        }

		$data = array(
			'UserId' => $this->session->userdata('user_uid'),
			'Msg' => $message
		);
        $this->db->insert('periorityregisteration', $data);
		
		if ($this->db->affected_rows() <= 0) 
		{
            $this->messages->add("خطأ فى الإضافة.", "error");
            return;
		}
		
        $PeriorityId = $this->db->insert_id();
		
		$this->db->trans_strict(FALSE);
		$this->db->trans_start();
		foreach($all_group_contacts as $contact)
		{
			$data = array(
				'User' => $this->session->userdata('user_uid'),
				'Mobile' => $contact->users_groups_contacts_number,
				'Network' => $contact->prov_uid,
				'PeriorityId' => $PeriorityId,
				'Status' => 'No'
			);
			$this->db->insert('userrequest', $data);
			
		}
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			$this->messages->add("خطأ فى الإضافة", "error");
		}
		else
		{
			$this->db->trans_commit();
			$this->messages->add("لقد تم أضافة الحملة بنجاح .", "success");
		}
    }
	
    function getUserCredit($user_uid) {
        $q = $this->db->get_where('credit', array('user_uid' => $user_uid));
        if ($q->num_rows() > 0) {
            $row = $q->row();
            return $row->credit_amount;
        } else {
            return false;
        }
    }

    function discountCreditPointsFromUser($id, $amount) {
        $this->db->query('UPDATE credit SET credit_amount = credit_amount - ' . $amount . ' WHERE user_uid = ' . $id);
		$data = array(
			'user_uid' => $this->session->userdata('user_uid'),
			'credit_history_amount' => $amount,
			'credit_history_type' => 2
		);
		$this->db->insert('credit_history', $data);
    }


}

?>