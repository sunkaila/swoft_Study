<?php declare(strict_types=1);

namespace App\Crontab;

use App\Model\Entity\User;
use App\Services\RedPacketReportService;
use Swoft\Bean\Annotation\Mapping\Inject;
use Swoft\Crontab\Annotaion\Mapping\Cron;
use Swoft\Crontab\Annotaion\Mapping\Scheduled;
use Swoft\Log\Helper\CLog;
use Swoft\Stdlib\Helper\JsonHelper;

/**
 * Class CronTask
 *
 * @since 2.0
 *
 * @Scheduled()
 */
class CronTask
{

    /**
     * @Inject()
     * @var RedPacketReportService
     */
    private $RedPacketReportService;

    /**
     * @Cron("0/10 * * * * *")
     */
//    public function redPacketReportTask(){
//        $time = strtotime("-1day");
//        xe_debug($time);
//        $this->RedPacketReportService->syncRedPacketReport($time);
//    }

}
