<?php 
    foreach($getusers as $getuser){
?>

<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <title>New Enquiry</title>
      <style type="text/css">
         body {
         margin: 0;
         padding: 0;
         min-width: 100% !important;
         }
         img {
         height: auto;
         }
         .content {
         width: 100%;
         max-width: 600px;
         }
         .header {
         padding: 40px 30px 20px 30px;
         }
         .innerpadding {
         padding: 30px 30px 30px 30px;
         }
         .borderbottom {
         border-bottom: 1px solid #f2eeed;
         }
         .subhead {
         font-size: 15px;
         color: #fff;
         font-family: sans-serif;
         letter-spacing: 10px;
         }
         .h1,
         .h2,
         .bodycopy {
         color: #fff;
         font-family: sans-serif;
         }
         .h1 {
         font-size: 28px;
         line-height: 38px;
         font-weight: bold;
         }
         .h2 {
         padding: 0 0 15px 0;
         font-size: 24px;
         line-height: 28px;
         font-weight: bold;
         }
         .bodycopy {
         font-size: 16px;
         line-height: 22px;
         }
         .button {
         text-align: center;
         font-size: 18px;
         font-family: sans-serif;
         font-weight: bold;
         padding: 0 30px 0 30px;
         }
         .button a {
         color: #ffffff;
         text-decoration: none;
         }
         .footer {
         padding: 20px 20px 15px 20px;
         }
         .footercopy {
         font-family: sans-serif;
         font-size: 12px;
         color: #ffffff;
         font-weight: 600;
         }
         .footercopy a {
         color: #ffffff;
         text-decoration: none;
         }
         @media only screen and (max-width: 550px),
         screen and (max-device-width: 550px) {
         body[yahoo] .hide {
         display: none !important;
         }
         body[yahoo] .buttonwrapper {
         background-color: transparent !important;
         }
         body[yahoo] .button {
         padding: 0px !important;
         }
         body[yahoo] .button a {
         background-color: #e05443;
         padding: 15px 15px 13px !important;
         }
         body[yahoo] .unsubscribe {
         display: block;
         margin-top: 20px;
         padding: 10px 50px;
         background: #2f3942;
         border-radius: 5px;
         text-decoration: none !important;
         font-weight: bold;
         }
         }
         /*@media only screen and (min-device-width: 601px) {
         .content {width: 600px !important;}
         .col425 {width: 425px!important;}
         .col380 {width: 380px!important;}
         }*/
      </style>
   </head>
   <body yahoo="" bgcolor="#f6f8f1">
      <table width="100%" bgcolor="#f6f8f1" border="0" cellpadding="0" cellspacing="0">
         <tbody>
            <tr>
               <td>
                  <table bgcolor="#ffffff" class="content" align="center" cellpadding="0" cellspacing="0" border="0">
                     <tbody>
                        <tr>
                           <td bgcolor="#a9bfeb" class="header" style="">
                              <table class="col425" align="left" border="0" cellpadding="0" cellspacing="0" style="width: 100%">
                                 <tbody>
                                    <tr>
                                       <td height="70">
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                             <tbody>
                                                <tr>
                                                   <td align="center" style="width: 100%">
                                                      <a href="http://www.prestashop.com" style="
                                                         margin: 0px;
                                                         display: inline-block;
                                                         vertical-align: middle;
                                                         " target="_blank">
                                                      <img alt="" title="" height="auto" src="<?= base_url();?>assets/images/brand/logo.png" style="
                                                         border: none;
                                                         display: block;
                                                         outline: none;
                                                         text-decoration: none;
                                                         height: auto;
                                                         max-width: 274px;
                                                         ">
                                                      </a>
                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </td>
                        </tr>
                     </tbody>
                     <tbody>
                        <tr edit-duplicate="" class="relative_index1" dup="0">
                           <td valign="top">
                              <table width="100%" edit-style="color_table" align="center" border="0" cellspacing="0" cellpadding="0" style="background-color: #ccf2ff;" effect-all="false">
                                 <tbody>
                                    <tr>
                                       <td valign="top" style="padding-left: 20px; padding-right: 20px">
                                          <table width="100%" edit-style="color_table" align="center" border="0" cellspacing="0" cellpadding="0">
                                             <!-- start space -->
                                             <tbody>
                                                <tr>
                                                   <td valign="top" height="30" style="font-size: 1px; line-height: 1px"></td>
                                                </tr>
                                                <!-- end space -->
                                                <tr>
                                                   <td valign="top" height="25" width="100" style="
                                                      font-size: 18px;
                                                      color: rgb(51, 51, 51);
                                                      font-weight: normal;
                                                      text-align: center;
                                                      font-family: 'Open Sans', Arial, Helvetica,
                                                      sans-serif;
                                                      word-break: break-word;
                                                      line-height: 120%;
                                                      cursor: text;
                                                      " panel-color="color_table" editor="content" class="relative_index2">
                                                      <span style="
                                                         text-decoration: none;
                                                         line-height: 24px;
                                                         font-size: 30px;
                                                         color: #243c8f;
                                                         font-weight: bold;
                                                         "><?php echo ucfirst($getuser->name);?> <?php echo ucfirst($getuser->surname);?></span>
                                                   </td>
                                                </tr>
                                                <!-- start space -->
                                                <tr>
                                                   <td valign="top" height="20" style="font-size: 1px; line-height: 1px" class=""></td>
                                                </tr>
                                                <tr>
                                                   <td valign="top" height="25" width="100" style="
                                                      text-align: center;
                                                      font-family: 'Open Sans', Arial, Helvetica,
                                                      sans-serif;
                                                      word-break: break-word;
                                                      line-height: 120%;
                                                      cursor: text;
                                                      " panel-color="color_table" editor="content" class="relative_index2">
                                                      <span style="
                                                         text-decoration: none;
                                                         line-height: 20px;
                                                         font-size: 14px;
                                                         color: #243c8f;
                                                         font-weight: 300;
                                                         ">Thank you for using Astemotori (car
                                                      auction portal), To reset your password,
                                                      please click on the button below to reset
                                                      your password.</span>
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td valign="top" height="24" style="font-size: 1px; line-height: 1px" class=""></td>
                                                </tr>
                                                <tr>
                                                   <td valign="top" height="25" width="100" style="
                                                      font-size: 18px;
                                                      color: rgb(51, 51, 51);
                                                      font-weight: normal;
                                                      text-align: center;
                                                      font-family: 'Open Sans', Arial, Helvetica,
                                                      sans-serif;
                                                      word-break: break-word;
                                                      line-height: 120%;
                                                      cursor: text;
                                                      " panel-color="color_table" editor="content" class="relative_index2">
                                                      <a href="<?php echo base_url();?>dealer/reset_password/<?php echo $getuser->id;?>" style="
                                                         background: #243c8f;
                                                         padding: 10px 40px;
                                                         display: inline-block;
                                                         border-radius: 4px;
                                                         color: #fff;
                                                         font-weight: 700;
                                                         text-decoration: none;
                                                         font-size: 16px;
                                                         font-family: arial;
                                                         ">Reset</a>
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td class="innerpadding" align="center">
                                                      <img alt="" height="auto" src="https://live.staticflickr.com/65535/48130715492_8aaa72e578_o.png" style="
                                                         border: none;
                                                         border-radius: 0px;
                                                         display: block;
                                                         font-size: 13px;
                                                         outline: none;
                                                         text-decoration: none;
                                                         width: 100%;
                                                         max-width: 394px;
                                                         height: auto;
                                                         " width="50%" data-group_content_banner_img_image_src="src">
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td valign="top" height="25" width="100" style="
                                                      text-align: center;
                                                      font-family: 'Open Sans', Arial, Helvetica,
                                                      sans-serif;
                                                      word-break: break-word;
                                                      line-height: 120%;
                                                      cursor: text;
                                                      " panel-color="color_table" editor="content" class="relative_index2">
                                                      <span style="
                                                         text-decoration: none;
                                                         line-height: 20px;
                                                         font-size: 14px;
                                                         color: #243c8f;
                                                         font-weight: 300;
                                                         ">If you experience any issues logging into
                                                      your account, reach out to us at</span>
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td valign="top" height="25" width="100" style="
                                                      text-align: center;
                                                      font-family: 'Open Sans', Arial, Helvetica,
                                                      sans-serif;
                                                      word-break: break-word;
                                                      line-height: 120%;
                                                      cursor: text;
                                                      " panel-color="color_table" editor="content" class="relative_index2">
                                                      <span style="
                                                         text-decoration: none;
                                                         line-height: 20px;
                                                         font-size: 14px;
                                                         color: #243c8f;
                                                         font-weight: 600;
                                                         ">Email Address:
                                                      <a href="mailto:someone@example.com" style="
                                                         text-decoration: none;
                                                         color: #243c8f;
                                                         ">support@astemori.com</a></span>
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td valign="top" height="16" style="font-size: 1px; line-height: 1px"></td>
                                                </tr>
                                                <tr>
                                                   <td valign="top" height="16" style="font-size: 1px;line-height: 1px;border-top: 1px solid #243c8f;"></td>
                                                </tr>
                                                <tr>
                                                   <td valign="top" height="25" width="100" style="
                                                      text-align: left;
                                                      font-family: 'Open Sans', Arial, Helvetica,
                                                      sans-serif;
                                                      word-break: break-word;
                                                      line-height: 120%;
                                                      cursor: text;
                                                      padding-left: 30px;
                                                      " panel-color="color_table" editor="content" class="relative_index2">
                                                      <span style="
                                                         text-decoration: none;
                                                         line-height: 20px;
                                                         font-size: 14px;
                                                         color: #243c8f;
                                                         font-weight: 300;
                                                         ">
                                                      Regards, <br>Astemotori an expert
                                                      Support Team<br>
                                                      </span>
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td valign="top" height="16" style="font-size: 1px; line-height: 1px"></td>
                                                </tr>
                                                <!-- end space -->
                                             </tbody>
                                          </table>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </td>
                        </tr>
                        <!-- end heading -->
                        <!-- start table list -->
                        <!-- end table list -->
                        <!-- start table list -->
                        <!-- end table list -->
                        <!-- start table list -->
                        <!-- end table list -->
                        <!-- start table list -->
                        <!-- end table list -->
                        <!-- start table list -->
                     </tbody>
                     <tbody>
                        <tr>
                           <td class="footer" bgcolor="#243c8f" style="
                              ">
                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                 <tbody>
                                    <tr>
                                       <td align="center" class="footercopy">
                                          <span class="hide">© 2020 - All Rights Reserved | Designed &amp;
                                          Developed By<a href="https://www.developerbazaar.com"><span style="color: red"> Developer </span><span style="color: limegreen"> Bazaar</span>
                                          <span style="color: red">
                                          Technologies
                                          </span></a></span>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </td>
            </tr>
         </tbody>
      </table>
   </body>
</html>


<?php 
    }
?>