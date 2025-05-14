<?php

namespace App\Actions\Admin\Login;

use App\Enum\TokenByteLength;
use App\Enum\TokenTime;
use App\Http\Requests\Admin\News\AdminLoginVerifyEmailRequest;
use App\Models\AdminVerifyCode;
use Illuminate\Support\Facades\Log;

final class AdminLoginVerifyEmailAction
{
    private const CODE_DIGITS = 6;

    /**
     * メールの認証コードを発行します
     * 
     * @param AdminLoginVerifyEmailRequest $request
     * @return void
     */
    public function __invoke(AdminLoginVerifyEmailRequest $request): void
    {
        $email = $request->get('email');

        if (AdminVerifyCode::isCodeValid($email) === false) {
            $this->deleteAdminVerifyCode($email);
        }
        
        $this->saveAdminVerifyCode($email);
    }

    /**
     * 管理者認証コードを保存します
     * 
     * @param string $email
     * @return void
     */
    private function saveAdminVerifyCode(string $email): void
    {
        $admin_verify_code = new AdminVerifyCode();
        $admin_verify_code->email = $email;
        $admin_verify_code->code = $this->generateNumericCode(self::CODE_DIGITS);
        $admin_verify_code->token = \bin2hex(\random_bytes(TokenByteLength::ADMIN_LOGIN->value));
        $admin_verify_code->token_deadline_at = now()->addMinute(TokenTime::ADMIN_LOGIN->value);
        $admin_verify_code->save();
    }

    /**
     * 管理者認証コードを削除します
     * 
     * @param string $email
     * @return void
     */
    private function deleteAdminVerifyCode(string $email): void
    {
        Log::info("管理者メール認証コードが有効期限を超えたため削除します");

        $admin_verify_code = new AdminVerifyCode();
        $admin_verify_code->where('email', $email);
        $admin_verify_code->delete();
    }

    /**
     * 指定された桁数の数値コードを生成
     * 
     * @param int $digits
     * @return string 
     */
    private function generateNumericCode(int $digits): string
    {
        $code = "";
        for ($i = 0; $i < $digits; $i++) { 
            $code .= rand(0, 9);
        }
        return $code;
    }
}
