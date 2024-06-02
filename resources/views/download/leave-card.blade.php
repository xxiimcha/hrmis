<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    html{
        font-family: 'Arial';
    }

    /* @media print {
        body {
            margin: 50px;
        }
    } */

    table, th, td {
        border: 2px solid black;
        border-collapse: collapse;
        padding-left: 10px;
        padding-right: 10px;
        border-spacing: 0;
    }

    th {
        font-size: 14px;
    }

    td {
        font-size: 12px;
        border: none !important;
        border-left: 2px solid black !important;
    }
</style>

<body>
    <div style="text-align: center;">Province of Leyte</div>
    <div style="text-align: center;">Municipality of <strong>ABUYOG</strong></div>
    <div style="font-size: 17px; text-align: center; font-weight: bold;">EMPLOYEES LEAVE CARD</div>

    <table style="margin-top: 20px; width: 100%">
        <thead>
            <tr style="text-align: left !important;">
                <th colspan="4">NAME: {{ ucwords($employee->employeeInfo->firstname . ' ' . $employee->employeeInfo->middlename . ' ' . $employee->employeeInfo->lastname) . ' ' . $employee->employeeInfo->extension }}</th>
                <th colspan="6">
                    @php
                        $branch = \DB::table('employee_service_records')->where('employee_table_id', $employee->id)->orderBy('created_at', 'DESC')->first();
                        echo 'DIVISION/OFFICE: ' . ucwords($branch->branch);
                    @endphp
                </th>
                <th colspan="3">1st DAY OF SERVICE: {{ date('F d, Y', strtotime($employee->created_at)) }}</th>
            </tr>

            <tr style="text-align: center;">
                <th></th>
                <th></th>
                <th colspan="5" style="font-weight: bold;">VACATION LEAVE</th>
                <th colspan="5" style="font-weight: bold;">SICK LEAVE</th>
                <th></th>
            </tr>

            <tr style="text-align: center;">
                <th style="font-weight: bold;">PERIOD</th>
                <th style="font-weight: bold;">PARTICULARS</th>

                <th style="font-weight: bold;">EARNED</th>
                <th style="font-weight: bold;">ABS. UND.</th>
                <th style="font-weight: bold;">BAL.</th>
                <th style="font-weight: bold;">W/P</th>
                <th style="font-weight: bold;">TOTAL</th>

                <th style="font-weight: bold;">EARNED</th>
                <th style="font-weight: bold;">ABS. UND.</th>
                <th style="font-weight: bold;">BAL.</th>
                <th style="font-weight: bold;">W/P</th>
                <th style="font-weight: bold;">TOTAL</th>

                <th style="font-weight: bold;">DATE AND ACTION TAKEN ON APPL. FOR LEAVE</th>
            </tr>
        </thead>

        <tbody style="text-align: center;">
            @foreach ($employee->employeeLeaveCard as $lc)
                <tr>
                    <td>{{ $lc->periodFrom . '-' . $lc->periodTo }}</td>
                    <td>{{ $lc->particulars }}</td>

                    <td>{{ $lc->vacEarned }}</td>
                    <td>{{ $lc->vacAbsUnd }}</td>
                    <td>{{ $lc->vacBal }}</td>
                    <td>{{ $lc->vacWP }}</td>
                    <td>{{ $lc->vacTotal }}</td>

                    <td>{{ $lc->sickEarned }}</td>
                    <td>{{ $lc->sickAbsUnd }}</td>
                    <td>{{ $lc->sickBal }}</td>
                    <td>{{ $lc->sickWP }}</td>
                    <td>{{ $lc->sickTotal }}</td>

                    <td>{{ $lc->dateAction }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
