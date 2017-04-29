<?

	if($user_status > 0 ) {

?>

<style type="text/css">

body,td,th {

	font-family: Verdana, Geneva, sans-serif;

	font-size: 12px;

}

.ssss {

	color: #F00;

}

</style>



<table width="800" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>

    <td><table width="800" border="0" cellspacing="2" cellpadding="2">

      <tr>

        <td width="300" valign="middle" background="images/assignment.png"><table width="234" border="0" align="center" cellpadding="3" cellspacing="3">

            <tr>

              <td width="223" height="28"><div align="center"><strong>Join date </strong></div></td>

            </tr>

			<tr>

              <td><h3 align="center"><strong>

                				

				<?= date("d-m-Y", strtotime($db->dataku("tgl_daftar", $user_session))); ?>

				

				



              </strong></h3></td>

            </tr>

			<tr>

              <td width="223" height="28"><div align="center"><strong>Contract end  </strong></div></td>

            </tr>

            <tr>

              <td><h3 align="center"><strong>

			  <?= date("d-m-Y", strtotime($db->dataku("tgl_reinves", $user_session))); ?>

			               

              </strong></h3></td>

            </tr>

            

            <tr>

              <td></td>            </tr>

        </table></td>

        <td>&nbsp;</td>

        <td width="300" align="center"><table width="300" border="0" cellspacing="0" cellpadding="0">

          <tr>

            <td width="300" height="200" valign="middle" background="images/assignment.png"><table width="234" border="0" align="center" cellpadding="3" cellspacing="3">

              <tr>

                <td width="223" height="28"><div align="center">My Package </div></td>

              </tr>

              <tr>

                <td><h3 align="center"><strong>

                  <?= $db->dataku("paket_daftar", $user_session); ?>

                </strong></h3></td>

              </tr>

              <tr>

                <td><div align="center"><strong class="ssss">

                  <?= $db->dataku("jlh_hari", $user_session); ?> 

                 Kali

                </strong></div></td>

              </tr>

              <tr>

                <td><div align="center"></div>                  </td>

              </tr>

            </table></td>

            </tr>

        </table></td>

        </tr>

    </table></td>

  </tr>

</table>

<?

} else {

echo "<meta http-equiv=\"refresh\" content=\"1; url=illegal.html\">";

}

?>