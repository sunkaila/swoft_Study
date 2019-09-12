<?php declare(strict_types=1);


namespace App\Model\Entity;

use Swoft\Db\Annotation\Mapping\Column;
use Swoft\Db\Annotation\Mapping\Entity;
use Swoft\Db\Annotation\Mapping\Id;
use Swoft\Db\Eloquent\Model;


/**
 * 
 * Class User
 *
 * @since 2.0
 *
 * @Entity(table="user")
 */
class User extends Model
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
     * 
     *
     * @Column()
     *
     * @var string|null
     */
    private $username;

    /**
     * 
     *
     * @Column()
     *
     * @var int|null
     */
    private $age;

    /**
     * 
     *
     * @Column()
     *
     * @var string|null
     */
    private $sex;

    /**
     * 
     *
     * @Column(name="create_time", prop="createTime")
     *
     * @var string|null
     */
    private $createTime;

    /**
     * 
     *
     * @Column(name="update_time", prop="updateTime")
     *
     * @var string|null
     */
    private $updateTime;


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
     * @param string|null $username
     *
     * @return void
     */
    public function setUsername(?string $username): void
    {
        $this->username = $username;
    }

    /**
     * @param int|null $age
     *
     * @return void
     */
    public function setAge(?int $age): void
    {
        $this->age = $age;
    }

    /**
     * @param string|null $sex
     *
     * @return void
     */
    public function setSex(?string $sex): void
    {
        $this->sex = $sex;
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
     * @param string|null $updateTime
     *
     * @return void
     */
    public function setUpdateTime(?string $updateTime): void
    {
        $this->updateTime = $updateTime;
    }

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @return int|null
     */
    public function getAge(): ?int
    {
        return $this->age;
    }

    /**
     * @return string|null
     */
    public function getSex(): ?string
    {
        return $this->sex;
    }

    /**
     * @return string|null
     */
    public function getCreateTime(): ?string
    {
        return $this->createTime;
    }

    /**
     * @return string|null
     */
    public function getUpdateTime(): ?string
    {
        return $this->updateTime;
    }

}
