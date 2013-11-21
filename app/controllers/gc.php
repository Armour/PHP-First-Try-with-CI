<?php
	
	error_reporting(E_ALL ^ E_NOTICE); 

	class Gc extends CI_Controller 
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('gc_model');
		}

		public function index()
		{
			$this->load->view('gc/index');
		}

		public function register()
		{
			//启用SESSION
			if (!isset($_SESSION)) session_start();

			//储存登录的用户名
			$_SESSION["name"] = '';

			$this->load->database();
			
			$this->load->helper('form');
			$this->load->library('form_validation');

			$this->form_validation->set_rules('name','用户名','required');
			$this->form_validation->set_rules('psw','密码','required');
			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('gc/register');
			} 
				else
			{
				$name = check_input($_POST["name"]);
				$realname = check_input($_POST["realname"]);
				$sex = check_input($_POST["sex"]);
				$IDcard = check_input($_POST["IDcard"]);
				$gtel = check_input($_POST["gtel"]);
				$mtel = check_input($_POST["mtel"]);
				$email= check_input($_POST["email"]);
				$home= check_input($_POST["home"]);
				$psw = hashit($name,$_POST["psw"]);
				
				if ($this->gc_model->find_it($name) == 1)
				{
					echo "<script language='JavaScript'> alert('用户名已经存在');</script>";
					$this->load->view('gc/register');
				} 
					else if ($_SESSION["checkcode"] != $_POST["code"])
					{
						echo "<script language='JavaScript'> alert('验证码不正确');</script>";	
						$this->load->view('gc/register');
					} 
						else
					{
						$this->gc_model->insert_it($name,$psw,$realname,$sex,$IDcard,$gtel,$mtel,$email,$home);
						?>
						<h3><a href="login"> 注册成功！轻戳进入登录界面 ~ </a></h3>
						<?php
						//$_SESSION["name"] = $name;
						//$this->load->view('gc/login');
					}
			}
		}

		public function login()
		{
			//启用SESSION
			if (!isset($_SESSION)) session_start();

			//储存登录的用户名
			$_SESSION["name"] = '';

			$this->load->database();
			
			$this->load->helper('form');
			$this->load->library('form_validation');

			//防sql注入
			$name = check_input($_POST["name"]);

			$this->form_validation->set_rules('name','用户名','required');
			$this->form_validation->set_rules('psw','密码','required');
			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('gc/login');
			} 
				else
				if ($_SESSION["checkcode"] != $_POST["code"])
				{
					echo "<script language='JavaScript'> alert('验证码不正确');</script>";	
					$this->load->view('gc/login');	
				}
					else
					if ($this->gc_model->find_it($name) == 0)
					{
						echo "<script type='text/javascript'>  alert('此用户名不存在');</script>";
						$this->load->view('gc/login');
					}
						else
					{
						//md5加盐 加密
						$psw = hashit($name,$_POST["psw"]);
						//执行数据库查询判断是否密码正确
						if ($this->gc_model->check_it($name,$psw) == 1)
						{
							$_SESSION['name'] = $name;
							$this->load->view('gc/qsc');
						}
							else
						{
							$_SESSION['name'] = '';
							echo "<script type='text/javascript'> alert('密码错误');</script>";
							$this->load->view('gc/login');
						}
					}
		}
	}

	function hashit($c,$a) 
	{
		$salt="GC_ZXCVBN".$c;  	//salt值
		$b=$a.$salt;  			//把密码和salt连接
		$b=md5($b);  			//执行MD5散列
		return $b;  			
	}
		
	function check_input($value)
	{
		// 去除斜杠
		if (get_magic_quotes_gpc())
		{
			$value = stripslashes($value);
		}
		
		// 防sql注入
		$value = mysql_real_escape_string($value);
		return $value;
	}	

?>