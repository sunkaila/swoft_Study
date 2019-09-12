<?php declare(strict_types=1);


namespace App\Model\Entity;

use Swoft\Db\Annotation\Mapping\Column;
use Swoft\Db\Annotation\Mapping\Entity;
use Swoft\Db\Annotation\Mapping\Id;
use Swoft\Db\Eloquent\Model;


/**
 * ???????
 * Class RedPacketReportController
 *
 * @since 2.0
 *
 * @Entity(table="red_packet_report")
 */
class RedPacketReport extends Model
{
    /**
     *
     * @Id()
     * @Column()
     *
     * @var int
     */
    private $id;

    /**
     * ???????
     *
     * @Column(name="pickup_id", prop="pickupId")
     *
     * @var int
     */
    private $pickupId;

    /**
     * ???????
     *
     * @Column(name="red_packet_num", prop="redPacketNum")
     *
     * @var int|null
     */
    private $redPacketNum;

    /**
     * ??????
     *
     * @Column(name="is_click_num", prop="isClickNum")
     *
     * @var int|null
     */
    private $isClickNum;

    /**
     * ????
     *
     * @Column(name="is_out_num", prop="isOutNum")
     *
     * @var int|null
     */
    private $isOutNum;

    /**
     * ????
     *
     * @Column(name="money_num", prop="moneyNum")
     *
     * @var int|null
     */
    private $moneyNum;

    /**
     * ??
     *
     * @Column()
     *
     * @var string|null
     */
    private $date;

    /**
     *
     *
     * @Column(name="create_time", prop="createTime")
     *
     * @var string|null
     */
    private $createTime;


    /**
     * @param int $id
     *
     * @return void
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @param int $pickupId
     *
     * @return void
     */
    public function setPickupId(int $pickupId): void
    {
        $this->pickupId = $pickupId;
    }

    /**
     * @param int|null $redPacketNum
     *
     * @return void
     */
    public function setRedPacketNum(?int $redPacketNum): void
    {
        $this->redPacketNum = $redPacketNum;
    }

    /**
     * @param int|null $isClickNum
     *
     * @return void
     */
    public function setIsClickNum(?int $isClickNum): void
    {
        $this->isClickNum = $isClickNum;
    }

    /**
     * @param int|null $isOutNum
     *
     * @return void
     */
    public function setIsOutNum(?int $isOutNum): void
    {
        $this->isOutNum = $isOutNum;
    }

    /**
     * @param int|null $moneyNum
     *
     * @return void
     */
    public function setMoneyNum(?int $moneyNum): void
    {
        $this->moneyNum = $moneyNum;
    }

    /**
     * @param string|null $date
     *
     * @return void
     */
    public function setDate(?string $date): void
    {
        $this->date = $date;
    }

    /**
     * @param string|null $createTime
     *
     * @return void
     */
    public function setCreateTime(?string $createTime): void
    {
        $this->createTime = $createTime;
    }

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getPickupId(): ?int
    {
        return $this->pickupId;
    }

    /**
     * @return int|null
     */
    public function getRedPacketNum(): ?int
    {
        return $this->redPacketNum;
    }

    /**
     * @return int|null
     */
    public function getIsClickNum(): ?int
    {
        return $this->isClickNum;
    }

    /**
     * @return int|null
     */
    public function getIsOutNum(): ?int
    {
        return $this->isOutNum;
    }

    /**
     * @return int|null
     */
    public function getMoneyNum(): ?int
    {
        return $this->moneyNum;
    }

    /**
     * @return string|null
     */
    public function getDate(): ?string
    {
        return $this->date;
    }

    /**
     * @return string|null
     */
    public function getCreateTime(): ?string
    {
        return $this->createTime;
    }

}
