
#prepend.php
<?php
require_once dirname(__FILE__).'/vendor/autoload.php';  # 在composer生成的vender同级目录
use SebastianBergmann\CodeCoverage\CodeCoverage;

$coverage = new CodeCoverage;
echo 'giaogiao';
$coverage->filter()->addDirectoryToWhitelist('/var/www/html/userinfo.php');  # 白名单<br>$coverage->filter()->removeDirectoryFromWhitelist('/var/www/html/userinfo.php'); # 从白名单中移除文件夹<br>$coverage->filter()->removeFileFromWhitelist('/var/www/html/userinfo.php'); # 从白名单中移除文件

$coverage->start('<Site coverage>');#开始统计
register_shutdown_function('__coverage_stop',$coverage);#注册关闭方法

function __coverage_stop(CodeCoverage $coverage){
    $coverage->stop();#停止统计
    $cov = '<?php return unserialize(' . var_export(serialize($coverage), true) . ');';#获取覆盖结果，注意使用了反序列化
    echo $cov;
    file_put_contents(dirname(__FILE__).'/cov/site.' . date('U') .'.'.uniqid(). '.cov', $cov);#将结果写入到文件中
};




<?php
require_once dirname(__FILE__) . '/vendor/autoload.php'; # 在composer生成的vender同级目录
use SebastianBergmann\CodeCoverage\CodeCoverage;

# 若设置只统计指定ip的请求，加上if条件即可(若多个域名或者接口请求要在同一个prepend文件里分别统计,也是一样操作)
// echo $_SERVER['HTTP_HOST'];
$ip = gethostbyname($_SERVER['HTTP_HOST']);
// echo $ip;

if (strpos($ip, '127.0.0.1') === 0) {
    $coverage = new CodeCoverage();
    $coverage->filter()->addDirectoryToWhitelist('index.php');
    $coverage->start('<Site coverage>'); # 开始统计
    register_shutdown_function('__coverage_stop', $coverage); # 注册关闭方法
} else {
    echo '该ip访问不会统计入覆盖率';
}

$covdir = "cov/";
if (! is_dir($covdir)) {
    mkdir($covdir, 0777);
}

function __coverage_stop(CodeCoverage $coverage)
{
    $coverage->stop(); # 停止统计
    $cov = '<?php return unserialize(' . var_export(serialize($coverage), true) . ');'; # 获取覆盖结果，注意使用了反序列化
    file_put_contents(dirname(__FILE__) . '/cov/site.' . date('U') . '.' . uniqid() . '.cov', $cov); # 将结果写入到文件中
}





# 终止测试的第二种函数方法
function __coverage_stop(CodeCoverage $coverage){
    $coverage->stop();#停止统计

    $writer = new \SebastianBergmann\CodeCoverage\Report\Html\Facade;
    # 设置生成代码覆盖率页面的路径
    $writer->process($coverage, dirname(__FILE__) . '/coverage_html');}


// 添加相应的内容
$ip = gethostbyname($_SERVER['HTTP_HOST']);
// echo $ip;
// 当访问的ip为当前ip的时候，实例化并且添加对应的变量
if (strpos($ip, '127.0.0.1') === 0) {
    $coverage = new CodeCoverage();
    $coverage->filter()->addDirectoryToWhitelist(dirname(__FILE__) . '/zb_system');
    $coverage->start('<Site coverage>'); # 开始统计
    register_shutdown_function('__coverage_stop', $coverage); # 注册关闭方法
} else {
    echo '该ip访问不会统计入覆盖率';}
# 如果当前路径没有这个文件夹，则创建
$covdir = "cov/";
if (! is_dir($covdir)) {
    mkdir($covdir, 0777);
}

class Reporter{
	private $logDir = '';
	private $ignoreFile = '';

	function __construct($logDir,$ignoreFile){
		$this->logDir = $logDir;
		$this->ignoreFile = $ignoreFile;
	}

	protected function isIgnore($srcPath){
		$ignores = require($this->ignoreFile);

		foreach ($ignores as $key => $value) {			
			$count = substr_count($srcPath,$value);
			if($count > 0){
				return true;
			}
		}
		return false;
	}
# 104行新增内容
class===funciton 


# 制定域名进行统计当前配置
if ($_SERVER['HTTP_HOST']=='mydomain.com'){
    $coverage = new CodeCoverage;
    $coverage->filter()->addDirectoryToWhitelist('/www/****');
    $coverage->start('<Site coverage>');#开始统计
    register_shutdown_function('__coverage_s',$coverage,$_dir = 'cov');#注册关闭方法
}


#117行新增内容 哈哈
clss ==111

function __coverage_s(CodeCoverage $coverage,$_dir){
    $coverage->stop();#停止统计
    $cov = '<?php return unserialize(' . var_export(serialize($coverage), true) . ');';#获取覆盖结果，注意使用了反序列化
    file_put_contents(dirname(__FILE__).'/'.$_dir.'/site.' . date('U') .'.'.uniqid(). '.cov', $cov);#将结果写入到文件中
}






