<?php

return [
    'ignore_login_code' => \array_map('trim', explode(',', env('IGNORE_LOGIN_CODE'))),
];