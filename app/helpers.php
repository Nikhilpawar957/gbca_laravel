<?php

use Illuminate\Support\Facades\DB;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (!function_exists('sendMail')) {
    function sendMail($mailConfig)
    {
        require 'PHPMailer/src/Exception.php';
        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';

        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = env('EMAIL_HOST', 'smtp.office365.com');                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = env('EMAIL_USERNAME','reachus@gbcaindia.com');                      //SMTP username
            $mail->Password   = env('EMAIL_PASSWORD','Gbca@2022');                               //SMTP password
            $mail->SMTPSecure = env('EMAIL_ENCRYPTION','tls');            //Enable implicit TLS encryption
            $mail->Port       = env('EMAIL_PORT','587');                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom($mailConfig['mail_from_email'], $mailConfig['mail_from_name']);
            $mail->addAddress($mailConfig['mail_recipient_email'], $mailConfig['mail_recipient_name']);     //Add a recipient

            //Attachments

            if (isset($mailConfig['mail_attachment']) && !empty($mailConfig['mail_attachment'])) {
                $mail->addAttachment($mailConfig['mail_attachment']);         //Add attachments
            }

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $mailConfig['mail_subject'];
            $mail->Body    = $mailConfig['mail_body'];
            $mail->AltBody = 'Alternate Body for Email';

            if ($mail->send()) {
                $mail->clearAddresses();
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            return false;
        }
    }
}

if (!function_exists('generate_random_string')) {
    function generate_random_string($digits, $db_check, $table, $field)
    {
        $generated_string = '';

        $chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $res = "";
        for ($i = 0; $i < $digits; $i++) {
            $res .= $chars[mt_rand(0, strlen($chars) - 1)];
        }

        if ($db_check == 'true') {
            $check_db = DB::table("$table")->select("*")->where("$field", "=", "$res");
            if (is_array($check_db)) {
                $generated_string = generate_random_string($digits, $db_check, $table, $field);
            } else {
                $generated_string = $res;
            }
        } else {
            $generated_string = $res;
        }

        return $generated_string;
    }
}

if (!function_exists('send_sms')) {
    function send_sms($destination, $template, $variables)
    {
        switch ($template) {
            case 'send_otp':
                $message = "Your OTP is " . @$variables['otp'];
                break;
            default:
                break;
        }

        $urlapi              = "http://api.msg91.com/api/sendhttp.php?";
        $country             = 91;
        $sender              = "GBCAca";
        $route               = 4;
        $authkey             = '90627AEoWJfyfL355cdc95b';
        $message = rawurlencode($message);

        $sms_url = $urlapi . "country=" . $country . "&sender=" . $sender . "&route=" . $route . "&mobiles=91" . $destination . "&authkey=" . $authkey . "&message=" . $message;

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $sms_url,
            CURLOPT_RETURNTRANSFER => true,

            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        if ($response === false) {
            echo 'Curl error: ' . curl_error($curl);
        } else {
            return $response;
        }

        curl_close($curl);
    }
}
