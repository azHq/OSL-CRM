<?php

namespace App\Helper;

class Reply
{

    /**
     * success
     *
     * @param  mixed $message
     * @return array
     */
    public static function success($message, $data = [])
    {
        $response = [];
        $response['success'] = true;
        $response['message'] = $message;
        $response['data'] = $data;
        return $response;
    }

    /**
     * error
     *
     * @param  mixed $message
     * @param  mixed $error_name
     * @param  mixed $errorData
     * @return array
     */
    public static function error($message, $errorData = [])
    {
        $response = [];
        $response['success'] = false;
        $response['message'] = $message;
        $response['data'] = $errorData;
        return $response;
    }


    /**
     * formErrors
     *
     * @param  mixed $validator
     * @return array
     */
    public static function validate($validator)
    {
        return [
            'success' => false,
            'message' => 'Validation Error',
            'errors' => $validator->getMessageBag()->toArray()
        ];
    }

    /**
     * redirect
     *
     * @param  mixed $url
     * @param  mixed $message
     * @return array
     */
    public static function redirect($url, $message = null)
    {
        return [
            'success' => true,
            'message' => $message,
            'action' => 'redirect',
            'url' => $url
        ];
    }

    public static function dataOnly($data)
    {
        return $data;
    }

    public static function redirectWithError($url, $message = null)
    {
        return [
            'status' => 'fail',
            'message' => $message,
            'action' => 'redirect',
            'url' => $url
        ];
    }
}
