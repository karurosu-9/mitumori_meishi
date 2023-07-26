<?php

namespace App\Consts;

//viesやmigrationファイルで使用するマジックナンバー
class EstimateFormCountConsts
{
    //見積り入力フォームなどで使用する、補足以外の行数(摘要、単価など)
    public const FORM_NOT_HOSOKU = 5;

    //見積入力フォームなどでしようする、補足の行数
    public const FORM_HOSOKU = 3;
}
