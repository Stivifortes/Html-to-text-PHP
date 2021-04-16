<?php
echo "</tr>
</table>
<!-- End Header -->
</td>
</tr>
<tr>
  <td align='center' valign='top'>
    <!-- Body -->
    <table border='0' cellpadding='0' cellspacing='0' width='600' id='template_body'>
      <tr>
        <td valign='top' id='body_content' style='background-color: #fdfdfd;'>
          <!-- Content -->
          <table border='0' cellpadding='20' cellspacing='0' width='100%'>
            <tr>
              <td valign='top' style='padding: 48px;'>
                <div id='body_content_inner' style='color: #737373; font-family: ' Helvetica Neue', Helvetica, Roboto, Arial, sans-serif; font-size: 14px; line-height: 150%;'>

                  <p style='margin: 0 0 16px;'>Dear TEste Teste, your reservation is cancelled! </p>
                  <h4>Details of booking</h4>
                  <p style='margin: 0 0 16px;'>ID: #2494<br>Check-in: Fevereiro 28, 2021, from 11:00 am<br>Check-out: Março 1, 2021, until 10:00 am<br></p>
                  <h4>Accommodation #1</h4>
                  <p style='margin: 0 0 16px;'>Adults: 2<br>Children: 0<br>Accommodation: <a href='https://morabezadeluxe.com/accommodation/cesaria/' style='color: #eb9b50; font-weight: normal; text-decoration: underline;'>Cesária</a><br>Accommodation Rate: Cesária<br><br>Bed Type: </p>
                  <h4>Additional Services</h4>
                  <p style='margin: 0 0 16px;'>—</p>
                  <h4>Total Price:</h4>
                  <p style='margin: 0 0 16px;'><span class='mphb-price'>99<span class='mphb-currency'>€</span></span> </p>
                  <h4>Customer Information</h4>
                  <p style='margin: 0 0 16px;'>Name: TEste Teste<br>Email: stiven.fortes@devgo.org<br>Phone: 9854114<br>Note: Teste<br><br>Thank you!</p>
                </div>
              </td>
            </tr>
          </table>
          <!-- End Content -->
        </td>
      </tr>
    </table>
    <!-- End Body -->
  </td>
</tr>
<tr>
  <td align='center' valign='top'>
    <!-- Footer -->
    <table border='0' cellpadding='10' cellspacing='0' width='600' id='template_footer'>
      <tr>
        <td valign='top' style='padding: 0; -webkit-border-radius: 6px;'>
          <table border='0' cellpadding='10' cellspacing='0' width='100%'>
            <tr>
              <td colspan='2' valign='middle' id='credit' style='padding: 0 48px 48px 48px; -webkit-border-radius: 6px; border: 0; color: #f3c396; font-family: Arial; font-size: 12px; line-height: 125%; text-align: center;'>
                <p><a href='https://morabezadeluxe.com' style='color: #eb9b50; font-weight: normal; text-decoration: underline;'>Morabeza Deluxe</a></p>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
    <!-- End Footer -->
  </td>
</tr>
</table>
</td>
</tr>
</table>
</div>
</body>

</html>
";


$jscript = "function startShowingMessage(elem, url){
  setInerval(async function (){
    const response = await fetch (url);
    const text = await response.text();
    elem.textContent = text;
  }, 1000);
}";

/* IF NEW.post_title = 'Morabeza Deluxe - Booking'
THEN INSERT INTO triggeredBookings (dados) VALUE (NEW.post_content);
END IF */