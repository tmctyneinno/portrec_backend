<!DOCTYPE html>
<html>

<body>
    <table cellspacing="0" cellpadding="10" align="center"
        style="width:100%; max-width:850px; box-sizing:border-box; border-collapse:collapse; font-weight:400; font-family:Roboto, sans-serif; margin:0;">
        <!-- head -->
        <tr>
            <td style="background-color: #EDEDED; padding: 30px;">
                <table align="center" cellspacing="0" cellpadding="0" style="width: 100%;">
                    <tr bgcolor="#3D66FE">
                        <td align="center"
                            style="padding: 25px 10px 25px 10px; background-color: #3D66FE; font-weight: 600; font-size: 1.5em; color: #FFFFFF; text-align: center; text-transform: uppercase;">
                            Welcome To {{ config('app.name') }}</td>
                    </tr>
                    <tr bgcolor="#FFFFFF">
                        <td height="5px" style="line-height: 5px;"></td>
                    </tr>
                    <!-- content -->
                    <tr bgcolor="#FFFFFF">
                        <td style="padding:20px 30px 20px 30px;">
                            <table align="center" style="width: 100%; max-width: 800px;">
                                <tr>
                                    <td style="font-weight: 500; font-size: 20px; color: #383838;">Dear
                                        {{ $data['name'] }} </td>
                                </tr>
                                <tr>
                                    <td height="7px" style="line-height: 7px;"></td>
                                </tr>
                                <tr>
                                    <td style=" font-weight: 400; font-size: 15px;">Congratulations and welcome.</td>
                                </tr>
                                <tr>
                                    <td style=" font-weight: 400; font-size: 15px;">Thank you for registering for
                                        Oysterchecks Background Vetting service.</td>
                                <tr>
                                    <td style=" font-weight: 400; font-size: 15px;">We have created your account with
                                        details you below.</td>
                                </tr>
                                <tr>
                                    <td height="5px" style="line-height: 5px;"></td>
                                </tr>
                                <tr>
                                    <td style=" font-weight: 400; font-size: 15px;">Unique Email:
                                        <span>{{ $data['email'] }}</span></td>
                                </tr>
                                <tr>
                                    <td style="font-weight: 400; font-size: 15px;">Password:
                                        <span>{{ $password }}</span></td>
                                </tr>
                                <tr>
                                    <td style="font-weight: 400; font-size: 15px;">Login Here: <span> <a
                                                href="{{ route('login') }}"> Login Here </a></span></td>
                                </tr>
                                <tr>
                                    <td height="10px" style="line-height:10px;"></td>
                                </tr>
                                <tr>
                                    <td style="font-weight:400; font-size: 15px;">Thank you for using our Services!</td>
                                </tr>
                                <tr>
                                    <td style="font-weight:400; font-size: 15px;">If you have any queries, please
                                        contact our Customer Support Team on or email <a
                                            href="mailto:clientsupport@oysterchecks.com">clientsupport@oysterchecks.com</a>
                                        and quote your customer reference/account number +23417001770, +441977310180.
                                    </td>
                                </tr>
                                <tr>
                                    <td height="20px" style="line-height:20px;"></td>
                                </tr>
                                <tr>
                                    <td style="font-weight: 500; font-size: 16px;">Kind regards,</td>
                                </tr>
                                <tr>
                                    <td style="font-weight: 500; font-size: 16px;">{{ config('app.name') }}</td>
                                </tr>
                                <tr>
                                    <td height="20px" style="line-height:20px;"></td>
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
