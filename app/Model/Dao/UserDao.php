<?php declare(strict_types=1);


namespace App\Model\Dao;


use App\Model\Entity\User;
use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Db\DB;

/**
 * Class UserDao
 * @package App\Model\Dao
 * @Bean()
 */
class UserDao
{
    //表名
    private $_table_name = "user";

    public function getUserList($condition){
        return User::select('id','username','age','sex')->where($condition)->get();
    }

    public function getUserInfo(){

    }

    public function getUserNum(){

    }

    public function insertUser($data){
        $res = User::insertGetId($data);

        return $res;
    }

    public function updateUser($condition,$update_data){
        $res =  User::where($condition)->update($update_data);

        return $res;
    }

    public function deleteUser(){

    }
}
