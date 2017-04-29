<style type="text/css">
body,td,th {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 12px;
}
.merah {
	color: #F00;
}
</style>
<form action="?e=join&amp;actions=submit" method="post" name="daftar" id="daftar">
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
        <td style="position: relative;"><span style="position: absolute; top: 0;">Withdrawal <span class="merah">*</span></span></td>
        <td>

<select name="wd" id="wd">
          <option value="Manual" selected="selected">Manual</option>
          <option value="Auto" selected="selected">Auto</option>
        </select>
<p><small>Auto withdraw every 10 days until the contract ends</small></p></td>
      <tr>
        <td>E-mail <span class="merah">*</span></td>
        <td><input name="email" type="text" id="email" value="" size="25" /></td>
		
		
        <td>&nbsp;</td>
        
        
		 
        <td>Curency</td>
        <td><select name="curency" id="curency">
		 <option value="IDR">USD (United States)</option> 
          <option value="IDR">SGD (Singapore)</option>
          <option value="IDR">MYR (Malaysia)</option>
          <option value="IDR">CNY (China)</option>
          <option value="IDR">THB (Thailand)</option>
          <option value="IDR">HKD (Hongkong)</option>
          <option value="IDR">PHP (Philppine)</option>
          <option value="IDR">IDR (Indonesia)</option>
        </select></td>
      </tr>    
	  
        <td>Mobile Phone <span class="merah">*</span></td>
          <td valign="bottom"><input name="hp" type="text" id="hp" value="" size="25" />
        <tr>
        <td>Package Join <span class="merah">*</span></td>
        <td><select name="paket_daftar" id="paket_daftar">
          <option value="Silver">Silver</option>
          <option value="Gold">Gold</option>
          <option value="Platinum">Platinum</option>
          <option value="Titanium">Titanium</option>
        </select></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>Activation Ticket <span class="merah">*</span></td>
        <td><select name="pin" id="pin">
          <?php
			  $sbl=mysql_query("select jumlahpin from card where username='$user_session' order by id");
			  $row=mysql_fetch_row($sbl);
				echo "<option value='$row[0]'>$row[0]</option>";
		?>
        </select></td>
      </tr>
      <tr>
        <td>Addres <span class="merah">*</span></td>
        <td><input name="alamat" type="text" id="alamat" value="" size="25" /></td>
        <td>&nbsp;</td>
         <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>City <span class="merah">*</span></td>
        <td><input name="kota" type="text" id="kota" value="" size="25" /></td>
        <td>&nbsp;</td>
        <td>Your Token <span class="merah">*</span></td>
        <td><input name="token" type="password" id="token" value="" size="10"></td>
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
       <td colspan="2"><div align="justify">
         <input type="submit" name="button" id="button" value="REGISTRATION" />
       </div></td>
        </tr>
      <tr>
        <td>Refferal Username</td>
        <td><input name="sponsor2" type="text" id="sponsor2" value="<?= $user_session; ?>" size="25" disabled="disabled" />
          <strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
          <input name="sponsor" type="hidden" id="sponsor" value="<?= $user_session; ?>" />
          </font></strong></td>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
      </tr>
	  <tr>
        <td>Upline Username</td>
        <td><input name="upline2" type="text" id="upline2" value="<?= $up; ?>" size="25" disabled="disabled" />
          <strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
          <input name="upline" type="hidden" id="upline" value="<?= $up; ?>" />
          </font></strong></td>
        <td>&nbsp;</td>
          <td colspan="2"><span class="merah">*</span>) Required</td>
      </tr>
      <tr>
        <td>Placement</td>
        <td><input name="posisi" type="text" id="posisi" value="<?= $pos; ?>" size="25" disabled="disabled" />
            <strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
            <input name="posisi" type="hidden" id="posisi" value="<?= $pos; ?>" />
          </font></strong></td>
        <td>&nbsp;</td>
        <td colspan="2"><em><span class="merah">*</span><span class="merah">*</span>Bank account name must be the same as your full name</em></td>
      </tr>
    </table></td>
  </tr>
</table>
</form>