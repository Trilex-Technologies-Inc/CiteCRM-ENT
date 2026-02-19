<?php

class company_meeting_getter {
    function get_company_meeting_id() {
        return $this->fields['company_meeting_id'];
    }

    function get_company_id() {
        return $this->fields['company_id'];
    }

    function get_company_meeting_start() {
        return $this->fields['company_meeting_start'];
    }

    function get_company_meeting_end() {
        return $this->fields['company_meeting_end'];
    }

    function get_company_meeting_subject() {
        return $this->fields['company_meeting_subject'];
    }

    function get_company_meeting_text() {
        return $this->fields['company_meeting_text'];
    }

    function get_company_meeting_created_by() {
        return $this->fields['company_meeting_created_by'];
    }

    function get_company_meeting_active() {
        return $this->fields['company_meeting_active'];
    }

    function get_last_modified() {
        return $this->fields['last_modified'];
    }

}

?>