<?php


namespace App\Http\Controller;

use App\Services\UserService;
use Swoft\Bean\Annotation\Mapping\Inject;
use Swoft\Http\Message\Request;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;

/**
 * Class UserController
 * @package App\Http\Controller
 * @Controller(prefix="/user")
 */
class UserController
{
    /**
     * @Inject();
     * @var UserService
     */
    protected $UserService;

    /**
     * @RequestMapping("getuser")
     */
    public function getUserList(){
        $user_list = $this->UserService->getUserList();
        foreach ($user_list as $value) {
            xe_debug($value);
        }
        return $user_list;
    }

    /**
     * @RequestMapping("updateuser")
     * @param Request $request
     */
    public function updateUser(Request $request){
        $param = $request->input();
        $res = $this->UserService->updateUser($param);

        return $res;
    }

    /**
     * @RequestMapping("insertuser")
     * @param Request $request
     * @return string
     */
    public function insertUser(Request $request){
        $res = $this->UserService->insertUser($request->input());
            
        return  $res;
    }

    /**
     *
     * @RequestMapping("deleteuser")
     */
    public function deleteUser(){
        return "删除用户信息";
    }
}
