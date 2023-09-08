<?php
namespace app\common\enum;

enum Validator {
    case String;
    case Number;
    case Required;
    case Email;
    case Url;
    case Integer;
    case Mobile;
    case IdCard;

    /**
     * @param string $validator
     * @return void
     */
    public function verifyString(string $validator){
        switch ($validator) {

        }
    }
}

