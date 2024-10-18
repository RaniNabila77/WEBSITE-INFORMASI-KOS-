<?php  
namespace App\Models;

use Codeigniter\Model;
class M_Admin extends Model {
    protected $table = "tbl_admin";

    public function getDataAdmin($where = false){
        if($where === false){
            return $this->findAll();
        }
        else {
            return $this->getWhere($where);
        }
    }
}
?>