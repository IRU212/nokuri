<?php

namespace App\Actions\Admin\Login;

use App\Enum\TokenByteLength;
use App\Enum\TokenTime;
use App\Http\Requests\Admin\Login\AdminLoginVerifyEmailRequest;
use App\Mail\AdminVerifyCodeMail;
use App\Models\AdminVerifyCode;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

final class AdminLoginVerifyEmailAction
{
    private const CODE_DIGITS = 6;

    /**
     * メールの認証コードを発行します
     * 
     * @param AdminLoginVerifyEmailRequest $request
     * @return string
     */
    public function __invoke(AdminLoginVerifyEmailRequest $request): string
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        $email = $request->get('email');

        if (AdminVerifyCode::shouldDelete($email)) {
            Log::info("管理者メール認証コードが有効期限を超えたため削除します");
            $this->deleteAdminVerifyCode($email);
        }
        
        $admin_verify_code = $this->saveAdminVerifyCode($email);

        Mail::send(new AdminVerifyCodeMail($admin_verify_code));

        return $admin_verify_code->token;
    }

    /**
     * 管理者認証コードを保存します
     * 
     * @param string $email
     * @return AdminVerifyCode
     */
    private function saveAdminVerifyCode(string $email): AdminVerifyCode
    {
        $admin_verify_code = new AdminVerifyCode();
        $admin_verify_code->email = $email;
        $admin_verify_code->code = $this->generateNumericCode(self::CODE_DIGITS);
        $admin_verify_code->token = \bin2hex(\random_bytes(TokenByteLength::ADMIN_LOGIN->value));
        $admin_verify_code->token_deadline_at = now()->addMinute(TokenTime::ADMIN_LOGIN->value);
        $admin_verify_code->save();
        return $admin_verify_code;
    }

    /**
     * 管理者認証コードを削除します
     * 
     * @param string $email
     * @return void
     */
    private function deleteAdminVerifyCode(string $email): void
    {
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
