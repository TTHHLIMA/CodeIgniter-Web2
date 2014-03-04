<?php

class Captcha_model extends CI_Model {

    // HH: creo su contructor
    public function construct() {
        parent::__construct();
        $this->load->database();
    }

    function setCaptcha() {
        $this->load->helper('captcha');
        $vals = array(
            'img_path' => './captcha',
            'img_url' => base_url() . '/captcha',
            'expiration' => 3600, // one hour
            'font_path' => './system/fonts/georgia.ttf',
            'img_width' => '140',
            'img_height' => 30,
            'word' => random_string('numeric', 6),
        );

        $cap = create_captcha($vals);
        //var_dump($cap);
        if ($cap) {
            $capdb = array(
                'captcha_id' => '',
                'captcha_time' => $cap['time'],
                'ip_address' => $this->input->ip_address(),
                'word' => $cap['word']
            );
            $query = $this->db->insert_string('captcha', $capdb);
            $this->db->query($query);
        } else {
            return "Captcha not work";
        }

        return $cap['image'];
    }

}