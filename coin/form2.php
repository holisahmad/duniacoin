<?
	if($user_status > 0 ) {
?>
<style type="text/css">
body,td,th {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 12px;
}
.merah {
	color: #F00;
}
</style>
<form action="?e=join2&amp;actions=submit" method="post" name="daftar" id="daftar">
<p><center>
  <p><strong>NEW MEMBER REGISTRATION</strong></p>
  <p>&nbsp;</p>
</center></p>
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>
    
    <table width="800" border="0" cellspacing="2" cellpadding="2">
      <tr>
        <td width="155"><strong>Profile</strong></td>
        <td width="208">&nbsp;</td>
        <td width="14">&nbsp;</td>
        <td width="132"><strong>Bank Account</strong></td>
        <td width="259">&nbsp;</td>
      </tr>
      
      
      
      <tr>
        <td>Username <span class="merah">*</span></td>
        <td><input name="username" type="text" id="username" value="" size="25" /></td>
        <td>&nbsp;</td>
        <td> Bank <span class="merah">*</span></td>
        <td><input name="bank" type="text" id="bank" value="" size="25"  />           </td>
      </tr>
      <tr>
        <td>Password <span class="merah">*</span></td>
        <td><input name="pass1" type="password" id="pass1" value="" size="25" /></td>
        <td>&nbsp;</td>
        <td>Account Number <span class="merah">*</span></td>
        <td><input name="norek" type="text" id="norek" value="" size="25"  /></td>
      </tr>
      <tr>
        <td>Confirm Password <span class="merah">*</span></td>
        <td><input name="pass2" type="password" id="nama3" value="" size="25" /></td>
        <td>&nbsp;</td>
        <td>Account Name <span class="merah">**</span></td>
        <td><input name="an" type="text" id="an" value="" size="25"  /></td>
      </tr>
      <tr>
        <td>Full Name <span class="merah">**</span></td>
        <td><input name="nama" type="text" id="nama" value="" size="25" /></td>
        <td>&nbsp;</td>
        <td><strong>Payment Gatway </strong></td>
        <td><select name="payment" id="payment">
            <option value="Perfect Money" selected="selected">Perfect Money</option>
            <option value="Union Pay">Union Pay</option>          
          </select></td>
      <tr>
        <td>E-mail <span class="merah">*</span></td>
        <td><input name="email" type="text" id="email" value="" size="25" /></td>
        <td>&nbsp;</td>
        <td>Account Number</td>
        <td><input name="acc" type="text" id="acc" value="" size="25"  /></td>
      </tr>
      <tr>
        <td>Mobile Phone <span class="merah">*</span></td>
        <td><input name="hp" type="text" id="hp" value="" size="25" /></td>
        <td>&nbsp;</td>
		 
        <td>Account Name</td>
        <td><input name="nameacc" type="text" id="nameacc" value="" size="25"  /></td>
      </tr>
	  <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
		 
        <td>Curency</td>
       <td><select name="curency" id="curency">
            <option value="MYR" selected="selected">MYR (Malaysia)</option>
            <option value="IDR">IDR (Indonessia)</option>          
          </select></td>
	  </tr>
	  
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
        <td>Package</td>
        <td valign="bottom"><select name="paket_daftar" id="paket_daftar">
            
            <option value="White Silver">White Silver</option>
            <option value="Gold">Gold</option>
            <option value="Platinum">Platinum</option>
            <option value="Diamond">Diamond</option>
            <option value="Crown">Crown</option>
          </select> 
          <ul id="mbmcpebul_table" class="mbmcpebul_menulist css_menu" style="width: 108px; height: 20px;">
  <li><div class="arrow"><a>View Detail</a></div>
  <ul class="gradient_menu gradient157">
 
  <li class="gradient_menuitem gradient31"><a title="">White Silver : MYR 300 </a></li>
  <li class="gradient_menuitem gradient31"><a title="">Gold : MYR 750 </a></li>
  <li class="gradient_menuitem gradient31"><a title="">Platinum : MYR 1,500</a></li>
  <li class="gradient_menuitem gradient31 last_item"><a title="">Diamond : MYR 3,000</a></li>
  <li class="gradient_menuitem gradient31 last_item"><a title="">Crown : MYR 7,500</a></li>
  </ul></li>
</ul>
<!-- Menus will work without this javascript file. It is used only for extra
     effects, improved usability and compatibility with very old web browsers. -->
<script type="text/javascript" src="view_files/mbjsmbmcp.js"></script></td>
      </tr>
      <tr>
        <td>Pin BB </td>
        <td><input name="pinbb" type="text" id="pinbb" value="" size="25" /></td>
        <td>&nbsp;</td>
        <td>Your PIN <span class="merah">*</span></td>
        <td><input name="token" type="password" id="token" value="" size="6"  /></td>
      </tr>
      <tr>
        <td>Addres <span class="merah">*</span></td>
        <td><input name="alamat" type="text" id="alamat" value="" size="25" /></td>
        <td>&nbsp;</td>
        <td>Activation Ticket  <span class="merah">*</span></td>
        <td><select name="pin" id="pin">
            <?php
			  $sbl=mysql_query("select jumlahpin from card where username='$user_session' order by id");
			  $row=mysql_fetch_row($sbl);
				echo "<option value='$row[0]'>$row[0]</option>";
		?>
          </select></td>
      </tr>
      <tr>
        <td>City <span class="merah">*</span></td>
        <td><input name="kota" type="text" id="kota" value="" size="25" /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><input type="submit" name="button" id="button" value="REGISTRATION" /></td>
      </tr>
      <tr>
        <td>Country</td>
        <td><select name="negara" id="negara">
            <option value="Indonesia" selected="selected">Indonesia</option>
            <option value="Malaysia">Malaysia</option>  
			<option value="Singapura">Singapura</option>
			<option value="Thailand">Thailand</option>
			<option value="Brunai Darussalam">Brunai Darussalam</option> 
			<option value="Hongkong">Hongkong</option>
			<option value="Vietnam">Vietnam</option>
        	<option value="Filiphina">Filiphina</option>                
          </select></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        
        <td>&nbsp;</td>
        <td>&nbsp;</td>
		<td>&nbsp;</td>
        <td colspan="2">Aggrement : </td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><select name="setuju" id="setuju">
          <option value="yes" selected="selected">I Agree</option>
          <option value="no">I Dont Agree</option>
        </select></td>
		<td colspan="2">&nbsp;</td>
      <tr>
        <td><p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p><strong>Network</strong></p></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
       <td colspan="2"><div align="justify">wtc-int.org adalah sarana kegiatan global participant untuk saling membantu dengan sukarela, tulus ikhlas dan tanpa pamrih. wtc-int.org tidak menerima dana dari participant, semua perputaran dana murni terjadi antar member sendiri. Admin hanya membantu menyiapkan sistem dan aturan yang telah disepakati diawal oleh participant pemula. Dengan terdaftar di komunitas ini, anda dianggap telah membaca dan memahami dengan penuh kesadaran, sanggup berkomitment sesuai paket pilihan bantuan, beritikad baik, mentaati syarat dan kententuan yang telah berlaku di komunitas wtc-int.org serta tidak akan menyalahkan pihak manapun di kemudian hari.</div></td>
        </tr>
      <tr>
        <td>Refferal Username</td>
        <td><input name="sponsor2" type="text" id="sponsor2" value="" size="25"  />
          <strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
          
          </font></strong></td>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
		
      </tr>
	  <tr>
        <td>Upline Username</td>
        <td><input name="upline2" type="text" id="upline2" value="" size="25"  />
          <strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
          
          </font></strong></td>
        <td>&nbsp;</td>
          <td colspan="2"><span class="merah">*</span>) Wajib Di Isi</td>
      </tr>
      <tr>
        <td>Placement</td>
        <td><select name="posisi" id="posisi">
          <option value="KANAN" selected="selected">KANAN</option>
          <option value="KIRI">KIRI</option>
          </select>
          <strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
            
          </font></strong></td>
        <td>&nbsp;</td>
        <td colspan="2"><em><span class="merah">*</span><span class="merah">*</span>Atas Nama Rekening Harus Sama Dengan Data Nama</em></td>
      </tr>
    </table></td>
  </tr>
</table>
</form>
<?
} else {
echo "<meta http-equiv=\"refresh\" content=\"1; url=illegal.html\">";
}
?>