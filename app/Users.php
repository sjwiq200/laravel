<?php
namespace App;

use App\Http\Controllers\LogController;
use App\Http\Controllers\MemberPointLogController;
use Eloquent;

class Users extends Eloquent
{
    public function selectDefault() {
        $query = $this->select(
            'user_no',
            'user_id',
            'user_password',
            'user_name'
        );
        return $query;
    }

    public function insertDefault($array) {
        $query = $this->insert($array);
    }
}