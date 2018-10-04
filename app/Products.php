<?
namespace App;

use App\Http\Controllers\LogController;
use App\Http\Controllers\MemberPointLogController;
use Eloquent;

class Products extends Eloquent
{
    public function selectDefault() {
        $query = $this->select(
            'product_no',
            'product_name',
            'product_price',
            'product_count',
            'product_seller'
        );
        return $query;
    }

    public function insertProduct($arr) {
        $query = $this->insert( $arr );
    }
}