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

    function computeAge($birthDateString) {

        $birthDate = strtotime($birthDateString);
        $birthDate = date('m/d/Y', $birthDate);
        $birthDate = explode("/", $birthDate);
        $year = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md") ? ((date("Y") - $birthDate[2]) - 1) : (date("Y") - $birthDate[2]));
        $month = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md") ? ((date("m") - $birthDate[0]) - 1) : (date("m") - $birthDate[0]));

        return $year;
        
    }
?>