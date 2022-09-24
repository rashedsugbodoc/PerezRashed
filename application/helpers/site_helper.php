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
        $weightLbs = $weightKg * 2.20462;

        return $weightLbs;
    }

    function convertlbsTokg($weightLbs) {
        $weightKg = $weightLbs / 2.20462;

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

    function convertMgtoMmol($mg) {
        $mmol = $mg / 18;

        return $mmol;
    }

    function convertMmoltoMg($mmol) {
        $mg = 18 * $mmol;

        return $mg;
    }

    function time_elapsed_string($datetime, $level = 7, $type = "time_elapsed") {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        if ($type === "full_age") {
            $string = array(
                'y' => 'Year',
                'm' => 'Month',
                'w' => 'Week',
                'd' => 'Day',
                'h' => 'Hour',
                'i' => 'Minute',
                's' => 'Second',
            );
        } else if ($type === "short_age") {
            $string = array(
                'y' => 'Yr',
                'm' => 'Mth',
                'w' => 'Wk',
                'd' => 'Day',
                'h' => 'Hr',
                'i' => 'min',
                's' => 'sec',
            );
        } else if ($type === "time_elapsed") {
            $string = array(
                'y' => 'year',
                'm' => 'month',
                'w' => 'week',
                'd' => 'day',
                'h' => 'hour',
                'i' => 'minute',
                's' => 'second',
            );
        } else {
            $string = array(
                'y' => 'year',
                'm' => 'month',
                'w' => 'week',
                'd' => 'day',
                'h' => 'hour',
                'i' => 'minute',
                's' => 'second',
            );
        }

        if ($type !== "short_age") {
            foreach ($string as $k => &$v) {
                if ($diff->$k) {
                    $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
                } else {
                    unset($string[$k]);
                }
            }
        } else {
            foreach ($string as $k => &$v) {
                if ($diff->$k) {
                    $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
                } else {
                    unset($string[$k]);
                }
            }
        }

        $string = array_slice($string, 0, $level);

        if ($type === "short_age" || $type === "full_age") {
            return $string ? implode(', ', $string) . '' : 'just now';
        } else {
            return $string ? implode(', ', $string) . ' ago' : 'just now';
        }
    }

    function getPersonAge($datetime, $level = 7) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        return $diff;
    }

?>