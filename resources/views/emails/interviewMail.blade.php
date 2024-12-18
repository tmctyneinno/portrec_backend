<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Portrec Resourcing Nigeria</title>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    </head>

    <body>
    <table class="email-wraper" style="background-color:#f5f6fa;font-size:14px;line-height:22px;font-weight:400; font-family:Poppins, sans-serif;color:#8094ae;width:100%">
    <tbody>
        <tr>
            <td class="py-5" style="padding-top: 44px !important;padding-bottom: 44px !important;">
                <table class="email-header" style="width:100%;max-width:620px;margin:0 auto">
                    <tbody>
                        <tr>
                            <td class="text-center pb-4" style="text-align: center !important;padding-bottom: 24px !important;">
                                <img class="email-logo"  src="https://portrec.ng/images/site_logo.png" alt="logo" style="height: 40px;max-width: 100%;vertical-align:middle;background: #6f6767">
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="email-body" style="width: 96%;max-width: 620px;margin: 0 auto;background-color: #fff;">
                    <tbody>
                        <tr>
                            <td class="px-3 px-sm-5 pt-3 pt-sm-5 pb-1" style="padding-bottom: 16px !important;padding-top: 44px !important;padding-right: 44px !important;padding-left: 44px !important;">
                                <h2 class="email-heading" style="font-size: 18px;color: #303e67;font-weight: 600;margin: 0;line-height: 1.4;">Hi  {{ucfirst($data['user']['name'])}},</h2>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-3 px-sm-1 pb-2" style="padding-bottom: 12px !important;padding-right: 44px !important;padding-left: 44px !important;">
                                <p style="margin: 0 !important;">{!! $data['message'] !!}</p>
                                <p style="margin-top: 0;"> Date: {{date('D d M, Y', strtotime($data['interview_date']))}}</p>
                                <p style="margin-top: 0;"> Time: {{date('H:ia', strtotime($data['interview_date']))}}</p>
                                <p style="margin-top: 0;">Duration: {{$data['duration']}}</p>
                                {{-- <p style="margin-top: 0;margin-bottom: 16px;">Interview Location: {{$data['location']}}</p> --}}
                                <br>
                                    <a href="{{url('candidate/accept/view/?jobid='.base64_encode($data['job_application_id']))}}"
                                        target="_blank" class="email-btn"
                                    style="background-color: #303e67; border-radius: 4px;color: #fff !important;display: inline-block;font-size: 13px;font-weight: 600;line-height: 44px;text-align: center;text-decoration: none;text-transform: uppercase;padding: 0 30px;">Click Here Accept Interview</a>
                                </td>
                        </tr>
                        <tr>
                            <td class="px-2 px-sm-2 pt-4 pb-2 pb-sm-2" style="padding-bottom: 10px !important;padding-right: 44px !important;padding-left: 44px !important;padding-top: 10px !important;">
                                <p style="margin-top: 0;margin-bottom: 0;">If you have any queries, please contact our support team at:</p>
                                <a href="mailto:support@portrec.ng" class="link-block" style="color:#303e67;word-break:break-all;display:block">support@portrec.ng</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-3 px-sm-5 pt-4 pb-3 pb-sm-5" style="padding-bottom: 44px !important;padding-right: 44px !important;padding-left: 44px !important;">
                                <p style="margin-top: 0;margin-bottom: 0.16px;">Kind Regards,</p>
                                <p class="email-note" style="margin: 0;line-height: 22px;">The Portrec Team</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="email-footer" style="width:100%;max-width:480px;margin:0 auto">
                    <tbody>
                        <tr>
                            <td class="text-center pt-4" style="text-align: center !important;padding-top: 24px !important;">
                                <p class="fs-12px pt-4" style="margin-top: 0;font-size: 12px; padding:0;">
                                    You are receiving this email beacause someone requested for reference from you
                                    <a style="color:#854fff;word-break:break-all">https://Portrec.ng</a>
                                    . Please ignore this email, if you're not the intended recipient.
                                </p>
                                <p class="email-copyright-text" style="font-size: 12px;margin: 0;padding: 0;">Copyright © {{date('Y')}} Portrec.ng All rights reserved.</p>
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
