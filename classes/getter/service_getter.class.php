<?php

class service_getter {

    function get_service_id() {
        return $this->fields['service_id'];
    }

    function get_service_name() {
        return $this->fields['service_name'];
    }

    function get_service_amount() {
        return $this->fields['service_amount'];
    }

    function get_service_active() {
        return $this->fields['service_active'];
    }

    function get_last_modifed() {
        return $this->fields['last_modifed'];
    }

}
?>
