<?php


namespace App\Services;

use App\Model\Dao\UserDao;
use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Bean\Annotation\Mapping\Inject;

/**
 * Class UserService
 * @package App\Services
 * @Bean()
 */
class UserService
{
    /**
     * @var UserDao
     * @Inject()
     */
    protected $UserDao;

    public function getUserList(){
        $where = [
            ['username', '=', 'sunkai'],
            //['sex', '<>', '1']
        ];
        $where[] = ['sex', '<>', '1'];

        xe_debug($where);
        $user_list = $this->UserDao->getUserList($where);
        return $user_list;
    }

    public function insertUser($data){
        xe_debug($data);
        $insert_data = [
            'username' => $data['username'],
            'age' => $data['age'],
            'sex' => $data['sex'],
            'create_time' => time(),
        ];
        $res = $this->UserDao->insertUser($insert_data);

        return $res;
    }

    public function updateUser($param){
        xe_debug($param);
        $condition['id'] = $param['id'];
        $update_data = [
            'username' => $param['username'],
            'age' => $param['age'],
            'sex' => $param['sex'],
            'update_time' => time(),
        ];

        $res = $this->UserDao->updateUser($condition,$update_data,);

        return $res;
    }

    public function deleteUser(){

    }
}
