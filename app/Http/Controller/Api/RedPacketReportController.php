<?php


namespace App\Http\Controller\Api;


use App\Services\RedPacketReportService;
use Swoft\Bean\Annotation\Mapping\Inject;
use Swoft\Context\Context;
use Swoft\Http\Message\ContentType;
use Swoft\Http\Message\Request;
use Swoft\Http\Message\Response;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;

/**
 * Class RedPacketReportController
 * @package App\Http\Controller\Api
 * @Controller(prefix="/api/redpacketreport")
 */
class RedPacketReportController
{

    /**
     * @Inject()
     * @var RedPacketReportService
     */
    private $redPacketReportService;

    /**
     * @RequestMapping("getredpacketreportlist")
     * @param Request $request
     * @return array
     */
    public function getRedPacketReportList(Request $request){
        $param = [
            'start_time' => strtotime($request->input("start_time")),
            'end_time' => strtotime($request->input("end_time")),
        ];
        $list = $this->redPacketReportService->getRedPackedReportList($param);

        $data = json_encode($list, JSON_UNESCAPED_UNICODE);

        return Context::mustGet()->getResponse()->withContentType(ContentType::JSON)->withContent($data);
    }
}
