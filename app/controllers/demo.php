<?php
	
	class Demo extends CI_Controller 
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('demo_model');
		}

		//index界面
		public function index()
		{
			$this->load->view('demo/index');
		}

		public function register()
		{
			//启用SESSION
			if (!isset($_SESSION)) session_start();

			//储存登录的用户名
			$_SESSION["name"] = '';
			$_POST["name"]='';

			//各种载入...
			$this->load->database();
			$this->load->helper('form');
			$this->load->library('form_validation');

			//验证是否没有填写重要信息
			$this->form_validation->set_rules('name','用户名','required');
			$this->form_validation->set_rules('psw','密码','required');
			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('demo/register');
			} 
				else
			{
				//防SQL注入
				$name = check_input($_POST["name"]);
				$realname = check_input($_POST["realname"]);
				$sex = check_input($_POST["sex"]);
				$IDcard = check_input($_POST["IDcard"]);
				$gtel = check_input($_POST["gtel"]);
				$mtel = check_input($_POST["mtel"]);
				$email= check_input($_POST["email"]);
				$home= check_input($_POST["home"]);
				$psw = hashit($name,$_POST["psw"]);
				
				//判断是否符合注册要求
				if ($this->gc_model->find_it($name) == 1)
				{
					echo "<script language='JavaScript'> alert('用户名已经存在');</script>";
					$this->load->view('demo/register');
				} 
					else if ($_SESSION["checkcode"] != $_POST["code"])
					{
						echo "<script language='JavaScript'> alert('验证码不正确');</script>";	
						$this->load->view('demo/register');
					} 
						else
					{
						$this->gc_model->insert_it($name,$psw,$realname,$sex,$IDcard,$gtel,$mtel,$email,$home);
						?>
						<h3><a href="login"> 注册成功！轻戳进入登录界面 ~ </a></h3>
						<?php
					}
			}
		}

		public function login()
		{
			//启用SESSION
			if (!isset($_SESSION)) session_start();

			//储存登录的用户名
			$_SESSION["name"] = '';
			$_POST["name"]='';

			//各种载入...
			$this->load->database();
			$this->load->helper('form');
			$this->load->library('form_validation');

			//防sql注入
			$name = check_input($_POST["name"]);

			//验证是否没有填写重要信息
			$this->form_validation->set_rules('name','用户名','required');
			$this->form_validation->set_rules('psw','密码','required');
			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('demo/login');
			} 
				else
				//判断是否符合登录要求
				if ($_SESSION["checkcode"] != $_POST["code"])
				{
					echo "<script language='JavaScript'> alert('验证码不正确');</script>";	
					$this->load->view('demo/login');	
				}
					else
					if ($this->gc_model->find_it($name) == 0)
					{
						echo "<script type='text/javascript'>  alert('此用户名不存在');</script>";
						$this->load->view('demo/login');
					}
						else
					{
						//md5加盐 加密
						$psw = hashit($name,$_POST["psw"]);
						//执行数据库查询判断是否密码正确
						if ($this->gc_model->check_it($name,$psw) == 1)
						{
							$_SESSION['name'] = $name;
							$this->load->view('gdemo/qsc');
						}
							else
						{
							$_SESSION['name'] = '';
							echo "<script type='text/javascript'> alert('密码错误');</script>";
							$this->load->view('demo/login');
						}
					}
		}
	}

	include_once "function.php";
?>