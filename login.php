<?php  
/*
*�û���¼�����������еĴ���
*/
	include("conn.php");
    mysql_select_db("lbs");  
	$getid=$_POST['uid'];//�ͻ���post�������û���
	$getpwd=$_POST['pwd'];//�ͻ���post����������
    $sql=mysql_query("SELECT * FROM user WHERE userid ='$getid'"); 
	$result=mysql_fetch_assoc($sql);
	if(!empty($result)){
		//���ڸ��û�
		if($getpwd==$result['password']){
			//�û�������ƥ����ȷ
			mysql_query("UPDATE user SET status='1' WHERE id =$result[id]");/*��������鲻��Ҫ�ӵ�����*/
			$back['status']="1";
			$back['info']="login success";
			$back['sex']=$result['sex'];
			$back['nicename']=$result['nicename'];
			echo(json_encode($back)); 
		}else{/*�������*/
			$back['status']="-2";
			$back['info']="password error";
			echo(json_encode($back)); 
		}

	}else{
		//�����ڸ��û�
		$back['status']="-1";
		$back['info']="user not exist";
		echo(json_encode($back)); 
	}
         
    mysql_close();  
?> 