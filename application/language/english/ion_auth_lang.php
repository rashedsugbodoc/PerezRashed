<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Ion Auth Lang - English
*
* Author: Ben Edmunds
* 		  ben.edmunds@gmail.com
*         @benedmunds
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  03.14.2010
*
* Description:  English language file for Ion Auth messages and errors
*
*/

// Account Creation
$lang['account_creation_successful'] 	  	 = 'Account Successfully Created';
$lang['account_creation_unsuccessful'] 	 	 = 'Unable to Create Account';
$lang['account_creation_duplicate_email'] 	 = 'Email Already Used or Invalid';
$lang['account_creation_duplicate_username'] = 'Username Already Used or Invalid';
$lang['account_creation_missing_default_group'] = 'Default group is not set';
$lang['account_creation_invalid_default_group'] = 'Invalid default group name set';


// Password
$lang['password_change_successful'] 	 	 = 'Password Successfully Changed';
$lang['password_change_unsuccessful'] 	  	 = 'Unable to Change Password. The Password Reset Link may have expired.';
$lang['forgot_password_successful'] 	 	 = 'Password Reset Email Sent';
$lang['forgot_password_unsuccessful'] 	 	 = 'Unable to Reset Password';

// Activation
$lang['activate_successful'] 		  	     = 'Your Account is now Activated. You may now login to your Account.';
$lang['activate_unsuccessful'] 		 	     = 'Unable to Activate Account';
$lang['deactivate_successful'] 		  	     = 'Account De-Activated';
$lang['deactivate_unsuccessful'] 	  	     = 'Unable to De-Activate Account';
$lang['activation_email_successful'] 	  	 = 'We sent you an activation link. Check your email (and Spam folder) and click on the link to Activate your account.';
$lang['activation_email_unsuccessful']   	 = 'Unable to Send Activation Email';

// Resend Activation
$lang['account_already_activated'] 		  	 = 'Account is already activated. You may proceed to login to your Account.';

// Login / Logout
$lang['login_successful'] 		  	         = 'Logged In Successfully';
$lang['login_unsuccessful'] 		  	     = 'Incorrect Email or Password';
$lang['login_unsuccessful_not_active'] 		 = 'Your Account has not been activated yet.<br>Click the link in the email we sent you to activate your account. Or %s';
$lang['login_timeout']                       = 'Temporarily Locked Out.  Try again later.';
$lang['logout_successful'] 		 	         = 'Logged Out Successfully';

// Account Changes
$lang['update_successful'] 		 	         = 'Account Information Successfully Updated';
$lang['update_unsuccessful'] 		 	     = 'Unable to Update Account Information';
$lang['delete_successful']               = 'User Deleted';
$lang['delete_unsuccessful']           = 'Unable to Delete User';

// Groups
$lang['group_creation_successful']  = 'Group created Successfully';
$lang['group_already_exists']       = 'Group name already taken';
$lang['group_update_successful']    = 'Group details updated';
$lang['group_delete_successful']    = 'Group deleted';
$lang['group_delete_unsuccessful'] 	= 'Unable to delete group';
$lang['group_delete_notallowed']    = 'Can\'t delete the administrators\' group';
$lang['group_name_required'] 		= 'Group name is a required field';
$lang['group_name_admin_not_alter'] = 'Admin group name can not be changed';

// Activation Email
$lang['email_activation_subject']            = 'Activate your account';
$lang['email_activation_welcome']            = 'Welcome to SugboDoc';
$lang['email_activate_heading']    = 'To activate your account and start using our platform, please click the button below to verify your email address (%s):';
$lang['email_activate_subheading'] = 'If you did not authorize this account creation, feel free to delete or ignore this email.';
$lang['email_activate_link']       = 'Activate Your Account';
$lang['email_activation_complimentary_close']    = 'All the best';

// Forgot Password Email
$lang['email_forgotten_password_subject']    = 'Password Reset Request';
$lang['email_forgot_password_heading']    = 'Reset Password';
$lang['email_forgot_password_line1']    = 'We received a request to reset your password for (%s)';
$lang['email_forgot_password_line2']    = 'Click the link below to reset your password.';
$lang['email_forgot_password_line3']    = 'If you did not request a password reset, feel free to delete or ignore this email and carry on using our services.';
$lang['email_forgot_password_complimentary_close']    = 'All the best';
$lang['email_forgot_password_subheading'] = 'Please click this link to %s.';
$lang['email_forgot_password_link']       = 'Reset Your Password';

// New Password Email
$lang['email_new_password_subject']          = 'New Password';
$lang['email_new_password_heading']    = 'New Password for %s';
$lang['email_new_password_subheading'] = 'Your password has been reset to: %s';

// General
$lang['team']          = 'Team';
