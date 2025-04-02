<?php

namespace App\Contracts;

interface EnumBaseInterface
{
    /**
     * ラベル
     *
     * @return string
     */
    public function label(): string;
}