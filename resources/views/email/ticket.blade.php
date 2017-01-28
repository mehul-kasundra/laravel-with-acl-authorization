<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body style="background-color: #3b485b; padding: 20px 0px">
<table width="629" align="center" cellpadding="0" cellspacing="0" border="0" bgcolor="#fdfdfd" data-bgcolor="CredentialsBGColor" style="border-bottom:1px solid #dde5f1; border-radius:6px 6px 0 0;">
    <tbody>
    <tr>
        <td width="629" align="left" style="min-width:629px;">
            <table width="260" align="left" cellpadding="0" cellspacing="0" border="0">
                <tbody>
                <tr>
                    <td>
                        <table cellpadding="0" cellspacing="0" border="0" data-border-bottom-color="LogoDivider-OnMobile" style="border-bottom-color:#67bffd; margin-left:0;">
                            <tbody>
                            <tr>
                                <td width="30"></td>
                                <td valign="middle" align="right" height="60" data-link-style="text-decoration:none; color:#67bffd;" data-link-color="AnnouncementLink" data-color="AnnouncementTXT" style="color: #425065;font-family: sans-serif;font-size: 18px;text-align: right;line-height: 150%;font-weight: bold;letter-spacing: 2px;">
                                    <a href="{{ AppHelper::getConfigValue('DOMAIN_NAME') }}" target="_blank" style="text-decoration: none;color: #425065;" data-color="AnnouncementLink">
                                        <span style="color: #00D3F9">Green</span>Guru
                                    </a>
                                </td>
                                <td width="30"></td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
            <table width="348" align="right" cellpadding="0" cellspacing="0" border="0">
                <tbody>
                <tr>
                    <td width="318" valign="middle" align="right" height="60" data-link-style="text-decoration:none; color:#67bffd;" data-link-color="AnnouncementLink" data-color="AnnouncementTXT" style="color: #425065;font-family: sans-serif;font-size: 18px;text-align: right;line-height: 150%;font-weight: bold;letter-spacing: 2px;">
                        INVOICE
                    </td>
                    <td width="30"></td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>
<table width="629" bgcolor="#fdfdfd" data-bgcolor="CredentialsBGColor" align="center" cellpadding="0" cellspacing="0" border="0" style="min-width:629px; border-bottom:1px solid #dde5f1;">
    <tbody>
    <tr>
        <td colspan="3" height="15" style="font-size:0;line-height:0;">&nbsp;</td>
    </tr>
    <tr>
        <td width="30"></td>
        <td data-link-style="text-decoration:none; color:#67bffd;" data-link-color="RegularLink" data-color="RegularTXT" style="color: #727e8d;font-family: sans-serif;font-size: 13px;font-weight: lighter;text-align: left;line-height: 23px;">
            Dear {{ $data['transaction']->first_name }} {{ $data['transaction']->middle_name }} {{ $data['transaction']->last_name }},
            <br>
            Your payment for your online order placed on <a href="{{ AppHelper::getConfigValue('DOMAIN_NAME') }}" target="_blank" style="text-decoration: none;color: #67bffd;font-weight: bold;" data-color="RegularLink">{{ AppHelper::getConfigValue('DOMAIN_NAME') }}</a>
            on {{ date('m-d-Y h:m A',strtotime($data['transaction']->created_at)) }} has been approved (order reference number: {{ $data['transaction']->transaction_code }}). Please note that "{{ AppHelper::getConfigValue('DOMAIN_NAME') }}" will appear on your card statement, instead of Greenguru. To get further payment support for your purchase, please sign-up using your email address to Greenguru at
            <a href="{{ AppHelper::getConfigValue('DOMAIN_NAME') }}" target="_blank" style="text-decoration: none;color: #67bffd;font-weight: bold;" data-color="RegularLink">{{ AppHelper::getConfigValue('DOMAIN_NAME') }}</a>
        </td>
        <td width="30"></td>
    </tr>
    <tr>
        <td colspan="3" height="15" style="font-size:0;line-height:0;">&nbsp;</td>
    </tr>
    </tbody>
</table>
<table width="629" bgcolor="#fdfdfd" data-bgcolor="CredentialsBGColor" align="center" cellpadding="0" cellspacing="0" border="0" style="min-width:629px; border-bottom:1px solid #dde5f1;">
    <tbody>
    <tr>
        <td colspan="3" height="15" style="font-size:0;line-height:0;">&nbsp;</td>
    </tr>
    <tr>
        <td width="30"></td>
        <td valign="middle" data-link-style="text-decoration:none; color:#67bffd;" data-link-color="RegularLink" data-color="RegularTXT" style="color: #425065;font-family: sans-serif;font-size: 14px;font-weight: bold;text-align: left;line-height: 30px;">
            <img src="{{ asset('img/default_image/email_img/bill-info.png') }}" alt="IMG" border="0" hspace="0" vspace="0" style="height: 16px; margin-bottom: -3px; margin-right: 5px">
            Billing Information
        </td>
        <td width="30"></td>
    </tr>
    <tr>
        <td width="30"></td>
        <td data-link-style="text-decoration:none; color:#67bffd;" data-link-color="RegularLink" data-color="RegularTXT" style="color: #727e8d;font-family: sans-serif;font-size: 13px;font-weight: lighter;text-align: left;line-height: 23px;">
            <span style="font-weight: bold;margin-right: 7px">Address 1 :</span> {{ $data['billing_info']['address_1'] }}
        </td>
        <td width="30"></td>
    </tr>
    <tr>
        <td width="30"></td>
        <td data-link-style="text-decoration:none; color:#67bffd;" data-link-color="RegularLink" data-color="RegularTXT" style="color: #727e8d;font-family: sans-serif;font-size: 13px;font-weight: lighter;text-align: left;line-height: 23px;">
            <span style="font-weight: bold;margin-right: 7px">Address 2 :</span> {{ $data['billing_info']['address_2'] }}
        </td>
        <td width="30"></td>
    </tr>
    <tr>
        <td width="30"></td>
        <td data-link-style="text-decoration:none; color:#67bffd;" data-link-color="RegularLink" data-color="RegularTXT" style="color: #727e8d;font-family: sans-serif;font-size: 13px;font-weight: lighter;text-align: left;line-height: 23px;">
            <span style="font-weight: bold;margin-right: 7px">City :</span> {{ $data['billing_info']['city'] }}
        </td>
        <td width="30"></td>
    </tr>
    <tr>
        <td width="30"></td>
        <td data-link-style="text-decoration:none; color:#67bffd;" data-link-color="RegularLink" data-color="RegularTXT" style="color: #727e8d;font-family: sans-serif;font-size: 13px;font-weight: lighter;text-align: left;line-height: 23px;">
            <span style="font-weight: bold;margin-right: 7px">State / Province :</span> {{ $data['billing_info']['state'] }}
        </td>
        <td width="30"></td>
    </tr>
    <tr>
        <td width="30"></td>
        <td data-link-style="text-decoration:none; color:#67bffd;" data-link-color="RegularLink" data-color="RegularTXT" style="color: #727e8d;font-family: sans-serif;font-size: 13px;font-weight: lighter;text-align: left;line-height: 23px;">
            <span style="font-weight: bold;margin-right: 7px">Zip Code :</span> {{ $data['billing_info']['zip_code'] }}
        </td>
        <td width="30"></td>
    </tr>
    <tr>
        <td width="30"></td>
        <td data-link-style="text-decoration:none; color:#67bffd;" data-link-color="RegularLink" data-color="RegularTXT" style="color: #727e8d;font-family: sans-serif;font-size: 13px;font-weight: lighter;text-align: left;line-height: 23px;">
            <span style="font-weight: bold;margin-right: 7px">Phone :</span> {{ $data['billing_info']['phone'] }}
        </td>
        <td width="30"></td>
    </tr>
    <tr>
        <td colspan="3" height="15" style="font-size:0;line-height:0;">&nbsp;</td>
    </tr>
    </tbody>
</table>
<table width="629" align="center" cellpadding="0" cellspacing="0" border="0" style="min-width:628px;">
    <tbody>
    <tr>
        <td style="min-width:628px;">
            <table width="629" bgcolor="#fdfdfd" data-bgcolor="CredentialsBGColor" align="left" cellpadding="0" cellspacing="0" border="0">
                <tbody>
                <tr>
                    <td>
                        <table align="center" cellpadding="0" cellspacing="0" bgcolor="#fdfdfd" data-bgcolor="CredentialsBGColor" border="0">
                            <tbody>
                            <tr>
                                <th width="314" style="margin:0; padding:0;vertical-align:top;border-bottom:1px solid #dde5f1;">
                                    <table width="314" align="center" cellpadding="0" cellspacing="0" border="0">
                                        <tbody>
                                        <tr>
                                            <td colspan="3" height="15" style="font-size:0;line-height:0;">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td width="30"></td>
                                            <td valign="top" align="center">
                                                <table width="252" align="left" cellpadding="0" cellspacing="0" border="0">
                                                    <tbody>
                                                    <tr>
                                                        <td rowspan="2" width="25" align="center" valign="top" style="line-height:1px;"><img src="{{ asset('img/default_image/email_img/invoice-icon-20x20.png') }}" style="display:block;" alt="IMG" border="0" hspace="0" vspace="0"></td>
                                                        <td rowspan="2" width="14" style="font-size:0;line-height:0;">&nbsp;</td>
                                                        <td width="211" valign="top" align="left" data-link-style="text-decoration:none; color:#67bffd;" data-link-color="SectionCaptionLink" data-color="SectionCaptionTXT" style="color: #425065;font-family: sans-serif;font-size: 14px;text-align: left;line-height: 19px;font-weight: lighter;">
                                                            Invoice Sent To
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="179" valign="top" align="left" data-link-style="text-decoration:none; color:#67bffd;" data-link-color="SectionInfoLink" data-color="SectionInfoTXT" style="color: #425065;font-family: sans-serif;font-size: 14px;font-weight: bold;text-align: left;line-height: 23px;">
                                                            {{ $data['transaction']->first_name }} {{ $data['transaction']->middle_name }} {{ $data['transaction']->last_name }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" height="10" style="font-size:0;line-height:0;">&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" data-link-style="text-decoration:none; color:#67bffd;" data-link-color="RegularLink" data-color="RegularTXT" style="color: #727e8d;font-family: sans-serif;font-size: 13px;font-weight: lighter;text-align: left;line-height: 23px;">{{ $data['billing_info']['address_1'] }}
                                                            <br><a href="#" target="_blank" style="text-decoration: none;color: #67bffd;font-weight: bold;" data-color="RegularLink">{{ $data['transaction']->email }}</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" height="15" style="font-size:0;line-height:0;">&nbsp;</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td width="30"></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </th>
                                <th width="314" valign="top" data-border-left-color="borderColor" style="border-left:1px solid #dde5f1;border-bottom:1px solid #dde5f1;margin:0; padding:0;vertical-align:top;">
                                    <table width="314" align="center" cellpadding="0" cellspacing="0" border="0">
                                        <tbody>
                                        <tr>
                                            <td colspan="3" height="15" style="font-size:0;line-height:0;">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td width="30"></td>
                                            <td valign="top" align="center">
                                                <table width="252" align="left" cellpadding="0" cellspacing="0" border="0">
                                                    <tbody>
                                                    <tr>
                                                        <td rowspan="2" width="25" align="center" valign="top" style="line-height:1px;"><img src="{{ asset('img/default_image/email_img/home-icon-20x20.png') }}" style="display:block;" alt="IMG" border="0" hspace="0" vspace="0"></td>
                                                        <td rowspan="2" width="14" style="font-size:0;line-height:0;">&nbsp;</td>
                                                        <td width="211" valign="top" align="left" data-link-style="text-decoration:none; color:#67bffd;" data-link-color="SectionCaptionLink" data-color="SectionCaptionTXT" style="color: #425065;font-family: sans-serif;font-size: 14px;text-align: left;line-height: 19px;font-weight: lighter;">
                                                            Invoice Sent From
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="179" valign="top" align="left" data-link-style="text-decoration:none; color:#67bffd;" data-link-color="SectionInfoLink" data-color="SectionInfoTXT" style="color: #425065;font-family: sans-serif;font-size: 14px;font-weight: bold;text-align: left;line-height: 23px;">
                                                            Green Guru</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" height="10" style="font-size:0;line-height:0;">&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" data-link-style="text-decoration:none; color:#67bffd;" data-link-color="RegularLink" data-color="RegularTXT" style="color: #727e8d;font-family: sans-serif;font-size: 13px;font-weight: lighter;text-align: left;line-height: 23px;">P.O. Box 25199, New York
                                                            <br><a href="mailto:{{ AppHelper::getConfigValue('EMAIL_ADDRESS') }}" target="_blank" style="text-decoration: none;color: #67bffd;font-weight: bold;" data-color="RegularLink">salessupport@greenguru.sethfinley.com</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" height="15" style="font-size:0;line-height:0;">&nbsp;</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td width="30"></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </th>
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
<table width="629" align="center" cellpadding="0" cellspacing="0" border="0" style="min-width:629px;">
    <tbody>
    <tr>
        <td style="min-width:629px;">
            <table width="629" bgcolor="#fdfdfd" data-bgcolor="CredentialsBGColor" align="left" cellpadding="0" cellspacing="0" border="0">
                <tbody>
                <tr>
                    <td align="left">
                        <table align="center" bgcolor="#fdfdfd" data-bgcolor="CredentialsBGColor" cellpadding="0" cellspacing="0" border="0">
                            <tbody>
                            <tr>
                                <th width="209" style="margin:0; padding:0;vertical-align:top;border-bottom:1px solid #dde5f1;">
                                    <table width="209" align="center" cellpadding="0" cellspacing="0" border="0">
                                        <tbody>
                                        <tr>
                                            <td colspan="3" height="15" style="font-size:0;line-height:0;">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td width="30"></td>
                                            <td valign="top" align="center">
                                                <table width="145" align="left" cellpadding="0" cellspacing="0" border="0">
                                                    <tbody>
                                                    <tr>
                                                        <td rowspan="2" width="25" align="center" valign="top" style="line-height:1px;"><img src="{{ asset('img/default_image/email_img/number-icon-20x20.png') }}" style="display:block;" alt="IMG" border="0" hspace="0" vspace="0"></td>
                                                        <td rowspan="2" width="14" style="font-size:0;line-height:0;">&nbsp;</td>
                                                        <td valign="top" align="left" data-link-style="text-decoration:none; color:#67bffd;" data-link-color="SectionCaptionLink" data-color="SectionCaptionTXT" style="color: #425065;font-family: sans-serif;font-size: 14px;text-align: left;line-height: 19px;font-weight: lighter;">
                                                            Invoice No</td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top" align="left" data-link-style="text-decoration:none; color:#67bffd;" data-link-color="SectionInfoLink" data-color="SectionInfoTXT" style="color: #425065;font-family: sans-serif;font-size: 14px;font-weight: bold;text-align: left;line-height: 23px;">
                                                            #{{ $data['transaction']->transaction_code }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" height="15" style="font-size:0;line-height:0;">&nbsp;</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td width="30"></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </th>
                                <th width="209" data-border-left-color="borderColor" style="border-bottom:1px solid #dde5f1;border-left:1px solid #dde5f1;margin:0; padding:0;vertical-align:top;">
                                    <table width="209" align="center" cellpadding="0" cellspacing="0" border="0">
                                        <tbody>
                                        <tr>
                                            <td colspan="3" height="15" style="font-size:0;line-height:0;">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td width="30"></td>
                                            <td valign="top" align="center">
                                                <table width="145" align="left" cellpadding="0" cellspacing="0" border="0">
                                                    <tbody>
                                                    <tr>
                                                        <td rowspan="2" width="25" align="center" valign="top" style="line-height:1px;"><img src="{{ asset('img/default_image/email_img/date-icon-20x20.png') }}" style="display:block;" alt="IMG" border="0" hspace="0" vspace="0"></td>
                                                        <td rowspan="2" width="14" style="font-size:0;line-height:0;">&nbsp;</td>
                                                        <td valign="top" align="left" data-link-style="text-decoration:none; color:#67bffd;" data-link-color="SectionCaptionLink" data-color="SectionCaptionTXT" style="color: #425065;font-family: sans-serif;font-size: 14px;text-align: left;line-height: 19px;font-weight: lighter;">
                                                            Invoice Date</td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top" align="left" data-link-style="text-decoration:none; color:#67bffd;" data-link-color="SectionInfoLink" data-color="SectionInfoTXT" style="color: #425065;font-family: sans-serif;font-size: 14px;font-weight: bold;text-align: left;line-height: 23px;">
                                                            {{ date('M d,Y', strtotime($data['transaction']->created_at)) }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" height="15" style="font-size:0;line-height:0;">&nbsp;</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td width="30"></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </th>
                                <th width="209" data-border-left-color="borderColor" style="border-bottom:1px solid #dde5f1;border-left:1px solid #dde5f1;margin:0; padding:0;vertical-align:top;">
                                    <table width="209" align="center" cellpadding="0" cellspacing="0" border="0">
                                        <tbody>
                                        <tr>
                                            <td colspan="3" height="15" style="font-size:0;line-height:0;">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td width="30"></td>
                                            <td valign="top" align="center">
                                                <table width="145" align="left" cellpadding="0" cellspacing="0" border="0">
                                                    <tbody>
                                                    <tr>
                                                        <td rowspan="2" width="25" align="center" valign="top" style="line-height:1px;"><img src="{{ asset('img/default_image/email_img/dollar-icon-20x20.png') }}" style="display:block;" alt="IMG" border="0" hspace="0" vspace="0"></td>
                                                        <td rowspan="2" width="14" style="font-size:0;line-height:0;">&nbsp;</td>
                                                        <td valign="top" align="left" data-link-style="text-decoration:none; color:#67bffd;" data-link-color="SectionCaptionLink" data-color="SectionCaptionTXT" style="color: #425065;font-family: sans-serif;font-size: 14px;text-align: left;line-height: 19px;font-weight: lighter;">
                                                            Invoice Total</td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top" align="left" data-link-style="text-decoration:none; color:#67bffd;" data-link-color="SectionInfoLink" data-color="SectionInfoTXT" style="color: #425065;font-family: sans-serif;font-size: 14px;font-weight: bold;text-align: left;line-height: 23px;">
                                                            {{ AppHelper::priceFormat($data['transaction']->total_price) }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" height="15" style="font-size:0;line-height:0;">&nbsp;</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td width="30"></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </th>
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
<table width="629" align="center" cellpadding="0" cellspacing="0" border="0" style="min-width:629px;">
    <tbody>
    <tr>
        <td style="min-width:629px;">
            <table width="629" align="left" cellpadding="0" cellspacing="0" bgcolor="#67bffd" data-bgcolor="ThemeColorBG" border="0">
                <tbody>
                <tr>
                    <td align="left">
                        <table align="center" cellpadding="0" cellspacing="0" border="0">
                            <tbody>
                            <tr>
                                <th width="209" style="margin:0; padding:0;vertical-align:top;border-bottom-color:#dde5f1;">
                                    <table width="209" align="center" cellpadding="0" cellspacing="0" border="0">
                                        <tbody>
                                        <tr>
                                            <td colspan="3" height="10" style="font-size:0;line-height:0;">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td width="30"></td>
                                            <td data-link-style="text-decoration:none; color:#ffffff;" data-link-color="InvoiceCaptionsLink" data-color="InvoiceCaptionsTXT" style="color: #ffffff;font-family: sans-serif;font-size: 15px;text-align: center;line-height: 27px;font-weight: bold;">
                                                Description</td>
                                            <td width="30"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" height="10" style="font-size:0;line-height:0;">&nbsp;</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </th>
                                <th width="139" data-border-left-color="borderColor" style="border-left:1px solid #dde5f1;border-bottom-color:#dde5f1;margin:0; padding:0;vertical-align:top;">
                                    <table width="139" align="center" cellpadding="0" cellspacing="0" border="0">
                                        <tbody>
                                        <tr>
                                            <td colspan="3" height="10" style="font-size:0;line-height:0;">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td width="30"></td>
                                            <td data-link-style="text-decoration:none; color:#ffffff;" data-link-color="InvoiceCaptionsLink" data-color="InvoiceCaptionsTXT" style="color: #ffffff;font-family: sans-serif;font-size: 15px;text-align: center;line-height: 27px;font-weight: bold;">
                                                Price</td>
                                            <td width="30"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" height="10" style="font-size:0;line-height:0;">&nbsp;</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </th>
                                <th width="139" data-border-left-color="borderColor" style="border-left:1px solid #dde5f1;border-bottom-color:#dde5f1;margin:0; padding:0;vertical-align:top;">
                                    <table width="139" align="center" cellpadding="0" cellspacing="0" border="0">
                                        <tbody>
                                        <tr>
                                            <td colspan="3" height="10" style="font-size:0;line-height:0;">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td width="30"></td>
                                            <td data-link-style="text-decoration:none; color:#ffffff;" data-link-color="InvoiceCaptionsLink" data-color="InvoiceCaptionsTXT" style="color: #ffffff;font-family: sans-serif;font-size: 15px;text-align: center;line-height: 27px;font-weight: bold;">
                                                Quantity</td>
                                            <td width="30"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" height="10" style="font-size:0;line-height:0;">&nbsp;</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </th>
                                <th width="139" data-border-left-color="borderColor" style="border-left:1px solid #dde5f1;border-bottom-color:#dde5f1;margin:0; padding:0;vertical-align:top;">
                                    <table width="139" align="center" cellpadding="0" cellspacing="0" border="0">
                                        <tbody>
                                        <tr>
                                            <td colspan="3" height="10" style="font-size:0;line-height:0;">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td width="30"></td>
                                            <td data-link-style="text-decoration:none; color:#ffffff;" data-link-color="InvoiceCaptionsLink" data-color="InvoiceCaptionsTXT" style="color: #ffffff;font-family: sans-serif;font-size: 15px;text-align: center;line-height: 27px;font-weight: bold;">
                                                Total</td>
                                            <td width="30"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" height="10" style="font-size:0;line-height:0;">&nbsp;</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </th>
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
<table width="629" align="center" cellpadding="0" cellspacing="0" border="0" style="min-width:629px;">
    <tbody>
    <tr>
        <td style="min-width:629px;">
            <table width="629" align="left" cellpadding="0" cellspacing="0" bgcolor="#eff3f7" data-bgcolor="CalculationsBGColor" border="0">
                <tbody>
                <tr>
                    <td align="left">
                        <table align="center" cellpadding="0" cellspacing="0" border="0">
                            <tbody>
                            <tr>
                                <th width="209" style="margin:0; padding:0;border-bottom:1px solid #dde5f1;">
                                    <table width="209" align="center" cellpadding="0" cellspacing="0" border="0">
                                        <tbody>
                                        <tr>
                                            <td colspan="3" height="10" style="font-size:0;line-height:0;">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td width="30"></td>
                                            <td data-link-style="text-decoration:none; color:#67bffd;" data-link-color="RegularLink" data-color="RegularTXT" style="color: #425065;font-family: sans-serif;font-size: 14px;text-align: left;line-height: 19px;font-weight: lighter;">
                                                {{ $data['event']->name }}
                                            </td>
                                            <td width="30"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" height="10" style="font-size:0;line-height:0;">&nbsp;</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </th>
                                <th width="139" data-border-left-color="borderColor" style="border-left:1px solid #dde5f1;border-bottom:1px solid #dde5f1;margin:0; padding:0;">
                                    <table width="139" align="center" cellpadding="0" cellspacing="0" border="0">
                                        <tbody>
                                        <tr>
                                            <td colspan="3" height="10" style="font-size:0;line-height:0;">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td width="30"></td>
                                            <td data-link-style="text-decoration:none; color:#67bffd;" data-link-color="RegularLink" data-color="RegularTXT" style="color: #425065;font-family: sans-serif;font-size: 14px;font-weight: lighter;text-align: center;line-height: 23px;">
                                                {{ AppHelper::priceFormat($data['transaction']->ticket_price) }}
                                            </td>
                                            <td width="30"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" height="10" style="font-size:0;line-height:0;">&nbsp;</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </th>
                                <th width="139" data-border-left-color="borderColor" style="border-left:1px solid #dde5f1;border-bottom:1px solid #dde5f1;margin:0; padding:0;">
                                    <table width="139" align="center" cellpadding="0" cellspacing="0" border="0">
                                        <tbody>
                                        <tr>
                                            <td colspan="3" height="10" style="font-size:0;line-height:0;">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td width="30"></td>
                                            <td data-link-style="text-decoration:none; color:#67bffd;" data-link-color="RegularLink" data-color="RegularTXT" style="color: #425065;font-family: sans-serif;font-size: 14px;font-weight: lighter;text-align: center;line-height: 23px;">
                                                {{ $data['transaction']->ticket_qty }}
                                            </td>
                                            <td width="30"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" height="10" style="font-size:0;line-height:0;">&nbsp;</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </th>
                                <th width="139" data-border-left-color="borderColor" style="border-left:1px solid #dde5f1;border-bottom:1px solid #dde5f1;margin:0; padding:0;">
                                    <table width="139" align="center" cellpadding="0" cellspacing="0" border="0">
                                        <tbody>
                                        <tr>
                                            <td colspan="3" height="10" style="font-size:0;line-height:0;">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td width="30"></td>
                                            <td data-link-style="text-decoration:none; color:#67bffd;" data-link-color="RegularLink" data-color="RegularTXT" style="color: #425065;font-family: sans-serif;font-size: 14px;font-weight: lighter;text-align: center;line-height: 23px;">
                                                {{ AppHelper::priceFormat($data['transaction']->ticket_price * $data['transaction']->ticket_qty) }}
                                            </td>
                                            <td width="30"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" height="10" style="font-size:0;line-height:0;">&nbsp;</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </th>
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
<table width="629" align="center" cellpadding="0" cellspacing="0" border="0" style="min-width:629px;">
    <tbody>
    <tr>
        <td style="min-width:629px;">
            <table width="629" align="left" cellpadding="0" cellspacing="0" bgcolor="#eff3f7" data-bgcolor="CalculationsBGColor" border="0">
                <tbody>
                <tr>
                    <td align="left">
                        <table align="center" cellpadding="0" cellspacing="0" border="0">
                            <tbody>
                            <!-- Sub Total -->
                            <tr>
                                <th width="349" height="100" rowspan="4" bgcolor="#eff3f7" data-bgcolor="CalculationsBGColor" style="margin:0; padding:0;vertical-align:top;border-bottom:1px solid #dde5f1;">
                                    <table width="349" align="center" cellpadding="0" cellspacing="0" border="0">
                                        <tbody>

                                        </tbody>
                                    </table>
                                </th>
                                <th width="139" valign="top" bgcolor="#eff3f7" data-bgcolor="CalculationsBGColor" data-border-left-color="borderColor" style="border-left:1px solid #dde5f1;margin:0; padding:0;vertical-align:top;border-bottom:1px solid #dde5f1;">
                                    <table width="139" align="center" cellpadding="0" cellspacing="0" border="0">
                                        <tbody>
                                        <tr>
                                            <td colspan="3" height="10" style="font-size:0;line-height:0;">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td width="30"></td>
                                            <td data-link-style="text-decoration:none; color:#67bffd;" data-link-color="RegularLink" data-color="RegularTXT" style="color: #425065;font-family: sans-serif;font-size: 14px;font-weight: lighter;text-align: center;line-height: 23px;">
                                                Sub Total</td>
                                            <td width="30"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" height="10" style="font-size:0;line-height:0;">&nbsp;</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </th>
                                <th width="139" valign="top" bgcolor="#eff3f7" data-bgcolor="CalculationsBGColor" data-border-left-color="borderColor" style="border-left:1px solid #dde5f1;margin:0; padding:0;vertical-align:top;border-bottom:1px solid #dde5f1;">
                                    <table width="139" align="center" cellpadding="0" cellspacing="0" border="0">
                                        <tbody>
                                        <tr>
                                            <td colspan="3" height="10" style="font-size:0;line-height:0;">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td width="30"></td>
                                            <td data-link-style="text-decoration:none; color:#67bffd;" data-link-color="RegularLink" data-color="RegularTXT" style="color: #425065;font-family: sans-serif;font-size: 14px;font-weight: lighter;text-align: center;line-height: 23px;">
                                                {{ AppHelper::priceFormat($data['transaction']->ticket_price * $data['transaction']->ticket_qty) }}
                                            </td>
                                            <td width="30"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" height="10" style="font-size:0;line-height:0;">&nbsp;</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </th>
                            </tr>
                            <!-- Service Fees -->
                            @foreach($data['service_fee'] as $fee)
                                @php
                                    if (!isset($serFeeTotal))
                                        $serFeeTotal = 0;
                                    $eachServiceFeetotal = AppHelper::calculateServiceFee($data['transaction']->ticket_price, $data['transaction']->ticket_qty, $fee['amount_per_ticket'], $fee['amount_per_order'], $fee['percent_per_ticket'], $fee['percent_per_order'] );
                                    $serFeeTotal += $eachServiceFeetotal;
                                @endphp
                                <tr>
                                    <th width="139" valign="top" bgcolor="#eff3f7" data-bgcolor="CalculationsBGColor" data-border-left-color="borderColor" style="border-left:1px solid #dde5f1;margin:0; padding:0;vertical-align:top;border-bottom:1px solid #dde5f1;">
                                        <table width="139" align="center" cellpadding="0" cellspacing="0" border="0">
                                            <tbody>
                                            <tr>
                                                <td colspan="3" height="10" style="font-size:0;line-height:0;">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td width="30"></td>
                                                <td data-link-style="text-decoration:none; color:#67bffd;" data-link-color="RegularLink" data-color="RegularTXT" style="color: #425065;font-family: sans-serif;font-size: 14px;font-weight: lighter;text-align: center;line-height: 23px;">
                                                    {{ $fee['name'] }}
                                                </td>
                                                <td width="30"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" height="10" style="font-size:0;line-height:0;">&nbsp;</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </th>
                                    <th width="139" valign="top" bgcolor="#eff3f7" data-bgcolor="CalculationsBGColor" data-border-left-color="borderColor" style="border-left:1px solid #dde5f1;margin:0; padding:0;vertical-align:top;border-bottom:1px solid #dde5f1;">
                                        <table width="139" align="center" cellpadding="0" cellspacing="0" border="0">
                                            <tbody>
                                            <tr>
                                                <td colspan="3" height="10" style="font-size:0;line-height:0;">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td width="30"></td>
                                                <td data-link-style="text-decoration:none; color:#67bffd;" data-link-color="RegularLink" data-color="RegularTXT" style="color: #425065;font-family: sans-serif;font-size: 14px;font-weight: lighter;text-align: center;line-height: 23px;">
                                                    {{ AppHelper::priceFormat($eachServiceFeetotal) }}
                                                </td>
                                                <td width="30"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" height="10" style="font-size:0;line-height:0;">&nbsp;</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </th>
                                </tr>
                            @endforeach
                            <!-- end of service fee -->
                            <tr>
                                <th width="139" bgcolor="#67bffd" data-bgcolor="ThemeColorBG" valign="top" data-border-left-color="borderColor" style="border-left:1px solid #dde5f1;margin:0; padding:0;vertical-align:top;border-bottom:1px solid #dde5f1;">
                                    <table width="139" align="center" cellpadding="0" cellspacing="0" border="0">
                                        <tbody>
                                        <tr>
                                            <td colspan="3" height="10" style="font-size:0;line-height:0;">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td width="30"></td>
                                            <td bgcolor="#67bffd" data-bgcolor="ThemeColorBG" data-link-style="text-decoration:none; color:#ffffff;" data-link-color="InvoiceCaptionsLink" data-color="InvoiceCaptionsTXT" style="color: #ffffff;font-family: sans-serif;font-size: 15px;text-align: center;line-height: 27px;font-weight: bold;">
                                                Total</td>
                                            <td width="30"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" height="10" style="font-size:0;line-height:0;">&nbsp;</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </th>
                                <th width="139" bgcolor="#67bffd" data-bgcolor="ThemeColorBG" valign="top" data-border-left-color="borderColor" style="border-left:1px solid #dde5f1;margin:0; padding:0;vertical-align:top;border-bottom:1px solid #dde5f1;">
                                    <table width="139" align="center" cellpadding="0" cellspacing="0" border="0">
                                        <tbody>
                                        <tr>
                                            <td colspan="3" height="10" style="font-size:0;line-height:0;">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td width="30"></td>
                                            <td bgcolor="#67bffd" data-bgcolor="ThemeColorBG" data-link-style="text-decoration:none; color:#ffffff;" data-link-color="InvoiceCaptionsLink" data-color="InvoiceCaptionsTXT" style="color: #ffffff;font-family: sans-serif;font-size: 15px;text-align: center;line-height: 27px;font-weight: bold;">
                                                {{ AppHelper::priceFormat($data['transaction']->total_price) }}
                                            </td>
                                            <td width="30"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" height="10" style="font-size:0;line-height:0;">&nbsp;</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </th>
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
<table width="629" align="center" cellpadding="0" cellspacing="0" border="0" style="min-width:629px;">
    <tbody>
    <tr>
        <td style="min-width:629px;">
            <table width="629" bgcolor="#fdfdfd" data-bgcolor="CredentialsBGColor" align="left" cellpadding="0" cellspacing="0" border="0" style="border-radius:0 0 6px 6px;">
                <tbody>
                <tr>
                    <td>
                        <table width="627" cellpadding="0" cellspacing="0" border="0">
                            <tbody>
                            <tr>
                                <td colspan="3" height="15" style="font-size:0;line-height:0;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td width="30"></td>
                                <td data-link-style="text-decoration:none; color:#67bffd;" data-link-color="RegularLink" data-color="RegularTXT" style="color: #425065;font-family: sans-serif;font-size: 14px;font-weight: lighter;text-align: center;line-height: 23px;">Payments should be made within 30 days with one of the options below, or you can enter any note here if necessary, you have much space:
                                    <br>
                                    <br><b>Payment Methods:</b> Cheque, PayPal, WesternUnion, BACS
                                    <br><b>We accept:</b> MasterCard, Visa, AmericanExpress
                                    <br><b>PayPal Email Address:</b>
                                    <a href="mailto:{{ AppHelper::getConfigValue('EMAIL_ADDRESS') }}" target="_blank" style="text-decoration: none;color: #67bffd;font-weight: bold;" data-color="RegularLink">
                                        {{ AppHelper::getConfigValue('EMAIL_ADDRESS') }}
                                    </a>
                                    <br>
                                    <br>
                                    <a href="#" target="_blank" style="text-decoration: none;color: #67bffd;font-weight: bold;" data-color="RegularLink">
                                        www.greenguru.sethfinley.com
                                    </a>
                                    <br>
                                    <a href="mailto:{{ AppHelper::getConfigValue('EMAIL_ADDRESS') }}" target="_blank" style="text-decoration: none;color: #67bffd;font-weight: bold;" data-color="RegularLink">
                                        sales@greenguru.sethfinley.com
                                    </a>
                                </td>
                                <td width="30"></td>
                            </tr>
                            <tr>
                                <td colspan="3" height="30" style="font-size:0;line-height:0;">&nbsp;</td>
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
