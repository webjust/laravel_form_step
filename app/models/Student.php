<?php
namespace App\models;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    const SEX_UN = 2;
    const SEX_BOY = 1;
    const SEX_GIRL = 0;

    /**
     * 与模型相关的数据表
     */
    protected $table = "student";

    /**
     * 指定是否模型应该被戳记时间
     */
    public $timestamps = false;

    /**
     * 处理用户的性别，转换为中文
     *
     * @param     $ind    用户存储的性别数字编号
     * @return    string  对应的性别中文字符
     * @author    webjust [604854119@qq.com]
     */
    public function sex($ind = null)
    {
        $arr = array(
            self::SEX_BOY => '男',
            self::SEX_GIRL => '女',
            self::SEX_UN => '未知',
        );

        if(array($ind, $arr) && isset($ind))
        {
            return $arr[$ind];
        }

        return $arr;
    }
}
