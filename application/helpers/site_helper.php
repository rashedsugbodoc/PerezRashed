<?php
function getDoctorInfo() {
// Search term
        $searchTerm = $this->input->post('searchTerm');

// Get users
        $response = $this->doctor_model->getDoctorInfo($searchTerm);

        echo json_encode($response);
    }


    function format_number_with_digits($number, $digits) {
        return substr(str_repeat(0, $digits).$number, - $digits);
    }
?>