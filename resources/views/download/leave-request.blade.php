<!DOCTYPE html>
<html>
<head>
    <title>Leave Request Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 20px;
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
            vertical-align: top;
        }
        .checkbox {
            display: inline-block;
            width: 12px;
            height: 12px;
            border: 1px solid black;
            text-align: center;
            line-height: 12px;
            font-size: 12px;
        }
        .section-title {
            font-weight: bold;
            margin-top: 10px;
        }
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
        .header-text {
            text-align: center;
            flex-grow: 1;
        }
        .header-image-left {
            width: 80px;
            height: auto;
        }
        .header-left-text {
            text-align: left;
            margin-right: auto;
        }
    </style>
</head>
<body>
    <div class="header-container">
        <div class="header-left-text">
            <p>Civil Service Form No. 6<br>Revised 2020</p>
        </div>
        <div class="header-text">
            <p>Republic of the Philippines</p>
            <p><strong>MUNICIPALITY OF ABUYOG</strong></p>
            <p>Brgy. Loyonsawang Abuyog, Leyte</p>
        </div>
    </div>

    <div class="title">APPLICATION FOR LEAVE</div>

    <table>
        <tr>
            <td colspan="2"><strong>OFFICE/DEPARTMENT:</strong> {{ $leaveRequest->office_department ?? 'N/A' }}</td>
            <td><strong>DATE OF FILING:</strong> {{ $leaveRequest->dateoffiling ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td colspan="2"><strong>NAME:</strong> {{ ucwords($leaveRequest->lastname ?? 'N/A') }}, {{ ucwords($leaveRequest->firstname ?? '') }} {{ ucwords($leaveRequest->middlename ?? '') }}</td>
            <td><strong>POSITION:</strong> {{ ucwords($leaveRequest->position ?? 'N/A') }}</td>
        </tr>
        <tr>
            <td colspan="3"><strong>SALARY:</strong> {{ $leaveRequest->salary ?? 'N/A' }}</td>
        </tr>
    </table>

    <div class="section-title">6. A TYPE OF LEAVE TO BE AVAILED OF</div>
    <table>
        <tr>
            <td><div class="checkbox">@if(in_array(1, explode(',', $leaveRequest->typeofleave6A))) &#10004; @endif</div> Vacation Leave</td>
            <td><div class="checkbox">@if(in_array(2, explode(',', $leaveRequest->typeofleave6A))) &#10004; @endif</div> Mandatory/Forced Leave</td>
            <td><div class="checkbox">@if(in_array(3, explode(',', $leaveRequest->typeofleave6A))) &#10004; @endif</div> Sick Leave</td>
        </tr>
        <tr>
            <td><div class="checkbox">@if(in_array(4, explode(',', $leaveRequest->typeofleave6A))) &#10004; @endif</div> Maternity Leave</td>
            <td><div class="checkbox">@if(in_array(5, explode(',', $leaveRequest->typeofleave6A))) &#10004; @endif</div> Paternity Leave</td>
            <td><div class="checkbox">@if(in_array(6, explode(',', $leaveRequest->typeofleave6A))) &#10004; @endif</div> Special Privilege Leave</td>
        </tr>
        <tr>
            <td><div class="checkbox">@if(in_array(7, explode(',', $leaveRequest->typeofleave6A))) &#10004; @endif</div> Solo Parent Leave</td>
            <td><div class="checkbox">@if(in_array(8, explode(',', $leaveRequest->typeofleave6A))) &#10004; @endif</div> Study Leave</td>
            <td><div class="checkbox">@if(in_array(9, explode(',', $leaveRequest->typeofleave6A))) &#10004; @endif</div> 10-Day VAWC Leave</td>
        </tr>
        <tr>
            <td><div class="checkbox">@if(in_array(10, explode(',', $leaveRequest->typeofleave6A))) &#10004; @endif</div> Rehabilitation Privilege</td>
            <td><div class="checkbox">@if(in_array(11, explode(',', $leaveRequest->typeofleave6A))) &#10004; @endif</div> Special Leave Benefits for Women</td>
            <td><div class="checkbox">@if(in_array(12, explode(',', $leaveRequest->typeofleave6A))) &#10004; @endif</div> Special Emergency Leave</td>
        </tr>
        <tr>
            <td><div class="checkbox">@if(in_array(13, explode(',', $leaveRequest->typeofleave6A))) &#10004; @endif</div> Adoption Leave</td>
            <td colspan="2"><strong>Others:</strong> {{ $leaveRequest->othersOf6A ?? '' }}</td>
        </tr>
    </table>

    <div class="section-title">6. B DETAILS OF LEAVE</div>
    <table>
        <tr>
            <td><div class="checkbox">@if($leaveRequest->detailsOfLeave6B == 1) &#10004; @endif</div> Within the Philippines</td>
            <td><div class="checkbox">@if($leaveRequest->detailsOfLeave6B == 2) &#10004; @endif</div> Abroad</td>
            <td><div class="checkbox">@if($leaveRequest->detailsOfLeave6B == 3) &#10004; @endif</div> In Hospital</td>
        </tr>
        <tr>
            <td><div class="checkbox">@if($leaveRequest->detailsOfLeave6B == 4) &#10004; @endif</div> Out Patient</td>
            <td><div class="checkbox">@if($leaveRequest->detailsOfLeave6B == 5) &#10004; @endif</div> Special Leave Benefits for Women</td>
            <td><div class="checkbox">@if($leaveRequest->detailsOfLeave6B == 6) &#10004; @endif</div> Completion of Master's Degree</td>
        </tr>
        <tr>
            <td><div class="checkbox">@if($leaveRequest->detailsOfLeave6B == 7) &#10004; @endif</div> BAR/Board Examination Review</td>
            <td><div class="checkbox">@if($leaveRequest->detailsOfLeave6B == 8) &#10004; @endif</div> Monetization of Leave Credits</td>
            <td><div class="checkbox">@if($leaveRequest->detailsOfLeave6B == 9) &#10004; @endif</div> Terminal Leave</td>
        </tr>
    </table>

    <div><strong>SPECIFY DETAILS:</strong> {{ $leaveRequest->detailsOfLeave6BReason ?? 'N/A' }}</div>

    <div class="section-title">6. C NUMBER OF WORKING DAYS APPLIED FOR</div>
    <table>
        <tr>
            <td>{{ $leaveRequest->numberOfWorkingDays6C ?? 'N/A' }}</td>
        </tr>
    </table>

    <div class="section-title">6. D COMMUTATION</div>
    <table>
        <tr>
            <td><div class="checkbox">@if($leaveRequest->commutation6D == 1) &#10004; @endif</div> Not Requested</td>
            <td><div class="checkbox">@if($leaveRequest->commutation6D == 2) &#10004; @endif</div> Requested</td>
        </tr>
    </table>

    <div class="section-title">7. A CERTIFICATION OF LEAVE CREDITS</div>
    <table>
        <tr>
            <td><strong>As of</strong> {{ $leaveRequest->leaveCreditsDate ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td><strong>Vacation Leave:</strong> Total Earned: {{ $leaveRequest->totalEarnedVL ?? 'N/A' }}, Less this application: {{ $leaveRequest->lessThisApplicationVL ?? 'N/A' }}, Balance: {{ $leaveRequest->balanceVL ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td><strong>Sick Leave:</strong> Total Earned: {{ $leaveRequest->totalEarnedSL ?? 'N/A' }}, Less this application: {{ $leaveRequest->lessThisApplicationSL ?? 'N/A' }}, Balance: {{ $leaveRequest->balanceSL ?? 'N/A' }}</td>
        </tr>
    </table>

    <div class="section-title">7. B RECOMMENDATION</div>
    <table>
        <tr>
            <td><div class="checkbox">@if($leaveRequest->recommendation == 'approval') &#10004; @endif</div> For approval</td>
            <td><div class="checkbox">@if($leaveRequest->recommendation == 'disapproval') &#10004; @endif</div> For disapproval due to</td>
        </tr>
        <tr>
            <td colspan="2">{{ $leaveRequest->recommendationReason ?? 'N/A' }}</td>
        </tr>
    </table>

    <div class="section-title">7. C APPROVED FOR</div>
    <table>
        <tr>
            <td><strong>{{ $leaveRequest->approvedForDays ?? 'N/A' }}</strong> days with pay</td>
            <td><strong>{{ $leaveRequest->approvedForDaysWithoutPay ?? 'N/A' }}</strong> days without pay</td>
        </tr>
    </table>

    <div class="section-title">7. D DISAPPROVED DUE TO</div>
    <table>
        <tr>
            <td>{{ $leaveRequest->disapprovedDueTo ?? 'N/A' }}</td>
        </tr>
    </table>

    <div><strong>Certified Correct:</strong> {{ $leaveRequest->certifiedBy ?? 'N/A' }}</div>
    <div><strong>Approved By:</strong> {{ $leaveRequest->approvedBy ?? 'N/A' }}</div>
</body>
</html>
