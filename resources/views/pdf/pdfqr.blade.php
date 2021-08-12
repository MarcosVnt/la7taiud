<!DOCTYPE html>
<html lang="en">
<head>
<title>{{$establecimiento->nombre_comercial}}</title>
<!--
    SALTED | A RESPONSIVE EMAIL TEMPLATE
    =====================================
    Based on code used and tested by Litmus (@litmusapp)
    Originally developed by Kevin Mandeville (@KEVINgotbounce)
    Cleaned up by Jason Rodriguez (@rodriguezcommaj)
    Presented by A List Apart (@alistapart)
    Email is surprisingly hard. While this has been thoroughly tested, your mileage may vary.
    It's highly recommended that you test using a service like Litmus and your own devices.
    Enjoy!
 -->
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <meta http-equiv="X-UA-Compatible" content="IE=edge" />
<style type="text/css">
    /* CLIENT-SPECIFIC STYLES */
    #outlook a{padding:0;} /* Force Outlook to provide a "view in browser" message */
    .ReadMsgBody{width:100%;} .ExternalClass{width:100%;} /* Force Hotmail to display emails at full width */
    .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height: 100%;} /* Force Hotmail to display normal line spacing */
    body, table, td, a{-webkit-text-size-adjust:100%; -ms-text-size-adjust:100%;} /* Prevent WebKit and Windows mobile changing default text sizes */
    table, td{mso-table-lspace:0pt; mso-table-rspace:0pt;} /* Remove spacing between tables in Outlook 2007 and up */
    img{-ms-interpolation-mode:bicubic;} /* Allow smoother rendering of resized image in Internet Explorer */

    /* RESET STYLES */
    body{margin:0; padding:0;}
    img{border:0; height:auto; line-height:100%; outline:none; text-decoration:none;}
    table{border-collapse:collapse !important;}
    body{height:100% !important; margin:0; padding:0; width:100% !important;}

    /* iOS BLUE LINKS */
    .appleBody a {color:#68440a; text-decoration: none;}
    .appleFooter a {color:#999999; text-decoration: none;}

    /* MOBILE STYLES */
    @media screen and (max-width: 525px) {

        /* ALLOWS FOR FLUID TABLES */
        table[class="wrapper"]{
          width:100% !important;
        }

        /* ADJUSTS LAYOUT OF LOGO IMAGE */
        td[class="logo"]{
          text-align: left;
          padding: 20px 0 20px 0 !important;
        }

        td[class="logo"] img{
          margin:0 auto!important;
        }

        /* USE THESE CLASSES TO HIDE CONTENT ON MOBILE */
        td[class="mobile-hide"]{
          display:none;}

        img[class="mobile-hide"]{
          display: none !important;
        }

        img[class="img-max"]{
          max-width: 100% !important;
          height:auto !important;
        }

        /* FULL-WIDTH TABLES */
        table[class="responsive-table"]{
          width:100%!important;
        }

        /* UTILITY CLASSES FOR ADJUSTING PADDING ON MOBILE */
        td[class="padding"]{
          padding: 10px 5% 15px 5% !important;
        }

        td[class="padding-copy"]{
          padding: 10px 5% 10px 5% !important;
          text-align: center;
        }

        td[class="padding-meta"]{
          padding: 30px 5% 0px 5% !important;
          text-align: center;
        }

        td[class="no-pad"]{
          padding: 0 0 20px 0 !important;
        }

        td[class="no-padding"]{
          padding: 0 !important;
        }

        td[class="section-padding"]{
          padding: 50px 15px 50px 15px !important;
        }

        td[class="section-padding-bottom-image"]{
          padding: 50px 15px 0 15px !important;
        }

        /* ADJUST BUTTONS ON MOBILE */
        td[class="mobile-wrapper"]{
            padding: 10px 5% 15px 5% !important;
        }

        table[class="mobile-button-container"]{
            margin:0 auto;
            width:100% !important;
        }

        a[class="mobile-button"]{
            width:80% !important;
            padding: 15px !important;
            border: 0 !important;
            font-size: 16px !important;
        }

    }
</style>
</head>
<body style="margin: 0; padding: 0;">

<!-- Some preview text. -->
<div style="display: none; max-height: 0; overflow: hidden;">
		
</div>
<!-- Get rid of unwanted preview text. -->


<!-- ONE COLUMN SECTION -->
<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td bgcolor="#ffffff" align="center" style="padding: 1px 1px 1px 1px;" class="section-padding">
            <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="500" class="responsive-table">
                <tr>
                    <td>
                        <table role="presentation" width="100%" border="0" cellspacing="0" cellpadding="0">


                            <tr>
                                <td style="padding: 1px 15px 5dpx 15px;" align="center" bgcolor="#ffffff" valign="middle"><img 
                                    src="storage/publicidad/{{$publicidads[0]->imagen}}" 
                                     width="80%" height="80%" style="display: block; color: #666666; font-family: Helvetica, arial, sans-serif; font-size: 13px; 
                                    " alt="publicidad" border="0" class="img-max"></td>
                            </tr>
                                    
                            <tr>
                                <td>
                                    <!-- HERO IMAGE -->
                                    <table role="presentation" width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tbody>
                                             <tr>
                                                  <td class="padding-copy">
                                                      <table role="presentation" width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        
                                                          <tr>
                                                              <td align="center">
                                                                <img 
                                                                   {{--  src="storage/establecimiento/{{$establecimiento->id}}/{{$establecimiento->imagen}}"  --}}
                                                                   src={{$img}}
                                                                     width="100%" height="100%" border="0" alt="vile" style="display: block; padding: 0; color: #666666; text-decoration: none; font-family: Helvetica, arial, sans-serif; font-size: 16px; width: 500px; height: 200px;" class="img-max">
                                                              </td>
                                                            </tr>
                                                        </table>
                                                  </td>
                                              </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                         
                            <tr>
                                <td style="padding: 1px 15px 5dpx 15px;" align="center" bgcolor="#ffffff" valign="middle"><img 
                                    src="storage/publicidad/{{$publicidads[1]->imagen}}" 
                                     width="80%" height="80%" style="display: block; color: #666666; font-family: Helvetica, arial, sans-serif; font-size: 13px; 
                                    " alt="publicidad" border="0" class="img-max"></td>
                            </tr>
                                    

                        
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
  
   
   
</table>




<!-- TWO COLUMN SECTION -->
<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td bgcolor="#ffffff" align="center" style="padding: 7px 15px 7px 15px;" class="section-padding">
            <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="500" class="responsive-table">
                <tr>
                    <td>
                        <!-- TITLE SECTION AND COPY -->
                        <table role="presentation" width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td align="center" style="font-size: 25px; font-family: Helvetica, Arial, sans-serif; color: #333333;" class="padding-copy">{{$establecimiento->nombre_comercial}}</td>
                            </tr>
                            <tr>
                                <td align="center" style="padding: 20px 0 20px 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;" class="padding-copy">Acceda a nuestra Carta Digital escaneando el Código Qr :</td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <!-- TWO COLUMNS -->
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td valign="top" style="padding: 0;" class="mobile-wrapper">
                                    <!-- LEFT COLUMN -->
                                    <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="47%" align="left" class="responsive-table">
                                        <tr>
                                            <td style="padding: 20px 0 40px 0;">
                                                <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%">
                                                   
                                                    <tr>
                                                        <td align="center" style="padding: 15px 0 0 0; font-family: Arial, sans-serif; color: #333333; font-size: 20px;" bgcolor="#ffffff">{{$establecimiento->nombre_fiscal}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" style="padding: 5px 0 0 0; font-family: Arial, sans-serif; color: #666666; font-size: 14px; line-height: 20px;" bgcolor="#ffffff"><span class="appleBody">
                                                            <span style="font-family:Lucida Console, monospace;">{{$establecimiento->direccion}}</span> </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" style="padding: 5px 0 0 0; font-family: Arial, sans-serif; color: #666666; font-size: 14px; line-height: 20px;" bgcolor="#ffffff"><span class="appleBody">
                                                            <span style="font-family:Lucida Console, monospace;">{{$establecimiento->email}}</span> -- {{$establecimiento->telefono}} / {{$establecimiento->movil}}</span></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- RIGHT COLUMN -->
                                    <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="47%" align="right" class="responsive-table">
                                        <tr>
                                            <td style="padding: 20px 0 40px 0;">
                                                <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%">
                                                  
                                                    <tr>
                                                        <td align="center" bgcolor="#ffffff" valign="middle">

                                                            <img src="data:image/png;base64, {!! $qrcode !!}">

                                                           </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
             
            </table>
        </td>
    </tr>
</table>




</body>
</html>