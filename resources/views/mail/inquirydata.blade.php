<!--<!doctype html>-->
<!--<html lang="en">-->

<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<!--    <title>Document</title>-->
<!--    <link rel="preconnect" href="https://fonts.googleapis.com">-->
<!--    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>-->
<!--    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet">-->
<!--</head>-->
<!--<body>-->
<!--    <P>Hii, Thankyou!-->
<!--            For Your Inquiary Our team will contact you soon!</P>-->
<!--</body>-->

<!--</html>-->

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet">
    <style>
        * {
            padding: 0%;
            margin: 0%;
        }
        
        body {
            box-sizing: border-box;
            width: 100%;
            height: auto;
        }
        
        .CToWUd.a6T,
        .a6T {
            cursor: unset !important;
        }
        .main-content, .regards-content
        {
          
          padding-left: 11%;
          padding-right: 11%;
          font-family: Poppins;
          color:#444444;

        }
        .main-content
        {
          margin-top: 20px;
          margin-bottom: 20px;
          margin-left: 14%;
          margin-right: 14%;
          width:73%
        }
        .regards-content
        {
          margin-bottom:40px;
        }
        @media only screen and (max-device-width:768px) {
            .col-650 {
                max-width: 650px;
                width: 100%;
                padding: 0 15px;
                min-width: unset;
            }
            .col-600 {
                width: 100%;
                max-width: 600px;
                min-width: unset;
            }
            .col1,
            .col3_one {
                width: 100%;
                max-width: unset;
                min-width: unset;
            }
            .images_style {
                max-width: auto !important;
                min-width: unset !important;
                width: 100% !important;
            }
            .logo.images_style {
                width: 100% !important;
            }
            .col3_one>tbody>tr>td {
                padding: 0 15px !important;
            }
            .text_bottm td {
                padding: 0 15px !important;
            }
        }
    </style>
</head>

<body>
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tbody>
            <tr>
                <td align="center">
                    <table align="center" class="col-600" width="600" border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <td align="center">
                                    <table class="col-600" width="600" align="center" border="0" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td height="50"></td>
                                            </tr>
                                            <tr>
                                                <td>

                                                    <table class="col1" width="600" border="0" align="center" cellpadding="0" cellspacing="0">

                                                        <tbody>
                                                            <tr style="font-size: 16px;">
                                                                <td align="center">
                                                                    <img style="display:block; line-height:0px; font-size:0px; border:0px;cursor: auto !important;" class="images_style logo" src="{{ asset('public/images/header-01.jpg') }}" alt="img" width="600" >
                                                                    
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                              <td align="left">
                                                                <table class="main-content" style="border-collapse: collapse; border: 1px solid;">
                                                                  <tr>
                                                                    <td style="border: 1px solid #DDDDDD;color:#444444; padding: 11px;">
                                                                      Name:
                                                                    </td>
                                                                    <td style="border: 1px solid #DDDDDD; padding: 11px;">
                                                                      {{$inquiryquote['fullname']}}
                                                                    </td >
                                                                  </tr>
                                                                  <tr>
                                                                    <td style="border: 1px solid #DDDDDD;color:#444444; padding: 11px;">
                                                                      Requirements : 
                                                                    </td>
                                                                    <td style="border: 1px solid #DDDDDD; padding: 11px;">
                                                                      {{$inquiryquote['requirementse']}}
                                                                    </td >
                                                                  </tr>
                                                                  <tr>
                                                                    <td style="border: 1px solid #DDDDDD; padding: 11px;">
                                                                      E-mail:
                                                                    </td>
                                                                    <td style="border: 1px solid #DDDDDD; padding: 11px;">
                                                                      {{$inquiryquote['email']}}
                                                                    </td>
                                                                    <tr>
                                                                    <td style="border: 1px solid #DDDDDD;color:#444444; padding: 11px;">
                                                                      Phone:
                                                                    </td>
                                                                    <td style="border: 1px solid #DDDDDD; padding: 11px;">
                                                                      {{$inquiryquote['phone']}}
                                                                    </td>
                                                                    </tr>
                                                                    <tr>
                                                                    <td style="border: 1px solid #DDDDDD;color:#444444; padding: 11px;">
                                                                      Country:
                                                                    </td>
                                                                    <td style="border: 1px solid #DDDDDD; padding: 11px;">
                                                                      {{$inquiryquote['country']}}
                                                                    </td>
                                                                    </tr>
                                                                  </tr>
                                                                
                                                                </table>
                                                              </td>
                                                            </tr>
                                                            <tr>
                                                              <td align="center">
                                                                <img style="display:block; line-height:0px; font-size:0px; border:0px;cursor: auto !important;" class="images_style logo" src="{{ asset('public/images/footer-01.jpg') }}" alt="img" width="600"  alt="Workplace"
                                                                        usemap="#workmap">
                                                                        <map name="workmap">
                                                                          <area target="_blank" alt="sales@contendresolar.com " title="sales@contendresolar.com " href="tel:919426177529 " coords="99,14,207,31" shape="rect">
                                                                          <area target="_blank" alt="sales@contendresolar.com " title="sales@contendresolar.com " href="tel:918469000194 " coords="213,15,326,31" shape="rect">
                                                                          <area target="_blank" alt="sales@contendresolar.com " title="sales@contendresolar.com " href="https://allwinrotoplast.com" coords="355,18,523,31" shape="rect">
                                                                          </map>
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
                </td>
            </tr>

        </tbody>
    </table>
</body>

</html>