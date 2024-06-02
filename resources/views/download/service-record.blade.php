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
        text-align: center;
        padding-left: 10px;
        padding-right: 10px;
        border-spacing: 0;
    }

    th {
        font-size: 10px;
    }

    td {
        font-size: 10px;
        border: none !important;
        border-left: 2px solid black !important;
    }
</style>

<body>
    <div style="text-align: center; font-size: 12px; line-height: 20px;">Republic of the Philippines</div>
    <div style="font-weight: bold; font-size: 12.5px; text-align: center; line-height: 15px;">MUNICIPALITY OF ABUYOG</div>
    <div style="text-align: center; font-size: 12px; line-height: 20px;">Province of Leyte</div>
    <div style="text-align: center; font-weight: bold; font-size: 15.5px; line-height: 30px;">HUMAN RESOURCE MANAGEMENT OFFICE</div>
    <div style="font-size: 15.5px; text-align: center; font-weight: bold;">SERVICE RECORD</div>

    <div style="margin-top: 20px; font-size: 11px; line-height: 20px;">TO WHOM IT MAY CONCERN:</div>
    <div style="font-size: 12px; text-indent: 50px; line-height: 20px;">
        <strong>I HEREBY CERTIFY</strong> that the following is the statement of Records of Services in the Government of <strong>{{ strtoupper($employee->employeeInfo->firstname . ' ' . $employee->employeeInfo->middlename . ' ' . $employee->employeeInfo->lastname) . ' ' . $employee->employeeInfo->extension }},</strong>
        @php
            $branch = \DB::table('employee_service_records')->where('employee_table_id', $employee->id)->orderBy('created_at', 'DESC')->first();
            echo ucwords($branch->branch) . ', Abuyog, Leyte.';
        @endphp
    </div>

    <div style="font-size: 12px; margin-top: 10px; width: 100%; display: flex; justify-content: space-between;">
        <div style="width: 40%; float: left">Birth Date: <strong>{{ date('F d, Y', strtotime($employee->employeeInfo->birthday)) }}</strong></div>
        <div style="text-align: right; width: 40%; float: right">Place of Birth: <strong>{{ ucwords($employee->employeeInfo->birthPlace) }}</strong></div>
    </div>

    <table style="margin-top: 20px; width: 100%">
        <thead style="text-align: center;">
            <tr>
                <th colspan="2" class="fw-bold">SERVICE</th>
                <th colspan="4" class="fw-bold">RECORD OF EMPLOYMENT</th>
                <th rowspan="3" class="fw-bold">Office or Entity/Division</th>
                <th rowspan="3" class="fw-bold">Branch National Municipal</th>
                <th rowspan="3" class="fw-bold">Leaves Absences w/o pay</th>
                <th rowspan="3" class="fw-bold">Remarks</th>
            </tr>

            <tr>
                <th colspan="2" class="fw-bold">Inclusive Dates</th>
                <th rowspan="2" class="fw-bold">Designation</th>
                <th rowspan="2" class="fw-bold">Status</th>
                <th colspan="2" class="fw-bold">Salary</th>
            </tr>

            <tr>
                <th class="fw-bold">From</th>
                <th class="fw-bold">To</th>
                <th class="fw-bold">P</th>
                <th class="fw-bold">Mode</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($employee->employeeServiceRecord as $sr)
                <tr class="text-center">
                    <td>{{ $sr->fromDate }}</td>
                    <td>{{ $sr->toDate }}</td>
                    <td>{{ ucwords($sr->designation) }}</td>
                    <td>{{ ucwords($sr->status) }}</td>
                    <td>{{ ucwords($sr->salary) }}</td>
                    <td>/{{ $sr->mode }}</td>
                    <td>{{ preg_replace('/\([^)]*\)/', '', str_replace('MUNICIPAL', 'Mun.',  $sr->employeesrdep->name)) }}</td>
                    <td>{{ ucwords($sr->branch) }}</td>
                    <td>{{ ucwords($sr->leaves) }}</td>
                    <td>{{ ucwords($sr->remarks) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div style="font-size: 12px; text-indent: 50px; margin-top: 10px;">
        ISSUED this {{ Carbon::parse(date('D'))->format('jS') }} day of {{ date('F') }} {{ date('Y') }}, at Abuyog, Leyte for whatever legal purpose it may serve.
    </div>

    <div style="font-size: 12px; margin-top: 20px;">Certified Correct :</div>
    <div style="font-size: 12px; margin-top: 20px; text-indent: 30px; font-weight: bold;">{{ auth()->user()->headInfo->firstname . ' ' . auth()->user()->headInfo->middlename . ' ' . auth()->user()->headInfo->lastname }}</div>
    <div style="font-size: 12px; margin-top: 5px; text-indent: 50px;">HRMO - Designate</div>
</body>
</html>
