<?php

namespace App\Library;

use Illuminate\Support\Facades\Log;

class Common {

    public static function commonException($exception)
    {
        $logData = [
            'message' => $exception->getMessage(),
            'file'  => $exception->getFile(),
            'code' => $exception->getCode(),
            'line' => $exception->getLine()
        ];
        Log::error($logData);
        return redirect('/loginForm');
    }
}