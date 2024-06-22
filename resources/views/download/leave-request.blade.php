<!DOCTYPE html>
<html>
<head>
    <title>Leave Request Details</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }
        .title {
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }
        td, th {
            border: 1px solid black;
            padding: 5px;
        }
        .checkbox {
            display: inline-block;
            width: 10px;
            height: 10px;
            border: 1px solid black;
            margin-right: 5px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="title">APPLICATION FOR LEAVE</div>

    <table>
        <tr>
            <td colspan="2"><strong>OFFICE/DEPARTMENT:</strong> {{ $leaveRequest->name ?? 'N/A' }}</td>
            <td><strong>DATE OF FILING:</strong> {{ $leaveRequest->dateoffiling ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td colspan="2"><strong>NAME:</strong> {{ ucwords($leaveRequest->firstname ?? 'N/A') }} {{ ucwords($leaveRequest->middlename ?? '') }} {{ ucwords($leaveRequest->lastname ?? '') }}</td>
            <td><strong>POSITION:</strong> {{ ucwords($leaveRequest->position ?? 'N/A') }}</td>
        </tr>
        <tr>
            <td colspan="2"><strong>SALARY:</strong> {{ $leaveRequest->salary ?? 'N/A' }}</td>
        </tr>
    </table>

    <div><strong>TYPE OF LEAVE TO BE AVAILED OF</strong></div>
    <table>
        @php
            $availableLeaveTypes = [
                1 => 'Vacation Leave (Sec. 51, Rule XVI, Omnibus Rules Implementing E.O 292)',
                2 => 'Mandatory/Forced Leave (Sec. 25, Rule XVI, Omnibus Rules Implementing E.O 292)',
                3 => 'Sick Leave (Sec. 43, Rule XV, Omnibus Rules Implementing E.O 292)',
                4 => 'Maternity Leave (R.A No. 11210/IRR issued by CSC, DOLE and SSS)',
                5 => 'Paternity Leave (R.A No. 8187/CSC MC No. 71, s. 1998, as amended)',
                6 => 'Special Privilege Leave (Sec. 21, Rule XVI, Omnibus Rules Implementing E. O. No. 292)',
                7 => 'Solo Parent Leave (R.A. No. 8972/CSC MC No. 8, s. 2004)',
                8 => 'Study Leave (Sec.68, Rule XVI, Omnibus Rules Implementing E.O. No. 292)',
                9 => '10-Day VAWC Leave (R.A. No. 9262/CSC MC No. 15, s. 2005)',
                10 => 'Rehabilitation Privilege (Sec. 55, Rule XVI, Omnibus Rules Implementing E.O. No. 292)',
                11 => 'Special Leave Benefits for Women (R.A. No. 9710/CSC Mc No.25, s. 2010)',
                12 => 'Special Emergency (Calamity) Leave (CSC MC No. 2, s. 2012, as amended)',
                13 => 'Adoption Leave (R.A. No. 8552)',
            ];
        @endphp

        @foreach($availableLeaveTypes as $typeId => $leaveType)
            <tr>
                <td>
                    <div class="checkbox">@if(in_array($typeId, explode(',', $leaveRequest->typeofleave6A))) &#10004; @endif</div> {{ $leaveType }}
                </td>
            </tr>
        @endforeach
        @if ($leaveRequest->othersOf6A)
            <tr>
                <td>
                    <strong>Others:</strong> {{ $leaveRequest->othersOf6A }}
                </td>
            </tr>
        @endif
    </table>

    <div><strong>DETAILS OF LEAVE</strong></div>
    <table>
        <tr>
            <td>
                <div class="checkbox">@if(in_array(1, explode(',', $leaveRequest->detailsOfLeave6B))) &#10004; @endif</div> Within the Philippines
            </td>
            <td>
                <div class="checkbox">@if(in_array(2, explode(',', $leaveRequest->detailsOfLeave6B))) &#10004; @endif</div> Abroad
            </td>
            <td>
                <div class="checkbox">@if(in_array(3, explode(',', $leaveRequest->detailsOfLeave6B))) &#10004; @endif</div> In Hospital
            </td>
        </tr>
        <tr>
            <td>
                <div class="checkbox">@if(in_array(4, explode(',', $leaveRequest->detailsOfLeave6B))) &#10004; @endif</div> Out Patient
            </td>
            <td>
                <div class="checkbox">@if(in_array(5, explode(',', $leaveRequest->detailsOfLeave6B))) &#10004; @endif</div> Special Leave Benefits for Women
            </td>
            <td>
                <div class="checkbox">@if(in_array(6, explode(',', $leaveRequest->detailsOfLeave6B))) &#10004; @endif</div> Completion of Master's Degree
            </td>
        </tr>
        <tr>
            <td>
                <div class="checkbox">@if(in_array(7, explode(',', $leaveRequest->detailsOfLeave6B))) &#10004; @endif</div> BAR/Board Examination Review
            </td>
            <td>
                <div class="checkbox">@if(in_array(8, explode(',', $leaveRequest->detailsOfLeave6B))) &#10004; @endif</div> Monetization of Leave Credits
            </td>
            <td>
                <div class="checkbox">@if(in_array(9, explode(',', $leaveRequest->detailsOfLeave6B))) &#10004; @endif</div> Terminal Leave
            </td>
        </tr>
    </table>

    <div><strong>SPECIFY DETAILS</strong></div>
    <div class="content">
        @if ($leaveRequest->detailsOfLeave6BReason)
            {{ $leaveRequest->detailsOfLeave6BReason }}
        @else
            <span class="text-muted">(No value specified)</span>
        @endif
    </div>

    <div><strong>INCLUSIVE DATES</strong></div>
    <div class="content">
        {{ $leaveRequest->inclusiveDates6C ?? 'N/A' }}
    </div>

    <div><strong>NUMBER OF WORKING DAYS APPLIED FOR</strong></div>
    <div class="content">
        {{ $leaveRequest->numberOfWorkingDays6C ?? 'N/A' }}
    </div>

    <div><strong>COMMUTATION</strong></div>
    <table>
        <tr>
            <td>
                <div class="checkbox">@if(in_array(1, explode(',', $leaveRequest->commutation6D))) &#10004; @endif</div> Not Requested
            </td>
            <td>
                <div class="checkbox">@if(in_array(2, explode(',', $leaveRequest->commutation6D))) &#10004; @endif</div> Requested
            </td>
        </tr>
    </table>

</body>
</html>
