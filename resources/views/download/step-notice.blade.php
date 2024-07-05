<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body style="font-family: 'Arial';">
    <div style="text-align: center; width: 100%; font-weight: bold;">Republic of the Philippines</div>
    <div style="text-align: center; width: 100%; font-weight: bold;">MUNICIPALITY OF ABUYOG</div>
    <div style="text-align: center; width: 100%; font-weight: bold;">Province of Leyte</div>
    <div style="text-align: center; width: 100%; font-weight: bold; margin-top: 30px;"><u>NOTICE OF STEP INCREMENT</u></div>

    <div style="text-align: right; margin-top: 50px; font-weight: bold;">
        {{ date('F d, Y') }}<br>
        Date
    </div>

    <div style="text-align: left; margin-top: 20px; font-weight: bold;">
        {{ ucwords($employee->employeeInfo->firstname . ' ' . $employee->employeeInfo->middlename . ' ' . $employee->employeeInfo->lastname) }}<br>
        Abuyog, Leyte
    </div>

    <div style="font-weight: bold; margin-top: 30px;">
        Sir/Madam:
    </div>

    <p style="text-indent: 40px; font-weight: bold; text-align: justify; line-height: 24px;">
        Pursuant to joint Civil Service Commission (CSC) and the Department of Budget and Management (DBM) Circular No. 1 s. 1990 implementing Section 13 (c) RA No. 6758, your salary as {{ $data['position'] }} is hereby adjusted effective {{ date('F d, Y', strtotime('+1 day', strtotime(now()))) }} as shown below:
    </p>

    <div style="font-weight: bold; padding-left: 40px;">
        Basic Monthly Salary:
    </div>

    <div style="font-weight: bold; padding-left: 40px; margin-top: 20px; padding-right: 40px; height: 30px;">
        <div style="width: 40%; float: left;">As of <u>{{ date('F d, Y') }}</u></div>
        <div style="width: 40%; float: right; text-align: right; font-family: 'DejaVu Sans Mono', monospace;"><u>&#8369;{{ $employee->current_salary * 30 }}</u></div>
    </div>

    <div style="font-weight: bold; padding-left: 40px; margin-top: 0px;">
        Salary Adjusted:
    </div>

    <div style="font-weight: bold; padding-left: 40px; margin-top: 10px; padding-right: 40px; height: 30px;">
        <div style="width: 70%; float: left; padding-left: 30px;">
            a. Merit

            <span style="margin-left: 105px;">(__<u>{{ $data['merit'] }}</u>__Step/s)</span>
        </div>
        <div style="width: 20%; float: right; text-align: right; font-family: 'DejaVu Sans Mono', monospace;"><u>{!! $data['merit'] ? '&#8369;' . $data['salaryAdjustment'] : '' !!}</u></div>
    </div>

    <div style="font-weight: bold; padding-left: 40px; padding-right: 40px; height: 30px;">
        <div style="width: 70%; float: left; padding-left: 30px;">
            b. Length of Service

            <span style="margin-left: 10px;">(__<u>{{ $data['lengthOfService'] }}</u>__Year/s)</span>
        </div>
        <div style="width: 20%; float: right; text-align: right; font-family: 'DejaVu Sans Mono', monospace;"><u>{!! $data['lengthOfService'] ? '&#8369;' . $data['lengthOfServiceValue'] : '' !!}</u></div>
    </div>

    <div style="font-weight: bold; height: 30px; margin-top: 40px;">
        <div style="width: 70%; float: left;">
            Adjusted Salary effective <u>{{ date('F d, Y', strtotime('+1 day', strtotime(now()))) }}</u>
        </div>

        <div style="width: 20%; float: right; text-align: right; font-family: 'DejaVu Sans Mono', monospace;"><u>&#8369;{{ $data['meritValue'] + $data['lengthOfServiceValue'] + $employee->current_salary * 30 }}</u></div>
    </div>

    <p style="text-indent: 40px; font-weight: bold; text-align: justify; line-height: 24px;">
        The step increment/s is/are subject to review and post-audit and subject to re-adjustment and refund if found not in order.
    </p>

    <div style="text-align: right;">Very truly yours,</div>
    <div style="text-align: right; margin-top: 20px;">
        <strong>
            @php
                $currentMayor = \DB::table('users')->where('users.role', 3)->join('heads_personal_infos', 'users.id', '=', 'heads_personal_infos.user_id')->first();
                echo ucwords($currentMayor->firstname . ' ' . $currentMayor->middlename . ' ' . $currentMayor->lastname);
            @endphp
            <br>
            Municipal Mayor
        </strong>
    </div>

    <div style="text-align: left; margin-top: 10px;">Reviewed by,</div>
    <div style="text-align: left; margin-top: 20px;">
        <strong>
            @php
                $currentHr = \DB::table('users')->where('users.id', auth()->user()->id)->join('heads_personal_infos', 'users.id', '=', 'heads_personal_infos.user_id')->first();
                echo ucwords($currentHr->firstname . ' ' . $currentHr->middlename . ' ' . $currentHr->lastname);
            @endphp
            <br>
            Supervising Admin. Officer<br>
            (HRMO-1V)
        </strong>
    </div>
</body>
</html>
