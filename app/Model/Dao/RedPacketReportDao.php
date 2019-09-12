<?php


namespace App\Model\Dao;

use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Db\DB;

/**
 * Class RedPacketReportDao
 * @package App\Model\Dao
 * @Bean()
 */
class RedPacketReportDao
{
    private $_table_name = "red_packet_report";


    //获取列表
    public function getRedPacketReportList($where){
        $res = DB::table($this->_table_name)->where($where)->get();
        echo DB::table($this->_table_name)->where($where)->toSql();
        return $res;
    }

    //产生红包的数量
    public function RedPackedNum($where){
        $res = DB::table("rp_red_packet")->where($where)->count();
        return $res;
    }

    //获取单条数据
    public function getRedPackedReportInfo($where){
        $res = DB::table($this->_table_name)->where($where)->first();

        return $res;
    }

    //红包状态数量
    public function getRedPackedStatusNum($where){
        $res = DB::table("rp_red_packet as r")
               ->leftJoin("mi_transfers as t","r.red_packet_id","=","t.red_packet_id")
               ->where($where)
               ->count();

        return $res;
    }

    //红包状态数据
    public function getRedPackedStatusList($where){
        $res = DB::table("rp_red_packet as r")
               ->select("r.red_packet_id","r.in_cash","t.create_time","t.transfers_time")
               ->leftJoin("mi_transfers as t","r.red_packet_id","=","t.red_packet_id")
               ->where($where)
               ->get();

        return $res;
    }

    //插入记录
    public function insertRedPackedReport($data){
        $insert_id = DB::table($this->_table_name)->insertGetId($data);

        return $insert_id;
    }
}
