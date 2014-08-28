<?php
class DA {
	private $host; //链接那个数据库是本地的还是其他的
  	private $user;  //用户名
  	private $password;  //密码
  	private $dbname;  //数据库
  	private $conn; //链接数据库
  	private $result;  //查询的结果
  
	function __construct($host = "127.0.0.1", $user = "root", $password = "12345", $dbname = "han1") {
		$this->host = $host;
   		$this->user = $user;
   		$this->password = $password;
   		$this->dbname = $dbname;
   		$this->mysqli = new MySQLi($this->host, $this->user, $this->password, $this->dbname) or die("Could not Connect MySql Server");
   		$this->mysqli->query("SET NAMES 'utf8'");
   		$this->mysqli->query("BEGIN");
	}

  
  	public function commit () {
		$this->mysqli->query("COMMIT");
  	}

  	public function rollback () {
		$this->mysqli->query("ROLLBACK");
  	}

	public function execute_sql ($sql, $params, $params_style) {
		if (is_array($params)) {
			$stmt = $this->mysqli->prepare($sql);
			$stmt->bind_param($params_style, $params);
			$stmt->execute();	
			$ret = $stmt->get_result();	
			return $ret;
		} else {
			$ret = $this->mysqli->query($sql);
		   return $ret;	
		}
	}






}

?>
