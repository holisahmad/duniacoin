<?php
	class db_layout {  
		var $classname="db_layout";  
		var $db_name;  
		var $db_user;  
		var $db_password;  
		var $db_host;  
		var $db_link_ptr;  
		var $tables;  
		var $fields;  
	}  
	class db_mysql extends db_layout {  
		var $classname="db_mysql";  
		var $db_result;  
		var $db_affected_rows;  
		var $saved_results=array();  
		var $results_saved=0;  
		function error($where="",$error,$errno) {  
			echo "$where<br>";  
			die($error."<br>".$errno);  
		}  

function error_msg() {  
			return mysql_error();  
		}  

function PushResults() {  
			$this->saved_results[$this->results_saved]=array($this->db_result,$this->db_affected_rows);  
			$this->results_saved++;  
		}  

function PopResults() {  
			$this->results_saved--;  
			$this->db_result=$this->saved_results[$this->results_saved][0];  
			$this->db_affected_rows=$this->saved_results[$this->results_saved][1];  
		}  

function db_mysql($host, $user, $passwd, $db, $create="") {  
			$this->db_name=$db;  
			$this->db_user=$user;  
			$this->db_passwd=$passwd;  
			$this->db_host=$host;  
			$this->db_link_ptr=@mysql_connect($host,$user,$passwd) or $this->error("",mysql_error(),mysql_errno());  
			$this->dbhandler=@mysql_select_db($db);  
			if (!$this->dbhandler) {  
				if ($create=="1")  {  
					@mysql_create_db($db,$this->db_link_ptr) or $this->error("imposible crear la base de datos.",mysql_error(),mysql_errno());;  
					$this->dbhandler=@mysql_select_db($db);  
				}  
			}  
		}  

function reselect_db($db){  
			$this->dbhandler=@mysql_select_db($db);  
		}  

function closeDB() {  
		@mysql_close($this->db_link_ptr);  
		}  

function create_table($tblName,$tblStruct) {  
			if (is_array($tblStruct)) $theStruct=implode(",",$tblStruct); else $theStruct=$tblStruct;  
			@mysql_query("create table $tblName ($theStruct)") or $this->error("create table $tblName ($theStruct)",mysql_error(),mysql_errno());  
		}  

function drop_table($tblName) {  
			@mysql_query("drop table if exists $tblName") or $this->error("drop table $tblName",mysql_error(),mysql_errno());  
		}  

function raw_query($sql_stat) {  
			$this->db_result=@mysql_query($sql_stat) or $this->error($sql_stat,mysql_error(),mysql_errno());  
			$this->db_affected_rows=@mysql_num_rows($this->db_result);  
		}  

function count_records($table,$filter="") {  
			$this->db_result=@mysql_query("select count(*) as num from $table".(($filter!="")?" where $filter" : ""));  
			$xx=@mysql_result($this->db_result,0,"num");  
			return $xx;  
		}  

function select($fields,$tables,$where="",$order_by="",$group_by="",$having="",$limit="") {  
			$sql_stat=" select $fields from $tables ";  
			if (!empty($where)) $sql_stat.="where $where ";  
			if (!empty($group_by)) $sql_stat.="group by $group_by ";  
			if (!empty($order_by)) $sql_stat.="order by $order_by ";  
			if (!empty($having)) $sql_stat.="having $having ";  
			if (!empty($limit)) $sql_stat.="limit $limit ";  
			$this->db_result=@mysql_query($sql_stat) or $this->error($sql_stat,mysql_error(),mysql_errno());  
			$this->db_affected_rows=@mysql_num_rows($this->db_result);  
			return $sql_stat;  
		}  
		function list_tables() {  
			$this->db_result=@mysql_list_tables($this->db_name);  
			$this->db_affected_rows=@mysql_num_rows($this->db_result);  
			return $this->db_result;  
		}  

function describe($tablename) {
                        $this->result=@mysql_query("describe $tablename");
                }

function table_exists($tablename) {
                        $this->pushresults();
                        $description=$this->describe($tablename);
                        $this->popresults();
                        if ($description) $exists=true; else $exists=false;
                        return $exists;
                }

function tablename($tables, $tbl) {  
			return mysql_tablename($tables,$tbl);  
		}  

function insert_id() {  
			return mysql_insert_id();  
		}  

function insert($table,$fields="",$values="") {  
			$sql_stat="insert into $table ";  
			if (is_array($fields)) $theFields=implode(",",$fields); else $theFields=$fields;  
			if (is_array($values)) $theValues="'".implode("','",$values)."'"; else $theValues=$values;  
			$theValues=str_replace("'now()'","now()",$theValues);  
			if (!empty($theFields)) $sql_stat.="($theFields) ";  
			$sql_stat.="values ($theValues)";  
			@mysql_query($sql_stat) or $this->error($sql_stat,mysql_error(),mysql_errno());  
		}  

function update($table,$newvals,$where="") {  
			if (is_array($newvals)) $theValues=implode(",",$newvals); else $theValues=$newvals;  
			$sql_stat="update $table set $theValues";  
			if (!empty($where)) $sql_stat.=" where $where";  
			@mysql_query($sql_stat) or $this->error($sql_stat,mysql_error(),mysql_errno());  
		}  

function delete($table,$where="") {  
			$sql_stat="delete from $table ";  
			if (!empty($where)) $sql_stat.="where $where ";  
			$db_result2=@mysql_query($sql_stat) or $this->error($sql_stat,mysql_error(),mysql_errno());  
			$this->db_affected_rows=@mysql_affected_rows($this->db_result2);  
		}  

function free() {  
			@mysql_free_result($this->db_result) or $this->error("",mysql_error(),mysql_errno());  
		}  

function fetch_row() {  
			$row=mysql_fetch_row($this->db_result);  
			return $row;  
		}  

function result($recno,$field) {  
			if($this->num_rows() > 0) {
				return mysql_result($this->db_result,$recno,$field);  
			}	
		}  

function num_fields(){  

			return mysql_num_fields($this->db_result);  

		}  

		  

		function fetch_array() {  

			$row=mysql_fetch_array($this->db_result);  

			return $row;  

		}  

  

		function fetch_field() {  

			$row=mysql_fetch_field($this->db_result);  

			return $row;  

		}  

		function num_rows() {  

			$row=mysql_num_rows($this->db_result);  

			return $row;  

		} 

		function dataku($field, $username) {

			$this->select($field, "member", "username='$username'");

			if($this->num_rows() > 0) {

				$dt = $this->result(0,$field); 

			}	

			return $dt;

		}
		
		
		function datapa($field, $username) {

			$this->select($field, "pa_start", "username='$username'");

			if($this->num_rows() > 0) {

				$dt = $this->result(0,$field); 

			}	

			return $dt;

		}
		
		function datara($field, $username) {

			$this->select($field, "ra_start", "username='$username'");

			if($this->num_rows() > 0) {

				$dt = $this->result(0,$field); 

			}	

			return $dt;

		}
		
		
		
		
		
		
		
		
		function datatransfer($field, $trx) {

			$this->select($field, "konfirmasi", "trx='$trx'");

			if($this->num_rows() > 0) {

				$dt = $this->result(0,$field); 

			}	

			return $dt;

		}
		
		function calongf($field, $username) {

			$this->select($field, "gf_proses", "kepada='$username'");

			if($this->num_rows() > 0) {

				$dt = $this->result(0,$field); 

			}	

			return $dt;

		}
		
		function pinku($field, $username) {

			$this->select($field, "card", "username='$username'");

			if($this->num_rows() > 0) {

				$dt = $this->result(0,$field); 

			}	

			return $dt;

		}
		
		function timer($field, $username) {

			$this->select($field, "timer", "username='$username'");

			if($this->num_rows() > 0) {

				$dt = $this->result(0,$field); 

			}	

			return $dt;

		}
		
		function ghtimer($field, $kodetrx) {

			$this->select($field, "gh_start", "kodetrx='$kodetrx'");

			if($this->num_rows() > 0) {

				$dt = $this->result(0,$field); 

			}	

			return $dt;

		}
		
		function datagf($field, $username) {

			$this->select($field, "gf_start", "username='$username'");

			if($this->num_rows() > 0) {

				$dt = $this->result(0,$field); 

			}	

			return $dt;

		}
		
		function datapin($field, $pin) {

			$this->select($field, "card", "pin='$pin'");

			if($this->num_rows() > 0) {

				$dt = $this->result(0,$field); 

			}	

			return $dt;

		}
		
		function datambku($field, $username) {

			$this->select($field, "gh_start", "username='$username' and status='0'");

			if($this->num_rows() > 0) {

				$dt = $this->result(0,$field); 

			}	

			return $dt;

		}
		
		function databbfix($field, $kodeord) {

			$this->select($field, "bb_fix", "kodeord='$kodeord'");

			if($this->num_rows() > 0) {

				$dt = $this->result(0,$field); 

			}	

			return $dt;

		}
		
		function databbku($field, $no) {

			$this->select($field, "data_bb", "id='$no'");

			if($this->num_rows() > 0) {

				$dt = $this->result(0,$field); 

			}	

			return $dt;

		}
		
		function databb($field, $username, $status) {

			$this->select($field, "data_bb", "username='$username' and status='$status'");

			if($this->num_rows() > 0) {

				$dt = $this->result(0,$field); 

			}	

			return $dt;

		}
		
		function databbtimer($field, $username) {

			$this->select($field, "data_bb", "username='$username'");

			if($this->num_rows() > 0) {

				$dt = $this->result(0,$field); 

			}	

			return $dt;

		}
		
		function datakuewalet($field, $username) {

			$this->select($field, "ordmember", "username='$username'");

			if($this->num_rows() > 0) {

				$dt = $this->result(0,$field); 

			}	

			return $dt;

		}	

		function subkat($kat,$sub) {

			$this->select($kat, "katagori", "sub='$sub'");

			$dt = $this->result(0,$kat); 

			return $dt;

		}	

		function data($field, $table, $cond) {

			$this->select($field, $table, $cond);

			$dt = $this->result(0, $field);

			return $dt;

			

		}	

		function iklan_lama($username) {

	//$sql=myquery("select * from iklan where userid='$username' and status=1");

	//$j = mysql_num_rows($sql);

			$this->select("no, judul", "iklan", "userid='$username' and status=0");

			$j = $this->num_rows();

			if($j > 0) {

				$ada = $j;

			} else {

				$ada = 0;

			}

			return $ada;

		}	

		function publikasi($username) {

	//$sql=myquery("select * from iklan where userid='$username' and status=1");

	//$j = mysql_num_rows($sql);

			$this->select("no, judul", "berita", "username='$username'");

			$j = $this->num_rows();

			if($j > 0) {

				$ada = $j;

			} else {

				$ada = 0;

			}

			return $ada;

		}	

//sms notifikasi	

function smsnotifikasi($hp, $message) { 

$userkey="n468c2";
$passkey="hartati";

$url = "http://reguler.zenziva.net/apps/smsapi.php";
$curlHandle = curl_init();
curl_setopt($curlHandle, CURLOPT_URL, $url);
curl_setopt($curlHandle,
CURLOPT_POSTFIELDS,"userkey=".$userkey."&passkey=".$passkey."&nohp=".$hp."&pesan=".urlencode($message));
curl_setopt($curlHandle, CURLOPT_HEADER, 0);
curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
curl_setopt($curlHandle, CURLOPT_POST, 1);
$results = curl_exec($curlHandle);
curl_close($curlHandle);


}		

//sms notifikasi	

function smsnotifikasi3($hp, $message) { 
		
$userkey="7ayzsax";
$passkey="wtc-int";

$url = "http://wtc.zenziva.com/api/sendsms.php";
$type="reguler";
$curlHandle = curl_init();
curl_setopt($curlHandle, CURLOPT_URL, $url);
curl_setopt($curlHandle,
CURLOPT_POSTFIELDS,"userkey=".$userkey."&passkey=".$passkey."&nohp=".$hp."&tipe=".$type."&pesan=".urlencode($message));
curl_setopt($curlHandle, CURLOPT_HEADER, 0);
curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
curl_setopt($curlHandle, CURLOPT_POST, 1);
$results = curl_exec($curlHandle);
curl_close($curlHandle);

}

function sms($nohp)  {


// kadang ada penulisan no hp 0811 239 345
    $nohp = str_replace(" ","",$nohp);
    // kadang ada penulisan no hp (0274) 778787
    $nohp = str_replace("(","",$nohp);
    // kadang ada penulisan no hp (0274) 778787
    $nohp = str_replace(")","",$nohp);
    // kadang ada penulisan no hp 0811.239.345 
    $nohp = str_replace(".","",$nohp);

    // cek apakah no hp mengandung karakter + dan 0-9
    if(!preg_match('/[^+0-9]/',trim($nohp))){
        // cek apakah no hp karakter 1-3 adalah +62
        if(substr(trim($nohp), 0, 2)=='62'){
            $hp = trim($nohp);
        }
        
        
        if(substr(trim($nohp), 0, 2)=='60'){
            $hp = trim($nohp);
        }
        
         if(substr(trim($nohp), 0, 3)=='+62'){
            $hp = trim($nohp);
        }
        
        if(substr(trim($nohp), 0, 3)=='+60'){
            $hp = trim($nohp);
        }
        
        // cek apakah no hp karakter 1 adalah 0
        if(substr(trim($nohp), 0, 2)=='08'){
            $hp = '62'.substr(trim($nohp), 1);
        }
        
        if(substr(trim($nohp), 0, 1)=='1'){
            $hp = '601'.substr(trim($nohp), 1);
        }
    
       elseif(substr(trim($nohp), 0, 2)=='01'){
            $hp = '601'.substr(trim($nohp), 1);
        }
    

}
   return   $hp ;
}    
//print $hp;

function smsnotifikasi4($nohp, $message )  {

$user ="API0L8WSJQQVJ";
$pass ="API0L8WSJQQVJ0L8WS";
$sms_from ="WTC-INT";
$hp = $this->sms($nohp);
       
                        $query_string = "api.aspx?apiusername=".$user."&apipassword=".$pass;
                        $query_string .= "&senderid=".rawurlencode($sms_from)."&mobileno=".rawurlencode($hp);
                        $query_string .= "&message=".rawurlencode(stripslashes($message)) . "&languagetype=1";        
                        $url = "http://gateway.onewaysms.co.id:10002/".$query_string;       
                        $fd = @implode ('', file ($url));      
                       
}




		function katiklan($no) {

			$this->select("id, title", "categories", "id='$no'");

			$kat = $this->fetch_row();

			return $kat[1];

		}

		function config($field) {
			$sql=mysql_query("select $field from configuration where id=1");
			$row=mysql_fetch_row($sql);
			$kat = $row[0];
			return $kat;

		}		
		
		function AutoCash($username, $jenis, $dtgl) {
		$a=0;
		$sql=mysql_query("select $jenis from autocash where username='$username' $dtgl");
		while($row=mysql_fetch_row($sql)) {
			$a = $a + $row[0];
		}
		
		return $a;
	}	

		function downline($level, $st, $username) {

			$jdl = 0;

			//$jdl = $this->count_records("member", "sponsor='$username' and status=$st");

			//$jdl = $this->num_rows();

			$sql=mysql_query("select * from member where $level='$username' and status=$st");

			$jdl = mysql_num_rows($sql);

			return $jdl;

		}

		

		function klik($username) {

			$cl = 0;

			$this->select("*", "click", "refid='$username'");

			$cl = $this->num_rows();

			return $cl;

		}	

		function totbonus($username, $st, $sp) {

			$tb = 0;

			$sql=mysql_query("select rp1, rp2 from member where $sp='$username' and status=$st");

			while($row = mysql_fetch_row($sql)) {

			//$this->select("username, rp1, rp2", "member", "$sp='$username' and status=$st");

				if($sp == "sponsor") {

					$tb = $tb + $row[0];

				} else {

					$tb = $tb + $row[1];

				}	

			}		

			//$acak = substr($db->dataku("rpadmin", $username);

			

			return $tb;

		}	

		//----topmenu--

		

		function topmenu() {

			$sql=$this->select("id, name, alias, link", "menu", "published=1", "ordering");

		//mysql_close();

			$n = $this->num_rows();

			echo "<ul>";

			for($i=0;$i<$n;$i++)

		 	{

				$mx = explode("=", $this->result($i, "link"));

				$ma = $mx[2];

				

				$mb = explode("&", $mx[1]);

				$catid = $mb[1];

				if($m == "contact") {

					$cl = "class=current";

				} else {

					$cl = "";

				}			

				echo "<li><a href='".$this->result($i, "link")."' $cl><span>".$this->result($i, "name")."</span>$m</a></li>";

			}

			echo "</ul>";

		}

		//----end topmenu	

		function delete_html($form_name) 

		{ 



			$form_name = str_replace("[", "", "$form_name"); 

			$form_name = str_replace("]", "", "$form_name"); 

			$not ="\"'*\abcdefghijklmnopqrstuvwxyz1234567890�����������������������=~`@#$%^&*()_{}\n\t\r\ /;:.!?,+-"; 

			$form_name = eregi_replace("(</)+[$not]+(>)", "", "$form_name"); 

			$form_name = eregi_replace("(<)+[$not]+(>)", "", "$form_name"); 

			

			$form_name = str_replace("<", "", $form_name); 

			$form_name = str_replace(">", "", $form_name); 

			$form_name = htmlspecialchars($form_name); 

			

			return $form_name; 

			} 

			//---

		function crops($teks, $jh) {

				

				$ISIBERITA = $teks;

			$b_bagianberita = $jh;

			$TMPBAGIANBERITA = array();

			$TMP = explode(" ", $ISIBERITA);

			for($i=0;$i<=$b_bagianberita;$i++)

			{

				$TMPBAGIANBERITA[$i] = $TMP[$i];

			}

			$BAGIANBERITA = implode(" ", $TMPBAGIANBERITA);	

			

  			$dt=$BAGIANBERITA;

			return $dt;

		} 



		function news($ref) {

			$this->select("id, title, maintext, created", "content", "catid=4 and published=1", "created desc", "", "", "3");

			$ada = $this->num_rows();

			for($i=0;$i<$ada;$i++) {

				$text = $this->result($i, "maintext");

				$tgcr = $this->result($i, "created");

				echo "<h6><a href='?act=news&nid=".$this->result($i, "id")."'>".$this->result($i, "title")."</a></h6>";

				echo "<div class='author'>".formatgl($tgcr)."</div>";

				$text0 = $this->crops($this->delete_html($text), 8);

				echo "$text0...<p><hr>";

			}

		}		

function marketing($ref) {

			$this->select("id, title, maintext, created", "content", "catid=55 and published=1", "created desc", "", "", "");

			$ada = $this->num_rows();

			for($i=0;$i<$ada;$i++) {

				$text = $this->result($i, "maintext");

				$tgcr = $this->result($i, "created");

				$text0 = $this->crops($this->delete_html($text), 8);

				echo "$text";

			}

		}

function newshead($ref) {

			$this->select("id, title, maintext, created", "content", "catid=54 and published=1", "created desc", "", "", "");

			$ada = $this->num_rows();

			for($i=0;$i<$ada;$i++) {

				$text = $this->result($i, "maintext");

				$tgcr = $this->result($i, "created");

				$text0 = $this->crops($this->delete_html($text), 8);

				echo "$text";

			}

		}	

		function dataupline($field, $username) {

			$dup = "";

			$this->select("$field", "upline", "username='$username'");

			$dup = $this->result(0, $field);

			return $dup;

		}	

		
		function dataupline1($field, $username) {
			$dup = "";
			$this->select("$field", "upline", "username='$username'");
			$dup = $this->result(0, $field);
			return $dup;
		}

		function dataupline2($field, $username) {
			$dup = "";
			$this->select("$field", "upline", "username='$username'");
			$dup = $this->result(0, $field);
			return $dup;
		}

		function tree($username) {

			$tr = "";

			$this->select("id", "tree", "username='$username'");

			$tr = $this->result(0, "id");

			return $tr;

		}	

		

		//------------CARI LEVEL-------

		function levelmbr($username, $posisine) {

		$jlv = 0;

		//-----------cari level tertinggi-------------

			$slv="select * from upline order by level desc";

			$rlv=mysql_query($slv);

			

			$slev=mysql_fetch_array($rlv);

			//if($slev["level"] <= 20) {

				$jmlev=$slev["level"];

			//} else {

				//$jmlev = 20;

			//}

	//$jmlev=$slev["level"];

			$sqlki="select a.username, b.status from upline as a inner join member as b on a.username=b.username where a.upline0='$username' and a.posisi='$posisine' and b.status=1";



			$rki=mysql_query($sqlki);

			

			$kir=mysql_fetch_array($rki);

			$adaki=mysql_num_rows($rki);

		

			$user=$kir[0];



				

			if ($adaki > 0)

			{

				//$user=$this->result(0, "a.username");

				for($i=0;$i<$jmlev;$i++)

				{

					$sql2="select a.username, b.status from upline as a inner join member as b on a.username=b.username where upline$i='$user' and b.status=1";

			

				$res=mysql_query($sql2);

				

				$jml=array();

			//$levkir=array();

				$jml[$i]=mysql_num_rows($res);

			

				$lv= 1 + $i;

			

				if ($jml[$i] > 0)

					{

						$jl=$lv;			

					} 	

				

				}

				$tb = 1;

		

			

				} else {

				$jl=0;

				$tb = 0;

			}

			$jlv = $jl + $tb;

			//echo "level = $jlv";

			return $jlv;

		}


		function jumlahdl($username, $status) {
			$lev = mysql_query("select level from upline order by level desc");
			$lv = mysql_fetch_row($lev);
				$jmlev = $lv[0];
				$tkt = $this->config("kedalaman");
			for($i=0;$i<$tkt;$i++) {
				$sql=mysql_query("SELECT a.username, b.status FROM upline as a INNER JOIN member as b on a.username=b.username WHERE a.upline$i='$username' AND b.status='$status'");
				$ada = mysql_num_rows($sql);
				$td = $td + $ada;
			}
			$jdl = $td;
			return $jdl;
		}
		
function jumlahsp($username) {
			$j=0;
			$sql=mysql_query("select username from member where sponsor='$username' and status=1");
			$j=mysql_num_rows($sql);
			return $j;
		}

		
		function updatejaringan($username, $by) {
			$upline = $this->dataku("upline", $username);
			$by = $by;
			$posisi = $this->dataupline("posisi", $username);
			if($posisi == "KIRI") {
				$this->insert("omzet", "", "'', '$upline', '$by', '0', '$by', '0'");	
			} else {
				$this->insert("omzet", "", "'', '$upline', '0', '$by', '0', '$by'");	
			}
		}
		
		function updatejaringanpas($username, $midrp) {
			$by = $midrp;
				$this->insert("omzet", "", "'', '$username', '-$by', '-$by', '0', '0'");	
		}
		
		function cocok($upli) {
			$mt="";	
			$sql=mysql_query("select * from omzet where username='$upli'");
			$totkiri=0;
			$totkanan=0;
			while($row=mysql_fetch_row($sql)) {
			$totkiri = $totkiri + $row[2];
			$totkanan = $totkanan + $row[3];
			}
			if($totkiri > $totkanan) {
				$cocok = $totkanan;
			} else {
				$cocok = $totkiri;
			}
			$mt= $cocok;
			return $mt;
		}
		
		
        function hapusjaringanbinary($username) {
			$upline = $this->dataku("upline", $username);
			$posisi = $this->dataupline("posisi", $username);
			$sql=mysql_query("select kiri, kanan from jaringan where username='$upline'");
			$data=mysql_fetch_row($sql);
			if($posisi == "KIRI") {
				$nk = $data[0] - 2 ;
				$pos = "kiri";
			} else {
				$nk = $data[1] - 2;
				$pos = "kanan";
			}
			$this->update("jaringan", "$pos='$nk'", "username='$upline'");		
		}
		
		
		function updatejaringanbinary($username) {
			$upline = $this->dataku("upline", $username);
			$posisi = $this->dataupline("posisi", $username);
			$sql=mysql_query("select kiri, kanan from jaringan where username='$upline'");
			$data=mysql_fetch_row($sql);
			if($posisi == "KIRI") {
				$nk = $data[0] + 1;
				$pos = "kiri";
			} else {
				$nk = $data[1] + 1;
				$pos = "kanan";
			}
			$this->update("jaringan", "$pos='$nk'", "username='$upline'");		
		}
		
		function aktivasibinary($username) {
			$clientdate  = (date ("Y-m-d H:i:s")); 
			$tgl_skr = (date("Y-m-d"));
			
			$this->updatejaringanbinary($username);
			
			for($i=0;$i<500;$i++) {
					$upli = $this->dataupline("upline$i", $username);
					$matchnow=$this->cocok($upli);
					
						
					if($upli<>""){
					$this->updatejaringanbinary($upli);
					} else {
					}
										
					if($matchnow > 0) {
						//$k_pas=(5*$matchnow)/100;
						//$this->insert("komisi", "", "'', '$upli', '$k_pas', '$clientdate', '1', 'kompasangan', '$username'");
					} else {
					}
					
					
			}
			$jsp = $this->jumlahsp($sponsore, "1");
			$this->update("upline", "sp='$jsp'", "username='$sponsore'");
		}
		
		
		//-----aktivasi--
		function aktivasiduncoin($username) {
			$clientdate  = (date ("Y-m-d H:i:s")); 
			$tgl_skr = (date("Y-m-d"));
			$nominal = $this->dataku("paket_daftar", $username);
			$hp = $this->dataku("hp", $username);
			$kunci = $this->dataku("kunci", $username);
			$sponsor = $this->dataku("sponsor", $username);
			$paket_sp = $this->dataku("paket_daftar", $sponsor);		
			$paket = $this->dataku("paket_daftar", $username);
			$jlh_hari = $this->dataku("jlh_hari", $username);
			$this->update("member", "status='1'", "username='$username'") ;
			
			

if ($paket == Silver ) {
$bv = 60 ;
$bonussponosr = 60 ;
$enterten = 100 ;

} else if ($paket == Gold ) {
$bv = 400 ;
$bonussponosr = 400 ;
$enterten = 500 ;

} else if ($paket == Platinum ) {
$bv = 800 ;
$bonussponosr = 800 ;
$enterten = 1000 ;

} else if ($paket == Titanium ) {

$bv = 2600 ;
$bonussponosr = 2600 ;
$enterten = 3000 ;

}
			
	// komisi Sponsor
 $this->insert("komisi", "", "'', '$sponsor', '$bonussponosr', '$clientdate', '0', 'KomisiSponsor', '$username'");



// komisi enterten
if ($paket_sp == Titanium) {

$this->insert("komisi", "", "'', '$sponsor', '$enterten', '$clientdate', '0', 'KomisiEnterten', '$username'");

}		
	
	$this->aktivasibinary($username);
	$this->updatejaringan($username, $bv);	

	for($i=0;$i<500;$i++) {
	
	$upli = $this->dataupline("upline$i", $username);
	
	$matchnow=$this->cocok($upli);
					if($upli<>""){
					$this->updatejaringan($upli, $bv);
					} else {
					}
			
	$sql_fo = mysql_query("select jumlah, username from komisi where jenis='kompasangan' and username='$upli' and (tglbayar between '$tgl_skr' and '$tgl_skr')");
					$ada_fox = "";
		            while($rkom=mysql_fetch_row($sql_fo)) {
					$ada_fox = $ada_fox + $rkom[0];
					
					}
					 $ada_fo = $ada_fox  ;
					
                   $paket_fo = $this->dataku("paket_daftar", $upli);
				  						
					
					
					if ($ada_fo > 0 && $paket_fo == Silver ) {
										
					  $matcbuy = 420 - $ada_fo ;
					  			  
					} else if  ( $ada_fo > 0 && $paket_fo == Gold ) {
					
					 $matcbuy  = 1200 - $ada_fo ;
					 					
					}  else if ( $ada_fo > 0 && $paket_fo == Platinum ) {
					
					$matcbuy  = 2000 - $ada_fo ;
								
					}  else if ( $ada_fo > 0 && $paket_fo == Titanium ) {
					
					$matcbuy  = 5000  - $ada_fo ;
					
					} else if ($ada_fo == 0 && $paket_fo == Silver) {
						
						$matcbuy  = 420 ;
					} else if ($ada_fo == 0 && $paket_fo == Gold) {
					
						$matcbuy  = 1200 ;
						
					}	else if ($ada_fo == 0 && $paket_fo == Platinum) {
						
						$matcbuy  = 2000 ;
						
					} else if ( $ada_fo > 0 && $paket_fo == Titanium ) {
					    $matcbuy  = 5000 ;
					}
					
					if($matchnow > 0) {
					
					if($upli<>""){
					
					$this->insert("komisi", "", "'', '$upli', '$matcbuy', '$clientdate', '0', 'kompasangan', '$username'");
					 $this->updatejaringanpas($upli, $matchnow);
					}
					 
					 
                    }
}						
		
		$jlh_kali = $jlh_hari * 10 ;
		$tgl_re = date('Y-m-d', strtotime('+'.$jlh_kali.' days', strtotime($tgl_skr)));
		
		$this->update("member", "status='1', tgl_reinves='$tgl_re'", "username='$username'") ;
	
$message= "Info Duniacoin : Username ".$username."  Aktivasi anda Sukses,  Terima Kasih.";
$this->smsnotifikasi ($hp , $message) ;		
				
	}			
			
		
		function orderaktivasi($username) {
			$clientdate    = (date ("Y-m-d H:i:s")); //--tgl skr
			$tgl_skr = (date("Y-m-d"));
			$dtfrom = "$tgl_skr 00:00:00";
			$dtto = "$tgl_skr 23:59:59";
				$this->update("ordmember", "status=1, tglaktif='$clientdate'", "username='$username'");
				$sponsore = $this->dataku("sponsor", $username);
				$by = $this->datakuewalet("adminrp", $username);
				$k_spon_ewalet = $this->config("komisi_sponsor_ewalet");
				$k_spon_ewalet_ok = ($k_spon_ewalet*$by)/100;
				if($sponsore) {
				$this->insert("komisi", "", "'', '$sponsore', '$k_spon_ewalet_ok', '$clientdate', '0', '', 'komsponsorro', '$username'");
				$tktewalet = $this->config("kedalamanewalet");
				$kolev = $this->config("komlevewalet");
				for($i=0;$i<$tktewalet;$i++) {
					$j = $i + 1;
					$komlev = explode("|", $kolev);
					$by = $this->datakuewalet("adminrp", $username);
					$bonlev = ($komlev[$i]*$by)/100;
					$upli = $this->dataupline("upline$i", $username);
					if($upli) {
						$this->insert("komisi", "", "'', '$upli', '$bonlev', '$clientdate', '0', '', 'komisilevelro$j', '$username'");
						}
				}
			}		
		}
		
	
		

		function insertkomjual($username, $harga) {
			$clientdate    = (date ("Y-m-d H:i:s"));
			$tkt = $this->config("kedalaman1");
			$level = $this->dataupline("level", $username);
			$kdlm = explode("|", $tkt);
			$kd = $kdlm[1];
			$kolev = $this->config("komjual");
				for($i=0;$i<$level;$i++) {
					if($level <= 3) { //---sd levl 10
						$j = $i + 1;
						$komlev = explode("|", $kolev);
						$upli = $this->dataupline("upline$i", $username);
						$tj = ($komlev[$i] * $harga)/100;
						if($upli) {
							$this->insert("komisi", "", "'', '$upli', '$tj', '$clientdate', '0', '', 'komjual$j', '$username'");
						}
					} //--end if level	
				}
			}	
		//-------total KOMISI-------
		
		function totalkomisi($username) {
			$kom="";
			$skom="SELECT * FROM komisi WHERE username='$username' and status='0'";
			$dkom=mysql_query($skom);
			$ada=mysql_num_rows($dkom);
			if($ada > 0) {
				$komi = 0;
				while($rkom=mysql_fetch_row($dkom)) {
					$komi = $komi + $rkom[2];
				}
				$kom = $komi;
			} else {
				$kom = 0;
			}
			return $kom;
		}
		
	function totalpsb($username, $dtgl) {
			$kom="";
			$skom="SELECT total FROM automaintain WHERE username='$username' AND status=1 $dtgl";
			$dkom=mysql_query($skom);
			$ada=mysql_num_rows($dkom);
			if($ada > 0) {

				$komi = 0;

				while($rkom=mysql_fetch_row($dkom)) {

					$komi = $komi + $rkom[0];

				}

				$kom = $komi;

			} else {

				$kom = 0;

			}	
			return $kom;
		}
		
function totalkomisipribadi($username) {
			$kom="";
			$skom="SELECT * FROM komisi WHERE jenis='Bantuan Anda' and username='$username' and validasi='1' order by id desc limit 0,1";
			$dkom=mysql_query($skom);
			$ada=mysql_num_rows($dkom);
			if($ada > 0) {
				$komi = 0;
				while($rkom=mysql_fetch_row($dkom)) {
					$komi = $komi + $rkom[2];
				}
				$kom = $komi;
			} else {
				$kom = 0;
			}
			return $kom;
		}		
		
		
		
		
		function totalkomisisponsor($username) {
			$kom="";
			$skom="SELECT * FROM komisi_sponsor WHERE username='$username' and validasi='1'";
			$dkom=mysql_query($skom);
			$ada=mysql_num_rows($dkom);
			if($ada > 0) {
				$komi = 0;
				while($rkom=mysql_fetch_row($dkom)) {
					$komi = $komi + $rkom[3];
				}
				$kom = $komi;
			} else {
				$kom = 0;
			}
			return $kom;
		}	

		function bayarkomisi($username, $dtgl) {

			$kom="";

			$skom="SELECT bonus FROM transfer WHERE userid='$username' AND status=1 $dtgl";

			$dkom=mysql_query($skom);

			$ada=mysql_num_rows($dkom);

			if($ada > 0) {

				$komi = 0;

				while($rkom=mysql_fetch_row($dkom)) {

					$komi = $komi + $rkom[0];

				}

				$kom = $komi;

			} else {

				$kom = 0;

			}

			return $kom;

		}	
		
		function bayarkomisisponsor($username, $dtgl) {

			$kom="";

			$skom="SELECT rp FROM transfer_sponsor WHERE userid='$username' AND status=1 $dtgl";

			$dkom=mysql_query($skom);

			$ada=mysql_num_rows($dkom);

			if($ada > 0) {

				$komi = 0;

				while($rkom=mysql_fetch_row($dkom)) {

					$komi = $komi + $rkom[0];

				}

				$kom = $komi;

			} else {

				$kom = 0;

			}

			return $kom;

		}



		//----cari jml perlevel--

		function jmlmember($username, $field) {

			$jm = 0;

			$this->select("a.username, a.status, b.sponsor", "member as a inner join upline as b on a.username=b.username", $field);

			$jm = $this->num_rows();

			return $jm;

		}		

		

		//----ewalet---

		function myewalet($username) {

			$te = 0;

			

			$te = $this->myewaletdone($username);

			return $te;

		}	

		function myewaletpending($username) {

			$te = 0;

			//--ngitung kredit--

			$sql = mysql_query("select username, jumlah, tujuan from dataewalet where tujuan='$username' and status=0");

			$a = mysql_num_rows($sql);

			$ted = 0;

			while($row=mysql_fetch_row($sql)) {

			//for($i=0;$i<$a;$i++) {

				$ted = $ted + $row[1];

			}

			//---ngitung debet--

			$sqla = mysql_query("select username, jumlah, tujuan from dataewalet where username='$username' and status=0");

			//$a = mysql_num_rows($sql);

			$tek = 0;

			while($rowa=mysql_fetch_row($sqla)) {

				$tek = $tek + $rowa[1];

			}	

			$te = $ted + $tek;

			return $te;

		}	

		

		function myewaletdone($username) {

			$te = 0;

			//--ngitung kredit--

			$sql = mysql_query("select username, jumlah, tujuan from dataewalet where tujuan='$username' and status=1");

			$a = mysql_num_rows($sql);

			$ted = 0;

			while($row=mysql_fetch_row($sql)) {

			//for($i=0;$i<$a;$i++) {

				$ted = $ted + $row[1];

			}

			//---ngitung debet--

			$sqla = mysql_query("select username, jumlah, tujuan from dataewalet where username='$username' and status=1");

			//$a = mysql_num_rows($sql);

			$tek = 0;

			while($rowa=mysql_fetch_row($sqla)) {

				$tek = $tek + $rowa[1];

			}	

			$te = $ted - $tek;

			return $te;

		}	

		

		//---saldo admin--

		function bayarbonus($dtgl) {

			$this->select("rp, valid", "transfer", $dtgl);

			while($row=$this->fetch_row()) {
			$sa = 0;
				if($row[1] == 0) { //---status 1 = kredit. status 0 = debet

					$ja = $row[0];

				} 

				$sa = $ja;

			}

			return $sa;

		}	

		
		
		// Omset PA
		
		
		function bayarbonus2($dtgl) {

						
		$kom="";
			$skom="SELECT * FROM transfer WHERE valid='0' and tglbayar='$dtgl'";
			$dkom=mysql_query($skom);
			$ada=mysql_num_rows($dkom);
			if($ada > 0) {
				$komi = 0;
				while($rkom=mysql_fetch_row($dkom)) {
					$komi = $komi + $rkom[7];
				}
				$kom = $komi;
			} else {
				$kom = 0;
			}
			return $kom;	
			
			
			
			
			
			
			
			
			}
		
		
		function omsetpari($dtgl) {

			$this->select("jmlgf, status , negara", "gf_start", $tanggal);

			$sa = 0;

			while($row=$this->fetch_row()) {
			
			
			if ($row[2] == 'Indonesia'){

				if($row[1] == 0) { //---status 1 = kredit. status 0 = debet

					$ja = $row[0];
 
				} else {

					$ja = -($row[0]);

				}		

				$sa = $sa + $ja;
                              }
			}

			return $sa;

		}	
		
	function omsetpakl($dtgl) {

			$this->select("jmlgf, status, negara", "gf_start", $tanggal);

			$sa = 0;

			while($row=$this->fetch_row()) {
			
			if ($row[2] == 'Malaysia'){

				if($row[1] == 0) { //---status 1 = kredit. status 0 = debet

					$ja = $row[0];

				} else {

					$ja = -($row[0]);

				}		

				$sa = $sa + $ja;

			}
			}

			return $sa;

		}		




// Omset RA
		
		
		function omsetra($dtgl) {

			$this->select("nominal, status", "gh_start", $tanggal);

			$sa = 0;

			while($row=$this->fetch_row()) {

				if($row[1] == 0) { //---status 1 = kredit. status 0 = debet

					$ja = $row[0];

				} else {

					$ja = ($row[0]);

				}		

				$sa =   $sa +  $ja;

			}

			return $sa;

		}	
		
function omsetrari($dtgl) {

			$this->select("nominal, status , negara", "gh_start", $tanggal);

			$sa = 0;

			while($row=$this->fetch_row()) {
			
			if ($row[2] == 'Indonesia'){

				if($row[1] == 0) { //---status 1 = kredit. status 0 = debet

					$ja = $row[0];

				} else {

					$ja = ($row[0]);

				}		

				$sa = $sa + $ja;

			}
			}

			return $sa;

		}	

function omsetrakl($dtgl) {

			$this->select("nominal, status , negara", "gh_start", $tanggal);

			$sa = 0;

			while($row=$this->fetch_row()) {
			
			if ($row[2] == 'Malaysia'){

				if($row[1] == 0) { //---status 1 = kredit. status 0 = debet

					$ja = $row[0];

				} else {

					$ja = ($row[0]);

				}		

				$sa = $sa + $ja;

			}
			}

			return $sa;

		}


		//----banner-----

		function banner() {

			//$bn = "";

			$this->select("id, nama, banner, url", "banner", "published=1", "ordering");

			while($row=$this->fetch_row()) {

				echo "<a href='banner.php?bid=$row[0]' target='_blank'><img src='images/banner/$row[2]' title='$row[1]' border=0 /></a><br>";

			}

			//return $bn;	

		}	
		
		function bannerkiri() {
			//$bn = "";
			$this->select("id, nama, banner, url", "banner_kiri", "published=1", "ordering");
			while($row=$this->fetch_row()) {
				echo "<a href='http://$row[3]' target='_blank'>$row[1]</a>";
				echo "<hr>";
				
			}
			//return $bn;	
		}
		
		function bannerkiri1() {
			//$bn = "";
			$this->select("id, nama, banner, url", "banner_kiri1", "published=1", "ordering");
			while($row=$this->fetch_row()) {
				echo "<a href='http://$row[3]' target='_blank'><img src='images/banner/$row[2]' title='$row[1]' border=0 width='180'/></a>
				<hr>";
			}
			//return $bn;	
		}
		
		function bannerkanan() {
			//$bn = "";
			$this->select("id, nama, banner, url", "banner_kanan", "published=1", "ordering");
			while($row=$this->fetch_row()) {
				echo "<a href='http://$row[3]' target='_blank'><img src='images/banner/$row[2]' title='$row[1]' border=0 width='180'/></a>
				<hr>";
			}
			//return $bn;	
		}

		

		function komisipaket($username, $dtgl) {

			$kom=0;

			$spk = mysql_query("select paket from upline where username='$username' ");

			$row=mysql_fetch_row($spk);

			$pk = $row[0];

			$tkm = 0;

			for($i=0;$i<$pk;$i++) {

				if($i == 0) {

					$user = $username;

				} else {

					$user = "$username-0$i";

				}

						

				$skom="SELECT * FROM komisi WHERE username='$user' $dtgl";

				$dkom=mysql_query($skom);

				$ada=mysql_num_rows($dkom);

				

					$komi = 0;

					while($rkom=mysql_fetch_row($dkom)) {

						$komi = $komi + $rkom[2];

					}

					$tkm = $tkm + $komi;

				}	

					$kom = $tkm;

			

				return $kom;

		}	

		

		//----ym---

	function ym($i, $n) {

		$ym = "";

		$ymn = explode(",", $this->config("ym"));

		//$y = array();

		$cn = count($ymn);

		//for($i=0;$i<$cn;$i++) {

			echo "<a href='ymsgr:sendIM?$ymn[$i]'><img src='http://opi.yahoo.com/online?u=$ymn[$i]&m=g&t=1' border='0' title='$n'></a>";

		//}

	}	


function totalkomisicash($username, $dtgl) {
			$kom=0;
			//$cros = $this->bonuscrosline($username, $dtgl);
			$kom = $this->totalkomisi($username, $dtgl) - $this->totalkomisipulsa($username, $dtgl);
			
			
			return $kom;
		}

function totalkomisipulsa($username, $dtgl) {
			$kom="";
			$skom="SELECT * FROM komisi WHERE username like '%$username%' AND jenis='kompulsa' $dtgl";
			$dkom=mysql_query($skom);
			$ada=mysql_num_rows($dkom);
			if($ada > 0) {
				$komi = 0;
				while($rkom=mysql_fetch_row($dkom)) {
					$komi = $komi + $rkom[2];
				}
				$kom = $komi;
			} else {
				$kom = 0;
			}
			return $kom;
		}	

function TransferKomisi($username, $jenis, $dtgl) {
			$kom=0;
			//if($jenis == "pulsa") {
				$skom="SELECT $jenis FROM transfer WHERE userid='$username' $dtgl";
			//} else {
				//$skom="SELECT rp FROM transfer WHERE tujuan<>'HP Member' and userid='$username' $dtgl";
			//}
			$dkom=mysql_query($skom);
			$ada=mysql_num_rows($dkom);
			if($ada > 0) {
				$komi = 0;
				while($rkom=mysql_fetch_row($dkom)) {
					$komi = $komi + $rkom[0];
				}
				$kom = $komi;
			} else {
				$kom = 0;
			}
			return $kom;
		}	

function depan($ref) {



			$this->select("id, title, maintext, created", "content", "catid=1 and published=1", "created desc", "", "", "");



			$ada = $this->num_rows();



			for($i=0;$i<$ada;$i++) {



				$text = $this->result($i, "maintext");



				$tgcr = $this->result($i, "created");



				$text0 = $this->crops($this->delete_html($text), 8);



				echo "$text";



			}



		}



function company($ref) {



			$this->select("id, title, maintext, created", "content", "catid=56 and published=1", "created desc", "", "", "");



			$ada = $this->num_rows();



			for($i=0;$i<$ada;$i++) {



				$text = $this->result($i, "maintext");



				$tgcr = $this->result($i, "created");



				$text0 = $this->crops($this->delete_html($text), 8);



				echo "$text";



			}



		}



function plan($ref) {



			$this->select("id, title, maintext, created", "content", "catid=23 and published=1", "created desc", "", "", "");



			$ada = $this->num_rows();



			for($i=0;$i<$ada;$i++) {



				$text = $this->result($i, "maintext");



				$tgcr = $this->result($i, "created");



				$text0 = $this->crops($this->delete_html($text), 8);



				echo "$text";



			}



		}



	function freemember($status) {
		$this->select("username, nama, hp, kota", "member", "status=$status and paket=1", "tglaktif desc", "", "", "10");
		while($data=$this->fetch_row()) {
			echo "<div class=berita><center><table cellpadding=\"0\" cellspacing=\"0\" width=\"50px\" height=\"50px\" border=\"0\" align=\"left\" bgcolor=\"#F9F9F9\"><tr><td width=\"100%\" align=\"center\"><img src=\"images/no_avatar.gif\" width=\"50px\" height=\"50px\"></td></tr></table>$data[1]<br /> $data[2] <br />($data[3])<br /><hr></center></div>";
		}
	}

	function newmember($status, $from) {
		$this->select("username, nama, kota, paket_daftar, foto", "member", "status=$status", "id desc", "", "", "10");
			$folder = "../foto_profile/";
			$folder2 = "../foto_profile/";

		while($data=$this->fetch_row()) {
			 if(!$data[4]) {
					$foto = $folder."member.png";

				} else {
					$foto =	$folder2.$data[4];

				}
		echo "<table width='220' border='0' cellspacing='1' cellpadding='1'>
  <tr>
    <td width='73' rowspan='4'><img src=\"$foto\" width=\"55px\" height=\"55px\"></td>
    <td width='15'>&nbsp;</td>
    <td width='132'><strong>$data[0]</strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>$data[2]</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>$data[3]</td>
  </tr>
</table><hr>";
			//echo "<div class=berita><center><img src=\"$foto\" width=\"55px\" height=\"65px\"><br>$data[0]<br /> $data[1] <br /> $hape$x <br />($data[3])<br /><hr></center></div>";
		}
	}
	
	function newmember0($status, $from) {
		$this->select("username, nama, hp, kota, foto", "member", "status=$status", "id desc", "", "", "10");
			$folder = "../member/images/";
			$folder2 = "../foto_profile/";
		while($data=$this->fetch_row()) {
			 if(!$data[4]) {
					$foto = $folder."no_avatar.gif";

				} else {
					$foto =	$folder2.$data[4];

				}
		$hape=substr($data[2],0,9);
		$x="XXX";
			echo "<div class=berita><center><img src=\"$foto\" width=\"55px\" height=\"55px\"><br>$data[0]<br /> $data[1] <br /> $hape$x <br />($data[3])<br /><hr></center></div>";
		}
	}

	function Menunggu($username, $posisi, $dtgl) {
			$n=0;	
			$kiri = $this->kirikanan($username, "kiri", "1", $dtgl);
			$kanan = $this->kirikanan($username, "kanan", "1", $dtgl);
			if($kiri >= $kanan && $posisi == "kiri") {
				$mp = $kiri - $kanan;
			} else if($kiri >= $kanan && $posisi == "kanan") {
				$mp = 0;
			} else if($kiri < $kanan && $posisi == "kanan") {
				$mp = $kanan - $kiri;
			} else {	
			
				$mp = 0;
			}
			$n = $mp;
			return $n;
		}	
			
		//---hari tgl
	function tanggalan($dtgl) {
		$h="";
		$hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
		 $bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
		 $w = date("w", strtotime($dtgl));
		 $b = date("m", strtotime($dtgl));
		 $t = date("d", strtotime($dtgl));
		 $h = $hari[$w].", $t ".$bulan[$b-1]." ".date("Y", strtotime($dtgl));
		 return $h;
	} 
	
	function kirikanan($username, $posisi, $status, $dtgl) {
			$n=0;
			$rep=str_replace("tglbayar", "b.tglaktif", $dtgl);
			$level = $this->dataupline("level", $username);
			//$user = $this->dataupline($posisi, $username);
			/*if($user && $this->dataku("status", $user) == $status) {
				$tm = 1;
			} else {
				$tm = 0;
			}	
			*/	
			$sqlu=mysql_query("select a.$posisi, b.tgl from upline as a inner join member as b on a.username=b.username where  a.username='$username' and b.status='$status'");
			$data=mysql_fetch_row($sqlu);
			
			//if($posisi == "kiri") {
				$user = $data[0];
			//} else {
				//$user = $data[1];
			//}		
			if($user) $t = 1;
			$sql_lev = mysql_query("select level from upline order by level desc");
			$rowlev = mysql_fetch_row($sql_lev);
			$loop = $rowlev[0] - $level;
			for($i=0;$i<$loop;$i++) {
				if($i == 0) {
					$sql=mysql_query("select a.username, b.tgl from upline as a inner join member as b on a.username=b.username where  a.upline$i='$username' and a.posisi='$posisi' and b.status='$status' $rep");
					$ada0 = mysql_num_rows($sql);
				} else {
					$o = $i-1;
					$sql=mysql_query("select a.username, b.tgl from upline as a inner join member as b on a.username=b.username where  a.upline$i='$username' and a.upline$o='$user' and b.status='$status' $rep");
				}
				$ada = mysql_num_rows($sql);
				$n0 = $n0 + $ada;
			}
				$n = $n0;
			return $n;
		}	

	function upgrademember() {

		//$nm = "";

		$this->select("username, nama, kota, hp", "member", "ket='Aktif' and paket=1", "tglaktif desc", "", "", "10");

		while($data=$this->fetch_row()) {

			echo "<center><table cellpadding=\"0\" cellspacing=\"0\" width=\"50px\" height=\"50px\" border=\"0\" align=\"left\" bgcolor=\"#F9F9F9\"><tr><td width=\"100%\" align=\"center\"><img src=\"images/no_avatar.gif\" width=\"50px\" height=\"50px\"></td></tr></table>$data[0]<br /> $data[1] <br /> $data[2] <br />($data[3])<br /><hr></center>";

		}

		//return $nm;

	}		

}  

?>