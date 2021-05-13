<!DOCTYPE html>
<html lang="en">
<head>
<title>Salted | A Responsive Email Template</title>
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
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
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


{{$publicidads[0]->imagen}}
{{$establecimiento}}
    <table cellpadding="0" cellspacing="0" border="0" width="90%" align="left" class="responsive-table">
        <tr>
            <td style="padding: 20px 0 40px 0;">
                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                    <tr>
                        <td align="center" bgcolor="#ffffff" valign="middle"><img 
                            src="storage/publicidad/{{$publicidads[0]->imagen}}" 
                             width="80%" height="80%" style="display: block; color: #666666; font-family: Helvetica, arial, sans-serif; font-size: 13px; 
                            " alt="Media queries" border="0" class="img-max"></td>
                    </tr>
                    <tr>
                        <td align="center" style="padding: 15px 0 0 0; font-family: Arial, sans-serif; color: #333333; font-size: 20px;" bgcolor="#ffffff">{{$establecimiento->nombre_comercial}}</td>
                    </tr>
                    <tr>
                        <td align="center" bgcolor="#ffffff" valign="middle"><img 
                            src="storage/establecimiento/{{$establecimiento->id}}/{{$establecimiento->imagen}}" 
                             width="80%" height="80%" style="display: block; color: #666666; font-family: Helvetica, arial, sans-serif; font-size: 13px; 
                            " alt="Media queries" border="0" class="img-max">
                        </td>
                        <td align="center" style="padding: 5px 0 0 0; font-family: Arial, sans-serif; color: #666666; font-size: 14px; line-height: 20px;" bgcolor="#ffffff"><span class="appleBody">{{$establecimiento->direccion}}</span></td>
                        <td align="center" style="padding: 5px 0 0 0; font-family: Arial, sans-serif; color: #666666; font-size: 14px; line-height: 20px;" bgcolor="#ffffff"><span class="appleBody">{{$establecimiento->telefono}}</span></td>
                        <td align="center" style="padding: 5px 0 0 0; font-family: Arial, sans-serif; color: #666666; font-size: 14px; line-height: 20px;" bgcolor="#ffffff"><span class="appleBody">{{$establecimiento->email}}</span></td>
                        <td align="center" style="padding: 15px 0 0 0; font-family: Arial, sans-serif; color: #333333; font-size: 20px;" bgcolor="#ffffff">{{$establecimiento->web}}</td>
                    </tr>
                   {{--  <tr>
                        <td align="center" style="padding: 15px 0 0 0; font-family: Arial, sans-serif; color: #333333; font-size: 20px;" bgcolor="#ffffff">Media Queries</td>
                    </tr>
                    <tr>
                        <td align="center" style="padding: 5px 0 0 0; font-family: Arial, sans-serif; color: #666666; font-size: 14px; line-height: 20px;" bgcolor="#ffffff"><span class="appleBody">They don&rsquo;t work everwhere, but when they do&hellip;</span></td>
                    </tr> --}}
                </table>
            </td>
        </tr>
    </table>








<!-- ONE COLUMN W/ BOTTOM IMAGE SECTION -->
<table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;">
    <tr>
        <td bgcolor="#f8f8f8" align="center" style="padding: 70px 15px 0 15px;" class="section-padding-bottom-image">
            <table border="0" cellpadding="0" cellspacing="0" width="500" class="responsive-table">
                <tr>
                    <td>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td>
                                    <!-- COPY -->
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td align="center" style="font-size: 25px; font-family: Helvetica, Arial, sans-serif; color: #333333;" class="padding-copy">
                                                <img src="storage/publicidad/1620592505.jpg" alt="VILE" id="imagen">

{{--                                                 <img src="{{'data:image/png;base64,' . base64_encode(file_get_contents(@storage/publicidad/1620592468.jpg))}}" alt="image" >
 --}}
    
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;" class="padding-copy">With an increasingly mobile audience, can you really afford to keep sending emails designed for desktop?</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <!-- BULLETPROOF BUTTON -->
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="mobile-button-container">
                                        <tr>
                                            <td align="center" style="padding: 25px 0 0 0;" class="padding-copy">
                                                <table border="0" cellspacing="0" cellpadding="0" class="responsive-table">
                                                    <tr>
                                                        <td align="center"><a href="http://alistapart.com/article/can-email-be-responsive/" target="_blank" style="font-size: 16px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #ffffff; text-decoration: none; background-color: #48CFAD; border-top: 15px solid #48CFAD; border-bottom: 15px solid #48CFAD; border-left: 25px solid #48CFAD; border-right: 25px solid #48CFAD; border-radius: 3px; -webkit-border-radius: 3px; -moz-border-radius: 3px; display: inline-block;" class="mobile-button">Hell No &rarr;</a></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <!--  BOTTOM IMAGE -->
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td style="padding: 50px 0 0 0;" align="center">
                                                
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

<!-- TWO COLUMN SECTION -->
<table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;">
    <tr>
        <td bgcolor="#ffffff" align="center" style="padding: 70px 15px 70px 15px;" class="section-padding">
            <table border="0" cellpadding="0" cellspacing="0" width="500" class="responsive-table">
                <tr>
                    <td>
                        <!-- TITLE SECTION AND COPY -->
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td align="center" style="font-size: 25px; font-family: Helvetica, Arial, sans-serif; color: #333333;" class="padding-copy">How does it work?</td>
                            </tr>
                            <tr>
                                <td align="center" style="padding: 20px 0 20px 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;" class="padding-copy">Responsive email works on the same principles as RWD:</td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <!-- TWO COLUMNS -->
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td valign="top" style="padding: 0;" class="mobile-wrapper">
                                    <!-- LEFT COLUMN -->
                                    <table cellpadding="0" cellspacing="0" border="0" width="47%" align="left" class="responsive-table">
                                        <tr>
                                            <td style="padding: 20px 0 40px 0;">
                                                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                    <tr>
                                                        <td align="center" bgcolor="#ffffff" valign="middle"><a href="http://alistapart.com/article/can-email-be-responsive/" target="_blank"><img 
                                                            src="storage/publicidad/1620592505.jpg" 
                                                            width="240" height="130" style="display: block; color: #666666; font-family: Helvetica, arial, sans-serif; font-size: 13px; width: 240px; height: 130px;" alt="Fluid images" border="0" class="img-max"></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" style="padding: 15px 0 0 0; font-family: Arial, sans-serif; color: #333333; font-size: 20px;" bgcolor="#ffffff">Fluid Images</td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" style="padding: 5px 0 0 0; font-family: Arial, sans-serif; color: #666666; font-size: 14px; line-height: 20px;" bgcolor="#ffffff"><span class="appleBody"><span style="font-family:Lucida Console, monospace;">max-width:100%</span> is your friend, just like on the web.</span></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- RIGHT COLUMN -->
                                    <table cellpadding="0" cellspacing="0" border="0" width="47%" align="right" class="responsive-table">
                                        <tr>
                                            <td style="padding: 20px 0 40px 0;">
                                                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                    <tr>
                                                        <td align="center" bgcolor="#ffffff" valign="middle"><a href="http://alistapart.com/article/can-email-be-responsive/" target="_blank"><img 
                                                            src="storage/publicidad/1620592505.jpg" 
                                                            width="240" height="130" style="display: block; color: #666666; font-family: Helvetica, arial, sans-serif; font-size: 13px; width: 240px; height: 130px;" alt="Fluid structures" border="0" class="img-max"></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" style="padding: 15px 0 0 0; font-family: Arial, sans-serif; color: #333333; font-size: 20px;" bgcolor="#ffffff">HOLA UNO</td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" style="padding: 5px 0 0 0; font-family: Arial, sans-serif; color: #666666; font-size: 14px; line-height: 20px;" bgcolor="#ffffff"><span class="appleBody">HOLA <em>ems</em>, DOS.</span></td>
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
                <tr>
                    <td>
                        <!-- TWO COLUMNS -->
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td valign="top" style="padding: 0;" class="mobile-wrapper">
                                    <!-- LEFT COLUMN -->
                                    <table cellpadding="0" cellspacing="0" border="0" width="47%" align="left" class="responsive-table">
                                        <tr>
                                            <td style="padding: 20px 0 40px 0;">
                                                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                    <tr>
                                                        <td align="center" bgcolor="#ffffff" valign="middle"><a href="http://alistapart.com/article/can-email-be-responsive/" target="_blank"><img 
                                                            src="storage/publicidad/1620592505.jpg" 
                                                             width="240" height="130" style="display: block; color: #666666; font-family: Helvetica, arial, sans-serif; font-size: 13px; width: 240px; height: 130px;" alt="Media queries" border="0" class="img-max"></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" style="padding: 15px 0 0 0; font-family: Arial, sans-serif; color: #333333; font-size: 20px;" bgcolor="#ffffff">Media Queries</td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" style="padding: 5px 0 0 0; font-family: Arial, sans-serif; color: #666666; font-size: 14px; line-height: 20px;" bgcolor="#ffffff"><span class="appleBody">They don&rsquo;t work everwhere, but when they do&hellip;</span></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- RIGHT COLUMN -->
                                    <table cellpadding="0" cellspacing="0" border="0" width="47%" align="right" class="responsive-table">
                                        <tr>
                                            <td style="padding: 20px 0 40px 0;">
                                                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                    <tr>
                                                        <td align="center" bgcolor="#ffffff" valign="middle"><a href="http://alistapart.com/article/can-email-be-responsive/" target="_blank"><img 
                                                            src="storage/publicidad/1620592505.jpg" 
                                                            width="240" height="130" style="display: block; color: #666666; font-family: Helvetica, arial, sans-serif; font-size: 13px; width: 240px; height: 130px;" alt="Bulletproof buttons" border="0" class="img-max"></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" style="padding: 15px 0 0 0; font-family: Arial, sans-serif; color: #333333; font-size: 20px;" bgcolor="#ffffff">Bulletproof Buttons</td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" style="padding: 5px 0 0 0; font-family: Arial, sans-serif; color: #666666; font-size: 14px; line-height: 20px;" bgcolor="#ffffff"><span class="appleBody">Don&rsquo;t use images for buttons. There&rsquo;s a better way.</span></td>
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