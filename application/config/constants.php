<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code


/*
|--------------------------------------------------------------------------
| Application Constants
|--------------------------------------------------------------------------
|
| These constants are used within application functions to define fixed
| duration, lengths, formatting, etc.
|
*/
define('COMPANY_ID_LENGTH', 5);
define('SYSTEMHOSPITALID', '01');

/*ENCOUNTER STATUS*/
define('ENCOUNTER_STATUS_WAITING', 1);
define('ENCOUNTER_STATUS_READY_TO_SERVE', 2);
define('ENCOUNTER_STATUS_STARTED', 3);
define('ENCOUNTER_STATUS_ENDED', 4);
define('ENCOUNTER_STATUS_CANCELLED', 5);
define('ENCOUNTER_STATUS_RESCHEDULED', 6);
define('ENCOUNTER_STATUS_TRIAGE', 7);
define('ENCOUNTER_STATUS_ADMITTED', 8);
define('ENCOUNTER_STATUS_DISCHARGED', 9);
define('ENCOUNTER_STATUS_LEAVE', 10);
define('ENCOUNTER_STATUS_PREPARING', 11);
define('ENCOUNTER_STATUS_STAFF_ON_THE_WAY', 12);
define('ENCOUNTER_STATUS_STAFF_HAS_ARRIVED', 13);
define('ENCOUNTER_STATUS_SERVICE_BEING_RENDERED', 14);

/*TSEKAP FILTER*/
define('TSEKAP_SEXUALHEALTH_FEMALEAGE_MINIMUM', 10);
define('TSEKAP_SEXUALHEALTH_FEMALEAGE_MAXIMUM', 49);
define('TSEKAP_KIDS_UNDER_YEARS_OLD', 5);

/*Claims*/
define('CLAIM_PHILHEALTH_NAME', 'philhealth');

/*Country*/
define('COUNTRY_PHILIPPINES', 'Philippines');
/*Discount Type*/
define('DISCOUNT_TYPE_FIXED_PERCENTAGE', 'fixed_percentage');
define('DISCOUNT_TYPE_FIXED_AMOUNT', 'fixed_amount');
define('DISCOUNT_TYPE_VARIABLE_PERCENTAGE', 'variable_percentage');
define('DISCOUNT_TYPE_VARIABLE_AMOUNT', 'variable_amount');

/*Invocie Due Type*/
define('INVOICE_DUE_TYPE_DUE_ON_DISCHARGE', 'due_on_discharge');
define('INVOICE_DUE_TYPE_NET30', 'net30');
define('INVOICE_DUE_TYPE_NET60', 'net60');
define('INVOICE_DUE_TYPE_DUE_ON_RECEIPT', 'due_on_receipt');
define('INVOICE_DUE_TYPE_SPECIFIC_DATE', 'specific_date');
define('INVOICE_DUE_TYPE_DUE_ON_END_OF_MONTH', 'due_on_end_of_month');
define('INVOICE_DUE_TYPE_CUSTOM', 'custom');

/*Default Images*/
define('DEFAULT_PLACEHOLDER_IMAGE_URL', 'public/assets/images/users/placeholder.jpg');

/*Service_Request_Category*/
define('SERVICE_REQUEST_CATEGORY_LABORATORY_PROCEDURE', 'laboratory_procedure');
define('SERVICE_REQUEST_CATEGORY_IMAGING', 'imaging');
define('SERVICE_REQUEST_CATEGORY_COUNSELLING', 'counselling');
define('SERVICE_REQUEST_CATEGORY_EDUCATION', 'education');
define('SERVICE_REQUEST_CATEGORY_SURGICAL_PROCEDURE', 'surgical_procedure');