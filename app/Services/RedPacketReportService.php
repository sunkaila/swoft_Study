<?php


namespace App\Services;

use App\Model\Dao\RedPacketReportDao;
use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Bean\Annotation\Mapping\Inject;

/**
 * Class RedPacketReportDao
 * @package App\Services
 * @Bean()
 */
class RedPacketReportService
{

    /**
     * @Inject()
     * @var RedPacketReportDao
     */
    private $RedPacketReportDao;


    public function syncRedPacketReport($date){

        $start_time = date("Y-m-d",$date)." 00:00:00";
        $end_time = date("Y-m-d",$date)." 23:59:59";

        //产生红包的数量
        $where = [
            ['create_time','>=',strtotime($start_time)],
            ['create_time','<=',strtotime($end_time)],
        ];
        $red_packet_num = $this->RedPacketReportDao->RedPackedNum($where);

        //红包点击的数量
        $where = [
            ['t.create_time','>=',strtotime($start_time)],
            ['t.create_time','<=',strtotime($end_time)],
        ];
        $is_click_num = $this->RedPacketReportDao->getRedPackedStatusNum($where);

        //当天到账额度
        $where = [
            ['t.transfers_time','>=',strtotime($start_time)],
            ['t.transfers_time','<=',strtotime($end_time)],
            ['t.status','=',2],
        ];
        $out_data = $this->RedPacketReportDao->getRedPackedStatusList($where);
        $is_out_num = 0;
        foreach ($out_data as $v){
            $is_out_num += $v["in_cash"];
        }

        //当天累计费用
        $where = [
            ['t.transfers_time','>=',strtotime($start_time)],
            ['t.transfers_time','<=',strtotime($end_time)],
            ['t.status','=',2],
        ];
        $money_data = $this->RedPacketReportDao->getRedPackedStatusList($where);

        $money_num = 0;
        foreach ($money_data as $v){
            $money_num += $v["in_cash"];
        }


        $where = [
            ['date',"=",date("Y-m-d",$date)],
            ['pickup_id',"=",0],
        ];
        $checkReport = $this->RedPacketReportDao->getRedPackedReportInfo($where);
        if ($checkReport){
            return false;
        }
        //存入红包报表数据表
        $insert_data = [
            "pickup_id" => 0,
            "red_packet_num" => $red_packet_num,
            "is_click_num" => $is_click_num,
            "is_out_num" => strval($is_out_num),
            "money_num" => strval($money_num),
            "date" => date("Y-m-d",$date),
            "date_time" => strtotime(date("Y-m-d",$date)),
            "create_time" => time(),
        ];
        xe_debug($insert_data);
        $this->RedPacketReportDao->insertRedPackedReport($insert_data);
    }


    public function getRedPackedReportList($param){
        $start_time = $param['start_time'];
        $end_time = $param['end_time'];

        //验证选择的时间
        if (empty($end_time)) { //为空模型
            $start_time = strtotime(date("Y-m-d",strtotime("-16 day")));
            $end_time = strtotime(date("Y-m-d",strtotime("-1 day")));
        }else{
            if (empty($start_time)) {
                return ['success' => 0, 'msg' => "请选择查询开始时间", 'result' => []];
            }
        }

        if (date("Y-m-d",$end_time) == date("Y-m-d")) {
            return ['success' => 0, 'msg' => "今天的报表未统计", 'result' => []];
        }

        if ($start_time && $end_time) {
            if ($start_time > $end_time) {
                return ['success' => 0, 'msg' => "查询开始时间大于结束时间", 'result' => []];
            }
        }

        //查询条件
        $where[] = ["date_time",">=",$start_time];
        $where[] = ["date_time","<=",$end_time];


        $list = $this->RedPacketReportDao->getRedPacketReportList($where);

        if ($list) {
            return ['success' => 1,"message"=>"success","result" => $list];
        }
        return ['success' => 0,"message"=>"fail","result" => []];
    }
}
