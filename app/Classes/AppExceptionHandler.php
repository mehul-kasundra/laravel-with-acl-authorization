<?php
namespace App\Classes;

use Lang;
use Mail;
use Log;

class AppExceptionHandler
{
    /**
     * Method to log messages using LARAVEL error Log
     *
     * @param $error_type error|success|info|etc
     * @param $message Message to log
     * @param bool|false $conditional_error_log Condition handling for Informative Logs
     */
    public function logMessage($error_type, $message, $conditional_error_log = false)
    {
        if (!$conditional_error_log) {
            Log::$error_type($message);
            return;
        }

        if ($conditional_error_log && config('neptrox.exception.log_message')) {
            Log::$error_type($message);
            return;
        }

    }

    /**
     * Email Exception to Admin according to error type
     *
     * @param array $params
     */
    public function emailAppException($params = [])
    {
        $data = [];
        $data['site_configs'] = \AppHelper::getSiteConfigs();
        $data['receiving_email'] = '';

        // If receiving email not set in site configuration
        // use from config (neptrox.php)
        if (!empty($data['site_configs'])
            && isset($data['site_configs']['RECEIVING_EMAIL'])
            && !empty($data['site_configs']['RECEIVING_EMAIL'])
            && filter_var($data['site_configs']['RECEIVING_EMAIL'], FILTER_VALIDATE_EMAIL) === true
        )
            $data['receiving_email'] = $data['site_configs']['RECEIVING_EMAIL'];
        else
            $data['receiving_email'] = config('neptrox.mail.receiving_email');

        switch ($params['error_type']) {

            case 'site_config':
                $data['message'] = Lang::get('general.error.' . $params['error_code'], ['key' => $params['config_key']]);
                break;

        }

        if (App::environment() == 'production')
            Mail::send('emails.exception', ['data' => $data], function ($m) use ($data) {
                $m->to($data['receiving_email']);
                $m->subject(Lang::get('general.error.EXCEPTION_EMAIL_SUBJECT'));
            });
    }

}