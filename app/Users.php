<?
namespace App;

use App\Http\Controllers\LogController;
use App\Http\Controllers\MemberPointLogController;
use Eloquent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class Users extends Eloquent
{
    public function selectDefault() {
        $query = $this->select(
            'user_no',
            'user_id',
            'user_password'
        );
        return $query;
    }
}