<?php

class Groups_model extends CI_Model {

    function getAll($limit, $offsit) {
        $q = $this->db->get_where('users_groups', array('user_uid' => $this->session->userdata('user_uid')), $limit, $offsit);
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row;
            }
            return $data;
        } else {
            return false;
        }
    }

    function getAllGroupsForUser($user_uid = '') {
		$user_uid = $this->session->userdata('user_uid');
        $this->db->order_by("group_uid", "asc");
        $q = $this->db->get_where('users_groups', array('user_uid' => $user_uid));
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row;
            }
            return $data;
        } else {
            return false;
        }
    }

    function getUserGroupName($group_uid) {
        $this->db->order_by("group_name", "asc");
        $q = $this->db->get_where('users_groups', array('group_uid' => $group_uid));
        if ($q->num_rows() > 0) {
            $row = $q->row();
            return $row->group_name;
        } else {
            return false;
        }
    }

    function getGroupContactsNumber($id) {
        $q = $this->db->get_where('users_groups_contacts', array('users_groups_uid' => $id));
        return $q->num_rows();
    }

    function searchNumber($users_groups_contacts_number) {
        $q = $this->db->get_where('users_groups_contacts', array('users_groups_contacts_number' => $users_groups_contacts_number));
        if ($q->num_rows() > 0) {
            $row = $q->row();
            $data[] = $row;
            return $data;
        } else {
            return false;
        }
    }

    function getAllContactsForGroup($id) {

        $q = $this->db->get_where('users_groups_contacts', array('users_groups_uid' => $id));
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row;
            }
            return $data;
        } else {
            false;
        }
    }

    function getGroupContactNumbers($id, $limit, $offsit) {
        $q = $this->db->get_where('users_groups_contacts', array('users_groups_uid' => $id), $limit, $offsit);
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row;
            }

            return $data;
        } else {
            return false;
        }
    }

    function add_action() {
		ini_set('upload_max_filesize', '10M');
		ini_set('post_max_size', '10M');
		ini_set('max_input_time', 900);
		ini_set('max_execution_time', 900);
		
        $group_name = $this->input->post('group_name');

        $data = array(
            'group_name' => $group_name,
            'user_uid' => $this->session->userdata('user_uid')
        );
        $this->db->insert('users_groups', $data);

        if ($this->db->affected_rows() > 0) {
			$users_groups_uid = $this->db->insert_id();
        } else {
            $this->messages->add("لقد حدث خطأ أثناء الأضافة.", "error");
			return;
        }

        $notValid = array();
        $valid = array();
        $type = $this->input->post('type');

        if ($type == 'editor') {
            $numbers = $this->input->post('editor');
            //srtip tags
            $numbers = str_replace(" ", "", $numbers);
            $numbers = str_replace("-", "\n", $numbers);
            $numbers = str_replace("/", "\n", $numbers);
            $numbers = str_replace(",", "\n", $numbers);
            $numbers = explode("\n", $numbers);
        } elseif ($type == 'csv') {
            $config['upload_path'] = EXCEL_FILES;
            $config['allowed_types'] = 'xls|xlsx';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload()) {
                $this->messages->add($this->upload->display_errors(), "error");
                $numbers = $this->upload->display_errors();
            } else {
                $fInfo = $this->upload->data();
                $file = ($fInfo['full_path']);
                $this->load->library('excel');
                $objReader = PHPExcel_IOFactory::createReader("Excel2007");
                $objPHPExcel = $objReader->load($file);
                $highestRow = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
                foreach ($objPHPExcel->setActiveSheetIndex()->getRowIterator(1, $highestRow) as $row) {
                    $cellIterator = $row->getCellIterator();
                    $cellIterator->setIterateOnlyExistingCells(false);
                    foreach ($cellIterator as $cell) {
                        if (!is_null($cell)) {
                            $value = $cell->getCalculatedValue();
                            $new[] = explode(',', $value);
                        }
                    }
                }
            }

            $numbers = call_user_func_array("array_merge", $new);
        }
        //print_r($numbers);exit;
        $numbers = array_filter($numbers, create_function('$a', 'return trim($a)!=="";'));

        //remove duplicate & get total $duplicate numbers count
        $filtered_duplication_array = array_unique($numbers);
        //print_r($filtered_duplication_array);exit;

        $added = 0;
        $duplicate = 0;
		$out = 0;
		
        $duplicate = count($numbers) - count($filtered_duplication_array);
		
		if(count($filtered_duplication_array) < 1)
		{
			$this->messages->add("لا يمكن أضافة قائمة أرقام فارغة.", "error");
			$this->global_model->delete_selected_items("users_groups", "group_uid", $users_groups_uid, false, false);
			return;
			
		}
		
		$this->db->trans_strict(FALSE);
		$this->db->trans_start();
        foreach ($filtered_duplication_array as $contact){
			
			if(strpos($contact, '+') > -1)
			{
			   $contact = str_replace("+","00",$contact);
			}

			if (substr($contact, 0, 1) !== "0")
			{
				$contact = '00965'.$contact;
			}
			
			$contact = preg_replace('/\s+/', '', $contact);
			
			$prov_uid = substr($contact, 5, 1);
			
			if ((substr($contact, 5, 1) === '5' || substr($contact, 5, 1) === '6' || substr($contact, 5, 1) === '9') && is_numeric($contact) && strlen($contact) === 13)
			{
				$this->db->query("INSERT INTO `users_groups_contacts` (`users_groups_uid`, `users_groups_contacts_number`, `prov_uid`)
				 VALUES ('" . $users_groups_uid . "', '" . $contact . "'," . $prov_uid . ")");
				$added++;
			}
			else
			{
				$out++;
			}
		}
		
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE)
		{
			$this->messages->add("حدث خطأ أثناء الأضافة.", "error");
		}
		else
		{
			$this->messages->add("لقد تم أضافة عدد " . $added . " رقم بنجاح", "success");
			$this->messages->add("تم أستبعاد عدد " . $duplicate . " رقم للتكرار", "error");
			$this->messages->add("تم أستبعاد عدد " . $out . " رقم غير صحيح", "error");
		}
    		
    }

    function add_contacts_action() {
        $users_groups_uid = $this->input->post('users_groups_uid');
        $notValid = array();
        $valid = array();
        $type = $this->input->post('type');

        if ($type == 'editor') {
            $numbers = $this->input->post('editor');
            //srtip tags
            $numbers = str_replace(" ", "", $numbers);
            $numbers = str_replace("-", "\n", $numbers);
            $numbers = str_replace("/", "\n", $numbers);
            $numbers = str_replace(",", "\n", $numbers);
            $numbers = explode("\n", $numbers);
        } elseif ($type == 'csv') {
            $config['upload_path'] = EXCEL_FILES;
            $config['allowed_types'] = 'xls|xlsx';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload()) {
                $this->messages->add($this->upload->display_errors(), "error");
                $numbers = $this->upload->display_errors();
            } else {
                $fInfo = $this->upload->data();
                $file = ($fInfo['full_path']);
                $this->load->library('excel');
                $objReader = PHPExcel_IOFactory::createReader("Excel2007");
                $objPHPExcel = $objReader->load($file);
                $highestRow = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
                foreach ($objPHPExcel->setActiveSheetIndex()->getRowIterator(1, $highestRow) as $row) {
                    $cellIterator = $row->getCellIterator();
                    $cellIterator->setIterateOnlyExistingCells(false);
                    foreach ($cellIterator as $cell) {
                        if (!is_null($cell)) {
                            $value = $cell->getCalculatedValue();
                            $new[] = explode(',', $value);
                        }
                    }
                }
            }

            $numbers = call_user_func_array("array_merge", $new);
        }
        //print_r($numbers);exit;
        $numbers = array_filter($numbers, create_function('$a', 'return trim($a)!=="";'));

        //remove duplicate & get total $duplicate numbers count
        $filtered_duplication_array = array_unique($numbers);

        $added = 0;
        $duplicate = 0;
		$out = 0;
		
        $duplicate = count($numbers) - count($filtered_duplication_array);
		
		if(count($filtered_duplication_array) < 1)
		{
			$this->messages->add("لم تقوم بإضافة ارقام جديدة", "error");
			$this->global_model->delete_selected_items("users_groups", "group_uid", $users_groups_uid, false, false);
			return;
		}

        $all_numbers = $this->getAllNumbers($users_groups_uid);

		
		$this->db->trans_strict(FALSE);
		$this->db->trans_start();
        foreach ($filtered_duplication_array as $contact){
				
			if(strpos($contact, '+') > -1)
			{
			   $contact = str_replace("+","00",$contact);
			}

			if (substr($contact, 0, 1) !== "0")
			{
				$contact = '00965'.$contact;
			}
				
			$contact = preg_replace('/\s+/', '', $contact);
				
			$prov_uid = substr($contact, 5, 1);
            if (!in_array(trim($contact), $all_numbers)) {
				if ((substr($contact, 5, 1) === '5' || substr($contact, 5, 1) === '6' || substr($contact, 5, 1) === '9') && is_numeric($contact) && strlen($contact) === 13)
				{
					$this->db->query("INSERT INTO `users_groups_contacts` (`users_groups_uid`, `users_groups_contacts_number`, `prov_uid`)
					 VALUES ('" . $users_groups_uid . "', '" . $contact . "'," . $prov_uid . ")");
					$added++;
				}
				else
				{
					$out++;
				}
			}
			else
			{
				$duplicate++;	
			}
		}
		
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE)
		{
			$this->messages->add("حدث خطأ أثناء الأضافة.", "error");
		}
		else
		{
			$this->messages->add("لقد تم أضافة عدد " . $added . " رقم بنجاح", "success");
			$this->messages->add("تم أستبعاد عدد " . $duplicate . " رقم للتكرار", "error");
			$this->messages->add("تم أستبعاد عدد " . $out . " رقم غير صحيح", "error");
		}
    }

    function getAllNumbers($users_groups_uid) {
        $data = array();
        $q = $this->db->query("SELECT users_groups_contacts_number FROM users_groups_contacts WHERE users_groups_uid = $users_groups_uid");
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row->users_groups_contacts_number;
            }
            return $data;
        } else {
            return $data;
        }
    }


}

?>