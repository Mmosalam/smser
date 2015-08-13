<?php

class Global_model extends CI_Model {

    function config() {
        $config = $this->db->get('config');
        $query = $config->row();

        $data = array(
            'siteName' => $query->siteName,
            'siteDefaultDate' => $query->siteDefaultDate,
            'siteStatue' => $query->siteStatue,
            'siteMetaDesc' => $query->siteMetaDesc,
            'siteMetaKW' => $query->siteMetaKW,
            'siteAnalytics' => $query->siteAnalytics,
            'siteAlexa' => $query->siteAlexa,
            'siteTimeZone' => $query->siteTimeZone,
            'siteDayLight' => $query->siteDayLight
        );
        $this->session->set_userdata($data);
        $this->is_online();
    }

    function is_online() {
        if (!$this->session->userdata('siteStatue')) {
            redirect('offline');
        }
    }

    function is_his($table, $id) {
        switch ($table) {
            case 'group':
                $table = 'users_groups';
                $filed = 'group_uid';
                $row_filed = 'user_uid';
                break;
        }
        $user_uid = $this->session->userdata('user_uid');
        $q = $this->db->query("SELECT * FROM `" . $table . "` WHERE `" . $filed . "` = $id LIMIT 1");
        if ($q->num_rows() > 0) {
            $row = $q->row();
            if ($row->$row_filed == $user_uid) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function have_permission($field) {
        $group_uid = $this->session->userdata('user_group');
        if ($group_uid == null) {
            redirect('client');
        }

        $q = $this->db->query("SELECT * FROM permission WHERE group_uid = $group_uid");
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $user_group = $row->$field;
            }
        }

        if (!isset($user_group) || $user_group != true) {
            redirect('error');
        }
    }

    function delete_selected_items($table, $id_field, $id, $table2, $id_field2) {
        $this->db->where($id_field, $id);
        $del = $this->db->delete($table);
        if ($table2 !== false && $id_field2 !== false) {
            $this->db->where($id_field2, $id);
            $del2 = $this->db->delete($table2);
        }
        if ($del) {
            return TRUE;
        } else {

            return FALSE;
        }
    }

}

?>