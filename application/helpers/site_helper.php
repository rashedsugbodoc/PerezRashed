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

    function convertkgTolbs($weightKg) {
        $weightLbs = $weightKg * 2.205;

        return $weightLbs;
    }

    function convertlbsTokg($weightLbs) {
        $weightKg = $weightLbs / 2.205;

        return $weightKg;
    }    

    function convertcmToin($heightCm) {
        $heightIn = $heightCm / 2.54;

        return $heightIn;
    }

    function convertinTocm($heightIn) {
        $heightCm = $heightIn * 2.54;

        return $heightCm;
    }

    function computeBmi($heightCm, $weightKg) {
        $meter = $heightCm / 100;
        $m2 = pow($meter, 2);
        $bmi = $weightKg / $m2;

        return $bmi;
    }

    function convertcelsiusTofahrenheit($celsiusTemp) {
        $fahrenheitTemp = ($celsiusTemp*9)/5+32;

        return $fahrenheitTemp;
    }

    function convertfahrenheitTocelsius($fahrenheitTemp) {
        $celsiusTemp = ($fahrenheitTemp-32)*5/9;

        return $celsiusTemp;
    }
?>