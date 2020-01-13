<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
class CommonModel extends Model
{
    //
    public static function curlPost($url,$data)
    {
        // ��ʼ��
        $ch = curl_init();
        //�����������
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_POST,1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);          // form-data $_POST
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);           // ����Ӧ���浽������
        // �����Ự ��������
        $response = curl_exec($ch);
        // ��ȡ������Ϣ
        $error = curl_error($ch);
        if($error)
        {
            var_dump($error);
            die;
        }
        // �رջỰ
        curl_close($ch);
        //������Ӧ
		// var_dump($response);
        return json_decode($response,true);
    }
	
	public static function curlGet($url,$header)
    {
        // ��ʼ��
        $ch = curl_init();
        //�����������
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_HTTPHEADER,$header);        // �Զ���HTTP ͷ
        // �����Ự ��������
        $response = curl_exec($ch);
        // ��ȡ������Ϣ
        $error = curl_error($ch);
        if($error)
        {
            var_dump($error);
            die;
        }
        // �رջỰ
        curl_close($ch);
        //������Ӧ
		var_dump($response);
        return json_decode($response,true);
    }
}