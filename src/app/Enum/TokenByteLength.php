<?php

namespace App\Enum;

enum TokenByteLength: int {
    case ADMIN_LOGIN = 16;

    /**
     * トークンを作成します
     * 
     * @return string
     */
    public function generateToken(): string
    {
        return \bin2hex(\random_bytes($this->value));
    }
}